<!-- INICIO CONTENIDO -->
                       
<h2>Entrenamiento <small> Disponibilidad Horaria</small></h2>

<div class="separacion-tablas"></div>						


<div style="margin-top: 15px;"></div>
 
 <!-- ==================================================================== -->
 <table class="table table-hover">

    <thead class="thead-dark">
        <tr class="bg-primary2">
          <td>D&iacute;a</td>
          <td>Entrenador</td>
          <td>Hora Inicio</td>
          <td>Hora Fin</td>
        </tr>
     </thead>
        
     <tbody>

<?php
/*
Este script muestra una tabla con la disponibilidad de los entrenadores
*/

require '../../conexion.php';
require '../../funciones.php';


$resAvailability = mysqli_query($con, "SELECT * FROM trainer_availability ORDER BY dia, trainer, hora_inicio");
while($filaA = mysqli_fetch_array($resAvailability))
{		
	echo
		'<tr>
		 <td>'.obtenerNombreDia($filaA['dia']).'</td>
		 <td>'.obtenerNombreUsuario($filaA['trainer'], $con).'</td>
		 <td>'.date('H:i', strtotime('1990-01-01 '.$filaA['hora_inicio'])).' UTC</td>
		 <td>'.date('H:i', strtotime('1990-01-01 '.$filaA['hora_fin'])).' UTC</td>
		</tr>';
}
?>

                    	
     </tbody>
 </table>
 
 <hr style="margin-bottom: 20px;" />
 

<!-- FINAL CONTENIDO -->