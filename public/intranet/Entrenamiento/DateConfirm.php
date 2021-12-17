<?php
require '../../conexion.php';
require '../../funciones.php';

/*
Este script permite al entrenador confirmar el entrenamiento tras haber introducido la fecha previamente.
*/

$id = (int)$_GET['id']; //ID de la solicitud de training realizada por el miembro
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$vid = (int)$_COOKIE['vid']; //VID del entrenador 

$resEntrenamientos = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $id") or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');
$filaEntrenamientos = mysqli_fetch_array($resEntrenamientos);
$trainingID = $filaEntrenamientos['id_training'];
$posicionATC = $filaEntrenamientos['atc_position']; //Recogemos la posicion ATC para mostrarla en el email
$fechaAsignada = date('d-m-Y H:i', strtotime($filaEntrenamientos['assigned_date'])); //Recogemos la fecha asignada para mostrarla en el email
$fechaHoy = gmdate('Y-m-d H:i:s'); //Fecha en la que el entrenador confirma el entrenamiento

$sql1 = "UPDATE trainings_requested SET state = 5, confirmed_date = '$fechaHoy' WHERE id = $id"; //Cambiamos el estado a Programado y la fecha de confirmacion
$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha confirmado la fecha de la solicitud de entrenamiento $solicitud', '$ip')"; //Registramos el cambio
mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>');

$html = ($trainingID == 9 || $trainingID == 10 || $trainingID == 14) ? "<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n ATC</strong>: $posicionATC</div>" : '';

$emailStaff = obtenerEmailStaff($filaEntrenamientos['trainer'], $con);

$headers = "From: Secretaria Virtual <secretaria@ar.ivao.aero>\r\n".
		   "Cc: $emailStaff\r\n".
		   "Content-Type: text/html; charset=utf-8\r\n".
		   "MIME-Version: 1.0\r\n";
$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Entrenamiento Programado</h2>Le informamos que el entrenamiento con ID de solicitud $id ha sido programado.<br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".obtenerNombreUsuario($vid, $con)."</div> $html <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: $fechaAsignada UTC</div><br /><br /></body></html>";

mail(obtenerEmailUsuario($filaEntrenamientos['member'], $con), 'Entrenamiento Programado', $body, $headers);

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Entrenamiento confirmado. <br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/MyTrainings.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></div>';
?>