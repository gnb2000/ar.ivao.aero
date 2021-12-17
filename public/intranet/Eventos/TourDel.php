<?php
require '../../conexion.php';
$vid = (int)$_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

$id = (int)$_GET['id'];

$resTours = mysqli_query($con, "SELECT * FROM tours WHERE id = $id");
$filaT = mysqli_fetch_array($resTours);
$nombre = $filaT['Code'];

$sql1 = "DELETE FROM tours WHERE id = $id";
$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha eliminado el tour $nombre', '$ip')";
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al eliminar el tour.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Tour eliminado correctamente.<br /><a onClick="mostrarAJAX(\'Eventos/TourList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>