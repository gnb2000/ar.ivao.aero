<?php
require '../../conexion.php';
$vid = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

$id = $_GET['id'];
$resEventos = mysqli_query($con, "SELECT * FROM notam_sys WHERE id = $id");
$filaE = mysqli_fetch_array($resEventos);
$nombre = $filaE['PubId'];

$sql1 = "DELETE FROM notam_sys WHERE id = $id";
$sql2 = "INSERT INTO acciones_staff(vid, accion, ip) VALUES($vid, 'Se ha eliminado el NOTAM $nombre', '$ip')";

mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al eliminar el NOTAM.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> NOTAM eliminado correctamente.<br /><a onClick="mostrarAJAX(\'NOTAM/NOTAMlist.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>