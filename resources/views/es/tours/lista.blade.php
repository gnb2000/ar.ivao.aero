@extends('template')

@section('titulo')
<title>Tours :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

		<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
    			<div class="tooltip-demo">
@if(count($tours) != 0)
	@foreach($tours as $tour)
		<div class="row">
			<div class="col-md-3">							  
			<img alt="eventos" src="https://files.ar.ivao.aero/Tours/{{$tour->year}}/{{$tour->code}}.jpg" class="img-thumbnail">
			</div> 
			<div class="col-md-9">
			<h2 class="title">{{$tour->name}} <span class="line"></span></h2>
			<div class="separacion-eventos"></div>
			<span style="padding-right: 25px;"><i class="fa fa-plane fa-fw"></i> <strong style="color: #2A4982;">{{$tour->distance}}nm</strong></span> 
			<span style="padding-right: 25px;"><i class="fa fa-clock-o fa-fw"></i> <strong style="color: #2A4982;">{{$tour->time}}hs</strong></span>   
			<span class="label-ivaoar label-ivaoar_bg pull-right">{{$tour->status}}</span>
			<div class="separacion-tablas"></div>
			<p style="text-align:justify">Aeronaves: {{$tour->aircrafts}}</p>
			<div class="separacion-tablas"></div>
			<p>
			<a class="btn btn-success btn-sm" href="/?pagina=tours/detalles&tour={{$tour->code}}" role="button"><i class="fa fa-plus-square"></i>&nbsp;&nbsp; <strong>Ver M&aacute;s</strong></a>  
			<a class="btn btn-default btn-sm" href="https://tours.ivao.aero/cgi-bin/tours.pl?division=AR&tour={{$tour->code}}" target="_blank" role="button"><i class="fa fa-plus-square"></i>&nbsp;&nbsp; Reportar</a><!--  <a class="btn btn-default btn-sm" href="#" role="button"><i class="fa fa-plane"></i>&nbsp;&nbsp; Reservar ATC</a>--></p>
			</div>
			</div>
			<div class="separacion-tablas"></div>';
	@endforeach
@else
	<div class="row">
	<h2 class="title">No hay tours</h2>
	</div>

@endif
     	
 <div class="separacion-tablas"></div>
    
    </div><!-- /.tooltip-demo -->
    </div><!-- /.tabla-novedades -->
</div> <!-- container marketing -->	
</section>
@endsection