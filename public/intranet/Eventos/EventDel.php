<?php
require '../../conexion.php';
$vid = (int)$_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

$id = (int)$_GET['id'];
$tabla = $_GET['lang'] == 'es' ? 'events' : 'events_en';

$resEventos = mysqli_query($con, "SELECT * FROM $tabla WHERE id = $id");
$filaE = mysqli_fetch_array($resEventos);
$url = $filaE['image'];
$nombre = $filaE['name'];

$sql1 = "DELETE FROM $tabla WHERE id = $id";
$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha eliminado el evento $nombre', '$ip')";
$sql3 = "UPDATE events_banners SET Used = 0 WHERE File = '$url'";
mysqli_multi_query($con, $sql1.'; '.$sql2.';'.$sql3.';') or die('<p class="alert-danger">Ha habido un error al eliminar el evento.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Evento eliminado correctamente.<br /><a onClick="mostrarAJAX(\'Eventos/EventList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>