<?php
require '../../conexion.php'; 
require '../../funciones.php';

$fecha1 = $_POST['f1'];
$fecha2 = $_POST['f2'];

?>
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde que las horas se muestran en horario UTC.</div>
<br />
<h2>Vuelos <small> Separado por dia</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Dia de la Semana</td>
			<td>Promedio de vuelos</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$res = mysqli_query($con, "SELECT Weekday, WD_id, AVG(Count) AS Cuenta FROM CountFlights WHERE (IntStart BETWEEN '$fecha1' AND '$fecha2') AND (IntFinish BETWEEN '$fecha1' AND '$fecha2') GROUP BY WD_id ORDER BY WD_id ASC") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo 
					'<tr>
						<td>'.$fila['Weekday'].'</a></td>
						<td>'.round($fila['Cuenta']).'</td>
					</tr>';
			}
		?>
	</tbody>
</table>
<center>
<div id="byWeekday" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byWeekday',
	data: [
<?php
		$res = mysqli_query($con, "SELECT Weekday, WD_id, AVG(Count) AS Cuenta FROM CountFlights WHERE (IntStart BETWEEN '$fecha1' AND '$fecha2') AND (IntFinish BETWEEN '$fecha1' AND '$fecha2') GROUP BY 2 ORDER BY 2");
		$countrecs = mysqli_num_rows($res);
		
	for($i = 0; $fila = mysqli_fetch_array($res); $i++)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$fila['Weekday'].'", a:'.round($fila['Cuenta']).' },';
		else
			echo '{ y: "'.$fila['Weekday'].'", a:'.round($fila['Cuenta']).' }';
	}
?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script> <br />


<h2>Vuelos <small> Separado por hora</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Intervalo</td>
			<td>Vuelos</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$res = mysqli_query($con, "SELECT Inter, AVG(Count) AS Cuenta FROM CountFlights WHERE (IntStart BETWEEN '$fecha1' AND '$fecha2') AND (IntFinish BETWEEN '$fecha1' AND '$fecha2') GROUP BY Inter ORDER BY Inter") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo 
					'<tr>
						<td>'.$fila['Inter'].'</a></td>
						<td>'.round($fila['Cuenta']).'</td>
					</tr>';
			}
		?>
	</tbody>
</table>
<center>
<div id="byInterval" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byInterval',
	data: [
<?php
		$res = mysqli_query($con, "SELECT Inter, AVG(Count) AS Cuenta FROM CountFlights WHERE (IntStart BETWEEN '$fecha1' AND '$fecha2') AND (IntFinish BETWEEN '$fecha1' AND '$fecha2') GROUP BY 1 ORDER BY 1");
		$countrecs = mysqli_num_rows($res);
		
	for($i = 0; $fila = mysqli_fetch_array($res); $i++)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$fila['Inter'].'", a:'.round($fila['Cuenta']).' },';
		else
			echo '{ y: "'.$fila['Inter'].'", a:'.round($fila['Cuenta']).' }';
	}
?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script>