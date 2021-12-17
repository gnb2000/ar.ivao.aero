<?php
require '../../conexion.php';
require '../../funciones.php';

$fecha = $_POST['date']; //Fecha del examen

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$resPilotos = mysqli_query($con, 
						   "SELECT vid, callsign
						   FROM training_flights
						   WHERE
						   conn_time BETWEEN DATE_SUB('$fecha', INTERVAL 1 HOUR) AND DATE_ADD('$fecha', INTERVAL 2 HOUR)
						   OR disc_time BETWEEN '$fecha' AND DATE_ADD('$fecha', INTERVAL 3 HOUR)")
or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 

while($fila = mysqli_fetch_array($resPilotos))
	echo '<option value="'.$fila['vid'].'">'.$fila['callsign'].' '.obtenerNombreUsuario($fila['vid'], $con)."</option>\n";
?>