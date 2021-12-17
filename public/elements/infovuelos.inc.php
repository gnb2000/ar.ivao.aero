<?php
    //header("refresh: 300;");

// For easy translation..

$countryicao = 'SA';  

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
function obtenerETA($p23, $p25, $p26)
{	
	date_default_timezone_set('UTC');
	
	$ete = $p25*3600 + $p26*60;
	
	$fechaActual = mktime(date('H'));
	$timetod = mktime(substr($p23,0,2), substr($p23,2,2)) + 600;
	$horaActual = date('H', $fechaActual);
	$difdia = (int)$horaActual - (int)(substr($p23,0,2));
	if($difdia < -1) $timetod = mktime(substr($p23,0,2), substr($p23,2,2), date('s'), date('n'), (int)date('j') - 1);
	
	return $timetod + $ete;
}
function remove_accent( $string )
{
   $string = htmlentities($string);
   return preg_replace("/&([a-z])[a-z]+;/i","$1",$string);
}

$filecontents = file_get_contents('http://api.ivao.aero/getdata/whazzup/whazzup.txt');

$rows = explode("\n", $filecontents);

$filepart = '';
$pilots = array();
$pilotcount = 0;
$controllercount = 0;
$generaldata = array();

foreach ($rows as $row) {
    if (substr($row,0,1) == '!') {
        $filepart = substr($row,1);
    } else {
        switch ($filepart) {
            case 'CLIENTS':
                $fields = explode(":", $row);
                if ($fields[3] == 'ATC') {
                    $controllercount++;
                } else {
                    $pilotcount++;
                    if (substr($fields[11],0,strlen($countryicao)) == $countryicao OR substr($fields[13],0,strlen($countryicao)) == $countryicao) {
						//$countrypcount++;
                        //if ($countrypcount <= 20) {
							array_push($pilots, $fields);
						//}
                    }
                }
                break;
            case 'GENERAL':
                list($key, $value) = explode('=', $row);
                $generaldata[trim($key)] = trim($value);
                break;
        }
    }
}

if (count($pilots) != 0) {
    foreach ($pilots as $pilot) {
        $realname = $pilot[2];
        if (substr($realname,-5,1) == ' ') {
            $realname = substr($realname,0,-5);
        }
        $realname = remove_accent(ucwords($pilot[2]));
    }
}
$callsign = $pilot[0];
$salida = $pilot[11]; 
$destino  =$pilot[13] ;
$aeronave = substr($pilot[9],2,4);
$status = $pilot[46] == 1 ? "On Ground" : "Airborne";

?>