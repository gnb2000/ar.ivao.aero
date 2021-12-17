<?php
require '../../conexion.php';

/*
Este script permite al coordinador eliminar un miembro.
*/

$id = (int)$_GET['id']; //VID del miembro
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$vid = (int)$_COOKIE['vid']; //VID del coordinador


$sql2 = "DELETE FROM users WHERE vid = $id"; //Eliminamos el training
$sql1 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha eliminado el miembro $id', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al eliminar el miembro.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Miembro eliminado correctamente. <br/><a onClick="mostrarAJAX(\'Miembros/AwardList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>