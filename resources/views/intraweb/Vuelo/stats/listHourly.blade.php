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
<h2>Vuelos <small> Separado por dia</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>D&iacute;a de la Semana</th>
			<th>Promedio de vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($dias as $dia)
			<tr>
				<td>{{$dia->Weekday}}</td>
				<td>{{round($dia->cuenta)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byDay" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byDay',
	data: [

	@php
	$countrecs = count($dias);
	
	$i = 0;
	foreach($dias as $dia)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$dia->Weekday.'", a:'.round($dia->cuenta).' },';
		else
			echo '{ y: "'.$dia->Weekday.'", a:'.round($dia->cuenta).' }';

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

<h2>Vuelos <small> Separado por hora</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Intervalo</th>
			<th>Vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($horas as $hora)
			<tr>
				<td>{{$hora->Inter}}</td>
				<td>{{round($hora->cuenta)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byHour" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byHour',
	data: [

	@php
	$countrecs = count($horas);
	
	$i = 0;
	foreach($horas as $hora)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$hora->Inter.'", a:'.round($hora->cuenta).' },';
		else
			echo '{ y: "'.$hora->Inter.'", a:'.round($hora->cuenta).' }';

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