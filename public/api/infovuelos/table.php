<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once 'api.infovuelos.ele.php';
date_default_timezone_set('UTC'); 
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
      <td>Llegada</td>
      <!-- <td>Online</td> -->
      <td>Estado</td>
    </tr>
 </thead>
 
 <tbody>
    <?php
    if (count($pilots) != 0) 
    {
        foreach($pilots as $pilot){
                        
            if($pilot[11] == 'Argentina')
            {
                echo '<tr>
                  <td>'.$pilot[12].'</td>
                  <td><a href="index.php?pagina=recursos/infovuelos/estado&cs='.$pilot[1].'">' .$pilot[1]. '</a></td>
                  <td><img alt="Unknown" src="images/infovuelos/airlines/'.$pilot[2].'.gif" /></td>
                  <td><strong data-toggle="tooltip" data-placement="bottom" title="'.$pilot[10].'">' .$pilot[8]. '</strong> '.$pilot[9].'</td>
                  <td><strong data-toggle="tooltip" data-placement="bottom" title="'.$pilot[17].'">' .$pilot[15]. '</strong> '.$pilot[16].'</td>
                  <td>'.$pilot[7].'</td>
                  <td>'.$pilot[13].'</td>
                  <td>'.$pilot[14].'</td>
                </tr>';
            }
        } 
    }
  ?>
  </tbody>
  
  </table>
	<!-- script references -->