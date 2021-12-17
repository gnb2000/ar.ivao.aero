<?php
require '../../conexion.php';
require '../../funciones.php';

$atcs = array();
$pilotos = array();

$sql = isset($_POST['vid']) ? 'AND vid = '.$_POST['vid'] : '';

$resExamenes = mysqli_query($con, "SELECT * FROM exams WHERE nota IS NOT NULL $sql ORDER BY date DESC LIMIT 40");
while($filaExamen = mysqli_fetch_array($resExamenes))
{
	$examinador = $filaExamen['examiner'];
	$alumno = $filaExamen['vid'];				//Recogemos los datos del training
	$url = $filaExamen['url'];
	
	if($filaExamen['id'] > 6)
	{
		if($filaExamen['exam'] >= 4) $atcs[] = //Si el examen es como minimo ADC, se trata de un examen de ATC.
				'<tr>
					 <td>EXA'.$filaExamen['id'].'</td>
					 <td>'.$filaExamen['date'].'</td>
					 <td>'.obtenerNombreExamen($filaExamen['exam']).'</td>
					 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$examinador.'">'.obtenerNombreUsuario($examinador, $con).'</a></td>
					 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
					 <td>'.$filaExamen['score'].'/100</td>
					 <td><a href="'.$url.'" data-toggle="tooltip" data-placement="bottom" title="Counting Sheet"><img src="http://www.ar.ivao.aero/images/ico/book-open-list.png"></a></td>
				</tr>';
		else $pilotos[] =						//Si el examen es como minimo menor que ADC, se trata de un examen de Piloto.
				'<tr>
					 <td>EXP'.$filaExamen['id'].'</td>
					 <td>'.$filaExamen['date'].'</td>
					 <td>'.obtenerNombreExamen($filaExamen['exam']).'</td>
					 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$examinador.'">'.obtenerNombreUsuario($examinador, $con).'</a></td>
					 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
					 <td>'.$filaExamen['score'].'/100</td>
					 <td>-</td>
				</tr>';
	}
}
?>                        
                        <h2>Entrenamiento <small> Listar Ex&aacute;menes</small><br />
                        <a style="float:right;" onClick="mostrarAJAX('Entrenamiento/ExamsFilter.php', '.tooltip-demo')" data-original-title="Filtrar" role="button" class="btn btn-success btn-xs">Filtrar</a>
                        </h2>
                        
                        <div class="separacion-tablas"></div>
						
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo</td>
                                  <td>Fecha</td>
                                  <td>Examen</td>
                                  <td>Examinador</td>
                                  <td>Miembro</td>
                                  <td>Nota</td>
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
										   '<td></td>'.
										   '<td colspan="4"><h2>Piloto <small>PP / SPP / CP / ATP</small></h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($pilotos as $piloto) echo $piloto; 
								  }
                                  ?>
                             </tbody>
                         </table>