<?php require './funciones.php'; ?>

@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" integrity="sha512-fjy4e481VEA/OTVR4+WHMlZ4wcX/+ohNWKpVfb7q+YNnOCS++4ZDn3Vi6EaA2HJ89VXARJt7VvuAKaQ/gs1CbQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js" integrity="sha512-tBzZQxySO5q5lqwLWfu8Q+o4VkTcRGOeQGVQ0ueJga4A1RKuzmAu5HXDOXLEjpbKyV7ow9ympVoa6wZLEzRzDg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" integrity="sha512-6Cwk0kyyPu8pyO9DdwyN+jcGzvZQbUzQNLI0PadCY3ikWFXW9Jkat+yrnloE63dzAKmJ1WNeryPd1yszfj7kqQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
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
			<th>Nombre</th>
			<th>FIR</th>
			<th>Horas</th>
		</tr>
	</thead>
	<tbody>
		@foreach($firChiefs as $firChief)
			<tr>
				<td>{{$firChief->name}}</td>
				<td>{{$firChief->fir}}</td>
				<td><?php echo obtenerHorasMinutos($firChief->suma); ?></td>
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
		$countrecs = count($firChiefs);
		
		$i = 0;
		foreach($firChiefs as $firChief)
		{
			if($i < $countrecs - 1)
				echo '{ y: "'.$firChief->fir.'", a:'.floor($firChief->suma / 3600).' },';
			else
				echo '{ y: "'.$firChief->fir.'", a:'.floor($firChief->suma / 3600).' }';

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
			<td>Nombre</td>
			<td>Horas</td>
		</tr>
	</thead>
	<tbody>
		@foreach($firUsers as $firUser)
			<tr>
				<td><a href="https://www.ivao.aero/Member.aspx?Id={{$firUser->vid}}" target="_blank">
				{{obtenerNombreUsuario($firUser->vid)}}</a></td>
				<td>{{obtenerHorasMinutos($firUser->suma)}}</td>
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
	$countrecs = count($firUsers);
	
	$i = 0;
	foreach($firUsers as $firUser)
	{
		if($i < $countrecs - 1)
			echo '{ y: "'.obtenerNombreUsuario($firUser->vid).'", a:'.round($firUser->suma / 3600).' },';
		else
			echo '{ y: "'.obtenerNombreUsuario($firUser->vid).'", a:'.round($firUser->suma / 3600).' }';

		$i++;
	}
	@endphp

	],
	xkey: 'y',
	ykeys: ['a'],
	labels: ['Online Hours'],
	xLabelAngle: 45
	});
</script>

<script src="/js/ATCStats.js" type="text/javascript"></script>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection