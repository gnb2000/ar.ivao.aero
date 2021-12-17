<?php
/*
Este script muestra una tabla con los entrenamientos completados (state = 6).
*/

require '../../conexion.php';
require '../../funciones.php';

$sql = isset($_POST['vid']) ? 'AND alumno = '.$_POST['vid'] : '';

$atcs = $pilotos = $iniciales = array();


$resSolicitudes = mysqli_query($con, "SELECT * FROM trainings_requested WHERE state = 6 $sql ORDER BY training_date DESC LIMIT 30"); //seleccionamos los trainings "completados"
while($filaSolicitud = mysqli_fetch_array($resSolicitudes))
{
	$resTrainings = mysqli_query($con, "SELECT * FROM trainings WHERE id = ".$filaSolicitud['id_training']);
	$filaTraining = mysqli_fetch_array($resTrainings);
	$nombre = $filaTraining['name'];
	$rango = $filaTraining['rating'];											//Recogemos los datos del training
	$trainer = $filaSolicitud['trainer'];
	$miembro = $filaSolicitud['member'];
	$url = $filaSolicitud['url'];

	
	if($filaTraining['type'] == 'atc') $atcs[] =								//Si es un training de ATC, lo mostramos en la seccion ATC
			'<tr>
                 <td>TGA'.$filaSolicitud['id'].'</td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$miembro.'">'.obtenerNombreUsuario($miembro, $con).'</a></td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$trainer.'">'.obtenerNombreUsuario($trainer, $con).'</a></td>
				 <td>'.$filaSolicitud['training_date'].'</td>
                 <td>'.$filaSolicitud['comments'].'</td>
				 <td><a href="'.$url.'" data-toggle="tooltip" data-placement="bottom" title="Counting Sheet"><img src="http://www.ar.ivao.aero/images/ico/book-open-list.png"></a></td>
            </tr>';
	else $pilotos[] =															//Si es un training de Piloto, lo mostramos en la seccion Piloto
			'<tr>
                 <td>TGP'.$filaSolicitud['id'].'</td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$miembro.'">'.obtenerNombreUsuario($miembro, $con).'</a></td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$trainer.'">'.obtenerNombreUsuario($trainer, $con).'</a></td>
				 <td>'.$filaSolicitud['training_date'].'</td>
                 <td>'.$filaSolicitud['comments'].'</td>
				 <td>-</td>
            </tr>';
}
?>                        
                        <h2>Entrenamiento <small> Entrenamientos Completados</small><br />
                        <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/CompletedTrainingsFilter.php', '.tooltip-demo')" data-original-title="Filtrar" role="button" class="btn btn-success btn-xs">Filtrar</a>
                        </h2>
                        
                        <div class="separacion-tablas"></div>
						
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo</td>
                                  <td>Miembro</td>
                                  <td>Entrenador</td>
                                  <td>Realizado</td>
                                  <td>Comentarios</td>
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
										   '<td colspan="4"><h2>Piloto <small>PP / SPP / CP / ATP</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($pilotos as $piloto) echo $piloto; 
								  }
                                  ?>
                             </tbody>
                         </table>