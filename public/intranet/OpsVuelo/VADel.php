<?php
require '../../conexion.php';

/*
Este script permite al coordinador eliminar una VA.
*/

$id= (int)$_GET['id']; //ID de la VA
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = $_COOKIE['vid']; //VID del coordinador


$sql2 = "DELETE FROM va_list WHERE IVAOId = $id"; //Eliminamos la VA
$sql1 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha eliminado la VA $id', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al eliminar la VA.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> VA eliminada correctamente. <br/><a onClick="mostrarAJAX(\'OpsVuelo/VAList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>