<?php
require '../../conexion.php';
require '../../funciones.php';
$vid = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['enviar']))
{
	$UserVid = $_POST['vid'];
	$Nota = $_POST['nota'];
	$Fecha = date('Y-m-d');
	$StaffVid = $_COOKIE['vid'];
	
	$sql1 = "INSERT INTO internal_notes(UserVid, StaffVid, Date, Note) VALUES($UserVid, $StaffVid, '$Fecha', '$Nota')";
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha agregado una nota de usuario', '$ip')";
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Nota registrada correctamente.</div>';
	
}else{
?>                        
                        <h2>Notas <small> Internas</small></h2>

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="alumno">Usuario</label>  
  <div class="col-md-4">
      <select id="alumno" name="vid" class="form-control input-md" required>
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
	<label class="col-md-4 control-label" for="nota">Nota</label>
    <div class="col-md-4">
        <input class="form-control input-md" id="nota" name="nota" type="text" required />
    </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Miembros/AddNote.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>