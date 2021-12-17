<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/Schedule.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$examinador = (int)$_COOKIE['vid']; //VID del entrenador
$hoy = date('Y-m-d H:i');

/*
Este script permite al entrenador programar un examen en el sistema para que se muestre en el calendario.
*/

if(isset($_GET['enviar']))
{
	$id = (int)$_POST['idexamen']; //ID del examen
	$vid = (int)$_POST['vid']; //VID del alumno
	$examen = $_POST['examen']; //Nombre del examen (controlador de aerodromo, piloto privado senior...)
	$fecha = $_POST['fecha']; //Fecha del examen
	$posicion =  $_POST['posicion']; //Posicion ATC
	$ruta = $_POST['ruta']; //Ruta (Piloto)
			
	if($fecha >= $hoy)
	{
		$headers = "From: Secretaria Virtual <secretaria@ar.ivao.aero>\r\n".
			   'Cc: '.obtenerEmailStaff($examinador, $con)."\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
		$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Examen Teorico Programado</h2>Le informamos que el examen (<span style=\"font-weight: bold; text-decoration-line: underline;\">parte teorica</span>) con ID $id ha sido programado.<br /><br /><br />\n
		<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Examinador</strong>: ".obtenerNombreUsuario($examinador, $con)."</div>\n
		<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: $fecha UTC</div><br /><br /></body></html>";

		mail(obtenerEmailUsuario($vid, $con), 'Examen Teorico Programado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');
		
		echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Examen registrado correctamente.</div>';
	}
	else die('<p class="alert-danger">Ha seleccionado una fecha pasada.</p>');
	
} else {
?>                        
                        <h2>Entrenamiento <small> Nuevo Examen Teorico</small></h2>
                        
<br />
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde introducir la fecha en el sistema UTC. &Eacute;sta debe ser la correspondiente al inicio del examen.</div>

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-md-3 control-label" for="idexamen">ID del Examen</label>
    <div class="col-md-3">
        <input class="form-control input-md" id="idexamen" placeholder="i.e. 854523" name="idexamen" type="text" required />
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
		  $nombre = $filaUsers['nombre'].' '.$filaUsers['apellido'];
		  echo "<option value=\"$vid\">$vid - $nombre</option>\n"; 
      }
      ?>
      </select>
  </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="examen">Examen</label>
    <div class="col-md-3">
      <select id="examen" name="examen" class="form-control input-md">
      <option value="">Seleccionar...</option>
      <option value="0">Private Pilot</option>
      <option value="1">Senior Private Pilot</option>
      <option value="2">Commercial Pilot</option>
      <option value="3">Airline Transport Pilot</option>
      <option value="4">Aerodrome Controller</option>
      <option value="5">Approach Controller</option>
      <option value="6">Center Controller</option>
      <option value="7">Senior Controller</option>
      </select>
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="fecha">Fecha y Hora del Examen</label>
    <div class="col-md-3">
        <input autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<!-- <div class="form-group">
	<label class="col-md-3 control-label" for="nota">Calificaci&oacute;n</label>
    <div class="col-md-3">
        <input class="form-control input-md" placeholder="i.e. 85" id="nota" name="nota" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="url">Counting Sheet (solo ATC)</label>
    <div class="col-md-3">
 		 <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input class="form-control input-md" id="url" name="archivo" type="file" />
    </div>
</div> -->

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/TheoryExamSchedule.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php } ?>