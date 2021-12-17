<?php
require '../../conexion.php';

/*
Este script permite al coordinador eliminar un Elite Pilot.
*/

$vid = (int)$_GET['id']; //VID del miembro
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = $_COOKIE['vid']; //VID del coordinador


$sql2 = "DELETE FROM aep_positions WHERE vid = $vid"; //Eliminamos el piloto
$sql3 = "UPDATE users SET AEPmember = 0 WHERE vid = $vid"; 
$sql1 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha eliminado al miembro $vid de los elite pilots', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.'; '.$sql3.';') or die('<p class="alert-danger">Ha habido un error al eliminar el piloto.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Piloto eliminado correctamente. <br/><a onClick="mostrarAJAX(\'OpsVuelo/PilotList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>