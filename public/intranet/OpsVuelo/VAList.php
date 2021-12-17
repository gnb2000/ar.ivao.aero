<?php
require '../../conexion.php';

$VAs = array();

$resVAs = mysqli_query($con, "SELECT * FROM va_list ORDER BY IVAOId");
while($fila = mysqli_fetch_array($resVAs))
{	
	$estado = $fila['VaStatus'] == 1 ? '<span class="label label-success">Activa</span>' : '<span class="label label-danger">Inactiva</span>';
	$tipo = $fila['VaType'] == 1 ? 'VA' : 'SOG';
	$botonActivar = $fila['VaStatus'] == 0 ? '<button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea activar esta VA?\')) mostrarAJAX(\'OpsVuelo/VAActivate.php?id='.$fila['IVAOId'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Activar VA"><img src="http://www.ar.ivao.aero/images/ico/pencil--plus.png"></button>' : '<button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea desactivar esta VA?\')) mostrarAJAX(\'OpsVuelo/VAInactivate.php?id='.$fila['IVAOId'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Desactivar VA"><img src="http://www.ar.ivao.aero/images/ico/pencil--minus.png"></button>';
	$botonLast = $botonActivar.' <button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta VA?\')) mostrarAJAX(\'OpsVuelo/VADel.php?id='.$fila['IVAOId'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" id="myButton" autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar VA"><img src="http://www.ivao.com.ar/images/ico/cross-circle.png"></button>'; //Mostramos los botones Activar, Inactivar y Eliminar
	
	$VAs[] =
			'<tr>
			 <td>'.$fila['IVAOId'].'</td>
			 <td>'.$fila['ICAO'].'</td>
			 <td>'.$fila['VaName'].'</td>
			 <td>'.$estado.'</td>
			 <td>'.$tipo.'</td>
			 <td>'.$botonLast.'</td>
			</tr>';
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cartas">Operaciones de Vuelo <small> Gestionar VAs</small></h2>
                                                
               
                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('OpsVuelo/VAAdd.php', '.tooltip-demo')" data-original-title="Agregar Nueva" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>ID</td>
                                  <td>ICAO</td>
                                  <td>Nombre</td>
                                  <td>Estado</td>
                                  <td>Tipo</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								$filas = count($VAs);
								
								 if($filas > 0) 
								 {
									 echo '<tr class="bg-primary3">'.
                                 		  '<td></td>'.
                                 		  '<td></td>'.
										  '<td colspan="5"><h2>VA <small>VA / SOG</small></h2></td>'.
                                		  '</tr>';
                                
                               		 foreach($VAs as $va) echo $va; 
								 }
                                 ?>
                             </tbody>
                         </table>
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->