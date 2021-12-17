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
<h2>Vuelos <small> Separado por aerol&iacute;nea</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Aerol&iacute;nea</th>
			<th>Vuelos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($aerolineas as $aerolinea)
			<tr>
				<td>{{$aerolinea->airline}}</td>
				<td>{{round($aerolinea->cuenta)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byVA" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byVA',
	data: [

	@php
	$countrecs = count($aerolineas);
	
	$i = 0;
	foreach($aerolineas as $aerolinea)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$aerolinea->airline.'", a:'.round($aerolinea->cuenta).' },';
		else
			echo '{ y: "'.$aerolinea->airline.'", a:'.round($aerolinea->cuenta).' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Flights'],
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