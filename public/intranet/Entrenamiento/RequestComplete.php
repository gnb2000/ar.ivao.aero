<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="/js/RequestComplete.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$id = (int)$_GET['id'];

/*
Este script permite al entrenador completar un entrenamiento
*/

if($_GET['enviar'] == 'enviar') //Si el entrenador ha hecho clic en Enviar...
{
	$resSolicitud = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $id") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 
	$filaSolicitud = mysqli_fetch_array($resSolicitud);
	$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
	$vid = (int)$_COOKIE['vid']; //VID del entrenador
	$comments = $_POST['comments']; //Comentarios sobre el alumno
	$atcs = $_POST['atcs'];
	$pilotos = $_POST['pilotos'];
	$idTraining = $filaSolicitud['id_training'];

	$urlA = explode('.', $_FILES['archivo']['name']); //Separamos el nombre del archivo de la extension para cambiar el nombre por el ID
	move_uploaded_file($_FILES['archivo']['tmp_name'], "/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Training/CountingSheets/Entrenamientos/$id.".$urlA[1]); //Renombramos el archivo a [ID].[EXTENSION] (i.e. 70.xlsx)
	$url = "https://files.ar.ivao.aero/Training/CountingSheets/Entrenamientos/$id.".$urlA[1];
	
	$sql1 = "UPDATE trainings_requested SET state = 6, url = '$url', comments = '$comments' WHERE id = $id"; //Cambiamos el estado a Completado e insertamos los comentarios
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha completado el entrenamiento $id', '$ip')"; //Registramos este cambio
	
	$sql3 = 'INSERT INTO training_points(vid, id_training, points, type) VALUES';
	foreach($atcs as $atc) $sql3 .= "($atc, $id, 1, 'a'),\n";					//Insertamos los miembros seleccionados
	foreach($pilotos as $piloto) $sql3 .= "($piloto, $id, 2, 'p'),\n";					
	$sql3 .= "(0, $id, 0, NULL)";
	
	$res = mysqli_multi_query($con, $sql1.'; '.$sql2.'; '.$sql3.';') or die('<p class="alert-danger">Ha habido un error al actualizar.</p>'.mysqli_error($con));
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 

	
	$cc = $idTraining < 11 || $idTraining == 14 ? "Cc: fo-dep@ar.ivao.aero\r\n" : ''; //Si es un training ATC incluimos a ops de vuelo, para notificarles de que hay una nueva counting sheet.
	$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
			   $cc.
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Entrenamiento Completado</h2>Se ha completado un entrenamiento. Para m&aacute;s info, consulte la intraweb. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Entrenamiento</strong>: $id</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: ".obtenerNombreUsuario($filaSolicitud['member'], $con)."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador Asignado</strong>: ".obtenerNombreUsuario($filaSolicitud['trainer'], $con)."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Asignada</strong>: ".$filaSolicitud['training_date']." UTC</div><br /><br /></body></html>";
	
	mail('entrenamiento@ar.ivao.aero', 'Entrenamiento Completado', $body, $headers);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Entrenamiento actualizado correctamente.<br /><a onClick="mostrarAJAX(\'Entrenamiento/MyTrainings.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
}
else //Si el entrenador NO ha hecho clic en Enviar...
{
	?>
    <h2>Entrenamiento <small> Completar Entrenamiento</small></h2><br />
    
    <form id="formAdd" class="form-horizontal" action="/" method="post" role="form" enctype="multipart/form-data">
<fieldset>

<div class="form-group">
	<label class="col-md-3 control-label" for="url">Counting Sheet (solo ATC)</label>
    <div class="col-md-3">
 		 <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input class="form-control input-md" id="url" name="archivo" type="file" />
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Comentarios</label>
    <div class="col-md-3">
        <textarea class="form-control input-md" id="comments" name="comments"></textarea>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Controladores</label>
    <div class="col-md-3">
        <select style="width: 300px;" name="atcs[]" multiple>
        	<?php
			$resATCs = mysqli_query($con, "SELECT oa.vid AS 'vid', oa.callsign AS 'callsign' FROM online_atcs oa, trainings_requested ti WHERE oa.date BETWEEN ti.training_date AND DATE_ADD(ti.training_date, INTERVAL 3 HOUR) AND ti.id = $id") or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 
			
			while($fila = mysqli_fetch_array($resATCs))
				echo '<option value="'.$fila['vid'].'">'.$fila['callsign'].' '.obtenerNombreUsuario($fila['vid'], $con)."</option>\n";
			?>
        </select>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Pilotos</label>
    <div class="col-md-3">
        <select style="width: 300px;" name="pilotos[]" multiple>
        	<?php
			$resPilotos = mysqli_query($con, 
									   "SELECT of.vid AS 'vid', of.callsign AS 'callsign'
						   				FROM training_flights of, trainings_requested ti
						   				WHERE ( of.conn_time BETWEEN DATE_SUB(ti.training_date, INTERVAL 1 HOUR) AND DATE_ADD(ti.training_date, INTERVAL 2 HOUR)
										OR of.disc_time BETWEEN ti.training_date AND DATE_ADD(ti.training_date, INTERVAL 3 HOUR) )
										AND ti.id = $id")
			or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 
		
			while($fila = mysqli_fetch_array($resPilotos))
				echo '<option value="'.$fila['vid'].'">'.$fila['callsign'].' '.obtenerNombreUsuario($fila['vid'], $con)."</option>\n";
			?>
        </select>
    </div>
</div> 

<div class="form-group">
  <div class="col-md-3">
	<input onclick="<?php echo "enviarForm('Entrenamiento/RequestComplete.php?enviar=enviar&id=$id', '.tooltip-demo')"; ?>" type="submit" class="btn btn-success btn-xs" name="enviar" value="Registrar"> 
  </div>
</div>

</fieldset>
</form>
    <?php
}
?>