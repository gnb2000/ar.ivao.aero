<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'api.infovuelos.ele.php';
date_default_timezone_set('UTC'); 
include ("../../stylesheet.php");
?>
                            
<table class="table table-hover table-striped">
<thead class="thead-dark">
    <tr class="bg-primary2">
      <td><span data-toggle="tooltip" data-placement="bottom" title="Estimated Time Of Arrival">ETA</span></td>
      <td>Callsign</td>
      <td></td>
      <td>Origen</td>
      <td>Destino</td>
      <td>Avión</td>
      <td>Estado</td>
    </tr>
 </thead>
 
 <tbody>
    <?php
    if (count($pilots) != 0) 
    {
        foreach($pilots as $pilot){
                        
            if($pilot[2] == $_GET['cs'])
            {
				if($pilot[14] == 'Despegado' and $pilot[13] < 0 and $pilot[20] > 0){$pilot[14] == 'Despegado';}
				elseif($pilot[14] == 'Despegado' and $pilot[13] < 0 and $pilot[20] < 0){$pilot[14] = 'En horario';}
				elseif($pilot[14] == 'Despegado' and $pilot[13] > 0 and $pilot[20] > 0){$pilot[14] = 'Demorado';}
				elseif($pilot[21] == 'Aterrizado'){$pilot[14] = 'Aterrizado';}
				
                echo '<tr>
                  <td>'.$pilot[12].'</td>
                  <td>' .$pilot[1]. '</a></td>
                  <td><img alt="Unknown" src="https://ivao.com.ar/images/infovuelos/airlines/'.$pilot[2].'.gif" /></td>
                  <td><strong data-toggle="tooltip" data-placement="bottom" title="'.$pilot[10].'">' .$pilot[8]. '</strong> '.$pilot[9].'</td>
                  <td><strong data-toggle="tooltip" data-placement="bottom" title="'.$pilot[17].'">' .$pilot[15]. '</strong> '.$pilot[16].'</td>
                  <td>'.$pilot[7].'</td>
                  <td>'.$pilot[14].'</td>
                </tr>';
            }
        } 
    }
  ?>
  </tbody>
  
  </table>
  <p>By IVAO Argentina</p>
	<!-- script references -->