<?php
require '../../conexion.php';

$id = (int)$_GET['id'];
$sql = "SELECT * FROM tours WHERE id = $id";
$resEventos = mysqli_query($con, $sql) or die('Could not run query: ' . mysqli_error($con));
$row = mysqli_fetch_array($resEventos);

$nombre = $row['Nombre'];
$codigo = $row['Codigo'];
$distancia = $row['DistanciaT'];
$tiempo =  $row['TiempoT'];
$remarks = $row['Rmks'];

if(isset($_GET['enviar']))
{
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	$distancia = $_POST['distancia'];
	$tiempo = $_POST['tiempo'];
	$remarks = $_POST['remarks'];		
		
	$sql = "UPDATE tours SET nombre = '$nombre', codigo = '$codigo', distanciat = $distancia, tiempot = '$tiempo', rmks = '$remarks' WHERE id = $id";
	mysqli_query($con, $sql) or die('<p class="alert-danger">Ha habido un error al actualizar la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados correctamente<br><a onClick="mostrarAJAX(\'Eventos/TourList.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';	
}
else
{
?>
<form class="form-horizontal"  id="formulario" action="/" method="post" role="form">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="codigo">C&oacute;digo</label>  
  <div class="col-md-4">
  <input id="codigo" value="<?php echo $codigo; ?>" name="codigo" class="form-control input-md" required type="text">
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
	<label class="col-md-4 control-label" for="distancia">Distancia Total</label>
    <div class="col-md-4">
        <input class="form-control input-md" value="<?php echo $distancia; ?>" id="distancia" name="distancia" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="tiempo">Tiempo Total</label>
    <div class="col-md-4">
    <input class="form-control input-md" value="<?php echo $tiempo; ?>" id="tiempo" name="tiempo" type="text" required />
    </div>
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="remarks">Observaciones</label>
  <textarea class="col-md-4" cols="50" rows="10" id="remarks" name="remarks"><?php echo $remarks; ?></textarea>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="<?php echo "enviarForm('Eventos/TourEdit.php?id=$id&enviar=enviar', '.tooltip-demo')"; ?>" type="button" class="btn btn-default" name="enviar" value="Editar">
  </div>
</div>
</fieldset>
</form>
<?php } ?>