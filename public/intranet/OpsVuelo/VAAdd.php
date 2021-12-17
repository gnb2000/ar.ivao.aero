<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = $_COOKIE['vid']; //VID del coordinador

/*
Este script permite al coordinador agregar una VA.
*/

if(isset($_GET['enviar'])) //Si el usuario ha presionado el botón Agregar...
{	
	$id = $_POST['id'];
	$icao = strtoupper($_POST['icao']);
	$iata = strtoupper($_POST['iata']);
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$url = $_POST['url'];
	$logo = $_POST['logo'];
	
	$sql1 = "INSERT INTO va_list(IVAOId, ICAO, IATA, VaName, VaUrl, LogoUrl, VaType) VALUES($id, '$icao', '$iata', '$nombre', '$url', '$logo', $tipo)";
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha agregado la VA $nombre', '$ip')"; //Registramos este cambio
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));

	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> VA agregada correctamente.</div>';
}
else
{
?>                        
                        <h2>Operaciones de Vuelo <small> Nueva VA</small></h2>
                        <br />                        
                        
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-xs-3 control-label" for="tipo">Tipo</label>
	<div id="tipo" class="form-group">
			<input value="1" name="tipo" type="radio" required /> VA
			<input value="2" name="tipo" type="radio" required /> SOG
	</div>
</div> 


<div class="form-group">
	<label class="col-md-3 control-label" for="id">ID VA System</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="i.e. 19857" id="id" name="id" type="text" required />
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-3 control-label" for="nombre">Nombre</label>  
    <div class="col-md-3">
          <input class="form-control input-md" id="nombre" name="nombre" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="icao">ICAO</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="icao" name="icao" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="iata">IATA</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="iata" name="iata" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="url">Web</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="http://flybondivirtual.com.ar/" id="url" name="url" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="logo">Logo</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="https://www.ivao.aero/data/images/logo2/L-FBZ.jpg" id="logo" name="logo" type="text" required />
    </div>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('OpsVuelo/VAAdd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Agregar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php } ?>