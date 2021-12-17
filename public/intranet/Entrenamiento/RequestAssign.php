<h2>Entrenamiento <small> Asignar Entrenamiento</small></h2>

                        <div class="separacion-tablas"></div>
                        
<?php
require '../../conexion.php'; 
require '../../funciones.php';

/*
Este es script permite al coordinador asignar un entrenador a un entrenamiento.
*/

$solicitud = (int)$_GET['id']; //ID de la solicitud de training realizada por el miembro
$fechaActual = gmdate('Y-m-d H:i');
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$fechaHoy = gmdate('Y-m-d H:i:s'); //Fecha en la que se asigna un entrenador

if(isset($_GET['enviar'])) //Si el entrenador ha hecho clic en Enviar...
{
	$trainer = (int)$_POST['trainer']; //Entrenador a ser asignado
	$nombreTrainer = obtenerNombreUsuario($trainer, $con);
	
	$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $solicitud") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.<br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingsRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></p>'.mysqli_error($con));
	$filaSolicitud = mysqli_fetch_array($resSolicitudes);
	
	$nombreAlumno = obtenerNombreUsuario($filaSolicitud['member'], $con);
	$emailAlumno = obtenerEmailUsuario($filaSolicitud['member'], $con);
	$texto = $filaSolicitud['request'];
	
	$resTraining = mysqli_query($con, 'SELECT * FROM trainings WHERE id = '.$filaSolicitud['id_training']) or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.<br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingsRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></p>'.mysqli_error($con));
	$filaT = mysqli_fetch_array($resTraining);
	$nombreTraining = $filaT['name'];
	
	if($filaSolicitud['trainer'] != $trainer)
	{
		$sql1 = "UPDATE trainings_requested SET trainer = $trainer, assigned_date = '$fechaHoy', state = 3 WHERE id = $solicitud"; //Cambiamos el estado a Asignado y cambiamos entrenador
		$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha asignado el entrenamiento $solicitud a $nombreTrainer', '$ip')"; //Registramos este cambio
		mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.<br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingsRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></p>'.mysqli_error($con));
		mysqli_next_result($con);
	}
	else die('<p class="alert-danger">Error: El entrenador seleccionado ya ha sido asignado a este entrenamiento. <br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingsRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></p>');
	
	$email = obtenerEmailUsuario($filaSolicitud['member'], $con);
	$emailStaff = obtenerEmailStaff($trainer, $con);
	
	$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
			   "Cc: $emailStaff\r\n".
			   "Reply-To: $emailAlumno\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br />
	<h2>Entrenamiento Asignado</h2>Le informamos que su entrenamiento ha sido asignado a un entrenador. <br /><br /><br />
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Solicitud</strong>: $solicitud</div>
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Alumno</strong>: $nombreAlumno</div>
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador Asignado</strong>: $nombreTrainer</div>
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenamiento</strong>: $nombreTraining</div>
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Comentarios</strong>: $texto</div>
	<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"></div><br /><br /><br /></body></html>";
	
	mail($email, 'Entrenamiento Asignado', $body, $headers);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Entrenamiento asignado correctamente.<br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingsRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></div>';
}
else //Si el entrenador NO ha hecho clic en Enviar...
{
?>
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="trainer">Entrenador</label>  
  <div class="col-md-4">
      <select id="trainer" name="trainer" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT s.vid AS vid, CONCAT(u.name, \' \', u.surname) AS name FROM staff_members s, users u WHERE s.vid = u.vid AND (s.department = \'TRAINING\' OR s.department = \'HQ\') ORDER BY u.name');
      while($filaUsers = mysqli_fetch_array($resUsers))
      {
		  $vid = $filaUsers['vid'];
		  $nombre = $filaUsers['name'];									//Mostramos los miembros staff que pertenecen al departamento de training
		  echo "<option value=\"$vid\">$nombre</option>\n"; 
      }
      ?>
      </select>
    
  </div>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('<?php echo "Entrenamiento/RequestAssign.php?id=$solicitud&amp;enviar=enviar"; ?>', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Asignar">
  </div>
</div>
</fieldset>
</form>
<?php
}
?>