<?php
require '../../conexion.php';
$vid = (int)$_COOKIE['vid'];

$atcs = array();
$pilotos = array();

$resEventos = mysqli_query($con, "SELECT * FROM events_en ORDER BY start_date DESC");
$filasEventos = mysqli_num_rows($resEventos);

?>

                    	<!-- INICIO CONTENIDO -->
                        
                        <h2>Eventos <small> List of Events</small></h2>
<!-- <a style="float:right;" onClick="mostrarAJAX('Eventos/EventoNew.php', '.tooltip-demo')" data-original-title="Agregar Nuevo" role="button" class="btn btn-success btn-xs">Nuevo Evento</a> --> 
                         <br />
                         <br />
						 <table class="table table-hover">
        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td style="text-align: center;">Evento</td>
                                  <td>Fecha Inicio</td>
                                  <td>Fecha Fin</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                             </thead>

                             <tbody>
                             	<?php 
while($filaEventos = mysqli_fetch_array($resEventos))
{  
	echo'<tr>
			  <td style="text-align: center;"><img src="https://files.ar.ivao.aero/Eventos/Images/'.$filaEventos['image'].'" alt="'.$filaEventos['name'].'" style="max-height: 50%; max-width: 75%;" class="img-thumbnail"></td>
			  <td>'.date('d-m-Y H:i', strtotime($filaEventos['start_date'])).' UTC</td>
			  <td>'.date('d-m-Y H:i', strtotime($filaEventos['end_date'])).' UTC</td>
              <td>'; ?>
			  <a onClick="if(confirm('&iquest;Est&aacute; seguro de que quiere eliminar el evento?')) mostrarAJAX('Eventos/EventDel.php?id=<?php echo $filaEventos['id']; ?>&lang=en', '.tooltip-demo');" data-original-title="Eliminar" role="button" class="btn btn-danger btn-xs" href="#">
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
						