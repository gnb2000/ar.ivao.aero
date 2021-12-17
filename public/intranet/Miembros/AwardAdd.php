<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="/js/GCA.js" type="text/javascript" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del staff. Esto lo usaremos para incluirlo en el registro de cambios.
$staff = (int)$_COOKIE['vid']; //VID del staff

/*
Este script permite al coordinador asignar una medalla.
*/

if(isset($_GET['enviar']))
{
	$vid = (int)$_POST['vid']; //VID del miembro
	$award = $_POST['award']; //Medalla
	$texto = $_POST['detalles']; //Comentarios
	$hoy = date('Y-m-d');
			
	$sql1 = "INSERT INTO award_to_user(vid, award, comments) VALUES($vid, '$award', '$texto')";
		
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha asignado la medalla $award a $vid', '$ip')"; //Registramos este cambio

	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
			   "Cc: m-dep@ar.ivao.aero\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Medalla asignada</h2>Enhorabuena! Le informamos que se le ha asignado una nueva medalla. Para m&aacute;s info, consulte su perfil. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Medalla</strong>: $award</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID</strong>: $vid</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $hoy</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><br /><br /><br /></body></html>";

	mail(obtenerEmailUsuario($vid, $con), 'Medalla asignada', $body, $headers);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Medalla asignada correctamente.</div>';
	
}else{
?>                        
                        <h2>Miembros <small> Nueva Medalla</small></h2>
                        
<br />
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="vid">Miembro</label>  
	  <div class="col-md-4">
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
	  <label class="col-md-4 control-label" for="award">Medalla</label>  
	  <div class="col-md-4">
		  <select id="award" name="award" class="form-control input-md" required>
		  <option value="">Seleccionar...</option>
		  <?php
		  $resPos = mysqli_query($con, "SELECT * FROM awards WHERE name <> ''");
		  while($filaPos = mysqli_fetch_array($resPos))
		  {
			  $code = $filaPos['code'];
			  $nombreAward = $filaPos['name'];
			  echo "<option value=\"$code\">$code - $nombreAward</option>\n";
		  }
		  ?>
		 </select>

	  </div>
	</div>


<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Comentarios</label><br />
  <br />
  <center><textarea rows="8" cols="60" id="detalles" name="detalles"></textarea></center>
</div>


<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Miembros/AwardAdd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Asignar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>