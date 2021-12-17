<?php
/*
Este script muestra una tabla con los entrenamientos completados (estado = 6).
*/

require '../../conexion.php';
require '../../funciones.php';
?>                        
             
              <h2>Entrenamiento <small> Entrenamientos Completados</small></h2>
                        
<br />

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="alumno">Miembro</label>  
  <div class="col-md-3">
      <select id="alumno" name="vid" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <?php
      $resUsers = mysqli_query($con, 'SELECT DISTINCT member FROM trainings_requested ORDER BY member');
      while($filaUsers = mysqli_fetch_array($resUsers))
      {
		  $vid = $filaUsers['member'];
		  $nombre = obtenerNombreUsuario($vid, $con);
		  echo "<option value=\"$vid\">$vid - $nombre</option>\n"; 
      }
      ?>
      </select>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/CompletedTrainings.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="OK">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
