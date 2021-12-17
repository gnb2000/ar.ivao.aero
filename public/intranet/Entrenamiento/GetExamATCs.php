<?php
require '../../conexion.php';
require '../../funciones.php';

$id = (int)$_POST['id']; //ID del examen

$resATCs = mysqli_query($con, "SELECT oa.vid AS 'vid', oa.callsign AS 'callsign' 
							   FROM online_atcs oa, exams e
							   WHERE oa.dt BETWEEN DATE_SUB(e.dt, INTERVAL 1 HOUR) AND DATE_ADD(e.dt, INTERVAL 3 HOUR)
							   AND e.id = $id")
or die('<p class="alert-danger">Ha habido un error al consultar la base de datos.</p>'.mysqli_error($con)); 

while($fila = mysqli_fetch_array($resATCs))
	echo '<option value="'.$fila['vid'].'">'.$fila['callsign'].' '.obtenerNombreUsuario($fila['vid'], $con)."</option>\n";
?>