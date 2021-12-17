@extends('template')

@section('titulo')
<title>Tour {{$tour->code}} :: IVAO Argentina</title>
@endsection

@php $year = date('Y'); @endphp

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

	<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
    			<div class="tooltip-demo">
				<center>
					<img alt="eventos" src="https://files.ar.ivao.aero/Tours/{{$tour->year}}/{{$tour->image}}" class="img-thumbnail" width="50%" height="auto">
						<br>
						<table class="table" style="width: 50%;">
							<tr>
								<td>Total Distance:</td>
								<td>{{$tour->distance}} NM</td>
							</tr>
							<tr>
								<td>Total Time:</td>
								<td>{{$tour->time}}</td>
							</tr>
							<tr>
								<td>Aircrafts:</td>
								<td>{{$tour->aircrafts}}</td>
							</tr>
							<tr>
								<td>Author:</td>
								<td>{{$tour->author}}</td>
							</tr>
							<tr>
								<td>Remarks:</td>
								<td>{!! $tour->rules_en !!}</td>
							</tr>
						</table>
					</center>
					<br><br> 
								<center>
								<a href="/tours/{{$tour->id}}/legs" class="btn-lg btn-success" role="button" target="_blank">LEGS</a>
								</center>
<div class="separacion-tablas"></div>
    
    
    			</div><!-- /.tooltip-demo -->
    	</div><!-- /.tabla-novedades -->
</div> <!-- container marketing -->	
</section>
@endsection								