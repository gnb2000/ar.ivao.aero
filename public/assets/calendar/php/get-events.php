<?php
header('Content-Type: application/json');
require '/var/www/vhosts/ar.ivao.aero/httpdocs/public/conexion.php'; 
require '/var/www/vhosts/ar.ivao.aero/httpdocs/public/funciones.php';


$start = str_replace('T', ' ', $_GET['start']); $end = str_replace('T', ' ', $_GET['end']);

$resEntrenamientos = mysqli_query($con, "SELECT * FROM trainings_requested WHERE training_date BETWEEN '$start' AND '$end'") or die('<p class="alert-danger">Error al consultar la base de datos1.</p>'.mysqli_error($con));
$resExamenes = mysqli_query($con, "SELECT * FROM exams WHERE date BETWEEN '$start' AND '$end'") or die('<p class="alert-danger">Error al consultar la base de datos2.</p>'.mysqli_error($con));
$resReuniones = mysqli_query($con, "SELECT * FROM meetings WHERE date BETWEEN '$start' AND '$end'") or die('<p class="alert-danger">Error al consultar la base de datos3.</p>'.mysqli_error($con));
$resEventos = mysqli_query($conTERS, "SELECT * FROM events WHERE start_date BETWEEN '$start' AND '$end'") or die('<p class="alert-danger">Error al consultar la base de datos4.</p>'.mysqli_error($con)); 

$eventos = array();

while($training = mysqli_fetch_array($resEntrenamientos))
{
	if(substr($training['atc_position'], 0, 2) == 'SA');
		$eventos[] = array(
							'start' => str_replace(' ', 'T', $training['training_date']),
							'title' => 'Entrenamiento ATC',
							'color' => 'green',
							'url' => '#');
}

while($examen = mysqli_fetch_array($resExamenes))
{
	if($examen['exam'] >= 4)
	{
		$posicion = $examen['position'];
		
		$rango = '';
		if($examen['exam'] == 4) $rango = 'ADC';
		else if($examen['exam'] == 5) $rango = 'APC';
		else if($examen['exam'] == 6) $rango = 'ACC';
		$eventos[] = array(
							'start' => str_replace(' ', 'T', $examen['date']),
							'title' => 'Examen '.$rango.' en '.$posicion,
							'color' => '#337ab7',
							'url' => '#');
	}
}

if($_COOKIE['isStaff']) while($reunion = mysqli_fetch_array($resReuniones)) 
{
	$eventos[] = array(
						'start' => str_replace(' ', 'T', $reunion['date']),
						'title' => 'Reunion Staff',
						'color' => 'red',
						'url' => '#');
}

while($evento = mysqli_fetch_array($resEventos))
{
	$eventos[] = array(
						'start' => str_replace(' ', 'T', $evento['start_date']),
						'end' => str_replace(' ', 'T', $evento['end_date']),
						'title' => $evento['name'],  'color' => 'orange',
						'url' => 'https://ters.ar.ivao.aero/events/'.$evento['id']);
}


// Send JSON to the client. 
echo json_encode($eventos);

?>