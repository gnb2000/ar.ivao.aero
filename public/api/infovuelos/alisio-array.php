<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once 'api.infovuelos.ele.php';
date_default_timezone_set('UTC'); 
include ("../../stylesheet.php");
?>
    <?php
    if (count($pilots) != 0) 
    {
        foreach($pilots as $pilot){
            print_r($pilot);
        } 
    }
  ?>

  
  
	<!-- script references -->