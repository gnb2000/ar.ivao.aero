<script language="javascript">
	
setTimeout(function(){
   window.location.reload(1);
}, 60000);
	
</script>


@extends('template')

@section('titulo')
<title>Infovuelos :: IVAO Argentina</title>
@endsection

@section('contenido')     
@php
require($_SERVER['DOCUMENT_ROOT'].'/elements/infovuelos.inc.php');
date_default_timezone_set('UTC');
use App\Models\Airport;
@endphp

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
			<div class="container marketing">

  		<div class="tooltip-web">
   <div class="tabla-novedades">
            
      <ul id="pestanas" class="nav nav-tabs nav-justified thumbnail setup-panel">
          <li class="nav-item"><a class="nav-link active" href="#departures" data-toggle="tab"><img alt="vuelos" src="/img/infovuelos/dep.png" width="32" style="border-radius: 5%; margin-bottom: 5px;" /> <h3><strong>Salidas</strong> <small> / Departures</small></h3></a></li> <!-- aria-controls="departures" role="tab" -->
          <li class="nav-item"><a class="nav-link" href="#arrivals" data-toggle="tab"><img alt="vuelos" src="/img/infovuelos/arr.png" width="32" style="border-radius: 5%; margin-bottom: 5px;" /> <h3><strong>Llegadas</strong> <small> / Arrivals</small></h3></a></li> <!-- aria-controls="arrivals" role="tab" -->
      </ul>
   
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="departures">

<div style="padding: 60px 0px 10px 0px;"></div>

<table class="table table-hover table-striped">
<thead class="thead-dark">
    <tr class="bg-primary2">
      <th><span data-toggle="tooltip" data-placement="bottom" title="Estimated Time Of Departure">ETOD</span></th>
      <th>Callsign</th>
      <th></th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Avión</th>
      <th>Salida</th>
      <!-- <th>Online</th> -->
      <th>Estado</th>
    </tr>
 </thead>

    <tbody>
    <?php
    if (count($pilots) != 0)
    {
        foreach($pilots as $pilot)
        {
            $pilot[46] = $pilot[46] == 1 ? '<span class="p-3 badge badge-primary">Rodando</span>' : '<span class="p-3 badge badge-info">En Ruta</span>';
                        
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
                if($pilot[46] == '<span class="p-3 badge badge-success">Rodando</span>' && $diferenciactetod > -1800)
            		{
            			$salida = 'N/A';
            			$pilot[46] = '<span class="p-3 badge badge-danger">Demorado</span>';
            		}
                else 
            		{
            			$salida = 'N/A';
            			$pilot[46] = '<span class="p-3 badge badge-success">Despegado</span>';
            		}
			      }
            else if($diferenciactetod < 1800)
      			{
      				if($pilot[46] == '<span class="p-3 badge badge-info">En Ruta</span>')
      				{
      					$pilot[46] = '<span class="p-3 badge badge-success">Despegado</span>';
      					$salida = 'N/A';
      				}
      				else if($diferenciactetod <= 180) $salida = '<span style="color: #5CB85C;" class="blink">'.floor($diferenciactetod/60).' min</span>';
      				else $salida = '<span style="color: #5CB85C;">'.floor($diferenciactetod/60).' min</span>';
      			}
      			else
      			{
      				$pilot[46] = '<span class="p-3 badge badge-default">Embarcando</span>';
      				$salida = 'N/A';
      			}

            $aeropuertoSalida = Airport::where('icao', $pilot[11])->first();
            $aeropuertoLlegada = Airport::where('icao', $pilot[13])->first();
            $airline = hayNumeros($pilot[0]) ? substr($pilot[0],0,3) : 'privado';
            $paisSalida = @$aeropuertoSalida->country;
            $paisLlegada = @$aeropuertoLlegada->country;
            $nombreSalida = @$aeropuertoSalida->name;
            $nombreLlegada = @$aeropuertoLlegada->name;
            $ciudadSalida = utf8_encode(@$aeropuertoSalida->city);
            $ciudadLlegada = utf8_encode(@$aeropuertoLlegada->city);
            $imgSalida = '<img style="margin-top: -3px;" alt="vuelos" src="/img/flags/16/'.$paisSalida.'.png" />';
            $imgLlegada = '<img style="margin-top: -3px;" alt="vuelos" src="/img/flags/16/'.$paisLlegada.'.png" />';
            
            
            
            if($paisSalida == 'Argentina')
            {
                echo '<tr>
                  <td>' .$etod.'</td>
                  <td><a href="/recursos/estado&cs='.$pilot[0].'">' .$pilot[0]. '</a></td>
                  <td><img style="width: 85px; height: 15px;" alt="Unknown" src="/img/infovuelos/airlines/'.$airline.'.gif" /></td>
                  <td>'.$imgSalida.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadSalida.'">' .$pilot[11]. '</strong> '.$nombreSalida.'</td>
                  <td>'.$imgLlegada.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadLlegada.'">' .$pilot[13]. '</strong> '.$nombreLlegada.'</td>
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
    
    <div class="tab-pane" id="arrivals">
    
<div style="padding: 60px 0px 10px 0px;"></div>
                            
<table class="table table-hover table-striped">
<thead class="thead-dark">
    <tr class="bg-primary2">
      <th><span data-toggle="tooltip" data-placement="bottom" title="Estimated Time Of Arrival">ETA</span></th>
      <th>Callsign</th>
      <th></th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Avión</th>
      <th>Llegada</th>
      <!-- <th>Online</th> -->
      <th>Estado</th>
    </tr>
 </thead>

 <tbody>
    <?php
    if (count($pilots) != 0) 
    {
        foreach($pilots as $pilot)
        {
            $pilot[46] = $pilot[46] == 1 ? '<span class="p-3 badge badge-primary">Rodando</span>' : '<span class="p-3 badge badge-info">En Ruta</span>';
            
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
                if($pilot[46] == '<span class="p-3 badge badge-info">En Ruta</span>')
				        {
        					$timeETA = $timeActual + 300;
        					$llegada = date('H:i', $timeETA);
        					$pilot[46] = '<span class="p-3 badge badge-danger">Demorado</span>';
        				}
            
        				else
        				{
        					$llegada = 'N/A';
        					$pilot[46] = '<span class="p-3 badge badge-success">Aterrizado</span>';					
        				}
			      }
            else if($diferenciaActETA < 1800)
      			{
      				if($pilot[46] == '<span class="p-3 badge badge-success">Rodando</span>')
      				{
      					$pilot[46] = '<span class="p-3 badge badge-success">Aterrizado</span>';
      					$llegada = 'N/A';
      				}
      				else if($diferenciaActETA <= 180) $llegada = '<span style="color: #5CB85C;" class="blink">'.floor($diferenciaActETA/60).' min</span>';
      				else $llegada = '<span style="color: #5CB85C;">'.floor($diferenciaActETA/60).' min</span>';
      			}
			      else $llegada = 'N/A';
			            
            $aeropuertoSalida = Airport::where('icao', $pilot[11])->first();
            $aeropuertoLlegada = Airport::where('icao', $pilot[13])->first();
            $airline = hayNumeros($pilot[0]) ? substr($pilot[0],0,3) : 'privado';
            $paisSalida = @$aeropuertoSalida->country;
            $paisLlegada = @$aeropuertoLlegada->country;
            $nombreSalida = @$aeropuertoSalida->name;
            $nombreLlegada = @$aeropuertoLlegada->name;
            $ciudadSalida = utf8_encode(@$aeropuertoSalida->city);
            $ciudadLlegada = utf8_encode(@$aeropuertoLlegada->city);
            $imgSalida = '<img style="margin-top: -3px;" alt="vuelos" src="/img/flags/16/'.$paisSalida.'.png" />';
            $imgLlegada = '<img style="margin-top: -3px;" alt="vuelos" src="/img/flags/16/'.$paisLlegada.'.png" />';
          
		
            if(strlen($pilot[22]) <= 3) $pilot[22] = str_pad($pilot[22], 4, '0', STR_PAD_LEFT);
            if(strlen($pilot[26]) == 1) $pilot[26] = str_pad($pilot[26], 2, '0', STR_PAD_LEFT);
            if(strlen($pilot[27]) == 1) $pilot[27] = str_pad($pilot[27], 2, '0', STR_PAD_LEFT);
                        
            if($paisLlegada == 'Argentina')
            {
                echo '<tr>
                  <td>'.$textETA.'</td>
                  <td><a href="/recursos/estado&cs='.$pilot[0].'">' .$pilot[0]. '</a></td>
                  <td><img style="width: 85px; height: 15px;" alt="Unknown" src="/img/infovuelos/airlines/'.$airline.'.gif" /></td>
                  <td>'.$imgSalida.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadSalida.'">' .$pilot[11]. '</strong> '.$nombreSalida.'</td>
                  <td>'.$imgLlegada.' <strong data-toggle="tooltip" data-placement="bottom" title="'.$ciudadLlegada.'">' .$pilot[13]. '</strong> '.$nombreLlegada.'</td>
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
</section>
@endsection