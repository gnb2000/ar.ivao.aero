<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR'];
$staff = $_COOKIE['vid'];

/*
Este script permite al coordinador agregar un Elite Pilot.
*/

if(isset($_GET['enviar']))
{
	$vid = $_POST['vid'];
	$callsign = $_POST['callsign'];
		
	$sql1 = "INSERT INTO aep_positions(VID, Callsign) VALUES($vid, '$callsign')"; //Agregamos el piloto
	$sql2 = "UPDATE users SET AEPmember = 1 WHERE vid = $vid"; 
	$sql3 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha agregado el miembro $vid como $callsign', '$ip')"; //Registramos este cambio
	mysqli_multi_query($con, $sql1.'; '.$sql2.'; '.$sql3.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Piloto agregado correctamente. <br /><a href="#" onclick="mostrarAJAX(\'OpsVuelo/PilotList.php\', \'.tooltip-demo\')"> <strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>Operaciones de Vuelo <small> Elite Pilots</small></h2>

<br />
<form id="formAdd" class="form-horizontal" action="/" method="post" role="form" enctype="multipart/form-data">
<fieldset>
<!-- Text input-->
<div class="form-group">
	<label class="col-md-4 control-label" for="vid">VID</label>
  	<div class="col-md-3">
      <select id="vid" name="vid" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT * FROM users ORDER BY vid');
      while($filaUsers = mysqli_fetch_array($resUsers))
      {
		  $vid = $filaUsers['vid'];
		  $nombre = $filaUsers['nombre'].' '.$filaUsers['apellido'];
		  echo "<option value=\"$vid\">$vid - $nombre</option>\n"; 
      }
      ?>
      </select>
  	</div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="callsign">Callsign</label>
    <div class="col-md-4">
        <input class="form-control input-md" placeholder="i.e. AEP001" id="callsign" name="callsign" type="text" required />
    </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('OpsVuelo/PilotAdd.php?enviar=enviar', '.tooltip-demo')" type="submit" class="btn btn-success btn-xs" name="enviar" value="Agregar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>