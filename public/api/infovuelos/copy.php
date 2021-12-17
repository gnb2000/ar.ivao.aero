<?
ini_set ("display_errors", "1");
error_reporting(E_ALL);
$path = dirname(__FILE__);

$infovuelos = 'http://api.ivao.com.ar/infovuelos/final.php';
copy($infovuelos,"$path/infovuelos.txt");
?>