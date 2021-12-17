<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$hoy = date("Y-m-d"); 
require('../../conexion.php');
include('../../stylesheet.php');

$vid = $_COOKIE['vid'];
$event = $_POST['event'];
$CallSign = $_POST['CallSign'];
$DepICAO = $_POST['DepICAO'];
$ArrICAO = $_POST['ArrICAO'];

if(isset($_POST['reportar'])){
	//COMPROBAR QUE NO HAYA REPORTADO EL MISMO Evento
	$buscar = "SELECT * FROM rep_eventos WHERE Vid = '$vid' AND EvId = '$event' AND Tipo = 1"; //
	$result = mysqli_query($con, $buscar);
	$count = mysqli_num_rows($result);
	if($count == 0){
		$query = "SELECT * FROM eventos WHERE id = '$event'"; //You don't need a ; like you do in SQL
		$result = mysqli_query($con, $query);
		$row = $result->fetch_assoc();
		
		$vid = $_COOKIE['vid'];
		$FechaEv = $row['fecha'];
		
		$ConTime = $_POST['ConHr'].':'.$_POST['ConMin'].':00';
		$DescTime = $_POST['DescHr'].':'.$_POST['DescMin'].':00';
		
		$sql = "INSERT INTO rep_eventos (Vid, Tipo, DepICAO, ArrICAO, Callsign, EvId, EvDate, ConnTime, DiscTime) VALUES ('$vid', 1, '$ArrICAO', '$DepICAO', '$CallSign', '$event', '$FechaEv', '$ConTime', '$DescTime')" ;
		mysqli_query($con, $sql);
		
		echo '<div class="alert alert-sucess alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  <strong>Éxito</strong> Se ha registrado el evento correctamente.
						</div> VID:'.$vid.'';
		
	}else{
		echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Atención!</strong> Ya haz reportado la participación en este evento.
						</div>';
	}
}else{
?> 

<form action="piloto.php" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Reporte Vuelo en Evento</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="event">Evento</label>
  <div class="col-md-4">
  <?php
					$query = "SELECT * FROM eventos WHERE fecha <= '$hoy' AND fecha >= '2016-01-01' ORDER BY fecha DESC"; //You don't need a ; like you do in SQL
					$result = mysqli_query($con, $query);
					$count = mysqli_num_rows($result);
					echo '<select id="event" name="event" class="form-control">';
					while($row = mysqli_fetch_array($result))
					{
						echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
					}
					echo '</select>';
?>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DepICAO">Callsign</label>  
  <div class="col-md-4">
  <input id="CallSign" name="CallSign" class="form-control input-md" type="text">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="DepICAO">Salida</label>  
  <div class="col-md-4">
  <input id="DepICAO" name="DepICAO" placeholder="ICAO" class="form-control input-md" type="text">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="ArrICAO">Destino</label>  
  <div class="col-md-4">
  <input id="ArrICAO" name="ArrICAO" placeholder="ICAO" class="form-control input-md" type="text">
  </div>
</div>

<div class="form-group">
 <label class="col-md-4 control-label" for="selectbasic">Despegue</label>
  <div class="col-md-2">
    <select id="ConHr" name="ConHr" class="form-control">
      <option value="00">00</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
  </div>
   <div class="col-md-2">
    <select id="ConMin" name="ConMin" class="form-control">
      <option value="00">00</option>
      <option value="05">05</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="25">25</option>
      <option value="30">30</option>
      <option value="35">35</option>
      <option value="40">40</option>
      <option value="45">45</option>
      <option value="50">50</option>
      <option value="55">55</option>
    </select>
  </div>
</div>

<div class="form-group">
 <label class="col-md-4 control-label" for="selectbasic">Aterrizaje</label>
  <div class="col-md-2">
    <select id="DescHr" name="DescHr" class="form-control">
      <option value="00">00</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
  </div>
   <div class="col-md-2">
    <select id="DescMin" name="DescMin" class="form-control">
      <option value="00">00</option>
      <option value="05">05</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="25">25</option>
      <option value="30">30</option>
      <option value="35">35</option>
      <option value="40">40</option>
      <option value="45">45</option>
      <option value="50">50</option>
      <option value="55">55</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="reportar"></label>
  <div class="col-md-4">
    <button id="reportar" name="reportar" class="btn btn-success">Reportar</button>
  </div>
</div>

</fieldset>
</form>
<?php }?>