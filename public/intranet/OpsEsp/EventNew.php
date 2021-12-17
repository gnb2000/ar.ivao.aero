<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/EventNew.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$vid = (int)$_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['enviar']))
{
	$nombre = $_POST['nombre'];
	$fechaInicio = $_POST['fechainicio'];
	$fechaFin = $_POST['fechafin'];
	
	$desc = $_POST['descripcion'];
	$idioma = $_POST['idioma'];
	$detalles = $_POST['detalles'];
	$tipo = $_POST['tipo'];
	
	$url = $_POST['banner'];
	
	move_uploaded_file($_FILES['archivo']['tmp_name'], '/home/admin/web/files.ar.ivao.aero/public_html/SO/Briefings/'.$_FILES['archivo']['name']); //movemos el archivo a la carpeta de briefings
		
	$tabla = $idioma == 'es' ? 'events' : 'events_en';
	$sql1 =  "INSERT INTO $tabla (name, start_date, end_date, description, details, type, image) VALUES ('$nombre', '$fechaInicio', '$fechaFin', '$desc', '$detalles', '$tipo', '$url')";
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha agregado el evento $nombre', '$ip')";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	

	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ar.ivao.aero/cron/BannerUsado.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Evento cargado correctamente<br />URL: http://files.ar.ivao.aero/SO/Briefings/'.$_FILES['archivo']['name'].'<br /><a onClick="mostrarAJAX(\'Eventos/EventList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>Eventos <small> Nuevo Evento</small></h2>

<form class="form-horizontal" id="formulario" action="/" enctype="multipart/form-data" method="post" role="form">
<fieldset>

<!--
<div class="form-group">
  <label class="col-md-4 control-label" for="img">Imagen</label>  
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
  <input id="img" name="img" class="form-control input-md" required type="file">
    
  </div>
</div>
-->
<div class="form-group">
  <label class="col-md-4 control-label" for="banner">Banner</label>  
  <div class="col-md-4">
      <select id="banner" name="banner" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resBanner = mysqli_query($con, 'SELECT * FROM events_banners WHERE Used = 0 ORDER BY id DESC');
      while($filaBanner = mysqli_fetch_array($resBanner))
      {
		  $archivo = $filaBanner['File'];
		  $nombre = $filaBanner['Event'].' - '.$filaBanner['Code'];
		  echo "<option value=\"$archivo\">$nombre</option>\n"; 
      }	
      ?>
      </select>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" placeholder="Nombre del evento" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechainicio">Fecha Inicio</label>
    <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md"  id="fechainicio" name="fechainicio" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechafin">Fecha Finalizaci&oacute;n</label>
    <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md"  id="fechafin" name="fechafin" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="idioma">Idioma</label>
    <div class="col-md-4">
        <select class="form-control input-md" id="idioma" name="idioma">
		<option value="">Seleccionar...</option>
        <option value="es">Espa&ntilde;ol</option>
        <option value="en">English</option>
        </select>
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="url">Briefing</label>
    <div class="col-md-4">
 		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input class="form-control input-md" id="url" name="archivo" type="file" />
    </div>
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripci&oacute;n</label>
  <textarea class="col-md-4" cols="50" rows="10" id="descripcion" name="descripcion"></textarea>
</div>

<!-- Select Basic -->
<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Detalles</label><br />
  <br />
  <textarea id="detalles" name="detalles"></textarea>
</div><br />

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>
  <div class="col-md-4"> 
    <select class="form-control input-md"  name="tipo" id="tipo">
    <option value="">Seleccionar...</option>
    <option value="CAT-A">CAT-A</option>
    <option value="CAT-B">CAT-B</option>
    <option value="CAT-C">CAT-C</option>
    <option value="CAT-D">CAT-D</option>
    <option value="CAT-E">CAT-E</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('OpsEsp/EventNew.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Agregar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>