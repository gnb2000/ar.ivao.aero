<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/Schedule.js" type="text/javascript"></script>

<h2>Entrenamiento <small> Modificar Fecha</small></h2>

                        <div class="separacion-tablas"></div>
                        
<div class="alert alert-danger" role="alert"><strong>Atenci&oacute;n!</strong>. Recuerde introducir la fecha en el sistema UTC.</div>
                        
<?php
require '../../conexion.php'; 
require '../../funciones.php';

/*
Este es script permite al entrenador programar una fecha para el training.
*/

$solicitud = (int)$_GET['id']; //ID de la solicitud de training realizada por el miembro
$vid = (int)$_COOKIE['vid']; //VID del entrenador 
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.

if(isset($_GET['enviar'])) //Si el entrenador ha hecho clic en Enviar...
{
	$fechaAsignada = $_POST['fecha']; //Fecha que ha seleccionado el entrenador
	$fechaHoy = gmdate('Y-m-d H:i:s'); //Fecha en la que el entrenador confirma el entrenamiento

	$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $solicitud") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.<br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingRequested.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></p>'.mysqli_error($con));
	$filaSolicitud = mysqli_fetch_array($resSolicitudes);
		
	$sql1 = "UPDATE trainings_requested SET training_date = '$fechaAsignada', scheduled_date = '$fechaHoy', state = 4 WHERE id = $solicitud"; //Cambiamos el estado a Programado y cambiamos la fecha del training 
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha programado el entrenamiento $solicitud', '$ip')"; //Registramos este cambio
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al modificar la solicitud.</p>'.mysqli_error($con));
		
	$emailStaff = obtenerEmailStaff($filaSolicitud['trainer'], $con);

	$headers = "From: Secretaria Virtual <secretaria@ar.ivao.aero>\r\n".
			   "Cc: $emailStaff\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><br />
			<div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br />
			<h2>Entrenamiento Programado</h2>Le informamos que el entrenamiento con ID de solicitud $solicitud ha sido programado.<br /><br /><br />
			<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".obtenerNombreUsuario($vid, $con)."</div> 
			<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: $fechaAsignada UTC</div><br />
			<br /></body></html>";

	mail(obtenerEmailUsuario($filaSolicitud['member'], $con), 'Entrenamiento Programado', $body, $headers);

	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Fecha modificada correctamente. <br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/MyTrainings.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></div>';
}
else //Si el entrenador NO ha hecho clic en Enviar...
{
?>
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha">Fecha</label>  
  <div class="col-md-4">
      <input autocomplete="off" id="fecha" name="fecha" class="form-control input-md" />    
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input autocomplete="off" onclick="enviarForm('<?php echo "Entrenamiento/DateChange.php?id=$solicitud&enviar=enviar"; ?>', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Programar">
  </div>
</div>
</fieldset>
</form>
<?php
}
?>