<?php require './funciones.php'; ?>

@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

		<div class="container marketing">

   <div class="tabla-novedades">
   
   	<div class="row">
  		<div class="col-md-3">
        
        		<!-- /. MENU INTRAWEB ./ -->
        
         		@php include($_SERVER['DOCUMENT_ROOT'].'/intranet/menu_intraweb.php'); @endphp
        
        </div><!-- /.col-md-3 -->
        
  		<div class="col-md-9">

        <div class="tooltip-demo">
        

                      <!-- INICIO CONTENIDO -->
<h2>Estad&iacute;sticas <small> Vuelos Totales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th></th>
            <th>Totales</th>
			<th>Nacionales</th>
            <th>Internacionales</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Vuelos</td>
			<td>{{$vuelosTotales}}</td>
			<td>{{$vuelosNacionales}}</td>
			<td>{{$vuelosInternacionales}}</td>
		</tr>
		<tr>
			<td>Horas</td>
			<td>{{obtenerHorasMinutos($horasInternacionales)}}</td>
			<td>{{obtenerHorasMinutos($horasNacionales)}}</td>
			<td>{{obtenerHorasMinutos($horasTotales)}}</td>
		</tr>
	</tbody>
</table>

<h2>Aeropuertos <small> Separado por Aeropuerto</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Aeropuerto</th>
			<th>Horas</th>
		</tr>
	</thead>
	<tbody>			
		@foreach($aeropuertos as $aeropuerto)
		<tr>
			<td>{{$aeropuerto->icao}}</td>
			<td>{{obtenerHorasMinutos($aeropuerto->suma)}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byAirport" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byAirport',
	data: [

	@php
	$countrecs = count($aeropuertos);
	
	$i = 0;
	foreach($aeropuertos as $aeropuerto)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$aeropuerto->icao.'", a:'.floor($aeropuerto->suma / 3600).' },';
		else
			echo '{ y: "'.$aeropuerto->icao.'", a:'.floor($aeropuerto->suma / 3600).' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script> 

<h2>Pilotos <small> Separado por piloto</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Piloto</th>
			<th>Horas</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pilotos as $piloto)
			<tr>
				<td><a href="https://www.ivao.aero/Member.aspx?Id={{$piloto->vid}}" target="_blank">
				{{obtenerNombreUsuario($piloto->vid)}}</a></td>
				<td>{{obtenerHorasMinutos($piloto->suma)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byVID" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byVID',
	data: [

	@php
	$countrecs = count($pilotos);
	
	$i = 0;
	foreach($pilotos as $piloto)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$piloto->vid.'", a:'.floor($piloto->suma / 3600).' },';
		else
			echo '{ y: "'.$piloto->vid.'", a:'.floor($piloto->suma / 3600).' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script>

<h2>Dom&eacute;sticos <small> Vuelos Nacionales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Origen</th>
			<th>Destino</th>
			<th>Vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($nacionales as $nacional)
			<tr>
				<td>{{$nacional->departure}}</td>
				<td>{{$nacional->destination}}</td>
				<td>{{$nacional->cuenta}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="nac" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'nac',
	data: [

	@php
	$countrecs = count($nacionales);
	
	$i = 0;
	foreach($nacionales as $nacional)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$nacional->departure.'-'.$nacional->destination.'", a:'.$nacional->cuenta.' },';
		else
			echo '{ y: "'.$nacional->departure.'-'.$nacional->destination.'", a:'.$nacional->cuenta.' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script>

<h2>Internacionales <small> Vuelos Internacionales</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Origen</th>
			<th>Destino</th>
			<th>Vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($internacionales as $internacional)
			<tr>
				<td>{{$internacional->departure}}</td>
				<td>{{$internacional->destination}}</td>
				<td>{{$internacional->cuenta}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="inter" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'inter',
	data: [

	@php
	$countrecs = count($internacionales);
	
	$i = 0;
	foreach($internacionales as $internacional)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$internacional->departure.'-'.$internacional->destination.'", a:'.$internacional->cuenta.' },';
		else
			echo '{ y: "'.$internacional->departure.'-'.$internacional->destination.'", a:'.$internacional->cuenta.' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script>

<h2>Aerol&iacute;neas <small> Separado por aerol&iacute;nea</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Aerol&iacute;neas</th>
			<th>Vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($aerolineas as $aerolinea)
			<tr>
				<td>{{$aerolinea->airline}}</td>
				<td>{{$aerolinea->cuenta}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="va" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'va',
	data: [

	@php
	$countrecs = count($aerolineas);
	
	$i = 0;
	foreach($aerolineas as $aerolinea)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$aerolinea->airline.'", a:'.$aerolinea->cuenta.' },';
		else
			echo '{ y: "'.$aerolinea->airline.'", a:'.$aerolinea->cuenta.' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 60
	});
</script>

</div>
</div>
</div>
</div>
</div>
</section>
@endsection