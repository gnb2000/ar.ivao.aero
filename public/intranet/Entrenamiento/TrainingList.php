<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = $pilotos = $iniciales = array();

$resTrainings = mysqli_query($con, "SELECT * FROM trainings");
while($filaT = mysqli_fetch_array($resTrainings))
{	
	if($filaT['type'] == 'atc')
	{
		$atcs[] =
			'<tr>
			 <td><a href="#">TGA'.$filaT['id'].'</a></td>
			 <td>'.$filaT['name'].'</td>
			 <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$filaT['rating'].'.gif" alt="'.obtenerRangoAtcShort($filaT['rating']).'" title="'.obtenerRangoAtc($filaT['rating']).'" width="65"></td>
			 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este entrenamiento?\')) mostrarAJAX(\'Entrenamiento/TrainingDel.php?id='.$filaT['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
            </tr>';
	}
	else if($filaT['type'] == 'initial')
	{
		$iniciales[] =
			'<tr>
			 <td><a href="#">TGI'.$filaT['id'].'</a></td>
			 <td>'.$filaT['name'].'</td>
			 <td><img src="https://www.ivao.aero/data/images/ratings/atc/'.$filaT['rating'].'.gif" alt="'.obtenerRangoAtcShort($filaT['rating']).'" title="'.obtenerRangoAtc($filaT['rating']).'" width="65"></td>
			 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este entrenamiento?\')) mostrarAJAX(\'Entrenamiento/TrainingDel.php?id='.$filaT['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
            </tr>';
	}
	else
	{		
		$pilotos[] =
				'<tr>
				 <td><a href="#">TGP'.$filaT['id'].'</a></td>
				 <td>'.$filaT['name'].'</td>
				 <td><img src="https://www.ivao.aero/data/images/ratings/pilot/'.$filaT['rating'].'.gif" alt="'.obtenerRangoPilotoShort($filaT['rating']).'" title="'.obtenerRangoPiloto($filaT['rating']).'" width="65"></td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este entrenamiento?\')) mostrarAJAX(\'Entrenamiento/TrainingDel.php?id='.$filaT['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
	}
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cacaculopis">Entrenamientos <small> Trainings</small></h2>
                        
                        <div class="separacion-tablas"></div>						
                        
               
                        <div style="margin-top: 15px;"></div>

                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/TrainingAdd.php', '.tooltip-demo')" data-original-title="Agregar Nuevo" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo</td>
                                  <td>Entrenamiento</td>
                                  <td>Rango Requerido</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								  if(count($atcs) > 0) 
								  {
									  echo '<tr class="bg-primary3">'.
                                 		   '<td></td>'.
                                 		   '<td></td>'.
										   '<td colspan="5"><h2>ATC <small>ADC / APC / ACC / SC</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($atcs as $atc) echo $atc; 
								  }
                                 
								  if(count($pilotos) > 0) 
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
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->