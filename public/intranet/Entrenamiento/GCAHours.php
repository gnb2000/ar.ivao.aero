<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require '/var/www/vhosts/ar.ivao.aero/httpdocs/public/conexion.php'; 
require '/var/www/vhosts/ar.ivao.aero/httpdocs/public/funciones.php';

$resGCA = mysqli_query($con, "SELECT * FROM gca") or die(mysqli_error($con));

while($filaGCA = mysqli_fetch_array($resGCA))
{
	$nombre = $filaGCA['name'];
	$vid = $filaGCA['vid'];
	$mes = date('m') == 1 ? 12 : (date('m') - 1);
	$nombreMes = obtenerNombreMes($mes);
	$anyo = $mes == 12 ? (date('Y') - 1) : date('Y');

	$resATC = mysqli_query($con,
						   		"SELECT SUM(online) AS suma 
								FROM online_atcs
								WHERE vid = $vid
								AND MONTH(dt) = $mes AND YEAR(dt) = $anyo");
	$filaATC = mysqli_fetch_array($resATC);
	
	$horas = obtenerHorasMinutos($filaATC['suma']);
	if($filaATC['suma'] < 13000)
	{
		$headers = "From: IVAO Argentina<noreply@ar.ivao.aero>\r\n".
				   "Content-Type: text/html; charset=utf-8\r\n".
				   "MIME-Version: 1.0\r\n";
		$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Horas GCA no cumplidas</h2>El miembro no ha cumplido con las horas mensuales estipuladas. Para m&aacute;s info, consulte la intraweb.<br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: $nombre</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Mes</strong>: $nombreMes</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Horas</strong>: $horas</div><br /><br /></body></html>";
		
		mail('ar-training@ivao.aero', 'Horas GCA no cumplidas', $body, $headers);
	}
}
?>