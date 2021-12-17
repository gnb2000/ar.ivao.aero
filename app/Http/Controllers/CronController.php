<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\DB;;
use App\Models\TrainingFlight, App\Models\TrainingPoint, App\Models\OnlineFlight, App\Models\OnlineATC, App\Models\User, App\Models\Gca, App\Models\Tour, App\Models\AtcPosition, App\Models\Airport, App\Models\StaffAction;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function getFlights()
    {
        $whazzup = json_decode(file_get_contents('/var/www/vhosts/ar.ivao.aero/httpdocs/datafeed/whazzupv2.json'), TRUE);
        $pilots = @$whazzup['clients']['pilots'];

        if(is_null($pilots) || is_null($whazzup)) return;

        $n = 0;
        foreach($pilots as $pilot)
        {
            if(is_null($pilot['lastTrack']) || is_null($pilot['flightPlan'])) continue;

            $callsign = @$pilot['callsign'];
            $vid = $pilot['userId'];
            $lat = $pilot['lastTrack']['latitude'];
            $lon = $pilot['lastTrack']['longitude'];
            $groundSpeed = $pilot['lastTrack']['groundSpeed'];
            $origen = $pilot['flightPlan']['departureId'];
            $destino = $pilot['flightPlan']['arrivalId'];
            
            if(
            ($this->entre($lat, -67.944, -54.906) && $this->entre($lon, -68.03, -53.6)) ||
            ($this->entre($lat, -54.906, -52.465) && $this->entre($lon, -68.6, -65.03)) ||
            ($this->entre($lat, -52.465, -40.54) && $this->entre($lon, -72.3, -57.47)) ||
            ($this->entre($lat, -40.54, -25.3) && $this->entre($lon, -69.86, -57.75)) ||
            ($this->entre($lat, -25.3, -22.36) && $this->entre($lon, -68.4, -57.75)) ||
            ($this->entre($lat, -30.17, -27.3) && $this->entre($lon, -57.75, -55.56)) ||
            ($this->entre($lat, -27.3, -25.6) && $this->entre($lon, -55.56, -53.74)) ||
            (substr($origen, 0, 2) == 'SA' && substr($destino, 0, 2) == 'SA'))
            {
                $lastFlight = OnlineFlight::where('callsign', $callsign)
                                        ->where('vid', $vid)
                                        ->where('departure', $origen)
                                        ->where('destination', $destino)
                                        ->orderBy('id', 'DESC')
                                        ->first();
                
                $now = strtotime(date('Y-m-d H:i:s'));
                $fechaBD = strtotime(@$lastFlight->dt);
                
                $online = @$lastFlight->online + ($now - $fechaBD);
                
                $latBD = @$lastFlight->latitude;
                $lonBD = @$lastFlight->longitude;
                $origenDB = @$lastFlight->departure;
                $destinoDB = @$lastFlight->destination;
                $id = @$lastFlight->id; 
                
                $n++;

                if($groundSpeed > 5)
                {
                    if(is_null($lastFlight) || ($now - $fechaBD) > 900)
                    {
                        $newFlight = new OnlineFlight();
                        $newFlight->callsign = $callsign;
                        $newFlight->vid = $vid;
                        $newFlight->departure = $origen;
                        $newFlight->destination = $destino;
                        $newFlight->latitude = $lat;
                        $newFlight->longitude = $lon;

                        $newFlight->save();
                    }
                    else
                    {
                        $lastFlight = OnlineFlight::find($id);
                        $lastFlight->latitude = $lat;
                        $lastFlight->longitude = $lon;
                        $lastFlight->online = $online;

                        $lastFlight->save();
                    }
                } //fin if groundspeed
            } //fin if coordenadas
        } // fin foreach

        $con = mysqli_connect('localhost', 'web', '5CgbgiAn@1b1Gvuf', 'ivao-ar-plesk_web') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');

        mysqli_query($con, "INSERT INTO TempCountFlights (flightsSUM) VALUES ($n)");

        if(date('i') == 00 or date('i') == 30)
        {
            
            $from = date('Y-m-d H:i', time() - 1800).':00';
            $to = date('Y-m-d H:i').':00';
            $fila = mysqli_fetch_array(mysqli_query($con, "SELECT AVG(flightsSUM) AS FlightAVG FROM TempCountFlights"));
            $weekday = date('l', time() - 1800);
            $wdid = date('w', time() - 1800);
            
            $int = date('H:i', time() - 1800).'-'.date('H:i');
            
            $count = round($fila['FlightAVG'],2);
            
            if(mysqli_query($con, "INSERT INTO CountFlights(IntStart, IntFinish, Inter, Weekday, WD_id, Count) VALUES ('$from', '$to', '$int', '$weekday', $wdid, $count)"))
            {
                mysqli_query($con, "TRUNCATE TempCountFlights");
                mysqli_query($con, "INSERT INTO TempCountFlights (flightsSUM) VALUES ($n)");
            }
            else echo("Error description: " . mysqli_error($con));  
        }

        mysqli_close($con);
    }

    public function getATCs()
    {
        $whazzup = json_decode(file_get_contents('/var/www/vhosts/ar.ivao.aero/httpdocs/datafeed/whazzupv2.json'), TRUE);
        $atcs = @$whazzup['clients']['atcs'];

        if(is_null($whazzup) || is_null($atcs)) return;

        foreach($atcs as $atc)
        {   
            $callsign = $atc['callsign'];
            $vid = $atc['userId'];
                    
            if(substr($callsign, 0, 2) == 'SA' && preg_match('(DEL|GND|TWR|APP|CTR)', substr($callsign, -3)) && !strstr($callsign, '_X_') && !strstr($callsign, '_EXA_'))
            {
                $atcDB = OnlineATC::where('callsign', $callsign)->where('vid', $vid)->orderBy('id', 'DESC')->first(); 
                
                $id = @$atcDB->id;
                $vidBD = @$atcDB->vid;
                $now = strtotime(date('Y-m-d H:i:s'));
                $fechaActual = date('Y-m-d H:i');
                $fechaBD = strtotime(@$atcDB->dt);
                
                $online = @$atcDB->online + ($now - $fechaBD);

                if(is_null($atcDB) || ($now - $fechaBD) > 900)
                {
                    $newOnline = new OnlineATC();
                    $newOnline->callsign = $callsign;
                    $newOnline->vid = $vid;

                    $newOnline->save();

                    $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
                               "Content-Type: text/html; charset=utf-8\r\n".
                               "MIME-Version: 1.0\r\n";
                    $to = 'atc@ar.ivao.aero';

                    if(! $this->esConexionATCAutorizada($vid, $callsign))
                    {
                        $subject = 'Conexion ATC no autorizada';
                        $body = "<html><body><center><img src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Conexi&oacute;n ATC no autorizada</h2>Le informamos que se ha conectado un miembro no autorizado en una posici&oacute;n ATC argentina. Para m&aacute;s info, consulte el ATC tracker. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n ATC</strong>: $callsign</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID Miembro</strong>: $vid</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $fechaActual UTC</div><br /><br /><br /></body></html>";
                    
                        mail($to, $subject, $body, $headers);
                    }               
                }
                else
                {
                    $onlineATC = OnlineATC::find($id);
                    $onlineATC->online = $online;

                    $onlineATC->save();
                }
            } // fin if callsign
        } // fin foreach
    }

    public function timeCleanUp()
    {
        $flights = OnlineFlight::where('online', 0)
                                ->orWhere('origen', '')
                                ->orWhere('destino', '')
                                ->orderBy('id', 'DESC')
                                ->get();

        foreach($flights as $flight)
        {
            $now = strtotime(date('Y-m-d H:i:s'));
            $fechaBD = strtotime($flight->fecha);
            
            if(($now - $fechaBD) > 3600) $flight->delete();
        }

        $atcs = OnlineATC::where('online', 0)->orderBy('id', 'DESC')->get();

        foreach($atcs as $atc)
        {
            $now = strtotime(date('Y-m-d H:i:s'));
            $fechaBD = strtotime($atc->fecha);
            
            if(($now - $fechaBD) > 3600) $atc->delete();
        }
    }

    public function pointsTracker()
    {
        $whazzup = json_decode(file_get_contents('/var/www/vhosts/ar.ivao.aero/httpdocs/datafeed/whazzupv2.json'), TRUE);
        $pilots = @$whazzup['clients']['pilots'];

        if(is_null($whazzup) || is_null($pilots)) return;

        foreach($pilots as $pilot)
        {
            if(is_null($pilot['lastTrack']) || is_null($pilot['flightPlan'])) continue;

            $callsign = $pilot['callsign'];
            $vid = $pilot['userId'];
            $lat = $pilot['lastTrack']['latitude'];
            $lon = $pilot['lastTrack']['longitude'];
            $altitud = $pilot['lastTrack']['altitude'];
            $speed = $pilot['lastTrack']['groundSpeed'];
            $heading = $pilot['lastTrack']['heading'];
            $ground = $pilot['lastTrack']['onGround'];

            $origen = $pilot['flightPlan']['departureId'];
            $destino = $pilot['flightPlan']['arrivalId'];
            $alternate = $pilot['flightPlan']['alternativeId'];
            $remarks = $pilot['flightPlan']['remarks'];
            $alt = intval($altitud);

            $rmk = explode(' ', $remarks);

            if((strpos($remarks, 'TRAINING') || strpos($remarks, 'EXAM')) && strpos($remarks, 'AR '))
            {
                echo $callsign.' is flying in the exam/training<br>';

                $flight = TrainingFlight::where('vid', $vid)->where('callsign', $callsign)->orderBy('id', 'DESC')->first();

                $flight_id = @$flight->id;

                $now = strtotime(date('Y-m-d H:i:s'));
                $ahora = date('Y-m-d H:i:s');
                $fechaBD = strtotime(@$flight->disc_time);

                $diff = ($now - $fechaBD);
                //echo $now.' - '.$fechaBD.' = '.$diff;


                if(!is_null($flight) && ($now - $fechaBD) < 900)
                {
                    $lastFlight = TrainingFlight::find($flight_id);
                    $lastFlight->callsign = $callsign;
                    $lastFlight->disc_time = $ahora;

                    $lastFlight->save();
                }
                else
                {
                    $newFlight = new TrainingFlight();
                    $newFlight->vid = $vid;
                    $newFlight->callsign = $callsign;
                    $newFlight->dep_icao = $origen;
                    $newFlight->arr_icao = $destino;
                    $newFlight->rmrks = $remarks;

                    $newFlight->save();
                }
            }  
        }
    }

    public function pointsCheck()
    {
        define('DB_SERVER','localhost');
        define('DB_NAME','ivao-ar-plesk_web');
        define('DB_USER','web');
        define('DB_PASS','5CgbgiAn@1b1Gvuf');

        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');

        $points = TrainingPoint::where('vid', '>', 0)->distinct()->get();
        $deletions = TrainingPoint::where('vid', 0)->get();

        foreach($deletions as $deletion) $deletion->delete();

        $vids = array();
        foreach($points as $point) $vids[] = $point->vid;

        foreach($vids as $vid)
        {
            $fecha = date('d-m-Y H:i');
            $medalla = '';
            $enviar = FALSE;

            $query = TrainingPoint::selectRaw('SUM(points) AS \'suma\'')
                        ->where('vid', $vid)
                        ->where('type', 'p')
                        ->first();
            $puntos = $query->suma;

            //Comprobamos los pilotos
            if($puntos >= 10 && $puntos < 20)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND points = 10 AND type = 'p'") or die(mysqli_error($con));

                if(mysqli_num_rows($res1) == 0)
                {
                    $medalla = 'Pilot Support: Bronze';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 10, 'p')") or mail('web@ar.ivao.aero', 'Error en points.php 10', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
            else if($puntos >= 20 && $puntos < 40)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND points = 20 AND type = 'p'") or die(mysqli_error($con));
                if(mysqli_num_rows($res1) == 0)
                {
                    $medalla = 'Pilot Support: Silver';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 20, 'p')") or mail('web@ar.ivao.aero', 'Error en points.php 20', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
            else if($puntos >= 40 && $puntos < 60)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND points = 40 AND type = 'p'") or die(mysqli_error($con));
                if(mysqli_num_rows($res1) == 0)
                {
                    $medalla = 'Pilot Support: Gold';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 40, 'p')") or mail('web@ar.ivao.aero', 'Error en points.php 40', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
            else if($puntos >= 60 && $puntos < 80)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND points = 60 AND type = 'p'") or die(mysqli_error($con));
                if(mysqli_num_rows($res1) == 0)
                {
                    $medalla = 'Pilot Support: Platinum';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 60, 'p')") or mail('web@ar.ivao.aero', 'Error en points.php 60', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
            else if($puntos >= 80)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND points >= 80 AND type = 'p'") or die(mysqli_error($con));
                if(mysqli_num_rows($res1) == 0)
                {
                    $medalla = 'Pilot Support: Diamond';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 80, 'p')") or mail('web@ar.ivao.aero', 'Error en points.php 80', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
                
            
            //Comprobamos los puntos ATC
            $resC = mysqli_query($con, "SELECT SUM(points) AS 'suma' FROM training_points WHERE vid = $vid AND type = 'a'") or die(mysqli_error($con));
            $fila = mysqli_fetch_array($resC);
            if($fila['suma'] >= 10)
            {
                $res1 = mysqli_query($con, "SELECT vid FROM training_points_notified WHERE vid = $vid AND type = 'a'") or die(mysqli_error($con));
                if(mysqli_num_rows($res1) == 0)
                {
                    $puntos = 10;
                    $medalla = 'ATC Training Assistance';
                    mysqli_query($con, "INSERT INTO training_points_notified(vid, points, type) VALUES($vid, 10, 'a')") or mail('web@ar.ivao.aero', 'Error en points.php ATC', mysqli_error($con), "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n");
                    $enviar = TRUE;
                }
            }
            
            if($enviar)
            {
                $user = User::find($vid);

                $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                           "Content-Type: text/html; charset=utf-8\r\n".
                           "MIME-Version: 1.0\r\n";
                $body = "<html><body><center><img src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Nueva medalla pendiente de otorgar</h2>Hay una medalla pendiente de otorgar tras haber participado con &eacute;xito en $puntos trainings/ex&aacute;menes. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: $vid ".$user->name." ".$user->surname."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Medalla</strong>: $medalla</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $fecha UTC</div><br /><br /></body></html>";
                
                mail('miembros@ar.ivao.aero', 'Nueva medalla pendiente de otorgar', $body, $headers);
            }
        }

        mysqli_close($con);
    }

    public function updateAirports()
    {
        $airportsHQ = json_decode(file_get_contents('https://api.ivao.aero/v2/airports?countryId=AR&apiKey=27Qz1E1IjbSWBwfCHx7SK7CC898pDwLZ'), TRUE);

        foreach($airportsHQ['items'] as $airportHQ)
        {
            $airportDB = Airport::where('icao', $airportHQ['icao'])->first();

            if(is_null($airportDB))
            {
                $airportDB = new Airport();
                $airportDB->icao = $airportHQ['icao'];
                $airportDB->iata = $airportHQ['iata'];
                $airportDB->city = $airportHQ['city'];
                $airportDB->name = $airportHQ['name'];
                $airportDB->lat = $airportHQ['latitude'];
                $airportDB->lon = $airportHQ['longitude'];
                
                $airportDB->save();
            }
            else
            {
                $airportDB->icao = $airportHQ['icao'];
                $airportDB->iata = $airportHQ['iata'];
                $airportDB->city = $airportHQ['city'];
                $airportDB->name = $airportHQ['name'];
                $airportDB->lat = $airportHQ['latitude'];
                $airportDB->lon = $airportHQ['longitude'];
                
                $airportDB->save();
            }
        }
    }


    public function updateATCPositions()
    {
        $airports = Airport::whereRaw('CHAR_LENGTH(icao) = 4')->get();

        foreach($airports as $airport)
        {
            $positions = json_decode(file_get_contents('https://api.ivao.aero/v2/airports/'.$airport->icao.'/ATCPositions?apiKey=27Qz1E1IjbSWBwfCHx7SK7CC898pDwLZ'), TRUE);

            foreach($positions as $positionHQ)
            {
                $positionDB = AtcPosition::find($positionHQ['composePosition']);
                if($positionHQ['position'] == 'ATIS') continue;
                
                if(is_null($positionDB))
                {
                    $positionDB = new AtcPosition();
                    $positionDB->PosId = $positionHQ['composePosition'];
                    $positionDB->PosName = $positionHQ['atcCallsign'];
                    $positionDB->Freq = $positionHQ['frequency'];
                    $positionDB->save();

                    $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                               "Content-Type: text/html; charset=utf-8\r\n".
                               "MIME-Version: 1.0\r\n";

                    mail('web@ar.ivao.aero', 'Nueva ATC Position encontrada en HQ', $positionDB->PosId.'-'.$positionDB->PosName, $headers);
                }
                else
                {
                    $positionDB->PosId = $positionHQ['composePosition'];
                    $positionDB->PosName = $positionHQ['atcCallsign'];
                    $positionDB->Freq = $positionHQ['frequency'];
                    $positionDB->save();
                }

                $positionsDB = AtcPosition::whereRaw("SUBSTRING(PosId, 1, 4) = '".$airport->icao."'")->get();
                $deletions = array();
                foreach($positionsDB as $positionDB)
                {
                    $exists = FALSE;
                    foreach($positions as $positionHQ2)
                        if($positionHQ2['composePosition'] == $positionDB->PosId) $exists = TRUE;

                    if(! $exists) $deletions[] = $positionDB;
                }
                
                foreach($deletions as $deletion) $deletion->delete();
            }
        }
    }

    public function birthdayEmail()
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $hoy = date("d-m");
        $GenDate = date("d/m/Y H:i:s");

        $Sent = '<style type="text/css">
                        .tg  {border-collapse:collapse;border-spacing:0;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg .tg-24y4{background-color:#2a4982;color:#ffffff;text-align:center;vertical-align:top}
                    </style>
                    <center>
                    <table class="tg">
                        <tr>
                            <th class="tg-24y4">Nombre<br></th>
                            <th class="tg-24y4">VID</th>
                            <th class="tg-24y4">Estado</th>
                        </tr>';

        $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n"; 
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        $users = User::where('active', 1)->get();          
        foreach($users as $user)
        {
            $bd = explode('-', $user->birthday);
            $cumple = @$bd[2].'-'.@$bd[1];

            if($cumple == $hoy)
            {
                $nombre= $user->name;
                $email= $user->email;
                //$email = 'hostmaster@ivao.com.ar';
                $subject = "Felicidades $nombre!";

                $body = "<html><body><center><img src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Felicidades $nombre!</h2>Estimado $nombre,<br />Porque cada uno de nuestros miembros es especial para nosotros, queremos en este dia tan importante para vos, desearte un feliz cumpleaños.<br />Nuestros mejores deseos para vos y tus seres queridos.<br /><br />Atentamente, en nombre de toda la division Argentina,<br />Te saluda,<br />El Staff</body></html>";

                if(mail($email, $subject, $body, $headers))
                    $Sent .= '<tr><td class="tg-031e">'.$nombre.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">Sent</td></tr>';
                else
                    $Sent .= '<tr><td class="tg-031e">'.$nombre.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">Failed</td></tr>';
                
                $vid = $user->vid;
                $newAge = ($user->age + 1);
                
                $user->age = $newAge;
                $user->save();
            }
        }
        $Sent .= '<tr><td class="tg-031e">Reporte Generado:<br>'.$GenDate.'</td></tr>';

        $email_s = 'miembros@ar.ivao.aero';
        $subject_s = 'Reporte de mensaje de cumpleaños '.$GenDate;

        if(mail($email_s, $subject_s, $Sent, $headers)) echo '<br>Email Sent';
        else echo '<br>Email Failed to send';
    }

    public function verificationEmail()
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $hoy = date("d-m");
        $GenDate = date("H:i:s T(P) d/m/Y ");

        $users = User::where('active', 0)->get();

        $Sent = '<style type="text/css">
                        .tg  {border-collapse:collapse;border-spacing:0;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg .tg-24y4{background-color:#2a4982;color:#ffffff;text-align:center;vertical-align:top}
                    </style>
                    <center>
                    <table class="tg">
                        <tr>
                            <th class="tg-24y4">Nombre<br></th>
                            <th class="tg-24y4">VID</th>
                            <th class="tg-24y4">Estado</th>
                        </tr>';

        foreach($users as $user)
        {
            $vid = $user->vid;
            $nombre = $user->name;
            $email = $user->email;
            $hash = $user->hash;
            $fecha = gmdate('d-m-Y H:i');
            $subject = "Verificación de cuenta";
            
            $emailmd5 = md5($email);

            $headers = "From: no-reply@ivao.com.ar\r\n"; 
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "List-Unsubscribe-Post: List-Unsubscribe=One-Click";
            $headers .= "List-Unsubscribe: <https://ar.ivao.aero/login/unsuscribe.php>";
            $headers .= "Message-Id: <".$emailmd5."@ar.ivao.aero>";

            $body =     '<html>
                            <body>
                            <center>
                            <img src="https://ivao.com.ar/img/logomail.jpg" alt="IVAO Argentina" />
                            </center><br /><br />
                            <div style="border-bottom: 2px solid #a0a0a0;"></div>
                            <br />
                            <h2>Bienvenido a IVAO Argentina '.$nombre.'!</h2>
                            
                            Antes que nada para empezar a usar su cuenta en la página de la división y acceder a todos los recursos excluivos para los miembros, deber&aacute;s ingresar al siguiente enlace para validar tu cuenta:<br>
                            <a href="https://ar.ivao.aero/email/'.$vid.'/confirm&hash='.$hash.'">https://ar.ivao.aero/email/'.$vid.'/confirm&hash='.$hash.'</a>
                            <br><br>
                            En saco de que el link no funcione, ingresa a https://ar.ivao.aero/?pagina=login/confirmar-email e ingresa manualmente su código de verificación.<br>
                            Código de Verificación: '.$hash.'
                            <br><br>
                            
                            Bienvenido nuevamente,<br>
                            Saludos,<br>
                            El Staff<br><br>
                            
                            Si haz recibido este email por equivocación o no deseas completar tu registro, envía un email a miembros@ar.ivao.aero.<br>              
                            <div style="border-bottom: 1px dotted #0F0F0F;padding: 10px 0px 0px;">Fecha de Envío: '.$fecha.' UTC</div><br />
                            </body>
                            </html>';
            if(mail($email, $subject, $body, $headers)){
                $Sent .= '<tr><td class="tg-031e">'.$nombre.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">Sent</td></tr>';
            }else{
                $Sent .= '<tr><td class="tg-031e">'.$nombre.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">Failed</td></tr>';
            }
        }
        $Sent .= '<tr><td class="tg-031e">Reporte Generado:<br>'.$GenDate.'</td></tr>';

        $email_s = 'web@ar.ivao.aero';
        $subject_s = 'Reporte de mensaje de verificación '.$GenDate;

        if(mail($email_s, $subject_s, $Sent, $headers)) echo '<br>Email Sent';
        else echo '<br>Email Failed to send';
    }

    public function usersMaintenance()
    {
        $hoy = date("Y-m-d");

        $users = User::where('active', 0)->get();
        $count = 0;

        foreach($users as $user)
        {
            $datetime1 = date_create($hoy);
            $datetime2 = date_create($user->login_first);   
            $interval = date_diff($datetime1, $datetime2);
            
            $diff = $interval->format("%a");
            $vid = $user->vid;
            
            if($diff >= 30)
            {
                $user->delete();
                echo $diff.' '.$vid.'<br>';
                
                $count++;
            }
            
        }

        $sa = new StaffAction();
        $sa->vid = 0;
        $sa->action = "'Mantenimiento de usuarios realizado. $count Eliminados'";
        $sa->ip = 'SYSTEM';

        $sa->save();
    }

    public function weeklyEmail()
    {
        $hoy = date("Y-m-d");
        $GenDate = date("H:i:s T(P) d/m/Y ");

        $users = User::orderBy('regTime', 'DESC')->get();

        $body = '<style type="text/css">
                        .tg  {border-collapse:collapse;border-spacing:0;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
                        .tg .tg-24y4{background-color:#2a4982;color:#ffffff;text-align:center;vertical-align:top}
                    </style>
                    <center>
                    <table class="tg">
                        <tr>
                            <th class="tg-24y4">Nombre<br></th>
                            <th class="tg-24y4">VID</th>
                            <th class="tg-24y4">Fecha</th>
                            <th class="tg-24y4">Activo</th>
                        </tr>';

        foreach($users as $user)
        {
            $regArray = explode(' ', $user->regTime);
            $regTime = $regArray[0];

            $datetime1 = date_create($hoy);
            $datetime2 = date_create($regTime);   
            $interval = date_diff($datetime1, $datetime2);
            
            $fc = explode('-', $regTime);
            $fechaReg = $fc[2].'/'.$fc[1].'/'.$fc[0];
            
            $diff = $interval->format("%a");
            if($diff <= 7)
            {
                if($user->active == 1)
                    $body .= '<tr><td class="tg-031e">'.$user->name.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">'.$fechaReg.'</td><th class="tg-031e">Si</th></tr>';
                else
                    $body .= '<tr><td class="tg-031e">'.$user->name.' '.$user->surname.'</td><td class="tg-031e">'.$user->vid.'</td><td class="tg-031e">'.$fechaReg.'</td><th class="tg-031e">No</th></tr>';
            }
        }

        $body .= '<tr><td class="tg-031e">Reporte Generado: '.$GenDate.'</td></tr>';
        $body .= '</table></center>';

        $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n"; 
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $headers .= "MIME-Version: 1.0\r\n";

        $email = 'miembros@ar.ivao.aero';
        $subject = "[SYSTEM] Registro Semanal Web IVAO Argentina $GenDate";

        if(mail($email, $subject, $body, $headers)) echo '<br>Email Sent';
        else echo '<br>Email Failed to send';
    }

    public function GCAHoursCheck()
    {
        $gcas = Gca::all();
        foreach($gcas as $gca)
        {
            $nombre = $gca->name;
            $vid = $gca->vid;
            $mes = date('m') == 1 ? 12 : (date('m') - 1);
            $nombreMes = $this->obtenerNombreMes($mes);
            $anyo = $mes == 12 ? (date('Y') - 1) : date('Y');

            $queryATC = OnlineATC::selectRaw('SUM(online) AS suma')
                                ->where('vid', $vid)
                                ->whereRaw("MONTH(dt) = $mes")
                                ->whereRaw("YEAR(dt) = $anyo")
                                ->first();
            
            $horas = $this->obtenerHorasMinutos($queryATC->suma);
            if($queryATC->suma < 20200)
            {
                $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                           "Content-Type: text/html; charset=utf-8\r\n".
                           "MIME-Version: 1.0\r\n";
                $body = "<html><body><center><img src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Horas GCA no cumplidas</h2>El miembro no ha cumplido con las horas mensuales estipuladas. Para m&aacute;s info, consulte la intraweb.<br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: $nombre</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Mes</strong>: $nombreMes</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Horas</strong>: $horas</div><br /><br /></body></html>";
                
                mail('entrenamiento@ar.ivao.aero', 'Horas GCA no cumplidas', $body, $headers);
            }
        }
    }

    public function test()
    {
        $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                   "Content-Type: text/html; charset=utf-8\r\n".
                   "MIME-Version: 1.0\r\n";
        $to = 'ar-wm@ivao.aero';
         $fechaActual = date('d-m-Y H:i');

            $subject = 'Nuevo AS1 conectado';
            $body = "<html><body><center><img src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Nuevo AS1</h2>Le informamos que se ha conectado un miembro nuevo como ATC. Para m&aacute;s info, consulte su perfil. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n ATC</strong>: SAZM_TWR</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID Miembro</strong>: 316588</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $fechaActual UTC</div><br /><br /><br /></body></html>";
        

        mail($to, $subject, $body, $headers);
    }

    private function entre($a, $min, $max) { return ($a >= $min && $a <= $max); }

    private function obtenerHorasMinutos($secs)
    {
        $time = round($secs);
        return sprintf('%02d h %02d mins', ($time/3600),($time/60%60));
    }

    private function obtenerNombreMes($mes, $lang = 'es')
    {
        $fc_mes = '';
        if($lang == 'es')
        {
            switch($mes)
            {
                case '1' : return 'Enero'; break;
                case '2' : return 'Febrero'; break;
                case '3' : return 'Marzo'; break;
                case '4' : return 'Abril'; break;
                case '5' : return 'Mayo'; break;
                case '6' : return 'Junio'; break;
                case '7' : return 'Julio'; break;
                case '8' : return 'Agosto'; break;
                case '9' : return 'Septiembre'; break;
                case '10' : return 'Octubre'; break;
                case '11' : return 'Noviembre'; break;
                default : return 'Diciembre';
                
            }
        }
        else
        {
            switch($mes)
            {
                case '01' : return 'January'; break;
                case '02' : return 'February'; break;
                case '03' : return 'March'; break;
                case '04' : return 'April'; break;
                case '05' : return 'May'; break;
                case '06' : return 'June'; break;
                case '07' : return 'July'; break;
                case '08' : return 'August'; break;
                case '09' : return 'September'; break;
                case '10' : return 'October'; break;
                case '11' : return 'November'; break;
                default : return 'December';
            }
        }
    }

    private function esConexionATCAutorizada($vid, $posicion)
    {
        $usuario = User::find($vid);
        if( !is_null($usuario) ) return TRUE;
        
        $gca = Gca::find($vid);
        if( is_null($usuario) ) return FALSE;
                
        $rango = $gca->rating;
        if($rango == 'ADC') $posiciones = '(DEL|GND|TWR)';
        else if($rango == 'APC') $posiciones = '(DEL|GND|TWR|APP|)';
        else if($rango == 'ACC') $posiciones = '(DEL|GND|TWR|APP|CTR)';

        $restricciones = $gca->comments != '' ? explode('|', $gca->comments) : '';

        if(! preg_match($posiciones, substr($posicion, -3)) && !preg_match($posiciones, substr($posicion, -7))) //Si la dependencia conectada (DEL, GND, TWR...) no coincide con el GCA del miembro, comprobamos los GCA especificos
        {
            if($restricciones != '') //Si el miembro tiene GCA para alguna posicion ATC especifica...
            {
                foreach($restricciones as $rest)
                {
                    if(strtr($rest, $posicion) !== FALSE) return TRUE; //Si el miembro tiene GCA especifico para la posicion ATC en la que se ha conectado, return TRUE
                }
                
                return FALSE; //Si $posicion no esta en la lista de posiciones especificas de su GCA, siginifica que es una conexion NO autorizada
            }
            else return FALSE; //Si no tiene GCA para ninguna posicion especifica y no coincide el rango, siginifica que es una conexion NO autorizada
        }
        else return TRUE; //Si el rango GCA coincide con la dependencia conectada, es una conexion AUTORIZADA
    }
}