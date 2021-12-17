<?
/*
API SYSTEM FOR WEATHER SYSTEM
By Andrés Robinson (301728)
For IVAO Argentina

Version 2.0.5
*/


$info = $_GET['info'];
$icao = $_GET['icao'];

$format = $_GET['out'];
if($format == 'xml'){
	header('Content-type: text/xml');
}elseif($format == 'plain'){
	header("Content-Type: plain/text");
}

$pais = substr($icao, 0, -2);

if($pais == 'SA'){
	$fileMetar = 'source/ARmetar.txt';
	$fileTaf= 'source/ARtaf.txt';
}elseif($pais == 'SU'){
	$fileMetar = 'source/ARmetar.txt';
	$fileTaf= 'source/ARtaf.txt';
}elseif($pais == 'SB'){
	$fileMetar = 'source/BRmetar.txt';
	$fileTaf= 'source/BRtaf.txt';
}else{
	$result = 'Pais no es valido';
}

if($pais == 'SA' or $pais == 'SU' or $pais == 'SB'){
		if ($icao != '' or $info !=''){
		$contentsMetar = file_get_contents($fileMetar);
		$contentsTaf = file_get_contents($fileTaf);
		$pattern = preg_quote($icao, '/');
		$pattern = "/^.*$pattern.*\$/m";

		if($info == 'M'){
			if(preg_match_all($pattern, $contentsMetar, $matchesMetar)){
				$impM = implode("\n", $matchesMetar[0]);
				$result = $impM;
			}else{
				$result = 'No METAR found';
			}
		}elseif($info =='T'){
			if(preg_match_all($pattern, $contentsTaf, $matchesTaf)){
				$impT = implode("\n", $matchesTaf[0]);
				$result = $impT;
			}else{
				$result = 'No TAF found';
			}
		}elseif($info == 'A'){
			$result = ' "A" function no available at the moment.';
		}else{
			$result = 'Unknwon information requested';
		}
	}else{
		$result = 'Data Missing, check the documentation';
	}
}

if($format == 'plain'){
	echo $result;
}elseif($format == 'xml'){
	echo '<weather>'.$result.'</weather>';
}else{
	echo '<pre>'.$result.'</pre>';
}

?>