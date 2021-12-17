<?php
    header("refresh: 300;");

// For easy translation..

function hayNumeros($cadena)
{
	//echo strlen($cadena).'<br />';
	for($i = 0; $i < strlen($cadena); $i++)
	{
		$ascii = ord($cadena[$i]);
		//echo $cadena[$i].$ascii.$i.'<br />';
		if($ascii >= 48 && $ascii <= 57) return TRUE;
	}
	return FALSE;
}
function obtenerETA($p22, $p24, $p25)
{	
	date_default_timezone_set('UTC');
	
	$ete = $p24*3600 + $p25*60;
	
	$fechaActual = mktime(date('H'));
	$timetod = mktime(substr($p22,0,2), substr($p22,2,2)) + 600;
	$horaActual = date('H', $fechaActual);
	$difdia = (int)$horaActual - (int)(substr($p22,0,2));
	if($difdia < -1) $timetod = mktime(substr($p22,0,2), substr($p22,2,2), date('s'), date('n'), (int)date('j') - 1);
	
	return $timetod + $ete;
}
function remove_accent( $string )
{
   $string = htmlentities($string);
   return preg_replace("/&([a-z])[a-z]+;/i","$1",$string);
}

$filecontents = file_get_contents('http://ivao.com.ar/api/infovuelos/infovuelos.txt'); //Testing file

$rows = explode("\n", $filecontents);

$pilots = array();
$pilotcount = 0;

foreach ($rows as $row) {
	$fields = explode("|", $row);
    $pilotcount++;
	array_push($pilots, $fields);
}
?>