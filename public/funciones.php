<?php 
//function loggedin() { return isset($_COOKIE['vid']); }

function obtenerEstado($estado)
{
	switch($estado)
	{
		case 0: return "<span class=\"label label-success\">Abierta</span>";
		case 1: return "<span class=\"label label-warning\">Pendiente</span>";
		case 2: return "<span class=\"label label-danger\">Cerrada</span>";
		default: return -1;
	}	
}

function obtenerEstadoTraining($estado)
{
	switch($estado)
	{
		case 0: return '<span class="label label-danger" title="Su solicitud ha sido cancelada por el departamento" data-toggle="tooltip" data-placement="bottom">Cancelado</span>';
		case 1: return '<span class="label label-default" title="Su entrenamiento está en proceso de ser atendido" data-toggle="tooltip" data-placement="bottom">Solicitado</span>';
		case 2: return '<span class="label label-success" title="Este curso se encuentra aprobado" data-toggle="tooltip" data-placement="bottom">Aprobado</span>';
		case 3: return '<span class="label label-primary" title="Su entrenamiento ha sido asignado a un entrenador, en breve se pondrá en contacto con usted vía email" data-toggle="tooltip" data-placement="bottom">Asignado</span>';
		case 4: return '<span class="label label-primary" title="Su entrenamiento ha sido programado" data-toggle="tooltip" data-placement="bottom">Programado</span>';
		case 5: return '<span class="label label-primary" title="Su entrenamiento ha sido confirmado y se le ha notificado por email" data-toggle="tooltip" data-placement="bottom">Inscrito</span>';
		case 6: return '<span class="label label-success" title="Su entrenamiento ha sido completado con éxito" data-toggle="tooltip" data-placement="bottom">Completado</span>';
		//case 7: return '<span class="label label-default" title="Su entrenamiento está pendiente de asignación" data-toggle="tooltip" data-placement="bottom">Pendiente</span>';
		//case 8: return '<span class="label label-danger" title="Su solicitud ha sido cancelada por el Departamento" data-toggle="tooltip" data-placement="bottom">Cancelado</span>';
		//case 9: return '<span class="label label-danger" title="Su solicitud ha sido cancelada por usted" data-toggle="tooltip" data-placement="bottom">Cancelado</span>';
		case 10: return '<span class="label label-warning" title="Este curso se encuentra reprobado" data-toggle="tooltip" data-placement="bottom">Reprobado</span>';
		case 11: return '<span class="label label-warning" title="Tadav&iacute;a no ha aprobado el examen te&oacute;rico" data-toggle="tooltip" data-placement="bottom">Teor&iacute; Insuficiente</span>';
		case 12: return '<span class="label label-warning" title="No se ha presentado o no ha asistido" data-toggle="tooltip" data-placement="bottom">N/P</span>';
		default: return '<span class="label label-info" title="Entrenamiento disponible para ser solicitado" data-toggle="tooltip" data-placement="bottom">Disponible</span>';
	}	
}

function obtenerEstadoTrainingImg($estado)
{
	switch($estado)
	{
		case 0: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Cancelado" ><img src="http://www.ar.ivao.aero/img/ico/cross-circle.png"></span>';
		case 1: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Solicitado" ><img src="http://www.ar.ivao.aero/img/ico/book--pencil.png"></span>';
		case 2: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Aprobado" ><img src="http://www.ar.ivao.aero/img/ico/tick-button.png"></span>';
		case 3: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Asignado" ><img src="http://www.ar.ivao.aero/img/ico/sticky-note--pencil.png"></span>';
		case 4: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Programado" ><img src="http://www.ar.ivao.aero/img/ico/calendar--pencil.png"></span>';
		case 5: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Cancelado" ><img src="http://www.ar.ivao.aero/img/ico/cross-circle.png"></span>';
		case 6: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Completado" ><img src="http://www.ar.ivao.aero/img/ico/tick-button.png"></span>';
		case 7: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Calificar" ><img src="http://www.ar.ivao.aero/img/ico/star-half.png"></span>';
		case 8: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Solicitar Reprogramación" ><img src="http://www.ar.ivao.aero/img/ico/lock--plus.png"></span>';
		case 9: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Reprogramado" ><img src="http://www.ar.ivao.aero/img/ico/calendar--pencil.png"></span>';
		case 10: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Reprobado" ><img src="http://www.ar.ivao.aero/img/ico/notebook--exclamation.png"></span>';
		case 11: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Pospuesto" ><img src="http://www.ar.ivao.aero/img/ico/calendar--pencil.png"></span>';
		case 12: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Presentar Alegaciones" ><img src="http://www.ar.ivao.aero/img/ico/exclamation-circle.png"></span>';
		default: return '<span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Disponible" ><img src="http://www.ar.ivao.aero/img/ico/book--plus.png"></span>';
	}	
}

function obtenerEstadoExpediente($nota)
{
	switch($nota)
	{
		case 'Reprobado': return obtenerEstadoTraining(10); break;
		case 'Suficiente': return obtenerEstadoTraining(2); break;
		case 'Bien': return obtenerEstadoTraining(2); break;
		case 'Notable': return obtenerEstadoTraining(2); break;
		case 'Sobresaliente': return obtenerEstadoTraining(2); break;
		default: return obtenerEstadoTraining(5);
	}	
}

function obtenerEstadoExpedienteImg($nota)
{
	switch($nota)
	{
		case 'Reprobado': return 'http://www.ar.ivao.aero/images/ico/5.png'; break;
		case 'Suficiente': return 'http://www.ar.ivao.aero/images/ico/3.png'; break;
		case 'Bien': return 'http://www.ar.ivao.aero/images/ico/4.png'; break;
		case 'Notable': return 'http://www.ar.ivao.aero/images/ico/4.png'; break;
		case 'Sobresaliente': return 'http://www.ar.ivao.aero/images/ico/4.png'; break;
		default: return 'http://www.ar.ivao.aero/images/ico/1.png';
	}	
}

function obtenerRangoPiloto($rango)
{
	switch($rango)
	{
		case 1: return 'No es Piloto';
		case 2: return 'Basic Flight Student';
		case 3: return 'Flight Student';
		case 4: return 'Advanced Flight Student';
		case 5: return 'Private Pilot';
		case 6: return 'Senior Private Pilot';
		case 7: return 'Commercial Pilot';
		case 8: return 'Airline Transport Pilot';
		case 9: return 'Senior Flight Instructor';
		case 10: return 'Chief Flight Instructor';
	}
}
function obtenerRangoPilotoShort($rango)
{
	switch($rango)
	{
		case 1: return 'N/A';
		case 2: return 'FS1';
		case 3: return 'FS2';
		case 4: return 'FS3';
		case 5: return 'PP';
		case 6: return 'SPP';
		case 7: return 'CP';
		case 8: return 'ATP';
		case 9: return 'SFI';
		case 10: return 'CFI';
	}
}
function obtenerRangoAtc($rango)
{
	switch($rango)
	{
		case 1: return 'No es Controlador';
		case 2: return 'ATC Applicant';
		case 3: return 'ATC Trainee';
		case 4: return 'Advanced ATC Trainee';
		case 5: return 'Aerodrome Controller';
		case 6: return 'Approach Controller';
		case 7: return 'Center Controller';
		case 8: return 'Senior Controller';
		case 9: return 'Senior ATC Instructor';
		case 10: return 'Chief ATC Instructor';
	}
}

function obtenerRangoAtcShort($rango)
{
	switch($rango)
	{
		case 1: return 'N/A';
		case 2: return 'AS1';
		case 3: return 'AS2';
		case 4: return 'AS3';
		case 5: return 'ADC';
		case 6: return 'APC';
		case 7: return 'ACC';
		case 8: return 'SEC';
		case 9: return 'SAI';
		case 10: return 'CAI';
	}
}


function obtenerNivel($nivel)
{
	switch($nivel)
	{
		case 0: return '<span class="label label-default" title="Nivel sin asignar" data-toggle="tooltip" data-placement="bottom">N/A</span>';
		case 1: return '<span class="label label-default" title="Nivel 1" data-toggle="tooltip" data-placement="bottom">1</span>';
		case 2: return '<span class="label label-default" title="Nivel 2: Necesario realizar previamente el nivel anterior" data-toggle="tooltip" data-placement="bottom">2</span>';
		case 3: return '<span class="label label-default" title="Nivel 3" data-toggle="tooltip" data-placement="bottom">3</span>';
	}
}

function obtenerNombrePosicion($pos, $con)
{
	$res = mysqli_query($con, "SELECT * FROM staff_positions WHERE Id = '$pos'");
	$fila = mysqli_fetch_array($res);
	
	return $fila['PosName'];
}

function obtenerHoraArg($hora)
{
	$hr = explode(":", $hora);
	
	if($hr['0'] == 00) $hrArg = 21;
	elseif($hr['0'] == 01) $hrArg = 22;
	elseif($hr['0'] == 02) $hrArg = 23;
	else $hrArg = ($hr['0'] - 3);
				
	return $hrArg.':'.$hr['1'];
}

function obtenerNombreDia($dia)
{
	switch($dia)
	{
		case '1' : return 'LUN'; break;
		case '2' : return 'MAR'; break;
		case '3' : return 'MIE'; break;
		case '4' : return 'JUE'; break;
		case '5' : return 'VIE'; break;
		case '6' : return 'SAB'; break;
		case '7' : return 'DOM'; break;
		default : return '-';
	}
}


function obtenerNombreMes($mes, $lang = 'es')
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

function estaMatriculado($vid, $idCurso, $conMoodle)
{
	$resEnrol = mysqli_query($conMoodle, "SELECT * FROM mdl_enrol WHERE courseid = $idCurso");
		
	while($filaEnrol = mysqli_fetch_array($resEnrol))
	{
		$id = $filaEnrol['id'];
		$resMatriculas = mysqli_query($conMoodle, "SELECT * FROM mdl_user_enrolments WHERE enrolid = $id AND userid = $vid");
		if(mysqli_num_rows($resMatriculas) > 0) return true;
	}
	
	return false;
}

function obtenerNombreUsuario($vid)
{	
	$con = mysqli_connect('localhost', 'web', '5CgbgiAn@1b1Gvuf', 'ivao-ar-plesk_web') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');
	if(!isset($vid)) return '-';
	else if($vid == 0) return 'Auto-Validator';
	
	$resUsuario = mysqli_query($con, "SELECT * FROM users WHERE vid = $vid") or die('Falla nombre usuario: '.mysqli_error($con));
	$filaUsuario = mysqli_fetch_array($resUsuario);
	return mysqli_num_rows($resUsuario) > 0 ? $filaUsuario['name'].' '.$filaUsuario['surname'] : $vid;
}

function obtenerEmailUsuario($vid)
{
	$con = mysqli_connect('localhost', 'web', '5CgbgiAn@1b1Gvuf', 'ivao-ar-plesk_web') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');

	$resUsuario = mysqli_query($con, "SELECT * FROM users WHERE vid = $vid");
	$filaUsuario = mysqli_fetch_array($resUsuario);

	mysqli_close($con);

	return $filaUsuario['email'];
}

function obtenerEmailStaff($vid)
{
	$con = mysqli_connect('localhost', 'web', '5CgbgiAn@1b1Gvuf', 'ivao-ar-plesk_web') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');

	$resUsuario = mysqli_query($con, "SELECT * FROM staff_members WHERE vid = $vid") or die('Falla email staff: '.mysqli_error($con));
	$filaUsuario = mysqli_fetch_array($resUsuario);

	mysqli_close($con);

	return $filaUsuario['email'];
}

function obtenerNombreExamen($examen)
{
    switch($examen)
    {
        case '0' : return 'Piloto Privado'; break;
        case '1' : return 'Piloto Privado Senior'; break;
        case '2' : return 'Piloto Comercial'; break;
        case '3' : return 'Piloto de L&iacute;nea A&eacute;rea'; break;
        case '4' : return 'Controlador de Aer&oacute;dromo'; break;
        case '5' : return 'Controlador de Aproximaci&oacute;n'; break;
        case '6' : return 'Controlador de Centro'; break;
        case '7' : return 'Controlador Senior'; break;
        default : return '';
    }
}

function obtenerNombreTraining($id, $con)
{
    $res = mysqli_query($con, "SELECT * FROM trainings WHERE id = $id");
	$fila = mysqli_fetch_array($res);
	return $fila['name'];
}

function obtenerTipoTraining($id, $con)
{
    $res = mysqli_query($con, "SELECT * FROM trainings WHERE id = $id");
	$fila = mysqli_fetch_array($res);
	return $fila['type'];
}

function obtenerStrToTimeFin($timeInicio, $fr, $horaFin)
{
	$timeFin = strtotime($fr.' '.$horaFin);
	return ($timeFin - $timeInicio) > 0 ? $timeFin : ($timeFin + 86400);
}

function nombreAeropuerto($icao, $con)
{
	$resAero = mysqli_query($con, "SELECT * FROM airports WHERE icao = $icao");
	$filaAero = mysqli_fetch_array($resAero);
	return $filaAero['name'];
}

function entre($a, $min, $max) { return ($a >= $min && $a <= $max); }

function obtenerHorasMinutos($secs)
{
	$time = round($secs);
	return sprintf('%02d h %02d mins', ($time/3600),($time/60%60));
}

function obtenerColorVuelos($vuelos)
{
	if($vuelos == 0)return 'bgcolor="#ffffff"'; 
	elseif($vuelos > 0 and $vuelos <= 3) return 'bgcolor="#e6eeff"'; 
	elseif($vuelos > 3 and $vuelos <= 6) return 'bgcolor="#ccddff"'; 
	elseif($vuelos > 6 and $vuelos <= 9) return 'bgcolor="#b3ccff"'; 
	elseif($vuelos > 9 and $vuelos <= 12) return 'bgcolor="#99bbff"'; 
	elseif($vuelos > 12 and $vuelos <= 15) return 'bgcolor="#80aaff"'; 
	elseif($vuelos > 15 and $vuelos <= 18) return 'bgcolor="#6699ff"'; 
	elseif($vuelos > 18 and $vuelos <= 21) return 'bgcolor="#4d88ff"'; 
	elseif($vuelos > 21 and $vuelos <= 24) return 'bgcolor="#3377ff"'; 
	elseif($vuelos > 24 and $vuelos <= 27) return 'bgcolor="#1a66ff"'; 
	elseif($vuelos > 27 and $vuelos <= 30) return 'bgcolor="#0055ff"'; 
	elseif($vuelos > 30) return 'bgcolor="#004de6"'; 
}

function esConexionATCAutorizada($con, $vid, $posicion)
{
	$resWeb = mysqli_query($con, "SELECT * FROM users WHERE vid = $vid");
	if(mysqli_num_rows($resWeb) > 0) return TRUE;
	
	$resGCA = mysqli_query($con, "SELECT * FROM gca WHERE vid = $vid");
	if(mysqli_num_rows($resGCA) == 0) return FALSE;
	
	$filaG = mysqli_fetch_array($resGCA);
	
	$rango = $filaG['rating'];
	if($rango == 'ADC') $posiciones = '(DEL|GND|TWR|APP)';
	else if($rango == 'APC') $posiciones = '(DEL|GND|TWR|APP|TMA_APP)';
	else if($rango == 'ACC') $posiciones = '(DEL|GND|TWR|APP|TMA_APP|CTR)';

	$restricciones = $filaG['comments'] != '' ? explode('|', $filaG['comments']) : '';

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

?>