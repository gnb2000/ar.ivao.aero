<?php
require '../../conexion.php';
require '../../funciones.php';
?>

<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cacaculopis">Operaciones de Vuelo <small> Elite Pilots</small></h2>
                        
                        <div class="separacion-tablas"></div>						
                        
               
                        <div style="margin-top: 15px;"></div>

                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('OpsVuelo/PilotAdd.php', '.tooltip-demo')" data-original-title="Agregar Nuevo" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>Callsign</td>
                                  <td>VID</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
<?php
									  
$resPilots = mysqli_query($con, "SELECT * FROM aep_positions ORDER BY Callsign");
while($filaP = mysqli_fetch_array($resPilots))
{	
	echo
		'<tr>
		 <td>'.$filaP['Callsign'].'</td>
		 <td><a href="https://www.ivao.aero/Member.aspx?ID='.$filaP['VID'].'">'.obtenerNombreUsuario($filaP['VID'], $con).'</a></td>
		 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar este piloto?\')) mostrarAJAX(\'OpsVuelo/PilotDel.php?id='.$filaP['VID'].'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
		</tr>';
}
?>

                    	
                             </tbody>
                         </table>
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->