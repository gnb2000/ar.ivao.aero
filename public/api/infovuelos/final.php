<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	//require_once '../../elements/api.infovuelos.inc.php';
	//require_once '../../funciones.php';
	//require_once '../../conexion.php';
	//date_default_timezone_set('UTC');
?>

<?php
    if (count($pilots) != 0)
    {
		//echo '<pre>';
		//echo '||||||||||||||||||||SOURCE_TIME_'.date("Y-m-d h:i:s", time()).'_NEXT_REFRESH_IN_2_MINUTES';
        foreach($pilots as $pilot)
        {
            $pilot[46] = $pilot[46] == 1 ? 'Rodando' : 'En Ruta';
			
			$Lat = $pilot[5];
			$Long = $pilot[6];
			$Altitude = $pilot[7];
			$GSpeed = $pilot[8];
            
            $sqls = "SELECT * FROM aeropuertos WHERE icao = '$pilot[11]'";
            $sqlll = "SELECT * FROM aeropuertos WHERE icao = '$pilot[13]'";
            $rsalida = mysqli_query($con, $sqls);
            $rllegada = mysqli_query($con, $sqlll);
            $filas = mysqli_fetch_array($rsalida);
            $filall = mysqli_fetch_array($rllegada);
            
            if(strlen($pilot[22]) <= 3) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
            if(strlen($pilot[26]) == 1) $pilot[26] = str_pad($pilot[26], 2, '0', STR_PAD_LEFT);
            if(strlen($pilot[27]) == 1) $pilot[27] = str_pad($pilot[27], 2, '0', STR_PAD_LEFT);
			
			$timeActual = mktime(date('H'));
			$horaActual = date('H', $timeActual);
			
            $timetod = mktime(substr($pilot[22],0,2), substr($pilot[22],2,2)) + 600;
            $etod = date('H:i', $timetod);
			 
			$diferenciactetod = $timetod - $timeActual;
            $salida = '';

			$timeETA = obtenerETA($pilot[22], $pilot[24], $pilot[25]);
			$textETA = date('H:i', $timeETA);
			
			$diferenciaActETA = $timeETA - $timeActual;
            $llegada = '';
			
			$difdia = (int)$horaActual - (int)(substr($pilot[22],0,2));
			if($difdia < -1) $timetod = mktime(substr($pilot[22],0,2), substr($pilot[22],2,2), date('s'), date('n'), (int)date('j') - 1);
			

            if($diferenciactetod < 0)
			{
                if($pilot[46] == 'Rodando' && $diferenciactetod > -1800)
				{
					$salida = ''.floor($diferenciactetod/60).' min';
					$estadoDEP = 'Demorado';
				}
                else 
				{
					$salida = ''.floor($diferenciactetod/60).' min';
					$estadoDEP = 'Despegado';
				}
			}
            else if($diferenciactetod < 1800)
			{
				if($pilot[46] == 'En Ruta')
				{
					$estadoDEP = 'Despegado';
					$salida = ''.floor($diferenciactetod/60).' min';
				}
				else if($diferenciactetod <= 180) $salida = ''.floor($diferenciactetod/60).' min';
				else $salida = ''.floor($diferenciactetod/60).' min';
			}
			else
			{
				$estadoDEP = 'Embarcando';
				$salida = ''.floor($diferenciactetod/60).' min';
			}
			
			 if($diferenciaActETA < 0)
			{
                if($pilot[46] == 'En Ruta')
				{
					$llegada = ''.floor($diferenciaActETA/60).' min';
					$estadoARR = 'Demorado';
				}
				else
				{
					$llegada = ''.floor($diferenciaActETA/60).' min';
					$estadoARR = 'Aterrizado';					
				}
			}
            else if($diferenciaActETA < 1800)
			{
				if($pilot[46] == 'Rodando')
				{
					$estadoARR = 'Aterrizado';
					$llegada = ''.floor($diferenciaActETA/60).' min';
				}
				else if($diferenciaActETA <= 180) $llegada = ''.floor($diferenciaActETA/60).' min';
				else $llegada = ''.floor($diferenciaActETA/60).' min';
			}
			else $llegada = ''.floor($diferenciaActETA/60).' min';
			
            $airline = hayNumeros($pilot[0]) ? substr($pilot[0],0,3) : 'privado';
            $paiss = $filas['pais'];
            $paisll = $filall['pais'];
            $nombres = $filas['nombre'];
            $nombrell = $filall['nombre'];
            $ciudads = utf8_encode($filas['ciudad']);
            $ciudadll = utf8_encode($filall['ciudad']);

				
				echo '|'.$pilot[0].'|'.$airline.'|'.$Lat.'|'.$Long.'|'.$Altitude.'|'.$GSpeed.'|'.substr($pilot[9],2,4).'|' .$pilot[11]. '|'.$nombres.'|'.$ciudads.'|'.$paiss.'|'.$etod.'|'.$salida.'|'.$estadoDEP.'|' .$pilot[13]. '|'.$nombrell.'|'.$ciudadll.'|'.$paisll.'|'.$textETA.'|'.$llegada.'|'.$estadoARR.'|'. PHP_EOL;
            
        } 
	}
  ?>