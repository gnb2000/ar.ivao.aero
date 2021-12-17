<?php require_once 'elements/infovuelos.inc.php'; date_default_timezone_set('UTC'); ?>

    <div class="header-bc_deps">
    
        <div class="container">
        	<div id="header-bg-ivao">
        
				<div id="titulo-header-bc"><i class="fa fa-info-circle"></i>
 Infovuelos</div>
        
        <ol class="breadcrumb-header">
  			<li><a href="index.php">Inicio</a></li>
            <li><a href="#">Recursos</a></li>
  			<li class="active">Infovuelos</li>
		</ol>
        
        
		</div><!-- /.container -->
	</div><!-- /.header-bc -->
    </div><!-- /.header-bg-ivao -->

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->

			<div class="container marketing">

  		<div class="tooltip-web">
   <div class="tabla-novedades">
            
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#departures" aria-controls="departures" role="tab" data-toggle="tab"><img alt="vuelos" src="images/infovuelos/dep.png" width="32" style="border-radius: 5%; margin-bottom: 5px;" /> <h3><strong>Salidas</strong> <small> / Departures</small></h3></a></li>
                <li><a href="#arrivals" aria-controls="arrivals" role="tab" data-toggle="tab"><img alt="vuelos" src="images/infovuelos/arr.png" width="32" style="border-radius: 5%; margin-bottom: 5px;" /> <h3><strong>Llegadas</strong> <small> / Arrivals</small></h3></a></li>
            </ul>
   
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="departures">
  
   <div class="content_infovuelos">
  <div class="visible_infovuelos">
    <p class="infovuelos">
      <img alt="vuelos" src="images/infovuelos/dep.png" width="42" style="border-radius: 5%;" />
    </p>
    <ul class="infovuelos">
      <li class="infovuelos">Salidas</li>
      <li class="infovuelos">Departures</li>
      <li class="infovuelos">Salidas</li>
    </ul>
  </div>
</div>



<div style="padding: 60px 0px 10px 0px;"></div>

<table class="table table-hover table-striped">
<thead class="thead-dark">
    <tr class="bg-primary2">
      <td><span data-toggle="tooltip" data-placement="bottom" title="Estimated Time Of Departure">ETOD</span></td>
      <td>Callsign</td>
      <td></td>
      <td>Origen</td>
      <td>Destino</td>
      <td>Avión</td>
      <td>Salida</td>
      <!-- <td>Online</td> -->
      <td>Estado</td>
    </tr>
 </thead>

    <tbody>
    <?php
    if (count($pilots) != 0)
    {
        foreach($pilots as $pilot)
        {
            $pilot[46] = $pilot[46] == 1 ? '<span class="label label-primary">Rodando</span>' : '<span class="label label-info">En Ruta</span>';
            
            $sqls = "SELECT * FROM aeropuertos WHERE icao = '$pilot[11]'";
            $sqlll = "SELECT * FROM aeropuertos WHERE icao = '$pilot[13]'";
            $rsalida = mysqli_query($con, $sqls);
            $rllegada = mysqli_query($con, $sqlll);
            $filas = mysqli_fetch_array($rsalida);
            $filall = mysqli_fetch_array($rllegada);
            
            if(strlen($pilot[22]) <= 3) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
            if(strlen($pilot[26]) == 1) $pilot[26] = str_pad($pilot[26], 2, '0', STR_PAD_LEFT);
            if(strlen($pilot[27]) == 1) $pilot[27] = str_pad($pilot[27], 2, '0', STR_PAD_LEFT);
            
            $timetod = mktime(substr($pilot[22],0,2), substr($pilot[22],2,2)) + 600;
            $etod = date('H:i', $timetod);
			$timeActual = mktime(date('H'));
			$horaActual = date('H', $timeActual);
			$difdia = (int)$horaActual - (int)(substr($pilot[22],0,2));
			if($difdia < -1) $timetod = mktime(substr($pilot[22],0,2), substr($pilot[22],2,2), date('s'), date('n'), (int)date('j') - 1);
			
            $diferenciactetod = $timetod - $timeActual;
            $salida = '';
            if($diferenciactetod < 0)
			{
                if($pilot[46] == '<span class="label label-success">Rodando</span>' && $diferenciactetod > -1800)
				{
					$salida = 'N/A';
					$pilot[46] = '<span class="label label-danger">Demorado</span>';
				}
                else 
				{
					$salida = 'N/A';
					$pilot[46] = '<span class="label label-success">Despegado</span>';
				}
			}
            else if($diferenciactetod < 1800)
			{
				if($pilot[46] == '<span class="label label-info">En Ruta</span>')
				{
					$pilot[46] = '<span class="label label-success">Despegado</span>';
					$salida = 'N/A';
				}
				else if($diferenciactetod <= 180) $salida = '<span style="color: #5CB85C;" class="blink">'.floor($diferenciactetod/60).' min</span>';
				else $salida = '<span style="color: #5CB85C;">'.floor($diferenciactetod/60).' min</span>';
			}
			else
			{
				$pilot[46] = '<span class="label label-default">Embarcando</span>';
				$salida = 'N/A';
			}
			
            $airline = hayNumeros($pilot[0]) ? substr($pilot[0],0,3) : 'privado';
            $paiss = $filas['pais'];
            $paisll = $filall['pais'];
            $nombres = $filas['nombre'];
            $nombrell = $filall['nombre'];
            $ciudads = utf8_encode($filas['ciudad']);
            $ciudadll = utf8_encode($filall['ciudad']);
            $imgs = "<img style=\"margin-top: -3px;\" alt=\"vuelos\" src=\"images/flags/16/$paiss.png\" />";
            $imgll = "<img style=\"margin-top: -3px;\" alt=\"vuelos\" src=\"images/flags/16/$paisll.png\" />";
            
            
            if($paiss == 'Argentina')
            {
                echo '<tr>
                  <td>' .$etod.'</td>
                  <td><a href="index.php?pagina=recursos/infovuelos/estado&cs='.$pilot[0].'">' .$pilot[0]. '</a></td>
                  <td><img alt="Unknown" src="images/infovuelos/airlines/'.$airline.'.gif" /></td>
                  <td>'.$imgs.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudads.'">' .$pilot[11]. '</strong> '.$nombres.'</td>
                  <td>'.$imgll.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadll.'">' .$pilot[13]. '</strong> '.$nombrell.'</td>
                  <td>'.substr($pilot[9],2,4). '</td>
                  <td>'.$salida.'</td>
                  <td>'.$pilot[46].'</td>
                </tr>';
            }
        } 
    }
  ?>
  </tbody>
  
  </table>
	</div><!-- /.tabpanel -->  
    <div role="tabpanel" class="tab-pane" id="arrivals">
    
<div class="content_infovuelos">
  <div class="visible_infovuelos">
    <p class="infovuelos">
      <img alt="vuelos" src="images/infovuelos/arr.png" width="42" style="border-radius: 5%;" />
    </p>
    <ul class="infovuelos">
      <li class="infovuelos">Llegadas</li>
      <li class="infovuelos">Arrivals</li>
      <li class="infovuelos">Llegadas</li>
    </ul>
  </div>
</div>



<div style="padding: 60px 0px 10px 0px;"></div>
                            
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
        foreach($pilots as $pilot)
        {
            $pilot[46] = $pilot[46] == 1 ? '<span class="label label-primary">Rodando</span>' : '<span class="label label-info">En Ruta</span>';
            
            $sqls = "SELECT * FROM aeropuertos WHERE icao = '$pilot[11]'";
            $sqlll = "SELECT * FROM aeropuertos WHERE icao = '$pilot[13]'";
            $rsalida = mysqli_query($con, $sqls);
            $rllegada = mysqli_query($con, $sqlll);
            $filas = mysqli_fetch_array($rsalida);
            $filall = mysqli_fetch_array($rllegada);
            
			$timeETA = obtenerETA($pilot[22], $pilot[24], $pilot[25]);
			$textETA = date('H:i', $timeETA);
            $timeActual = mktime(date('H'));
			$horaActual = date('H', $timeActual);
			$difdia = (int)$horaActual - (int)(substr($pilot[22],0,2));
			if($difdia < -1) $timetod = mktime(substr($pilot[22],0,2), substr($pilot[22],2,2), date('s'), date('n'), (int)date('j') - 1);
			
			$diferenciaActETA = $timeETA - $timeActual;
            $llegada = '';
            if($diferenciaActETA < 0)
			{
                if($pilot[46] == '<span class="label label-info">En Ruta</span>')
				{
					$timeETA = $timeActual + 300;
					$llegada = date('H:i', $timeETA);
					$pilot[46] = '<span class="label label-danger">Demorado</span>';
				}
				else
				{
					$llegada = 'N/A';
					$pilot[46] = '<span class="label label-success">Aterrizado</span>';					
				}
			}
            else if($diferenciaActETA < 1800)
			{
				if($pilot[46] == '<span class="label label-success">Rodando</span>')
				{
					$pilot[46] = '<span class="label label-success">Aterrizado</span>';
					$llegada = 'N/A';
				}
				else if($diferenciaActETA <= 180) $llegada = '<span style="color: #5CB85C;" class="blink">'.floor($diferenciaActETA/60).' min</span>';
				else $llegada = '<span style="color: #5CB85C;">'.floor($diferenciaActETA/60).' min</span>';
			}
			else $llegada = 'N/A';
			            
            $airline = hayNumeros($pilot[0]) ? substr($pilot[0],0,3) : 'privado';
            $paiss = $filas['pais'];
            $paisll = $filall['pais'];
            $ciudads = utf8_encode($filas['ciudad']);
            $ciudadll = utf8_encode($filall['ciudad']);
            $nombres = $filas['nombre'];
            $nombrell = $filall['nombre'];
            $imgs = "<img style=\"margin-top: -3px;\" alt=\"vuelos\" src=\"images/flags/16/$paiss.png\" />";
            $imgll = "<img style=\"margin-top: -3px;\" alt=\"vuelos\" src=\"images/flags/16/$paisll.png\" />";
			
            if(strlen($pilot[22]) <= 3) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
            if(strlen($pilot[26]) == 1) $pilot[26] = str_pad($pilot[26], 2, '0', STR_PAD_LEFT);
            if(strlen($pilot[27]) == 1) $pilot[27] = str_pad($pilot[27], 2, '0', STR_PAD_LEFT);
                        
            if($paisll == 'Argentina')
            {
                echo '<tr>
                  <td>'.$textETA.'</td>
                  <td><a href="index.php?pagina=recursos/infovuelos/estado&cs='.$pilot[0].'">' .$pilot[0]. '</a></td>
                  <td><img alt="Unknown" src="images/infovuelos/airlines/'.$airline.'.gif" /></td>
                  <td>'.$imgs.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudads.'">' .$pilot[11]. '</strong> '.$nombres.'</td>
                  <td>'.$imgll.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadll.'">' .$pilot[13]. '</strong> '.$nombrell.'</td>
                  <td>'.substr($pilot[9],2,4). '</td>
                  <td>'.$llegada.'</td>
                  <td>'.$pilot[46].'</td>
                </tr>';
            }
        } 
    }
  ?>
  </tbody>
  
  </table>
    
    </div><!-- /.tabpanel -->                 
</div><!-- /.tab-content -->

   </div><!-- /.tabla-novedades-->
   			</div><!-- /.tooltip -->
   
  		
        </div><!-- /.container marketing -->

	<!-- script references -->
         <script>
		$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)

</script>
<script>
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
</script>
<script><!-- /. SCRIPT: Tabs Secretaría  -->
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#tree1').treed();

$('#tree1 .branch').each(function(){

var icon = $(this).children('i:first');
icon.toggleClass('glyphicon-minus-sign glyphicon-plus-sign');
$(this).children().children().toggle();

});
</script>
<script>
    // tooltip demo
    $('.tooltip-web').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>
    <!-- /. ESTADO CON EFECTO -->
    <script type="text/javascript">
		$('#airport').airport([ 'moscow', 'berlin', 'stockholm' ]);
	</script>