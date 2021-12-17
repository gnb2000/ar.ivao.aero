<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User, App\Models\Gca, App\Models\Event,App\Models\Airport, App\Models\TrainingRequested, App\Models\Exam, App\Models\StaffMember, App\Models\StaffPosition, App\Models\Sector, App\Models\Sheet, App\Models\AtcPosition, App\Models\VA, App\Models\Library, App\Models\Tour, App\Models\Award, App\Models\AwardToUser, App\Models\TrainingPoint;

class PagesController extends Controller
{
    public function index($carpeta = '', $pagina = 'inicio')
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';

        $pagina = $carpeta != '' ? $idioma.'.'.$carpeta.'.'.$pagina : $idioma.'.'.$pagina;

        $vector = explode('.', $pagina);
        array_shift($vector);
        $pagina2 = implode('.', $vector);

        switch($pagina2)
        {
            case 'inicio':
            {
                $hoy = date('Y-m-d H:i:s');

                $evento = Event::where('end_date', '>', $hoy)
                            ->orderBy('start_date')
                            ->first();
                $examen = Exam::where('date', '>', $hoy)
                            ->where('exam', '>=', 4)
                            ->orderBy('date')
                            ->first();
                $training = TrainingRequested::where('training_date', '>', $hoy)
                            ->orderBy('training_date')
                            ->first();
							
						
				$nextEvents = Event::selectRaw('events.id AS id, event_banners.year AS year, events.name AS name, events.type AS type, description, end_date, start_date, urlforo, event_banners.file AS image')
                        ->join('event_banners', 'event_banners.id', '=', 'events.banner_id')
                        ->where('start_date', '>=', $hoy)
                        ->orderBy('start_date')
                        ->get();
						
				$tours = Tour::selectRaw('*, tours.id AS id, tours.code AS code, event_banners.year AS year, event_banners.file AS image')
                    ->join('event_banners', 'event_banners.id', '=', 'tours.banner_id')
                    ->where('status', 1)
                    ->orderBy('tours.id', 'DESC')
                    ->get();

                //ATC Scheduling
                /* date_default_timezone_set('UTC');
                $file = file_get_contents('http://www.ivao.aero/schedule/indd.asp'); 
                $lines = explode("\n",$file);
                $current_date = date('Y/m/d',time());
                $today_scheduling = array();
                $next_scheduling = array();
                foreach ($lines as $line) {
                    $current_scheduling = explode(":",$line);
                    $year = substr($current_scheduling[6],0,4);
                    $day = substr($current_scheduling[6],6,2);
                    $month = substr($current_scheduling[6],4,2);
                    $full_date = $year."/".$month."/".$day;
                    if (str_starts_with($current_scheduling[0],'SA') && ($full_date >= $current_date) ){
                        //If first two letter of the word is equal to SA and current scheduling is greater than or equal to current date
                        $vid = $current_scheduling[1];
                        $atc_position = $current_scheduling[0];
                        $start_time = substr($current_scheduling[6],8,2).":".substr($current_scheduling[6],10,2);
                        $end_time = substr($current_scheduling[7],8,2).":".substr($current_scheduling[7],10,2);

                        $newSchedule = array();
                        /*
                            Structure
                                [0] = VID
                                [1] = ATC POSITION
                                [2] = START TIME
                                [3] = END TIME
                                [4] = DATE
                        
                        
                        array_push($newSchedule,$vid);
                        array_push($newSchedule,$atc_position);
                        array_push($newSchedule,$start_time);
                        array_push($newSchedule,$end_time);
                        array_push($newSchedule,$full_date);



                        if ($full_date == $current_date){
                            //Scheduling for today
                            array_push($today_scheduling,$newSchedule);
                        } else {
                            //Scheduling for whatever day, not today
                            array_push($next_scheduling,$newSchedule);
                        }
                    }
                    
                } */
                
						
				$notamsJSON = json_decode(file_get_contents('https://api.ivao.aero/v2/notams/all?now=true&apiKey=27Qz1E1IjbSWBwfCHx7SK7CC898pDwLZ'), TRUE);
				
                $notams = array();
                foreach($notamsJSON as $notam)
                    if(substr($notam['name'], 0, 2) == 'AR') $notams[] = $notam;
                
                    
                return view($pagina, compact('evento', 'examen', 'training', 'nextEvents', 'tours', 'notams'));
            }
            case 'comunidad.staff':
            {
                $HQ = StaffMember::where('department', 'HQ')
                    ->orderBy('rank')->get();
                $OPS = StaffMember::whereIn('department', ['ATC', 'SO', 'FLIGHT'])
                    ->orderBy('rank')->get();
                $WEB = StaffMember::where('department', 'WEB')
                    ->orderBy('rank')->get();
                $TRAINING = StaffMember::where('department', 'TRAINING')
                    ->orderBy('rank')->get();
                $EVENTS = StaffMember::where('department', 'EVENT')
                    ->orderBy('rank')->get();
                $PR = StaffMember::where('department', 'PR')
                    ->orderBy('rank')->get();
                $MEMBERS = StaffMember::where('department', 'MEMBER')
                    ->orderBy('rank')->get();
                $FIR = StaffMember::where('department', 'FIR')
                    ->orderBy('rank')->get();

                return view($pagina, compact('HQ', 'OPS', 'WEB', 'TRAINING', 'EVENTS', 'PR', 'MEMBERS', 'FIR'));
            }
            case 'comunidad.directorio':
            {
                $registros = User::where(['active' => '1'], ['directory' => '1'])
                            ->orderBy('vid')
                            ->paginate(20);
                $staffs = StaffMember::select('vid', 'permissions')->get();

                return view($pagina, compact('registros', 'staffs'));
            }
            case 'comunidad.vacantes':
            {
                $vacantes = StaffPosition::where('Vacant', 1)
								->whereNotNull('FinalVac')
								->get();

                return view($pagina, compact('vacantes'));
            }
            case 'comunidad.contacto':
            {
                $usuario = Auth::user();

                return view($pagina, compact('usuario'));
            }
            case 'controladores.sectores':
            {
                $SAEF = Sector::where('fir', 'SAEF')->orderBy('airac', 'DESC')->get();
                $SACF = Sector::where('fir', 'SACF')->orderBy('airac', 'DESC')->get();
                $SAMF = Sector::where('fir', 'SAMF')->orderBy('airac', 'DESC')->get();
                $SAVF = Sector::where('fir', 'SAVF')->orderBy('airac', 'DESC')->get();
                $SARR = Sector::where('fir', 'SARR')->orderBy('airac', 'DESC')->get();

                return view($pagina, compact('SAEF', 'SACF', 'SAMF', 'SAVF', 'SARR'));
            }
            case 'controladores.fichas':
            {
                $sheets = Sheet::select('sheets.id', 'sheets.icao', 'airports.name', 'airports.city', 'sheets.fir', 'sheets.version')
                ->join('airports', 'sheets.icao', '=', 'airports.icao')
                ->orderBy('sheets.icao')
                ->get();

                return view($pagina, compact('sheets'));
            }
            case 'controladores.frecuencias':
            {
                $SAEF = AtcPosition::where('FIR', 'SAEF')->orderBy('PosId')->get();
                $SACF = AtcPosition::where('FIR', 'SACF')->orderBy('PosId')->get();
                $SAMF = AtcPosition::where('FIR', 'SAMF')->orderBy('PosId')->get();
                $SAVF = AtcPosition::where('FIR', 'SAVF')->orderBy('PosId')->get();
                $SARR = AtcPosition::where('FIR', 'SARR')->orderBy('PosId')->get();

                return view($pagina, compact('SAEF', 'SACF', 'SAMF', 'SAVF', 'SARR'));
            }
            case 'pilotos.so':
            {
                $listaSOGs = VA::where('VaType', 2)->get();

                $tipos = ['CAT-A', 'CAT-B', 'CAT-C', 'CAT-D', 'CAT-E', 'SAR'];
                $pasados = Event::whereIn('type', $tipos)
                                ->orderBy('start_date', 'DESC')
                                ->limit(10)
                                ->get();

                return view($pagina, compact('listaSOGs', 'pasados'));
            }
            case 'pilotos.aerolineas':
            {
                $lista = VA::where('VaType', 1)->get();

                return view($pagina, compact('lista'));
            }
            case 'formacion.biblioteca':
            {
                $icaos = Library::where('type', 'icao')->orderBy('name')->get();
                $briefings = Library::where('type', 'briefing')->orderBy('name')->get();
                $manuales = Library::where('type', 'general')->orderBy('name')->get();

                return view($pagina, compact('manuales', 'briefings', 'icaos'));
            }
            case 'eventos.proximos':
            {
                $hoy = date("Y-m-d");
                $proximos = Event::where('start_date', '>=', $hoy)->orderBy('start_date', 'DESC')->get();

                return view($pagina, compact('proximos'));
            }
            case 'eventos.pasados':
            {
                $hoy = date("Y-m-d");
                $tipos = ['CAT-A', 'CAT-B', 'CAT-C', 'CAT-D', 'CAT-E', 'SAR'];

                $pasados = Event::where('start_date', '<', $hoy)
                                ->whereNotIn('type', $tipos)
                                ->orderBy('start_date', 'DESC')
                                ->limit(10)
                                ->get();

                return view($pagina, compact('pasados'));
            }
            case 'tours.lista':
            {
                $tours = Tour::where('Status', 1)->get();

                return view($pagina, compact('tours'));
            }
        }
    	
        return view($pagina);
    }

    public function evento($id)
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';

        $evento = Event::find($id);
        $pagina = $idioma.'.eventos.evento';

        return view($pagina, compact('evento'));
    }

    public function tour($id)
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';

        $tour = Tour::find($id);
        $pagina = $idioma.'.tours.tour';

        return view($pagina, compact('tour'));
    }

    public function estadoInfovuelos($cs)
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';

        $pagina = $idioma.'.recursos.estado';

        return view($pagina, compact('cs'));
    }

    public function discordConsent()
    {
        $idioma = $_COOKIE['idioma'] ?? 'es';

        $pagina = $idioma.'.discord-consent';

        return view($pagina);
    }
    public function getDiscord(Request $request, $vid, $discordUser)
    {
        $user = User::find($vid);
        if(is_null($user) && is_null(Gca::find($vid))) return 0;

        $userAttrs = array('name' => $user->name, 'surname' => $user->surname);
        $dptos = StaffMember::where('vid', $vid)->get();

        $exploded = explode('#', $user->discord);
        $dbDiscord = $exploded[0];

        if($discordUser != $dbDiscord && !is_null($user)) return -1;
        else if($user->consent == 0 && !is_null($user)) return -2;

        //Preparar roles Discord
        $roles = array();
        $VaMember = $user->va_member_ids;

        if($VaMember != '')
        {
            $vaIDs = explode(':', $VaMember);
            $SOGs = array('17673', '19757', '19758', '19849');
            $VAs = array('7100', '19749', '19856', '20872', '19786', '20961');
            
            foreach($SOGs as $sog)
                if(in_array($sog, $vaIDs))
                {
                    $roles[] = '527046222763130900';
                    break;
                }
            foreach($VAs as $va)
                if(in_array($va, $vaIDs))
                {
                    $roles[] = '527045296388308993';
                    break;
                }
        }
        if($dptos->count() > 0)
        {
            $roles[] = '526539659916869642';

            foreach($dptos as $dpto)
            {
                if($dpto->department == 'ATC' || $dpto->department == 'FIR') $roles[] = '526541992377843722';
                if($dpto->department == 'WEB') $roles[] = '419258342754484226';
                if($dpto->department == 'EVENT') $roles[] = '526539517944135692';
                if($dpto->department == 'FLIGHT') $roles[] = '526541823162843166';
                if($dpto->department == 'MEMBER') $roles[] = '526544318022811658';
                if($dpto->department == 'PRD') $roles[] = '526538581007794191';
                if($dpto->department == 'SO') $roles[] = '526541075850985483';
                if($dpto->department == 'TRAINING') $roles[] = '419258011026980864';
            }
        }
        else if(! is_null(Gca::find($vid)))  $roles[] = '764461254973587476';
        else $roles[] = '419258234369605642';
    
        //Fin Preparar roles Discord

        $lista['userAttrs'] = $userAttrs;
        $lista['roles'] = $roles;
        $lista['dptos'] = $dptos;

        return response()->json($lista);
    }
	
    public function intraweb()
    {
        if(! Auth::check()) return redirect('/login');
        if(! cookie('isStaff')) return redirect('/error/403');

        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.index', compact('user', 'staffMembers', 'isADM'));
    }
}
?>