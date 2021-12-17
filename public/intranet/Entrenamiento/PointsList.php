<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();
$pilotos = array();

$resP = mysqli_query($con, "SELECT vid, type, SUM(points) AS 'suma' FROM training_points WHERE vid <> 0 GROUP BY vid, type");
while($filaP = mysqli_fetch_array($resP))
{	
	$vid = $filaP['vid'];
	if($filaP['type'] == 'a')
	{
		$atcs[] =
			'<tr style="text-align: center;">
			 <td><a target="_blank" href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.obtenerNombreUsuario($vid, $con).'</a></td>
			 <td>'.$filaP['suma'].'</td>
			 </tr>';
	}
	else if($filaP['type'] == 'p')
	{
		$pilotos[] =
			'<tr style="text-align: center;">
			 <td><a target="_blank" href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.obtenerNombreUsuario($vid, $con).'</a></td>
			 <td>'.$filaP['suma'].'</td>
			 </tr>';
	}
}
?>

<!-- INICIO CONTENIDO -->

<h2 id="cacaculopis">Entrenamiento <small> Asistencia</small></h2>

<div class="separacion-tablas"></div>						


<div style="margin-top: 15px;"></div>

 <!-- ==================================================================== -->
<a style="float:right;" onClick="mostrarAJAX('Entrenamiento/PointsAdd.php', '.tooltip-demo')" data-original-title="Agregar" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
 <table class="table table-hover">

	<thead class="thead-dark">
		<tr style="text-align: center" class="bg-primary2">
		  <td>Miembro</td>
		  <td>Puntos</td>
		</tr>
	 </thead>

	 <tbody>
		<?php 
		  if(count($atcs) > 0) //Si hay puntos de ATC
		  {
			  echo '<tr class="bg-primary3">'.
				   '<td></td>'.
				   '<td><h2>ATC <small>ADC / APC / ACC / SC</small></h2></td>'.
				   '</tr>';
		
			  foreach($atcs as $atc) echo $atc; 
		  }
		
		  if(count($pilotos) > 0) //Si hay puntos de Piloto
		  {
			  echo '<tr class="bg-primary3">'.
				   '<td></td>'.
				   '<td><h2>Piloto <small>PP / SPP / CP / ATP</small></h2></td>'.
				   '</tr>';
		
			  foreach($pilotos as $piloto) echo $piloto; 
		  }
		?>
	 </tbody>
 </table>

<!-- FINAL CONTENIDO -->