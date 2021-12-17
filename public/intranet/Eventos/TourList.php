<?php
require '../../conexion.php';
$vid = (int)$_COOKIE['vid'];

$atcs = array();
$pilotos = array();

$resTours = mysqli_query($con, "SELECT * FROM tours ORDER BY id DESC");
$filasTours = mysqli_num_rows($resTours);

?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2>Tours <small> Lista de Tours</small></h2>
<a style="float:right;" onClick="mostrarAJAX('Eventos/TourNew.php', '.tooltip-demo')" data-original-title="Agregar Nuevo" role="button" class="btn btn-success btn-xs">Nuevo Tour</a>
                         <br />
                         <br />
						 <table class="table table-hover">
        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>Tour</td>
                                  <td>Nombre</td>
                                  <td>Codigo</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                             </thead>

                             <tbody>
                             	<?php 
while($filaTours = mysqli_fetch_array($resTours))
{  
	echo'<tr>
			  <td style="text-align: center;"><img src="https://files.ar.ivao.aero/Eventos/Images/'.$filaEventos['image'].'" alt="" style="max-height: 50%; max-width: 75%;" class="img-thumbnail"></td>
			  <td>'.$filaTours['Name'].'</td>
			  <td>'.$filaTours['Code'].'</td>
			  <td align="center">'; ?>
			  <a onClick="mostrarAJAX('Eventos/TourEdit.php?id=<?php echo $filaTours['id']; ?>', '.tooltip-demo')" data-original-title="Editar" role="button" class="btn btn-default btn-xs">
			  Editar
			  </a>
              </td>
              <td>
			  <a onClick="if(confirm('&iquest;Est&aacute; seguro de que quiere eliminar el tour?')) mostrarAJAX('Eventos/TourDel.php?id=<?php echo $filaTours['id']; ?>', '.tooltip-demo');" data-original-title="Eliminar" role="button" class="btn btn-danger btn-xs" href="#">
			  Eliminar
			  </a>
              </td>
              <?php
              /* echo '
			  </td>
			  <td>'.$filaEventos['permisos'].'</td>
             </tr>';  */ 
}
                                  ?>
                             </tbody>
                         </table>
                        
                        <!-- FINAL CONTENIDO -->