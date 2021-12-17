<?php
require '../../conexion.php';

/*
Este script permite al coordinador eliminar un entrenamiento.
*/

$id = (int)$_GET['id']; //ID del training
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$vid = (int)$_COOKIE['vid']; //VID del coordinador

$res = mysqli_query($con, "SELECT * FROM trainings WHERE id = $id") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con));
$fila = mysqli_fetch_array($res);
$nombre = $fila['name']; //Nombre del training

$sql4 = "DELETE FROM trainer_training WHERE training = $id"; //Deshabiitamos a todos los entrenadores de este entrenamiento
$sql2 = "DELETE FROM trainings WHERE id = $id"; //Eliminamos el training
$sql1 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha eliminado el entrenamiento $nombre', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.'; '.$sql4.';') or die('<p class="alert-danger">Ha habido un error al eliminar el training.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Entrenamiento eliminado correctamente. <br/><a onClick="mostrarAJAX(\'Entrenamiento/TrainingList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>