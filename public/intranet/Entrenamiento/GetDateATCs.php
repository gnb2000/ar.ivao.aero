<?php
require '../../conexion.php';
require '../../funciones.php';

$fecha = $_POST['date']; //Fecha del examen

$resATCs = mysqli_query($con, "SELECT vid, callsign
							   FROM online_atcs
							   WHERE dt BETWEEN DATE_SUB('$fecha', INTERVAL 1 HOUR) AND DATE_ADD('$fecha', INTERVAL 3 HOUR)
							   ")
or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 

while($fila = mysqli_fetch_array($resATCs))
	echo '<option value="'.$fila['vid'].'">'.$fila['callsign'].' '.obtenerNombreUsuario($fila['vid'], $con)."</option>\n";
?>