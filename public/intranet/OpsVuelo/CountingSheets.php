<?php
require '../../conexion.php';
require '../../funciones.php';

$vid = $_COOKIE['vid'];

$examenes = array();
$trainings = array();

$resExamenes = mysqli_query($con, "SELECT * FROM exams WHERE exam >= 4 AND score IS NOT NULL ORDER BY date DESC LIMIT 10");
while($filaExamen = mysqli_fetch_array($resExamenes))
{
	$trainer = $filaExamen['examiner'];
	$alumno = $filaExamen['vid'];
	$url = $filaExamen['url'];
	
	$examenes[] =
			'<tr>
				 <td>EXA'.$filaExamen['id'].'</td>
				 <td>'.$filaExamen['date'].'</td>
				 <td>'.obtenerNombreExamen($filaExamen['exam']).'</td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$trainer.'">'.obtenerNombreUsuario($trainer, $con).'</a></td>
				 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
				 <td><a href="'.$url.'" data-toggle="tooltip" data-placement="bottom" title="Counting Sheet"><img src="http://www.ar.ivao.aero/images/ico/book-open-list.png"></a></td>
			</tr>';

}

$resTrainings = mysqli_query($con, "SELECT * FROM trainings_requested WHERE state = 6 AND id_training IN (9, 10) ORDER BY assigned_date DESC LIMIT 10");
while($filaTraining = mysqli_fetch_array($resTrainings))
{
	$trainer = $filaTraining['trainer'];
	$alumno = $filaTraining['member'];
	$url = $filaTraining['url'];
	
	$trainings[] =
		'<tr>
			 <td>TNG'.$filaTraining['id'].'</td>
			 <td>'.$filaTraining['assigned_date'].'</td>
			 <td>'.obtenerNombreTraining($filaTraining['id_training'], $con).'</td>
			 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$trainer.'">'.obtenerNombreUsuario($trainer, $con).'</a></td>
			 <td><a href="https://www.ivao.aero/Member.aspx?Id='.$alumno.'">'.obtenerNombreUsuario($alumno, $con).'</a></td>
			 <td><a href="'.$url.'" data-toggle="tooltip" data-placement="bottom" title="Counting Sheet"><img src="http://www.ar.ivao.aero/images/ico/book-open-list.png"></a></td>
		</tr>';

}
?>                        
                        <h2>Entrenamiento <small> Counting Sheets</small></h2>
                        
                        <div class="separacion-tablas"></div>
						
                         <table class="table table-hover">

        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>C&oacute;digo</td>
                                  <td>Fecha</td>
                                  <td>Nombre</td>
                                  <td>Trainer</td>
                                  <td>Miembro</td>
                                  <td></td>
                                </tr>
                             </thead>
                                
                             <tbody>
								<?php 
								  if(count($examenes) > 0) 
								  {
									  echo '<tr class="bg-primary3">'.
                                 		   '<td></td>'.
										   '<td></td>'.
										   '<td></td>'.
										   '<td colspan="4"><h2>Ex&aacute;menes</h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($examenes as $atc) echo $atc; 
								  }
                                  ?>

                                <?php 
								  if(count($trainings) > 0) 
								  {
									  echo '<tr class="bg-primary3">'.
									  	   '<td></td>'.
                                 		   '<td></td>'.
										   '<td></td>'.
										   '<td colspan="4"><h2>Entrenamientos</h2></td>'.
                                		   '</tr>';
                                
                               		  foreach($trainings as $piloto) echo $piloto; 
								  }
                                  ?>
                             </tbody>
                         </table>