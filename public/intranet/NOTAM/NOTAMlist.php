<?php
require '../../conexion.php';
require '../../funciones.php';

$autorizados = array();
$creados = array();

$resAuto = mysqli_query($con, "SELECT * FROM notam_sys WHERE Autorizado = 1 ORDER BY id DESC");
$resCreado = mysqli_query($con, "SELECT * FROM notam_sys WHERE Autorizado = 0 ORDER BY id DESC");

while($filaC = mysqli_fetch_array($resAuto))
{	
	$autorizados[] =
				'<tr>
				 <td>'.$filaC['PubId'].'</td>
				 <td>'.$filaC['Nombre'].'</td>
				 <td>'.strftime("%d-%m-%Y %H:%M",strtotime($filaC['DateStart'])).'</td>
				 <td>'.strftime("%d-%m-%Y %H:%M",strtotime($filaC['DateEnd'])).'</td>
				 <td><span class="label label-success">AUTORIZADO</span></td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este NOTAM?\')) mostrarAJAX(\'NOTAM/NOTAMdel.php?id='.$filaC['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
}
while($filaR = mysqli_fetch_array($resCreado))
{			
	$creados[] =
				'<tr>
				 <td>'.$filaR['PubId'].'</td>
				 <td>'.$filaR['Nombre'].'</td>
				 <td>'.strftime("%d-%m-%Y %H:%M",strtotime($filaR['DateStart'])).'</td>
				 <td>'.strftime("%d-%m-%Y %H:%M",strtotime($filaR['DateEnd'])).'</td>
				 <td><span class="label label-danger">EN ESPERA</span></td>
				 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este NOTAM?\')) mostrarAJAX(\'NOTAM/NOTAMdel.php?id='.$filaR['id'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
				</tr>';
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cartas">NOTAM <small> Listado</small></h2>
                                                
               
                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('NOTAM/NOTAMadd.php', '.tooltip-demo')" data-original-title="Agregar Nueva" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td></td>
                                  <td>Nombre</td>
                                  <td>Empieza</td>
                                  <td>Finaliza</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								$filasAutorizados = count($autorizados);
								$filasCreados = count($creados);
								
								 if($filasAutorizados > 0) 
								 {                                
                               		 foreach($autorizados as $at) echo $at; 
								 }
                                 
								 if($filasCreados > 0) 
								 {                                
                               		 foreach($creados as $cr) echo $cr; 
								 }
                                 ?>
                             </tbody>
                         </table>
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->