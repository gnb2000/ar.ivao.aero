<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/Schedule.js" type="text/javascript"></script>

<?php
require '../../conexion.php';
require '../../funciones.php';
$ip = $_SERVER['REMOTE_ADDR']; //IP del entrenador. Esto lo usaremos para incluirlo en el registro de cambios.
$examinador = (int)$_COOKIE['vid']; //VID del entrenador

/*
Este script permite al entrenador agregar puntos manualmente.
*/

if(isset($_GET['enviar']))
{
	$id = (int)$_POST['idexamen']; //ID del examen
	$fecha = $_POST['fecha'];
	$atcs = $_POST['atcs'];
	$pilotos = $_POST['pilotos'];
		
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($examinador, 'Se ha agregado asistencia para la fecha $fecha', '$ip')"; //Registramos este cambio
	
	$sql3 = 'INSERT INTO training_points(vid, id_training, points, type) VALUES';
	foreach($atcs as $atc) $sql3 .= "($atc, $id, 1, 'a'),\n";					//Insertamos los miembros seleccionados
	foreach($pilotos as $piloto) $sql3 .= ($id < 300000) ? "($piloto, $id, 2, 'p'),\n" : "($piloto, $id, 1, 'p'),\n";
	
	$sql3 .= "(0, $id, 0, 'x')";
	

	mysqli_multi_query($con, $sql2.'; '.$sql3.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));

	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Puntos registrados correctamente.</div>';
	
}else{
?>                        
                        <h2>Entrenamiento <small> Agregar Asistencia</small></h2>
                        
<br />

<form class="form-horizontal" action="#" method="post" role="form">
<fieldset>

<div class="form-group">
	<label class="col-md-3 control-label" for="idexamen">ID del Examen/Training</label>
	 <div class="col-md-3">
        <input class="form-control input-md" id="idexamen" name="idexamen" placeholder="i.e. 14, 330215..." type="text" required />
	 </div> 
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="fecha">Fecha de Asistencia</label>
    <div class="col-md-3">
        <input onChange="DateChange(this)" autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Controladores</label>
    <div class="col-md-3">
        <select id="selATCs" style="width: 300px;" name="atcs[]" multiple></select>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
	<label class="col-md-3 control-label" for="comments">Pilotos</label>
    <div class="col-md-3">
        <select id="selPilots" style="width: 300px;" name="pilotos[]" multiple></select>
    </div>
</div> 

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('Entrenamiento/PointsAdd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Registrar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?php
}
?>