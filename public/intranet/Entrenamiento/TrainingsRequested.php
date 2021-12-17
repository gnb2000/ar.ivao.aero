<?php

require $_SERVER['DOCUMENT_ROOT'].'/conexion.php';
require $_SERVER['DOCUMENT_ROOT'].'/funciones.php';

$atcs = $pilotos = $iniciales = array();

/*
Este script permite al coordinador gestionar los entrenamientos solicitados
*/

$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE state NOT IN (0, 6, 11, 12)"); //Seleccionamos todos los trainings NO cancelados y NO completados
while($filaSolicitud = mysqli_fetch_array($resSolicitudes)) //Recorremos los resultados
{
	$resTrainings = mysqli_query($con, "SELECT * FROM trainings WHERE id = ".$filaSolicitud['id_training']);
	$filaTraining = mysqli_fetch_array($resTrainings);
	$nombre = $filaTraining['name'];
	$rango = $filaTraining['rating'];						//Recogemos los datos del training
	$alumno = $filaSolicitud['member']; 
	$trainer = is_null($filaSolicitud['trainer']) ? '-' : '<a href="https://www.ivao.aero/Member.aspx?Id='.$filaSolicitud['trainer'].'">'.obtenerNombreUsuario($filaSolicitud['trainer'], $con).'</a>'; //Si hay entrenador asignado, mostramos el nombre, si no, mostramos un guión.
	$fechaAsignada = is_null($filaSolicitud['training_date']) ? '-' : $filaSolicitud['training_date']; //Si se ha programado una fecha, mostramos la fecha, si no, mostramos un guión.
	$botonLast = '<button onClick="mostrarAJAX(\'Entrenamiento/RequestAssign.php?id='.$filaSolicitud['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Asignar Entrenador"><img src="http://www.ar.ivao.aero/images/ico/pencil.png"></button> <button onClick="mostrarAJAX(\'Entrenamiento/RequestDel.php?id='.$filaSolicitud['id'].'&t='.$filaSolicitud['trainer'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Cancelar Solicitud"><img src="http://www.ar.ivao.aero/images/ico/cross-circle.png"></button>';

	if($filaTraining['type'] == 'atc') $atcs[] = 		//Si es un training de ATC, lo mostramos en la seccion ATC
			'<tr>
                 <td><a href="#">TGA'.$filaSolicitud['id'].'</a></td>
                 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
                 <td>'.$filaTraining['name'].'</td>
				 <td>'.$trainer.'</td>
				 <td>'.$fechaAsignada.'</td>
                 <!-- <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$filaTraining['rating'].'.gif" alt="'.obtenerRangoAtcShort($filaTraining['rating']).'" title="'.obtenerRangoAtc($filaTraining['rating']).'" width="65"></td> -->
                 <td>'.$botonLast.'</td>
            </tr>';
	else $pilotos[] = 									//Si es un training de Piloto, lo mostramos en la seccion Piloto
			'<tr>
                 <td><a href="#">TGP'.$filaSolicitud['id'].'</a></td>
                 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
                 <td>'.$filaTraining['name'].'</td>
				 <td>'.$trainer.'</td>
				 <td>'.$fechaAsignada.'</td>
                 <!-- <td><img src="https://www.ivao.aero/data/images/ratings/pilot/'.$filaTraining['rating'].'.gif" alt="'.obtenerRangoPilotoShort($filaTraining['rating']).'" title="'.obtenerRangoPiloto($filaTraining['rating']).'" width="65"></td> -->
                 <td>'.$botonLast.'</td>
            </tr>';
}
?>                        
                        <h2>Entrenamiento <small> Gestionar Solicitudes</small></h2>
                        
                        <div class="separacion-tablas"></div>
						
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo Solicitud</td>
                                  <td>Alumno</td>
                                  <td>Entrenamiento</td>
                                  <td>Entrenador</td>
                                  <td>Fecha Asignada</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>								  
								<?php 
								  if(count($atcs) > 0) //Si hay trainings de ATC, mostramos el titulo de la seccion y mostramos los trainings
								  {
									  echo '<tr class="bg-primary3">'.
                                 		   '<td></td>'.
										   '<td></td>'.
										   '<td colspan="5"><h2>ATC <small>ADC / APC / ACC / SC</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($atcs as $atc) echo $atc; 
								  }
								  
								  if(count($pilotos) > 0) //Si hay trainings de Piloto, mostramos el titulo de la seccion y mostramos los trainings
								  {
									  echo '<tr class="bg-primary3">'.
                                 		   '<td></td>'.
										   '<td></td>'.
										   '<td colspan="5"><h2>Piloto <small>PP / SPP / CP / ATP</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($pilotos as $piloto) echo $piloto; 
								  }
                                ?>
                             </tbody>
                         </table>