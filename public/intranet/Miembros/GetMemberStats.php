<?php
require '../../conexion.php';
require '../../funciones.php';
$columna = $_GET['column'];

$sqlstats = "SELECT * FROM statistics";
$resultstats = mysqli_query($con, $sqlstats);
$countstats = mysqli_num_rows($resultstats);

$lista = array();
while($rowstats = mysqli_fetch_array($resultstats))
	$lista[] = array('date' => $rowstats['Date'], 'value' => $rowstats[$columna]);

echo json_encode($lista);
?>