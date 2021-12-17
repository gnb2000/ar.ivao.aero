<?php
require '../../conexion.php';

$id = (int)$_GET['id'];
$tabla = $_GET['lang'] == 'es' ? 'eventos' : 'eventos_en';
$vid = (int)$_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT * FROM $tabla WHERE id = $id";
$resEventos = mysqli_query($con, $sql) or die('Could not run query: ' . mysqli_error($con));
$row = mysqli_fetch_array($resEventos);

$nombre = $row['nombre'];
$fechaInicio = $row['fecha_inicio'];
$fechaFin = $row['fecha_fin'];
$desc =  $row['descripcion'];
$detalles = $row['detalles'];
$tipo = $row['tipo'];
$url = $row['imagen'];

if(isset($_POST['enviar']))
{
	$nombrePOST = $_POST['nombre'];
	$fechaInicioPOST = $_POST['fechainicio'];
	$fechaFinPOST = $_POST['fechafin'];
	$descPOST = $_POST['descripcion'];
	$detallesPOST = $_POST['detalles'];
	$tipoPOST = $_POST['tipo'];
	$urlPOST = $_FILES['img']['name'] != '' ? $_FILES['img']['name'] : $url;
	
	if($url != $urlPOST && !file_exists('/home/admin/web/files.ar.ivao.aero/Eventos/Images/$urlPOST')) move_uploaded_file($_FILES['img']['tmp_name'], '/home/admin/web/files.ar.ivao.aero/Eventos/Images/'.$urlPOST);
		
		
	$sql1 = "UPDATE $tabla SET nombre = '$nombrePOST', fecha_inicio = '$fechaInicioPOST', fecha_fin = '$fechaFinPOST', descripcion = '$descPOST', detalles = '$detallesPOST', tipo = '$tipoPOST', imagen = '$urlPOST' WHERE id = $id";
	$sql2 = "INSERT INTO acciones_staff(vid, accion, ip) VALUES($vid, 'Se ha modificado el evento $nombre', '$ip')";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados correctamente<br><a onClick="mostrarAJAX(\'Eventos/EventList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}
else
{
?>
<form class="form-horizontal"  id="formulario" action="/" enctype="multipart/form-data" method="post" role="form">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="img">Imagen</label>  
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
  <input id="img" name="img" class="form-control input-md" required type="file">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" value="<?php echo $nombre; ?>" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechainicio">Fecha Inicio</label>
    <div class="col-md-4">
        <input class="form-control input-md" value="<?php echo date('Y-m-d H:i', strtotime($fechaInicio)); ?>" id="fechainicio" name="fechainicio" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechafin">Fecha Finalizaci&oacute;n</label>
    <div class="col-md-4">
    <input class="form-control input-md" value="<?php echo date('Y-m-d H:i', strtotime($fechaFin)); ?>" id="fechafin" name="fechafin" type="text" required />
    </div>
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripci&oacute;n</label>
  <textarea class="col-md-4" cols="50" rows="10" id="descripcion" name="descripcion"><?php echo $desc; ?></textarea>
</div>

<!-- Select Basic -->
<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Detalles</label><br />
  <br />
  <textarea id="detalles" name="detalles"><?php echo $detalles; ?></textarea>
</div><br />

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>
  <div class="col-md-4"> 
    <select class="form-control input-md"  name="tipo" id="tipo">
    <option value="Evento Presencial">Presencial</option>
    <option value="Puente">Puente</option>
    <option value="Fly In">Fly In</option>
    <option value="Fly Out">Fly Out</option>
    <option value="Fly In&Out"> Fly In&amp;Out</option>
    <option value="SAR">SAR</option>
    <option value="Competencia">Competencia</option>
    <option value="Crowded Skies">Crowded Skies</option>
    <option value="Full Control">Full Control</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="<?php echo "enviarForm('/intraweb/Eventos/EventoEdit.php?id=$id', '.tooltip-demo')"; ?>" type="button" class="btn btn-default" name="enviar" value="Editar">
  </div>
</div>
</fieldset>
</form>
<?php } ?>