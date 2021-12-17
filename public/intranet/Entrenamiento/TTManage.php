<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();
$pilotos = array();

$resTrainingsT = mysqli_query($con, "SELECT * FROM trainer_training ORDER BY training, trainer");
while($filaTT = mysqli_fetch_array($resTrainingsT))
{	
	$training = $filaTT['training'];
	$resTrainings = mysqli_query($con, "SELECT * FROM trainings WHERE id = $training");
	$filaT = mysqli_fetch_array($resTrainings);
	
	if($filaT['tipo'] == 'atc')
	{
		$atcs[] =
			'<tr>
			 <td>'.$filaT['name'].'</td>
			 <td>'.obtenerNombreUsuario($filaTT['trainer'], $con).'</td>
			 <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$filaT['rating'].'.gif" alt="'.obtenerRangoAtcShort($filaT['rating']).'" title="'.obtenerRangoAtc($filaT['rating']).'" width="65"></td>
			 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este registro?\')) mostrarAJAX(\'Entrenamiento/TTDel.php?id='.$filaTT['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
            </tr>';
	}
	else
	{		
		$pilotos[] =
				'<tr>
			 	<td>'.$filaT['name'].'</td>
				<td>'.obtenerNombreUsuario($filaTT['trainer'], $con).'</td>
				 <td><img src="https://www.ivao.aero/data/images/ratings/pilot/'.$filaT['rating'].'.gif" alt="'.obtenerRangoPilotoShort($filaT['rating']).'" title="'.obtenerRangoAtc($filaT['rating']).'" width="65"></td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este entrenamiento?\')) mostrarAJAX(\'Entrenamiento/TTDel.php?id='.$filaTT['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
	}
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cacaculopis">Entrenamiento <small> Habilitar Entrenadores</small></h2>
                        
                        <div class="separacion-tablas"></div>						
                        
               
                        <div style="margin-top: 15px;"></div>

                         <!-- ==================================================================== -->
                         <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/TTAdd.php', '.tooltip-demo')" data-original-title="Agregar Nuevo" role="button" class="btn btn-success btn-xs">Nuevo Registro</a><br />
                         <br />
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>Entrenamiento</td>
                                  <td>Entrenador</td>
                                  <td>Rango Requerido</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								$filasATC = count($atcs);
								$filasPilot = count($pilotos);
								
								  if($filasATC > 0) 
								  {
									  echo '<tr class="bg-primary3">'.
                                 		   '<td></td>'.
                                 		   '<td></td>'.
										   '<td colspan="4"><h2>ATC <small>ADC / APC / ACC / SC</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($atcs as $atc) echo $atc; 
								  }
                                 
								  if($filasPilot > 0) 
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
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->