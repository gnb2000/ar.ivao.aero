<script type="text/javascript">
	$.datetimepicker.setLocale('es');
	$('#fechainicio').datetimepicker({timepicker: false, format: 'Y-m-d', minDate: '2017-03-01 00:00:00'});
	$('#fechafin').datetimepicker({timepicker: false, format: 'Y-m-d', minDate: '2017-03-01 00:00:00'});
</script>

<?php
	require '../../conexion.php'; 
	require '../../funciones.php';
	
	if(isset($_GET['enviar'])) 
	{
		$fecha1 = $_POST['f1'].' 00:00';
		$fecha2 = $_POST['f2'].' 00:00';
		$limit = $_POST['limit'];

		?>
<h2>Totales <small> Estad&iacute;sticas Totales</small></h2>
<br />
<div class="alert alert-danger" role="alert"><strong>Atenci&oacute;n!</strong> No hay información disponible del periodo entre 14/04/2017 y 02/05/2017.</div>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td></td>
            <td>Totales</td>
			<td>Nacionales</td>
            <td>Internacionales</td>
		</tr>
	</thead>
	<tbody>
		<?
			$res = mysqli_query($con, "SELECT COUNT(*) AS cuenta FROM online_flights WHERE origen LIKE 'SA%' AND destino LIKE 'SA%' AND (fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 00:00:00')") or die(mysqli_error($con));
			$filaVuelosN = mysqli_fetch_array($res);
			$res = mysqli_query($con, "SELECT COUNT(*) AS cuenta FROM online_flights WHERE (origen NOT LIKE 'SA%' OR destino NOT LIKE 'SA%') AND (fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 00:00:00')") or die(mysqli_error($con));
			$filaVuelosI = mysqli_fetch_array($res);
			$res = mysqli_query($con, "SELECT SUM(online) AS suma FROM online_flights WHERE origen LIKE 'SA%' AND destino LIKE 'SA%' AND (fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 00:00:00')") or die(mysqli_error($con));
			$filaHorasN = mysqli_fetch_array($res);
			$res = mysqli_query($con, "SELECT SUM(online) AS suma FROM online_flights WHERE (origen NOT LIKE 'SA%' OR destino NOT LIKE 'SA%') AND (fecha BETWEEN '$fecha1 00:00:00' AND '$fecha2 00:00:00')") or die(mysqli_error($con));
			$filaHorasI = mysqli_fetch_array($res);
			
			$vuelosTotales = $filaVuelosN['cuenta'] + $filaVuelosI['cuenta'];
			$horasTotales = $filaHorasN['suma'] + $filaHorasI['suma'];
		
			echo 
				'<tr>
					<td>Vuelos</td>
					<td>'.$vuelosTotales.'</td>
					<td>'.$filaVuelosN['cuenta'].'</td>
					<td>'.$filaVuelosI['cuenta'].'</td>
				</tr>
				<tr>
					<td>Horas</td>
					<td>'.obtenerHorasMinutos($horasTotales).'</td>
					<td>'.obtenerHorasMinutos($filaHorasN['suma']).'</td>
					<td>'.obtenerHorasMinutos($filaHorasI['suma']).'</td>
				</tr>';
			
		?>
	</tbody>
</table><br />
        
<h2>Aeropuertos <small> Separado por Aeropuerto</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Aeropuerto</td>
			<td>Horas</td>
		</tr>
	</thead>
	<tbody>
		<?
			$res = mysqli_query($con, "SELECT ae.icao AS icao, SUM(of.online) AS suma FROM online_flights of, aeropuertos ae WHERE (of.origen = ae.icao OR of.destino = ae.icao) AND ae.icao LIKE 'SA%' AND (fecha BETWEEN '$fecha1' AND '$fecha2') GROUP BY ae.icao ORDER BY SUM(of.online) DESC LIMIT $limit") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo 
					'<tr>
						<td>'.$fila['icao'].'</td>
						<td>'.obtenerHorasMinutos($fila['suma']).'</td>
					</tr>';
			}
		?>
	</tbody>
</table>
<center>
<div id="byFIR" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byFIR',
	data: [
	<?
		$res = mysqli_query($con, "SELECT ae.icao AS icao, SUM(of.online) AS suma FROM online_flights of, aeropuertos ae WHERE (of.origen = ae.icao OR of.destino = ae.icao) AND ae.icao LIKE 'SA%' AND (fecha BETWEEN '$fecha1' AND '$fecha2') GROUP BY ae.icao ORDER BY SUM(of.online) DESC LIMIT 5") or die(mysqli_error($con));
		$countrecs = mysqli_num_rows($res);
		
		$i = 1;
		while($fila = mysqli_fetch_array($res))
		{
			if($i < $countrecs) echo '{ y: "'.$fila['icao'].'", a:'.floor($fila['suma'] / 3600).' },';
			else 				echo '{ y: "'.$fila['icao'].'", a:'.floor($fila['suma'] / 3600).' }';
			
			$i++;
		}
	?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	});
</script><br />

<h2>Pilotos <small> Separado por piloto</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Piloto</td>
			<td>Horas</td>
		</tr>
	</thead>
	<tbody>
		<?php
			$res = mysqli_query($con, "SELECT vid, SUM(online) AS suma FROM online_flights WHERE (fecha BETWEEN '$fecha1' AND '$fecha2') GROUP BY vid ORDER BY SUM(online) DESC LIMIT $limit") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				$VID = $fila['vid'];
				echo 
					'<tr>
						<td><a href="https://www.ivao.aero/Member.aspx?Id='.$VID.'" target="_blank">'.$VID.'</a></td>
						<td>'.obtenerHorasMinutos($fila['suma']).'</td>
					</tr>';
			}
		?>
	</tbody>
</table>
<center>
<div id="byPosition" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byPosition',
	data: [
	<?
		$res = mysqli_query($con, "SELECT vid, SUM(online) AS suma FROM online_flights WHERE (fecha BETWEEN '$fecha1' AND '$fecha2') GROUP BY vid ORDER BY SUM(online) DESC LIMIT 5");
		$countrecs = mysqli_num_rows($res);
		
		$i = 1;
		while($fila = mysqli_fetch_array($res))
		{
			if($i < $countrecs) echo '{ y: "'.$fila['vid'].'", a:'.floor($fila['suma'] / 3600).' },';
			else 				echo '{ y: "'.$fila['vid'].'", a:'.floor($fila['suma'] / 3600).' }';
			
			$i++;
		}
	?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script> <br />

<h2>Dom&eacute;sticos <small> Vuelos Nacionales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Origen</td>
            <td>Destino</td>
			<td>Vuelos</td>
		</tr>
	</thead>
	<tbody>
		<?php
			/*
			
			*/
			$res = mysqli_query($con, "
									  SELECT origen, destino, COUNT(*) AS cuenta
										FROM online_flights
										WHERE origen LIKE 'SA%' AND destino LIKE 'SA%'
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY origen, destino
										ORDER BY cuenta DESC
										LIMIT $limit
									  ") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo '<tr>
					<td>'.$fila['origen'].'</td>
					<td>'.$fila['destino'].'</td>
					<td>'.$fila['cuenta'].'</td>
				</tr>';
			}
		?>
	</tbody>
</table>
<center>
<div id="byVID" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byVID',
	data: [
	<?
		$res = mysqli_query($con, "
									  SELECT origen, destino, COUNT(*) AS cuenta
										FROM online_flights
										WHERE origen LIKE 'SA%' AND destino LIKE 'SA%'
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY origen, destino
										ORDER BY cuenta DESC
										LIMIT 5
									  ") or die(mysqli_error($con));
		$countrecs = mysqli_num_rows($res);
		
		$i = 1;
		while($fila = mysqli_fetch_array($res))
		{
			if($i < $countrecs) echo '{ y: "'.$fila['origen'].'-'.$fila['destino'].'", a:'.$fila['cuenta'].' },';
			else 				echo '{ y: "'.$fila['origen'].'-'.$fila['destino'].'", a:'.$fila['cuenta'].' }';
			
			$i++;
		}
	?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Flights'],
	xLabelAngle: 90
	});
</script><br />

<h2>Internacionales <small> Vuelos Internacionales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Origen</td>
            <td>Destino</td>
			<td>Vuelos</td>
		</tr>
	</thead>
	<tbody>
		<?php
			/*
			
			*/
			$res = mysqli_query($con, "
									  SELECT origen, destino, COUNT(*) AS cuenta
										FROM online_flights
										WHERE (origen NOT LIKE 'SA%' OR destino NOT LIKE 'SA%')
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY origen, destino
										ORDER BY cuenta DESC
										LIMIT $limit
									  ") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo '<tr>
					<td>'.$fila['origen'].'</td>
					<td>'.$fila['destino'].'</td>
					<td>'.$fila['cuenta'].'</td>
				</tr>';
			}
		?>
	</tbody>
</table><br />
<center>
<div id="byVID2" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byVID2',
	data: [ 
	<?
		$res = mysqli_query($con, "
									  SELECT origen, destino, COUNT(*) AS cuenta
										FROM online_flights
										WHERE (origen NOT LIKE 'SA%' OR destino NOT LIKE 'SA%')
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY origen, destino
										ORDER BY cuenta DESC
										LIMIT 5
									  ") or die(mysqli_error($con));
		$countrecs = mysqli_num_rows($res);
		
		$i = 1;
		while($fila = mysqli_fetch_array($res))
		{
			if($i < $countrecs) echo '{ y: "'.$fila['origen'].'-'.$fila['destino'].'", a:'.$fila['cuenta'].' },';
			else 				echo '{ y: "'.$fila['origen'].'-'.$fila['destino'].'", a:'.$fila['cuenta'].' }';
			
			$i++;
		}
	?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Flights'],
	xLabelAngle: 90
	});
</script><br>

<h2>Aerol&iacute;neas <small> Separado por aerol&iacute;nea</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>Origen</td>
            <td>Destino</td>
			<td>Vuelos</td>
		</tr>
	</thead>
	<tbody>
		<?php
			/*
			
			*/
			$res = mysqli_query($con, "
									  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
										FROM online_flights of, va_list vl
										WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY airline
										ORDER BY cuenta DESC
										") or die(mysqli_error($con));
			
			while($fila = mysqli_fetch_array($res))
			{
				echo '<tr>
					<td>'.$fila['airline'].'</td>
					<td>'.$fila['cuenta'].'</td>
				</tr>';
			}
		?>
	</tbody>
</table><br />
<center>
<div id="byVID3" style="height: 350px; width: 90%;"></div>
</center>
<script> 

new Morris.Bar({
	element: 'byVID3',
	data: [ 
	<?
			$res = mysqli_query($con, "
									  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
										FROM online_flights of, va_list vl
										WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
										AND (fecha BETWEEN '$fecha1' AND '$fecha2')
										GROUP BY airline
										ORDER BY cuenta DESC
										") or die(mysqli_error($con));
		$countrecs = mysqli_num_rows($res);
		
		$i = 1;
		while($fila = mysqli_fetch_array($res))
		{
			if($i < $countrecs) echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' },';
			else 				echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' }';
			
			$i++;
		}
	?>
	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Flights'],
	xLabelAngle: 90
	});
</script>