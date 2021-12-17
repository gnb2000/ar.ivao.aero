<?php
require '../../conexion.php'; 
require '../../funciones.php';

if(isset($_GET['enviar'])) 
{
		if($_POST['idevento'] != '')
		{
			$idevento = $_POST['idevento'];

			$resUsers = mysqli_query($con, "SELECT * FROM events WHERE id = $idevento");
			$filaUsers = mysqli_fetch_array($resUsers);

			$fecha1 = $filaUsers['start_date'];
			$fecha2 = $filaUsers['end_date'];

			?>

	<h2>Eventos <small> Participaci&oacute;n en eventos</small></h2>
	<br />
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr class="bg-primary2">
				<td>Aerol&iacute;nea</td>
				<td>Vuelos</td>
			</tr>
		</thead>
		<tbody>
			<?php
				
				$res = mysqli_query($con, "
										  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
											FROM online_flights of, va_list vl
											WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
											AND (date BETWEEN '$fecha1' AND '$fecha2')
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
<?php
				$res = mysqli_query($con, "
										  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
											FROM online_flights of, va_list vl
											WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
											AND (date BETWEEN '$fecha1' AND '$fecha2')
											GROUP BY airline
											ORDER BY cuenta DESC
											") or die(mysqli_error($con));
			$countrecs = mysqli_num_rows($res);

		for($i = 0; $fila = mysqli_fetch_array($res); $i++)
		{
			if($i < $countrecs - 1)
				echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' },';
			else
				echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' }';
		}
?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Online Flights'],
		xLabelAngle: 90
		});
	</script>
	

<?php
} 
else if($_POST['idexamen'] != '')
{
	$idexamen = $_POST['idexamen'];

			$resUsers = mysqli_query($con, "SELECT * FROM exams WHERE id = $idexamen");
			$filaUsers = mysqli_fetch_array($resUsers);

			$fecha1 = $filaUsers['date'];
			$fecha2 = date('Y-m-d H:i:s', strtotime($fecha1) + 7200);

			?>

	<h2>Entrenamiento <small> Participaci&oacute;n en ex&aacute;menes</small></h2>
	<br />
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr class="bg-primary2">
				<td>Aerol&iacute;nea</td>
				<td>Vuelos</td>
			</tr>
		</thead>
		<tbody>
			<?php
				
				$res = mysqli_query($con, "
										  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
											FROM online_flights of, va_list vl
											WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
											AND (date BETWEEN '$fecha1' AND '$fecha2')
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
<?php
				$res = mysqli_query($con, "
										  SELECT SUBSTRING(of.callsign,1,3) AS airline, COUNT(of.callsign) AS cuenta
											FROM online_flights of, va_list vl
											WHERE (vl.CallICAO = SUBSTRING(of.callsign,1,3))
											AND (date BETWEEN '$fecha1' AND '$fecha2')
											GROUP BY airline
											ORDER BY cuenta DESC
											") or die(mysqli_error($con));
			$countrecs = mysqli_num_rows($res);

		for($i = 0; $fila = mysqli_fetch_array($res); $i++)
		{
			if($i < $countrecs - 1)
				echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' },';
			else
				echo '{ y: "'.$fila['airline'].'", a:'.$fila['cuenta'].' }';
		}
?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Online Flights'],
		xLabelAngle: 90
		});

</script>

<?php } } else { ?>

<h2>Informaci&oacute;n de VA&apos;s <small> Reporte de Participaci&oacute;n</small></h2>
<br />
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde seleccionar las fechas en el sistema UTC.</div>
<form class="form-horizontal" action="#" method="post" role="form">
	<fieldset>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="idev">Evento</label>
			<div class="col-md-4">
				<select id="idev" name="idevento" class="form-control input-md" required>
					  <option value="">Seleccionar...</option>
					  <?php
					  $resUsers = mysqli_query($con, "SELECT * FROM events WHERE start_date > '2017-03-01 00:00:00' ORDER BY id DESC");
					  while($filaUsers = mysqli_fetch_array($resUsers))
					  {
						  $idev = $filaUsers['id'];
						  $nombre = $filaUsers['name'];
						  echo "<option value=\"$idev\">$nombre</option>\n"; 
					  }
					  ?>
				 </select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="idex">Examen</label>
			<div class="col-md-4">
				<select id="idex" name="idexamen" class="form-control input-md" required>
					  <option value="">Seleccionar...</option>
					  <?php
					  $resUsers = mysqli_query($con, "SELECT * FROM exams WHERE exam >= 4 ORDER BY date DESC LIMIT 20");
					  while($filaUsers = mysqli_fetch_array($resUsers))
					  {
						  $idex = $filaUsers['id'];
						  echo "<option value=\"$idex\">$idex</option>\n"; 
					  }
					  ?>
				 </select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4">
				<input onclick="enviarForm('OpsVuelo/EventPart.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Enviar">
				<input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
			</div>
		</div>
	</fieldset>
</form>

<?php } ?>