<?
require '../../conexion.php';
require '../../funciones.php';

/*
Este script permite al coordinador habilitar a un entrenador
*/

if(isset($_GET['enviar']))
{
	$vid = (int)$_POST['vid']; //VID del entrenador a habilitar
	$training = (int)$_POST['training']; //ID del training seleccionado	
	$sql1 = "INSERT INTO trainer_training(trainer, training) VALUES($vid, $training)"; //Agregamos la habilitación
	mysqli_query($con, $sql1) or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Entrenador habilitado correctamente.</div><br /><a onClick="mostrarAJAX(\'Entrenamiento/TTManage.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>Entrenamiento <small> Nuevo Registro</small></h2>
                        
                        <div class="separacion-tablas"></div>

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="trainer">Entrenador</label>  
  <div class="col-md-4">
      <select id="trainer" name="vid" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT s.vid AS vid, CONCAT(u.nombre, \' \', u.apellido) AS nombre FROM staff_members s, users u WHERE s.vid = u.vid AND s.department = \'TRAINING\' ORDER BY u.nombre'); //Seleccionamos los m,iembros del staff que pertenecen al dpto de training
      while($filaUsers = mysqli_fetch_array($resUsers)) //Recorremos los resultados
      {
		  $vid = $filaUsers['vid'];
		  $nombre = $filaUsers['nombre'];
		  echo "<option value=\"$vid\">$nombre</option>\n"; 
      }
      ?>
      </select>
    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="training">Training</label>
    <div class="col-md-4">
      <select id="training" name="training" class="form-control input-md">
      <option value="">Seleccionar...</option>
      <?php
      $resTrainings = mysqli_query($con, 'SELECT * FROM trainings'); //Seleccionamos todos los trainings
      while($filaTrainings = mysqli_fetch_array($resTrainings)) //Recorremos los resultados
      {
		  $id = $filaTrainings['id'];
		  $nombre = $filaTrainings['name'];
		  $rango = $filaTrainings['tipo'] == 'atc' ? obtenerRangoAtc($filaTrainings['rating'] + 1) : obtenerRangoPiloto($filaTrainings['rating'] + 1); //Obtenemos el rango  del entrenamiento
		  echo "<option value=\"$id\">$nombre ($rango)</option>\n"; 
      }
      ?>
      </select>
    </div>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/TTAdd.php?enviar=enviar', '.tooltip-demo')" type="submit" class="btn btn-success btn-xs" name="enviar" value="Habilitar">
  </div>
</div>
</fieldset>
</form>
<?
}
?>	