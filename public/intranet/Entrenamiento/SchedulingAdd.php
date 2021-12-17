<?php
require '../../conexion.php';
require '../../funciones.php';
$vid = (int)$_COOKIE['vid'];

/*
Este es script permite al entrenador introducir su disponibilidad horaria.
*/

$resDisponibilidad = mysqli_query($con, "SELECT * FROM trainer_availability WHERE trainer = $vid");
if(mysqli_num_rows($resDisponibilidad) > 0) mysqli_query($con, "DELETE FROM trainer_availability WHERE trainer = $vid");
//Si el entrenador ya ha introducido su disponibilidad, la eliminamos para poder introducir la nueva.

$dias = array($_POST['lunes'], $_POST['martes'], $_POST['miercoles'], $_POST['jueves'], $_POST['viernes'], $_POST['sabado'], $_POST['domingo']);

$i = 0; //Con esta variable, iremos avanzando en la semana (Lunes = 0, Martes = 1, Miercoles = 2...)
foreach($dias as $dia) //Recorremos los dias
{
	foreach($dia as $fila) //Recorremos los rangos horarios
	{
		$horaInicio = $fila[0];
		$horaFin = $fila[1];
		
		if($horaInicio != $horaFin) mysqli_query($con, "INSERT INTO trainer_availability(trainer, dia, hora_inicio, hora_fin) VALUES($vid, $i, '$horaInicio', '$horaFin')") or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos el dia $i.</p>'.mysqli_error($con));
	}
	
	$i++;
}
	
echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Horario actualizado correctamente.</div>';
?>