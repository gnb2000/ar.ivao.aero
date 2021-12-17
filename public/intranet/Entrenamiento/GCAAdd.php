<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/GCA.js" type="text/javascript" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = (int)$_COOKIE['vid']; //VID del entrenador

/*
Este script permite al entrenador agregar un GCA.
*/

if(isset($_GET['enviar']))
{
	$vid = (int)$_POST['vid']; //VID del alumno
	$nombre = $_POST['nombre']; //Nombre del alumno
	$rango = $_POST['rango']; //Rango del mimebro
	$texto = $_POST['detalles']; //Comentarios
	$fechaAceptacion = $_POST['fecha'];
	
	$sql1 = "INSERT INTO gca(Vid, name, rating, accept_date, comments) VALUES($vid, '$nombre', '$rango', '$fechaAceptacion', '$texto')";
		
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha asignado el GCA al miembro $vid', '$ip')"; //Registramos este cambio

	mysqli_next_result($con); //Movemos el puntero al siguiente resultado (solo hay 2) del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> GCA registrado correctamente.</div>';
	
}else{
?>                        
                        <h2>Entrenamiento <small> Nuevo GCA</small></h2>
                        
<br />
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-md-4 control-label" for="vid">Miembro (VID)</label>
    <div class="col-md-4">
        <input placeholder="e.g. 123456" class="form-control input-md" id="vid" name="vid" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="nombre">Miembro (Nombre)</label>
    <div class="col-md-4">
        <input placeholder="e.g. Federico Chuste" class="form-control input-md" id="nombre" name="nombre" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fecha">Fecha Aceptaci&oacute;n</label>
    <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="rango">Rango</label>
	 <div class="col-md-4">
      <select id="rango" name="rango" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <option value="ADC">ADC</option>
      <option value="APC">APC</option>
      <option value="ACC">ACC</option>
      </select>
	 </div> 
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Restricciones</label><br />
  <br />
  <center><textarea rows="8" cols="60" id="detalles" name="detalles"></textarea></center>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/GCAAdd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>