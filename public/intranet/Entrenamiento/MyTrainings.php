<?php
require '../../conexion.php';
require '../../funciones.php';

/*
Este script permite al entrenador gestionar y visualizar sus entrenamiento. Podrá confirmar, programar o completar el entrenamiento.
*/

$vid = (int)$_COOKIE['vid'];

$atcs = $pilotos = $iniciales = array();

$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE trainer = $vid AND state BETWEEN 3 AND 5");
while($filaSolicitud = mysqli_fetch_array($resSolicitudes))
{
	$resTrainings = mysqli_query($con, "SELECT * FROM trainings WHERE id = ".$filaSolicitud['id_training']);
	$filaTraining = mysqli_fetch_array($resTrainings);
	$nombre = $filaTraining['name'];
	$rango = $filaTraining['rating'];					//Recogemos los datos del training
	$alumno = $filaSolicitud['member']; 
	$trainer = $filaSolicitud['trainer']; 
	$botonLast = '<button onClick="mostrarAJAX(\'Entrenamiento/DateChange.php?id='.$filaSolicitud['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Programar Entrenamiento"><img src="http://www.ar.ivao.aero/images/ico/calendar--pencil.png"></button> <button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea confirmar este entrenamiento?\')) mostrarAJAX(\'Entrenamiento/DateConfirm.php?id='.$filaSolicitud['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Confirmar Entrenamiento"><img src="http://www.ar.ivao.aero/images/ico/pencil--plus.png"></button> <button onClick="mostrarAJAX(\'Entrenamiento/RequestComplete.php?id='.$filaSolicitud['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Completar Entrenamiento"><img src="http://www.ar.ivao.aero/images/ico/tick-button.png"></button>'; //Mostramos los botones Programar, Confirmar y Completar
	
	if($filaTraining['type'] == 'atc') $atcs[] =		//Si es un training de ATC, lo mostramos en la seccion ATC
			'<tr>
                 <td>TGA'.$filaSolicitud['id'].'</td>
				 <td>'.$filaSolicitud['training_date'].'</td>
                 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
                 <td>'.$filaTraining['name'].'</td>
                 <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$filaTraining['rating'].'.gif" alt="'.obtenerRangoAtcShort($filaTraining['rating']).'" title="'.obtenerRangoAtc($filaTraining['rating']).'" width="65"></td>
                 <td>'.$botonLast.'</td>
            </tr>';
	else $pilotos[] =									//Si es un training de Piloto, lo mostramos en la seccion Piloto
			'<tr>
                 <td>TGP'.$filaSolicitud['id'].'</td>
				 <td>'.$filaSolicitud['training_date'].'</td>
                 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
                 <td>'.$filaTraining['name'].'</td>
                 <td><img src="https://www.ivao.aero/data/images/ratings/pilot/'.$filaTraining['rating'].'.gif" alt="'.obtenerRangoPilotoShort($filaTraining['rating']).'" title="'.obtenerRangoPiloto($filaTraining['rating']).'" width="65"></td>
                 <td>'.$botonLast.'</td>
            </tr>';
}
?>                        
                        <h2>Entrenamiento <small> Mis Entrenamientos</small></h2>
                        
                        <div class="separacion-tablas"></div>
						
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo Solicitud</td>
                                  <td>Fecha Programada</td>
                                  <td>Alumno</td>
                                  <td>Entrenamiento</td>
                                  <td>Rango</td>
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
										   '<td></td>'.
										   '<td colspan="4"><h2>ATC <small>ADC / APC / ACC / SC</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($atcs as $atc) echo $atc; 
								  }
                                  ?>

                                <?php 
								  if(count($pilotos) > 0) //Si hay trainings de Piloto, mostramos el titulo de la seccion y mostramos los trainings
								  {
									  echo '<tr class="bg-primary3">'.
									  	   '<td></td>'.
                                 		   '<td></td>'.
										   '<td></td>'.
										   '<td colspan="4"><h2>Piloto <small>PP / SPP / CP / ATP</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($pilotos as $piloto) echo $piloto; 
								  }
                                  ?>
                             </tbody>
                         </table>