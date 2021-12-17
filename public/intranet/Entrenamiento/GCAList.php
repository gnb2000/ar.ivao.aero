<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();

$resGCA = mysqli_query($con, "SELECT * FROM gca");
while($filaG = mysqli_fetch_array($resGCA))
{	
	$vid = $filaG['Vid'];
	$nombre = $filaG['name'];
	$rango = $filaG['rating'];
	$comments = $filaG['comments'] != '' ? $filaG['comments'] : 'N/A';
	
	if($rango == 'ADC') $rango = 5;
	else if($rango == 'APC') $rango = 6;
	else $rango = 7;

$atcs[] =
		'<tr style="text-align: center;">
		 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.$nombre.'</a></td>
		 <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$rango.'.gif" alt="rango" title="'.$filaG['rating'].'"></td>
		 <td>'.date('d-m-Y', strtotime($filaG['accept_date'].'00:01')).'</td>
		 <td>'.$filaG['comments'].'</td>
		 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este GCA?\')) mostrarAJAX(\'Entrenamiento/GCADel.php?id='.$vid.'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
		</tr>';
}
?>

<!-- INICIO CONTENIDO -->

<h2 id="cacaculopis">Entrenamiento <small> GCA</small></h2>

<div class="separacion-tablas"></div>						


<div style="margin-top: 15px;"></div>

 <!-- ==================================================================== -->
<a style="float:right;" onClick="mostrarAJAX('Entrenamiento/GCAAdd.php', '.tooltip-demo')" data-original-title="Agregar" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
 <table class="table table-hover">

	<thead class="thead-dark">
		<tr style="text-align: center" class="bg-primary2">
		  <td>Miembro</td>
		  <td>Rango</td>
		  <td>Fecha Aceptaci&oacute;n</td>
		  <td>Posiciones Adicionales</td>
		 <td></td>
		</tr>
	 </thead>

	 <tbody>
		<?php 

		  if(count($atcs) > 0) 
			  foreach($atcs as $atc) echo $atc; 

		?>
	 </tbody>
 </table>

<!-- ............................................................................................... -->

 <hr style="margin-bottom: 50px;" />

<h2 id="cacaculopis2">Entrenamiento <small> Horas Mensuales (&Uacute;ltimos 3 meses)</small></h2>

<div class="separacion-tablas"></div>						

<div style="margin-top: 15px;"></div>

	<table class="table table-hover">

		<thead class="thead-dark">
			<tr style="text-align: center;" class="bg-primary2">
			  <td>Miembro</td>
			  <td>Mes</td>
			  <td>Horas</td>
			  <td>Horas Cumplidas</td>
			</tr>
		 </thead>

		 <tbody>
	 
<?php
$resGCA = mysqli_query($con, "SELECT * FROM gca");
while($filaG = mysqli_fetch_array($resGCA))
{	
	$vid = $filaG['Vid'];
	$nombre = $filaG['name'];
	
	$resTime = mysqli_query($con, "
									SELECT SUM(online) AS suma, CONCAT(YEAR(date), '-', MONTH(date)) AS fecha
									FROM online_atcs 
									WHERE vid = $vid 
									AND date > DATE_SUB(NOW(), INTERVAL 4 MONTH)
									AND MONTH(date) <> MONTH(NOW())
									GROUP BY YEAR(date), MONTH(date)
									ORDER BY YEAR(date), MONTH(date) DESC");
	
	
	while($filaT = mysqli_fetch_array($resTime))
	{
		$fechaArray = explode('-', $filaT['fecha']);
		$fecha = obtenerNombreMes($fechaArray[1]).' '.$fechaArray[0];
		$horasCumplidas = $filaT['suma'] > 13000 ? '<i class="fas fa-check-square alert-success"></i>' : '<i class="fas fa-times-circle alert-danger"></i>';
		
		echo
			'<tr style="text-align: center;">
			 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.$nombre.'</a></td>
			 <td>'.$fecha.'</td>
			 <td>'.obtenerHorasMinutos($filaT['suma']).'</td>
			 <td>'.$horasCumplidas.'</td>
			</tr>';
	}
}
?>

</tbody>
 </table>

<!-- ............................................................................................... -->

 <hr style="margin-bottom: 50px;" />

<h2 id="cacaculopis2">Entrenamiento <small> Conexiones no autorizadas (&Uacute;ltimos 6 meses)</small></h2>

<div class="separacion-tablas"></div>						

<div style="margin-top: 15px;"></div>

	<table class="table table-hover">

		<thead class="thead-dark">
			<tr class="bg-primary2">
			  <td>Miembro</td>
			  <td>Posici&oacute;n</td>
			  <td>Online</td>
			  <td>Desconexi&oacute;n</td>
			</tr>
		 </thead>

		 <tbody>
	 
<?php
$resGCA = mysqli_query($con, "SELECT * FROM gca");
while($filaG = mysqli_fetch_array($resGCA))
{	
	$vid = $filaG['Vid'];
	$nombre = $filaG['name'];
	$rango = $filaG['rating'];
	
	$restricciones = $filaG['comments'] != '' ? explode('|', $filaG['comments']) : '';
	
	$restriccionesSQL = '';
	if($restricciones != '')
		foreach($restricciones as $rest) $restriccionesSQL .= "AND callsign NOT LIKE '$rest%' ";
	
	if($rango == 'ADC') $sqlPos = "'DEL', 'GND', 'TWR'";
	else if($rango == 'APC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP'";
	else if($rango == 'ACC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP', 'CTR'";
	
	$resTime = mysqli_query($con, "
									SELECT *
									FROM online_atcs 
									WHERE vid = $vid
									AND online > 300
									AND SUBSTRING(callsign, -3) NOT IN ($sqlPos)
									$restriccionesSQL
									AND date > DATE_SUB(NOW(), INTERVAL 6 MONTH)
									ORDER BY date DESC");

	
	if(mysqli_num_rows($resTime) > 0)
	{
		while($filaT = mysqli_fetch_array($resTime))	
			echo
			'<tr>
			 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.$nombre.'</a></td>
			 <td>'.$filaT['callsign'].'</td>
			 <td>'.obtenerHorasMinutos($filaT['online']).'</td>
			 <td>'.$filaT['date'].' UTC</td>
			</tr>';
	}
}
?>

</tbody>
 </table>

<!-- FINAL CONTENIDO -->