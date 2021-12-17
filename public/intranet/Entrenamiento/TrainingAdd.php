<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/TAdd.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR'];
$vid = (int)$_COOKIE['vid'];

/*
Este script permite al coordinador agregar un entrenamiento.
*/

if(isset($_GET['enviar']))
{
	$nombre = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$rango = (int)$_POST['rango'];						//Recogemos los datos del training	
	$duracion = $_POST['duracion'];
	$url = $_FILES['url']['name'];
	
	move_uploaded_file($_FILES['url']['tmp_name'], '/home/admin/web/ar.ivao.aero/public_html/files/Training/Manuales/'.$url); //Movemos el material a la carpeta adecuada
	$url = 'https://files.ar.ivao.aero/Training/Manuales/'.$url;
	
	$sql1 = "INSERT INTO trainings(name, type, rating, duration, material) VALUES('$nombre', '$tipo', $rango, '$duracion', '$url')"; //Agregamos el training
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha creado el entrenamiento $nombre', '$ip')"; //Registramos este cambio
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Training agregado correctamente. <br /><a href="#" onclick="mostrarAJAX(\'Entrenamiento/TrainingList.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>Entrenamiento <small> Nuevo Entrenamiento</small></h2>

<form id="formAdd" class="form-horizontal" action="/" method="post" role="form" enctype="multipart/form-data">
<fieldset>
<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="nombre">Nombre</label>
    <div class="col-md-4">
        <input class="form-control input-md" placeholder="i.e. Fraseolog&iacute;a" id="nombre" name="nombre" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>  
  <div class="col-md-4">
      <select id="tipo" name="tipo" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <option value="atc">ATC</option>
      <option value="pilot">Vuelo</option>
      </select>
    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="rango">Rango Requerido</label>
    <div class="col-md-4">
      <select id="rango" name="rango" class="form-control input-md">
      <option value="">Seleccionar...</option>
      <option value="4">Advanced Flight Student</option>
      <option value="5">Private Pilot</option>
      <option value="6">Senior Private Pilot</option>
      <option value="7">Commercial Pilot</option>
      <option value="4">Advanced ATC Student</option>
      <option value="5">Aerodrome Controller</option>
      <option value="6">Approach Controller</option>
      <option value="7">Center Controller</option>
      </select>
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="duracion">Duraci&oacute;n</label>
    <div class="col-md-4">
        <input class="form-control input-md" id="duracion" name="duracion" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="url">Material (i.e. PDF, Word,...)</label>
    <div class="col-md-4">
 		 <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input class="form-control input-md" placeholder="i.e. https://files.ar.ivao.aero/Training/IVACiniciacion.pdf" id="url" name="url" type="file" required />
    </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/TrainingAdd.php?enviar=enviar', '.tooltip-demo')" type="submit" class="btn btn-success btn-xs" name="enviar" value="Agregar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>