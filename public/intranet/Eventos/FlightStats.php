<?php
require '../../conexion.php'; 

$fecha1 = $_POST['f1'];
$fecha2 = $_POST['f2'];
$aeropuerto = $_POST['icao'];
		
?>
<h2>Eventos <small> Vuelos Totales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Vuelo</td>
			<td>Total</td>
		</tr>
	</thead>
	<tbody>
		<?php 
			$res = mysqli_query($con, "SELECT
COUNT(*) AS total,
 departure,
 destination
 FROM online_flights
 WHERE (date BETWEEN '$fecha1' AND '$fecha2') AND (departure = '$aeropuerto' OR destination = '$aeropuerto')
 GROUP BY departure, destination 
 ORDER BY 1 DESC") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{

						echo'<tr>
							<td>'.$fila['departure'].' - '.$fila['destination'].'</td>
							<td>'.$fila['total'].'</td>
						</tr>';
			}
			?>
	</tbody>
</table>
<center>
<div id="byFIR" style="height: 350px; width: 90%;"></div>
</center>
<script> new Morris.Bar({
	element: 'byFIR',
	data: [
	<?php
			$res = mysqli_query($con, "SELECT
COUNT(*) AS total,
 departure,
 destination
 FROM online_flights
 WHERE (date BETWEEN '$fecha1' AND '$fecha2') AND (departure = '$aeropuerto' OR destination = '$aeropuerto')
 GROUP BY departure, destination 
 ORDER BY 1 DESC") or die(mysqli_error($con));
 
			$countrecs = mysqli_num_rows($res);
		
			for($i = 1; $fila = mysqli_fetch_array($res); $i++)
			{
				if($i < $countrecs)
					echo '{ y: "'.$fila['departure'].' - '.$fila['destination'].'", a:'.$fila['total'].' },';
				else
					echo '{ y: "'.$fila['departure'].' - '.$fila['destination'].'", a:'.$fila['total'].' }';
			}
		?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Flights'],
	xLabelAngle: 45
	});
</script>