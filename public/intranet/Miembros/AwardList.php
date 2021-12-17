<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();

$resAward = mysqli_query($con, "SELECT * FROM award_to_user");
while($filaA = mysqli_fetch_array($resAward))
{	
	$vid = $filaA['vid'];
	$nombre = obtenerNombreUsuario($vid, $con);
	$atcs[] =
		'<tr>
		 <td>'.$filaA['id'].'</td>
		 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$vid.'">'.$nombre.'</a></td>
		 <td>'.$filaA['award'].'</td>
		 <td><button onClick="if(confirm(\'&iquest;Est&aacute; seguro que desea eliminar esta medalla?\')) mostrarAJAX(\'Miembros/AwardDel.php?id='.$vid.'\', \'.tooltip-demo\')" type="button" class="btn btn-danger btn-xs" id="myButton" data-loading-text="Cargando..." autocomplete="off" data-toggle="tooltip" data-placement="bottom" title="Eliminar">Eliminar</button></td>
		</tr>';
}
?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2 id="cacaculopis">Miembros <small> Medallas</small></h2>
                        
                        <div class="separacion-tablas"></div>						
                        
               
                        <div style="margin-top: 15px;"></div>

                         <!-- ==================================================================== -->
                        <a style="float:right;" onClick="mostrarAJAX('Miembros/AwardAdd.php', '.tooltip-demo')" data-original-title="Agregar" role="button" class="btn btn-success btn-xs">Agregar</a></h2>
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>ID</td>
                                  <td>Miembro</td>
                                  <td>Medalla</td>
                                  <td>Comentarios</td>
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
						 
                         <hr style="margin-bottom: 20px;" />
                         
                 
                        <!-- FINAL CONTENIDO -->