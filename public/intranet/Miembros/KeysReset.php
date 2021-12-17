<?php
require '../../conexion.php';

$vid = $_GET['vid']; //ID de la configuracion
$ip = $_SERVER['REMOTE_ADDR']; //IP del staff. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = $_COOKIE['vid']; //VID del staff

$sql1 = "UPDATE token_to_user SET UsrTkId = 0 WHERE vid = $vid"; 
$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se han reseteado las claves TS3 del miembro $vid', '$ip')"; //Registramos este cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Claves reseteadas correctamente.</div>';
?>