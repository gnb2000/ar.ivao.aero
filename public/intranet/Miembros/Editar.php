<?php
require '../../conexion.php';

$vid = (int)$_GET['vid'];
$staff = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT * FROM users WHERE vid = $vid";
$resMiembros = mysqli_query($con, $sql) or die('Could not run query: ' . mysqli_error($con));
$row = mysqli_fetch_array($resMiembros);

$nombre = $row['name'];
$apellido = $row['surname'];
$cumple = $row['birthday'];

if(isset($_GET['enviar']))
{
	$nombrePOST = $_POST['nombre'];
	$apellidoPOST = $_POST['apellido'];
	$cumplePOST = $_POST['cumple'];		
		
	$sql1 = "UPDATE users SET name = '$nombrePOST', surname = '$apellidoPOST', birthday = '$cumplePOST' WHERE vid = $vid";
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha modificado el miembro $vid', '$ip')";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados correctamente<br /><a onClick="mostrarAJAX(\'Miembros/Buscar.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}
else
{
?>
<form class="form-horizontal" action="#" method="post">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="vid">VID</label>  
  <div class="col-md-4">
  <input id="vid" placeholder="<?php echo $vid; ?>" class="form-control input-md" disabled type="text">
    
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
	<label class="col-md-4 control-label" for="apellido">Apellido</label>
    <div class="col-md-4">
        <input class="form-control input-md" value="<?php echo $apellido; ?>" id="apellido" name="apellido" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="cumple">Cumplea&ntilde;os</label>
    <div class="col-md-4">
    <input class="form-control input-md" value="<?php echo date('Y-m-d', strtotime($cumple)); ?>" id="cumple" name="cumple" type="text" required />
    </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="<?php echo "enviarForm('Miembros/Editar.php?vid=$vid&enviar=enviar', '.tooltip-demo')"; ?>" type="button" class="btn btn-default" name="enviar" value="Editar">
  </div>
</div>
</fieldset>
</form>
<?php } ?>