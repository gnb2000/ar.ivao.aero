<?php require './funciones.php'; ?>

@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/ATCStats.js" type="text/javascript"></script>
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
<h2>FIR <small> Separado por FIR</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<th>FIR</th>
			<th>Horas</th>
		</tr>
	</thead>
	<tbody>
		@foreach($firHours as $firHour)
			<tr>
				<td>{{$firHour->fir}}</td>
				<td><?php echo obtenerHorasMinutos($firHour->suma); ?></td>
			</tr>
		@endforeach
	</tbody>
</table>
<center><div id="byFIR" style="height: 350px; width: 90%;"></div></center>
<script type="application/javascript">
Morris.Bar({
	element: 'byFIR',
	data: [

	@php
		$countrecs = count($firHours);
		
		$i = 0;
		foreach($firHours as $firHour)
		{
			if($i < $countrecs - 1)
				echo '{ y: "'.$firHour->fir.'", a:'.floor($firHour->suma / 3600).' },';
			else
				echo '{ y: "'.$firHour->fir.'", a:'.floor($firHour->suma / 3600).' }';

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

<h2>Posici&oacute;n <small> Separado por posici&oacute;n</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<th>Posici&oacute;n</th>
			<th>Horas</th>
			<th>FIR</th>
		</tr>
	</thead>
	<tbody>			
		@foreach($posHours as $posHour)
				<tr>
					<td>{{$posHour->callsign}}</td>
					<td><?php echo obtenerHorasMinutos($posHour->suma); ?></td>
					<td>{{$posHour->fir}}</td>
				</tr>
		@endforeach
	</tbody>
</table>
<center>
<div id="byPosition" style="height: 350px; width: 90%;"></div>
</center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byPosition',
	data: [

	@php
	$countrecs = count($posHours);
	
	$i = 0;
	foreach($posHours as $posHour)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$posHour->callsign.'", a:'.floor($posHour->suma / 3600).' },';
		else
			echo '{ y: "'.$posHour->callsign.'", a:'.floor($posHour->suma / 3600).' }';

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
<h2>VID <small> Separados por usuario</small></h2>
<br />
<table class="table table-hover">
	<thead class="thead-dark">
		<tr class="bg-primary2">
			<td>VID</td>
			<td>Horas</td>
		</tr>
	</thead>
	<tbody>
		@foreach($userHours as $userHour)
			<tr>
				<td><a href="https://www.ivao.aero/Member.aspx?Id={{$userHour->vid}}" target="_blank">
				{{obtenerNombreUsuario($userHour->vid)}}</a></td>
				<td>{{obtenerHorasMinutos($userHour->suma)}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<center>
<div id="byVID" style="height: 350px; width: 90%;"></div>
</center>
<script type="application/javascript"> new Morris.Bar({
	element: 'byVID',
	data: [

	@php
	$countrecs = count($userHours);
	
	$i = 0;
	foreach($userHours as $userHour)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.$userHour->vid.'", a:'.floor($userHour->suma / 3600).' },';
		else
			echo '{ y: "'.$userHour->vid.'", a:'.floor($userHour->suma / 3600).' }';

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