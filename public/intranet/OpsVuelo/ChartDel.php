<?php
require '../../conexion.php';

/*
Este script permite al coordinador eliminar una carta.
*/

$id = (int)$_GET['id']; //ID de la carta
$tipo = ((int)$_GET['tipo']) == 1 ? 'aip_charts' : 'aip_enroute'; //Tipo de carta (1: aerodromo, 2: en ruta)
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$vid = $_COOKIE['vid']; //VID del coordinador

$res = mysqli_query($con, "SELECT * FROM $tipo WHERE id = $id") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con));
$fila = mysqli_fetch_array($res);
$nombre = $tipo == 'aip_charts' ? $fila['icao'].'v'.$fila['revision'] : $fila['name']; //ICAO y revisión, o nombre del area

$ident = ((int)$_GET['tipo']) == 1 ? $fila['icao'] : $fila['area'];

$tipoF = ((int)$_GET['tipo']) == 1 ? 'cartas' : 'ruteros';
	
$fechaHoy = date('YmdHis');

copy("/home/admin/web/files.ar.ivao.aero/public_html/FO/$tipo/".$identF.".pdf", "/home/admin/web/files.ar.ivao.aero/public_html/FO/$tipo/OLD/".$identF.$fechaHoy.".pdf");

$sql1 = "DELETE FROM $tipo WHERE id = $id"; //Eliminamos la carta
$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha eliminado la carta $nombre', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al eliminar la carta.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Carta eliminada correctamente. <br/><a onClick="mostrarAJAX(\'OpsVuelo/ChartList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/62a3b9f0537a858a703e5d9a678fa113/purge_cache");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

   	$headers = [ 
    'X-Auth-Email: web@ar.ivao.aero',
    'X-Auth-Key: 55b8219bd688b867cf9d1bde930e26c577ba4',
    'Content-Type: application/json'
	];

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
	$url = "https://files.ar.ivao.aero/FO/".$tipoF."/".$id.".pdf";

    $dnsData = array();
	$dnsData["files"] = [
		$url
		];

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dnsData));
    $result = curl_exec($ch);
    $response = json_decode($result);
	$success = utf8_decode($response->success);
	if($success == 1){
		echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Se ha limpiado la memoria cache exitosamente.</div>';
	}
?>