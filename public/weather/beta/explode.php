<?
$fn = fopen("http://weather.ivao.com.ar/source/ARmetar.txt","r") or die("fail to open file");

while($row = fgets($fn)){
  $icao = explode( "\n", $row );
	foreach($icao as $ic)
	{ 
	$line = explode(' ', $ic);
	$info = count($line);
	$rest = array_merge($line ,range(1, $result));
	echo ''.$line[0].' BLA '.$rest.'';}
}
fclose( $fn );
?>