<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript" type="text/javascript"></script>
<script src="/js/TourNew.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$staff = obtenerNombreUsuario($_COOKIE['vid'], $con); //VID del staff

if(isset($_GET['enviar']))
{
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	$distancia = $_POST['distancia'];
	$tiempo = $_POST['tiempo'];
	$acfts = $_POST['acfts'];
	$imagen = $_POST['banner'];
	$remarks = $_POST['remarks'];		
		
	$sql1 = "INSERT INTO tours(Name, Code, Distance, Time, Aicrafts, Author, Image, Rmks) VALUES('$nombre', '$codigo', $distancia, '$tiempo', '$acfts', '$staff', '$imagen', '$remarks')";
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha agregado el tour $nombre', '$ip')";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Tour agregado correctamente<br><a onClick="mostrarAJAX(\'Eventos/TourList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';	
}
else
{
?>
<form class="form-horizontal"  id="formulario" action="/" method="post" role="form">
<fieldset>
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

<div class="form-group">
  <label class="col-md-4 control-label" for="codigo">C&oacute;digo</label>  
  <div class="col-md-4">
  <input id="codigo" name="codigo" placeholder="VFRS18" class="form-control input-md" required type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" placeholder="VFR Sur 18" class="form-control input-md" required type="text">
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="distancia">Distancia Total</label>
    <div class="col-md-4">
        <input class="form-control input-md" placeholder="689" id="distancia" name="distancia" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="tiempo">Tiempo Total</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="142:53" id="tiempo" name="tiempo" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="acfts">Aeronaves</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="Ligeros, mono o multimotor a helice" id="acfts" name="acfts" type="text" required />
    </div>
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="remarks">Observaciones</label>
  <textarea id="remarks" name="remarks"></textarea>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="<?php echo "enviarForm('Eventos/TourNew.php?enviar=enviar', '.tooltip-demo')"; ?>" type="button" class="btn btn-success" name="enviar" value="Enviar">
  </div>
</div>
</fieldset>
</form>
<?php } ?>