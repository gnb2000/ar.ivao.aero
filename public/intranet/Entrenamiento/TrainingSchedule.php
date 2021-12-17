<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/Schedule.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$trainer = (int)$_COOKIE['vid']; //VID del entrenador
$hoy = date('Y-m-d H:i');

/*
Este script permite al entrenador programar un training en el sistema para que se muestre en el calendario.
*/

if(isset($_GET['enviar']))
{
	$id = (int)$_POST['id']; //ID del training
	$idtraining = (int)$_POST['idtraining']; //ID del training
	$vid = (int)$_POST['vid']; //VID del alumno
	$fecha = $_POST['fecha']; //Fecha del training
	$posicion =  $_POST['posicion']; //Posicion ATC
	$ruta = $_POST['ruta']; //Ruta (Piloto)
	$programado = FALSE;
			
	$res = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $id");
		
	$mensaje = '';
	if($fecha >= $hoy)
	{
		$sql12 = $_POST['posicion'] != '' //Si se ha introducido una posicion ATC, entonces es un training ATC. Si no, es de piloto
			? "INSERT INTO trainings_requested(id, id_training, member, trainer, atc_position, training_date) VALUES($id, $idtraining, $vid, $trainer, '$posicion', '$fecha')" 
			: "INSERT INTO trainings_requested(id, id_training, member, trainer, training_date) VALUES($id, $idtraining, $vid, $trainer, '$fecha')"; 
				
		$sql1 = mysqli_num_rows($res) == 0 //Si ya existe el training en la BD, lo actualizamos con los nuevos datos
				? $sql12
				: "UPDATE trainings_requested SET atc_position = '$posicion', training_date = '$fecha' WHERE id = $id"; 
				
		
		$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($trainer, 'Se ha programado un training para la fecha $fecha', '$ip')"; //Registramos este cambio

		$mensaje = '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Training registrado correctamente.</div>';
		
		$programado = TRUE;
	}
	else
	{
		$sql1 = "UPDATE trainings_requested SET state = 0 WHERE id = $id";
		$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($trainer, 'Se ha cancelado el training $id', '$ip')"; //Registramos este cambio
		$mensaje = '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Training cancelado correctamente.</div>';	
	}
		
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	
	$campo = $_POST['posicion'] != ''
		? "<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n</strong>: $posicion</div>"
		: '';
	$headers = "From: Secretaria Virtual <secretaria@ar.ivao.aero>\r\n".
		   'Cc: '.obtenerEmailStaff($trainer, $con)."\r\n".
		   "Content-Type: text/html; charset=utf-8\r\n".
		   "MIME-Version: 1.0\r\n";
	if($programado)
	{
		$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Training Programado</h2>Le informamos que el training con ID $id ha sido programado.<br /><br /><br />\n
		<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".obtenerNombreUsuario($trainer, $con)."</div>\n
		$campo\n
		<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: $fecha UTC</div><br /><br /></body></html>";
		
		mail(obtenerEmailUsuario($vid, $con), 'Entrenamiento Programado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');
	}
	else
	{
		$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Training Cancelado</h2>Le informamos que el training con ID $id ha sido cancelado. Para m&aacute;s info, contacte con su entrenador.<br /><br /><br />\n
		<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".obtenerNombreUsuario($trainer, $con)."</div>\n
		$campo\n <br /><br /></body></html>";
		
		mail(obtenerEmailUsuario($vid, $con), 'Entrenamiento Cancelado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');
	}

	echo $mensaje;
	
}else{
?>                        
                        <h2>Entrenamiento <small> Nuevo Training</small></h2>
                        
<br />
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde introducir la fecha en el sistema UTC. &Eacute;sta debe ser la correspondiente al inicio del training.</div>

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-md-3 control-label" for="id">ID del Training</label>
    <div class="col-md-3">
        <input class="form-control input-md" id="id" placeholder="i.e. 965" name="id" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="idtraining">Training</label>
  <div class="col-md-3">
      <select id="idtraining" name="idtraining" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT * FROM trainings ORDER BY name');
      while($filaUsers = mysqli_fetch_array($resUsers))
      {
		  $tid = $filaUsers['id'];
		  $nombre = $filaUsers['name'];
		  echo "<option value=\"$tid\">$nombre</option>\n"; 
      }
      ?>
      </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="alumno">Miembro</label>  
  <div class="col-md-3">
      <select id="alumno" name="vid" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT * FROM users ORDER BY vid');
      while($filaUsers = mysqli_fetch_array($resUsers))
      {
		  $vid = $filaUsers['vid'];
		  $nombre = $filaUsers['name'].' '.$filaUsers['surname'];
		  echo "<option value=\"$vid\">$vid - $nombre</option>\n"; 
      }
      ?>
      </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="posicion">Posici&oacute;n ATC</label>  
  <div class="col-md-3">
      <select id="posicion" name="posicion" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resFIRs = mysqli_query($con, 'SELECT FIR FROM atc_positions GROUP BY FIR');
      while($filaFIRs = mysqli_fetch_array($resFIRs))
      {
		  $fir = $filaFIRs['FIR'];
      	  $resPos = mysqli_query($con, "SELECT PosId FROM atc_positions WHERE FIR = '$fir'");
		  
		  echo "<optgroup label=\"$fir\">\n";
		  while($filaPos = mysqli_fetch_array($resPos))
		  {
			  $pos = $filaPos['PosId'];
			  echo "<option  value=\"$pos\">$pos</option>\n";
		  }
		  echo "</optgroup>\n";
      }
      ?>
      </select>
  </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="fecha">Fecha y Hora del Training</label>
    <div class="col-md-3">
        <input autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/TrainingSchedule.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>