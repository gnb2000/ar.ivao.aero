<?php
$whazzup = file_get_contents('http://api.ivao.aero/getdata/whazzup/whazzup.txt');

$file = fopen('/var/www/vhosts/ar.ivao.aero/httpdocs/public/datafeed/whazzup.txt', 'w');
fwrite($file, $whazzup);
fclose($file);
?>