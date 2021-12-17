<?php

require '../../conexion.php';
require '../../funciones.php';

/*
Este script permite al coordinador cancelar un entrenamiento.
*/

$id = (int)$_GET['id']; //ID de la solicitud de training realizada por el miembro
$trainer = (int)$_GET['t'];
$trainerEmail = obtenerEmailStaff($trainer, $con); //Email del entrenador. Lo usaremos para notificarle de que el entrenamiento ha sido cancelado.

if(isset($_GET['enviar']))
{
	$ip = $_SERVER['REMOTE_ADDR']; //IP del coordinador. Esto lo usaremos para incluirlo en el registro de cambios.
	$vid = (int)$_COOKIE['vid']; //VID del coordinador
	$estado = (int)$_POST['estado']; //Estado final del entrenamiento
	$motivo = $estado == 12 ? 'El miembro no ha contestado o no se ha presentado' : 'Desconocido';

	$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE id = $id"); 
	$filaS = mysqli_fetch_array($resSolicitudes);
	$miembro = $filaS['member'];
	
	$resAbs = mysqli_query($con, "SELECT * FROM trainings_requested WHERE member = $miembro AND state = 12");
	$faltas = mysqli_num_rows($resAbs);
	
	$sql1 = "UPDATE trainings_requested SET state = $estado WHERE id = $id"; //Cambiamos el estado del entrenamiento
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($vid, 'Se ha cancelado la solicitud de entrenamiento $id', '$ip')"; //Registramos este cambio
	if($faltas%2 != 0 && $estado == 12) $sql3 = "INSERT INTO training_penalties(vid) VALUES($miembro);"; //Penalizamos al miembro
	mysqli_multi_query($con, $sql1.'; '.$sql2.';'.$sql3) or die('<p class="alert-danger">Ha habido un error al eliminar la solicitud.</p>'.mysqli_error($con));
	
	$headers = "From: Secretaria Virtual<secretaria@ar.ivao.aero>\r\n".
			   "Cc: $trainerEmail\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br />
			<div style=\"border-bottom: 2px solid #a0a0a0;\"></div>
			<br /><h2>Entrenamiento Cancelado</h2>Lamentamos comunicarle que el departamento ha cancelado su entrenamiento. <br /><br /><br />
			<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Motivo</strong>: ".$motivo."</div>
			<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Solicitud</strong>: $id</div>
			<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Asignada</strong>: ".$filaS['training_date']." UTC</div>
			<br /><br /><br /></body></html>";
	
	mail(obtenerEmailUsuario($miembro, $con), 'Entrenamiento Cancelado', $body, $headers);
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Solicitud cancelada correctamente.<br /><a onClick="mostrarAJAX(\'Entrenamiento/TrainingRequested.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
}
else
{
?>
<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="motivo">Motivo</label>  
  <div class="col-md-4">
      <select id="motivo" name="estado" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <option value="11">Teor&iacute;a Insuficiente</option>
      <option value="12">No Presentado</option>
      <option value="0">Otro</option>
      </select>
    
  </div>
</div><br />

<div style="text-align: center;" class="form-group">
	<input onclick="if(confirm('&iquest;Est&aacute; seguro que desea cancelar este entrenamiento?')) enviarForm('<?php echo "Entrenamiento/RequestDel.php?id=$id&t=$trainer&enviar=enviar"; ?>', '.tooltip-demo')" type="button" class="btn btn-danger btn-xs" name="enviar" value="Cancelar">
</div>
</fieldset>
</form>

<?php
}
?>