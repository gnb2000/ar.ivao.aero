<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();

$resPen = mysqli_query($con, "SELECT * FROM training_penalties");
while($filaP = mysqli_fetch_array($resPen))
{	
	$vid = $filaP['vid'];
	$nombre = obtenerNombreUsuario($vid, $con);
	
	$resAbs = mysqli_query($con, "SELECT * FROM trainings_requested WHERE member = $vid AND state = 12");
	$faltas = mysqli_num_rows($resAbs);
	
$atcs[] =
		'<tr style="text-align: center;">
		 <td><a target="_blank" href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.$nombre.'</a></td>
		 <td>'.$faltas.'</td>
		 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta penalizaci&oacute;n?\')) mostrarAJAX(\'Entrenamiento/PenaltyDel.php?vid='.$vid.'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
		</tr>';
}
?>

<!-- INICIO CONTENIDO -->

<h2 id="cacaculopis">Entrenamiento <small> Penalizaciones</small></h2>

<div class="separacion-tablas"></div>						


<div style="margin-top: 15px;"></div>

 <!-- ==================================================================== -->
 <table class="table table-hover">

	<thead class="thead-dark">
		<tr style="text-align: center" class="bg-primary2">
		  <td>Miembro</td>
		  <td>Faltas de Asistencia</td>
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

<!-- FINAL CONTENIDO -->