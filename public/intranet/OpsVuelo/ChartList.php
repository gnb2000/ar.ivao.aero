<?php
require '../../conexion.php';
require '../../funciones.php';

$aerodromos = array();
$ruteros = array();

$resCartas = mysqli_query($con, "SELECT * FROM aip_charts ORDER BY icao");
$resRuteros = mysqli_query($con, "SELECT * FROM aip_enroute");
while($filaC = mysqli_fetch_array($resCartas))
{	
	$aerodromos[] =
				'<tr>
				 <td>'.$filaC['icao'].'</td>
				 <td>'.$filaC['name'].'</td>
				 <td>'.$filaC['effective'].'</td>
				 <td>'.$filaC['airac'].'</td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta carta?\')) mostrarAJAX(\'OpsVuelo/ChartDel.php?id='.$filaC['id'].'&tipo=1\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
}
while($filaR = mysqli_fetch_array($resRuteros))
{			
	$ruteros[] =
				'<tr>
				 <td>'.$filaR['area'].'</td>
				 <td>'.$filaR['name'].'</td>
				 <td>'.$filaR['effective'].'</td>
				 <td>'.$filaR['airac'].'</td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta carta?\')) mostrarAJAX(\'OpsVuelo/ChartDel.php?id='.$filaR['id'].'&tipo=2\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cartas">Cartas <small> Charts</small></h2>
                                                
               
                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('OpsVuelo/ChartAdd.php', '.tooltip-demo')" data-original-title="Agregar Nueva" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>ICAO/&Aacute;rea</td>
                                  <td>Nombre</td>
                                  <td>Efectivo</td>
                                  <td>AIRAC</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								$filasAerodromos = count($aerodromos);
								$filasRuteros = count($ruteros);
								
								 if($filasAerodromos > 0) 
								 {
									 echo '<tr class="bg-primary3">'.
                                 		  '<td></td>'.
                                 		  '<td></td>'.
										  '<td colspan="5"><h2>AD <small>ADC / IAC / GMC / VAC</small></h2></td>'.
                                		  '</tr>';
                                
                               		 foreach($aerodromos as $ad) echo $ad; 
								 }
                                 
								 if($filasRuteros > 0) 
								 {
									 echo '<tr class="bg-primary3">'.
                                 		  '<td></td>'.
                                 		  '<td></td>'.
										  '<td colspan="5"><h2>Rutero <small>AWY / TMA / INF / SUP</small></h2></td>'.
                                		  '</tr>'; 
                                
                               		 foreach($ruteros as $rutero) echo $rutero; 
								 }
                                 ?>
                             </tbody>
                         </table>
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->