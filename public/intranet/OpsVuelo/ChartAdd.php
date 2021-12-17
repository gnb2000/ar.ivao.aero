<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/SectorAdd.js" type="text/javascript" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = $_COOKIE['vid']; //VID del coordinador
$fechaHoy = date('YmdHis'); //Esta fecha la utilizaremos para versionar las cartas antiguas

/*
Este script permite al coordinador cargar una carta.
*/

if(isset($_GET['enviar'])) //Si el usuario ha presionado el botón Cargar...
{	
	$id = strtoupper($_POST['icao']);
	
	$sql = mysqli_query($con, "SELECT * FROM airports WHERE icao = '$id'");
	$resICAO = mysqli_fetch_array($sql);
	
	$nombre = $resICAO['name'];
	$efectividad = $_POST['efectividad']; //Fecha efectividad
	$airac = $_POST['airac'];
	 
	$queryA = mysqli_query($con, "SELECT * FROM aip_charts WHERE icao = '$id'");
	$countA = mysqli_num_rows($queryA);
	if($countA == 0) $continue = TRUE;
	
	if($continue)
	{
		$sql1 = "INSERT INTO aip_charts(icao, name, effective, airac) VALUES('$id', '$nombre', '$efectividad', '$airac')";
		$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha cargado la carta $nombre', '$ip')"; //Registramos este cambio
		mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
		mysqli_next_result($con); //Movemos el puntero al siguiente resultado (solo hay 2) del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 

		echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Carta cargada correctamente.</div>';
	}
	else
	{
		$sql1 = "UPDATE aip_charts SET effective = '$efectividad', airac = '$airac' WHERE icao = '$id'";
		$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha cargado la carta $nombre', '$ip')";
		mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));
		mysqli_next_result($con); //Movemos el puntero al siguiente resultado (solo hay 2) del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta.
		echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Carta actualizada correctamente.</div>';
	}	
}
else
{
?>                        
                        <h2>Operaciones de Vuelo <small> Nueva Carta</small></h2>
                        
                        <div class="alert alert-warning" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> ATENCIÓN: El nombre del archivo de las cartas de aerodromo debe ser el código ICAO.</div>
                        
                        
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- <div class="form-group">
	<label class="col-xs-3 control-label" for="tipo">Tipo</label>
	<div id="tipo" class="form-group">
			<input value="1" name="tipo" type="radio" required /> Aer&oacute;dromo
			<input value="2" name="tipo" type="radio" required /> Rutero
	</div>
</div> -->

<div class="form-group">
	<label class="col-md-3 control-label" for="icao">ICAO</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="icao" name="icao" type="text" required />
    </div>
</div>


<!-- Text input-->
<div class="form-group">
    <label class="col-md-3 control-label" for="fecha">Efectividad</label>  
    <div class="col-md-3">
          <input class="form-control input-md" id="fecha" name="efectividad" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="airac">AIRAC</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="airac" name="airac" type="text" required />
    </div>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('OpsVuelo/ChartAdd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Cargar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>