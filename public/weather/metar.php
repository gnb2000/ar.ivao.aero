<?php
echo '<pre>';
echo file_get_contents("http://ivao.com.ar/weather/source/ARmetar.txt");
echo file_get_contents("http://www.ivao.com.br/util/metar/adsb.txt");
?>