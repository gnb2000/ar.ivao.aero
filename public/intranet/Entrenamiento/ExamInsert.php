<script src="/js/funciones.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$examinador = (int)$_COOKIE['vid']; //VID del entrenador

/*
Este script permite al entrenador calificar un examen en el sistema para que el alumno pueda ver sus calificaciones desde la secretaria.
*/

if(isset($_GET['enviar']))
{
	$id = (int)$_POST['idexamen']; //ID del examen
	$nota = (int)$_POST['nota'];
	$atcs = $_POST['atcs'];
	$pilotos = $_POST['pilotos'];
	
	$res = mysqli_query($con, "SELECT * FROM exams WHERE id = $id") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con));
	$fila = mysqli_fetch_array($res);
	
	$examen = $fila['exam'];
	$fecha = $fila['date'];
	$miembro = $fila['vid'];
	
	$sql1 = "UPDATE exams SET score = $nota, examiner = $examinador WHERE id = $id"; 
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($examinador, 'Se ha calificado el examen $id', '$ip')"; //Registramos este cambio
	$sql3 = 'INSERT INTO training_points(vid, id_training, type) VALUES';
	foreach($atcs as $atc) $sql3 .= "($atc, $id, 'a'),\n";					//Insertamos los miembros seleccionados
	foreach($pilotos as $piloto) $sql3 .= "($piloto, $id, 'p'),\n";
	$sql3 .= "(0, $id, 'x')";

	mysqli_multi_query($con, $sql1.'; '.$sql2.'; '.$sql3.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado (hay 3) del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado (hay 3) del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 

	$urlA = explode('.', $_FILES['archivo']['name']); //Separamos el nombre del archivo de la extension para cambiar el nombre por el ID
	move_uploaded_file($_FILES['archivo']['tmp_name'],  "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Training/CountingSheets/Examenes/$id.".$urlA[1]); //Renombramos el archivo a [ID].[EXTENSION] (i.e. 70.xlsx)
	if($examen >= 4)
	{
		$url = "https://files.ar.ivao.aero/Training/CountingSheets/Examenes/$id.".$urlA[1];
	
		mysqli_query($con, "UPDATE exams SET url = '$url' WHERE id = $id") or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con)); //Asignamos el URL de la counting sheet al training

		$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
				   "Content-Type: text/html; charset=utf-8\r\n".
				   "MIME-Version: 1.0\r\n";
		$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Examen Completado</h2>Le informamos que se ha completado un nuevo examen ATC. Para m&aacute;s info, consulte la intraweb. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Examen</strong>: $id</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID Miembro</strong>: $miembro</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Examen</strong>: $fecha</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><br /><br /><br /></body></html>";
	
		mail('fo-dep@ar.ivao.aero', 'Examen Completado', $body, $headers);
	}
	
	$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Examen Completado</h2>Le informamos que hemos calificado su examen. Para m&aacute;s info, consulte su expediente. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Examen</strong>: $id</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID Miembro</strong>: $miembro</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Examen</strong>: $fecha</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><br /><br /><br /></body></html>";

	mail(obtenerEmailUsuario($miembro, $con), 'Examen Calificado', $body, $headers);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Examen registrado correctamente.</div>';
	
}else{
?>                        
                        <h2>Entrenamiento <small> Calificar Examen</small></h2>
                        
<br />

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-md-3 control-label" for="idexamen">ID del Examen</label>
	 <div class="col-md-3">
      <select onChange="cambioExamen(this)" id="idexamen" name="idexamen" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $res = mysqli_query($con, 'SELECT * FROM exams WHERE score IS NULL ORDER BY id');
      while($fila = mysqli_fetch_array($res))
      {
		  $id = $fila['id'];
		  $nombre = obtenerNombreExamen($fila['exam']);
		  echo "<option value=\"$id\">$id - $nombre</option>\n"; 
      }
      ?>
      </select>
	 </div> 
</div>

<div class="form-group">
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
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Controladores</label>
    <div class="col-md-3">
        <select id="selATCs" style="width: 300px;" name="atcs[]" multiple></select>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Pilotos</label>
    <div class="col-md-3">
        <select id="selPilots" style="width: 300px;" name="pilotos[]" multiple></select>
    </div>
</div> 

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/ExamInsert.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>