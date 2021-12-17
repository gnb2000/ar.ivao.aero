<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js"></script>
<script src="/js/funciones.js"></script>
<script src="/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
$.datetimepicker.setLocale('es');
$('#fechainicio').datetimepicker({format: 'Y-m-d H:i'});
$('#fechafin').datetimepicker({format: 'Y-m-d H:i'});

tinymce.init(
{
    theme: 'modern',
    selector: '#detalles',
    height: 400,
    width: 800,
    language: 'es',
    plugins: 
    [
    'advlist autolink autosave textcolor colorpicker lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media save table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    content_css:
    [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});
</script>
 <?php include ("../stylesheet.php"); ?> 
</head>
<body>
<?
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
	
	/*$url = $_FILES['img']['name'];

	move_uploaded_file($_FILES['img']['tmp_name'], '/home/admin/web/files.ar.ivao.aero/public_html/Eventos/Images/'.$_FILES['img']['name']);
	
						$img = '/home/admin/web/files.ar.ivao.aero/public_html/Eventos/Images/'.$_FILES['img']['name'];
						$percentage = 0.5;
						
						$imagick = new Imagick($img);
						
						$width = $imagick->getImageWidth();
						$height = $imagick->getImageHeight();
						
						
						$n_width = $width * $percentage;
						$n_height = $height * $percentage;
						
						$imagick->setImageFormat('jpeg');
						$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
						$imagick->setImageCompressionQuality(90);
						$imagick->thumbnailImage($n_width, $n_height, false, false);
						
						$ne = explode('.', $_FILES['img']['name']);
						
						$imagick->writeImage('/home/admin/web/files.ar.ivao.aero/public_html/Eventos/Images/Thumb/'.$ne[0].'.jpeg' );
						*/
	
	$tabla = $idioma == 'es' ? 'eventos' : 'eventos_en';
	$sql1 =  "INSERT INTO $tabla (nombre, fecha_inicio, fecha_fin, descripcion, detalles, tipo, imagen) VALUES ('$nombre', '$fechaInicio', '$fechaFin', '$desc', '$detalles', '$tipo', '$url')";
	$sql2 = "INSERT INTO acciones_staff(vid, accion, ip) VALUES($vid, 'Se ha agregado el evento $nombre', '$ip')";
	$sql3 = "UPDATE eventos_banners SET Used = 1 WHERE Archivo = '$url'";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	//mysqli_next_result($con);
	
	//mysqli_query($con, $sql3) or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://ar.ivao.aero/cron/BannerUsado.php");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados correctamente<br><a onClick="mostrarAJAX(\'Eventos/EventList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>Eventos <small> Nuevo Evento</small></h2>

<form class="form-horizontal" id="formulario" action="EventNew.php?enviar=enviar" method="post" role="form">
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
      $resBanner = mysqli_query($con, 'SELECT * FROM eventos_banners WHERE Used = 0 ORDER BY id DESC');
      while($filaBanner = mysqli_fetch_array($resBanner))
      {
		  $arch = $filaBanner['Archivo'];
		  $nombre = $filaBanner['Evento'].' - '.$filaBanner['Codigo'];
		  echo "<option value=\"$arch\">$nombre</option>\n"; 
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
        <input class="form-control input-md"  id="fechainicio" name="fechainicio" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechafin">Fecha Finalizaci&oacute;n</label>
    <div class="col-md-4">
        <input class="form-control input-md"  id="fechafin" name="fechafin" type="text" required />
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
</div><br />

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripci&oacute;n</label>
  <textarea class="col-md-4" cols="50" rows="10" id="descripcion" name="descripcion"></textarea>
</div><br />

<!-- Select Basic -->
<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Detalles</label><br />
  <br />
  <center><textarea id="detalles" name="detalles"></textarea></center>
</div><br />

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>
  <div class="col-md-4"> 
    <select class="form-control input-md"  name="tipo" id="tipo">
    <option value="">Seleccionar...</option>
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

<div style="text-align: center;" class="form-group">
  <div class="col-md-4">
	<input type="submit" class="btn btn-success btn-xs" name="enviar" value="Agregar" />
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?
}
?>

</body>
</html>