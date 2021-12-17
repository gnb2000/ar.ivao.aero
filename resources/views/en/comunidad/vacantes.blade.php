@extends('template')

@section('titulo')
<title>Vacantes :: IVAO Argentina</title>
@endsection

@section('contenido')
@php
	//LOGIN VERIFICATION START
	if(!Auth::check())
		die('<script type="text/javascript">window.location="/error/401";</script>');
	//LOGIN VERIFICATION END
@endphp

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
			<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">

    <div class="separacion-tablas"></div>
	 
<table class="table table-stripe">

	<thead class="thead-dark">
        <tr>
          <th></th>
          <th>ID</th>
          <th>Nombre de Posici&oacute;n</th>
          <th>Publicación</th>
		  <th>Cierre</th>
          <th>Estado</th>
          <th></th>
        </tr>
     </thead>

     <tbody>
@php
$hoy = date("Y-m-d");
@endphp    

@foreach($vacantes as $vacante)
	
 	@php
	$LastChg = date('d/m/Y', strtotime($vacante->LastChg));
	$FinalVac = date('d/m/Y', strtotime($vacante->FinalVac));
	@endphp 

	<tr>
	  <td><img alt="convocatoria" src="/img/check-responsive.png"></td>
	  <td>{{$vacante->Id}}</td>
	  <td>{{$vacante->PosName}}</td>
	  <td>{{$LastChg}}</td>
	  
	  @if($vacante->FinalVac == '0000-00-00')
	  <td>Indeterminado</td>
	  <td>Abierta</td>
	  <td><a href="mailto:ar-hq@ivao.aero?subject=Postular%20a%20{{$vacante->Id}}" class="btn btn-primary btn-sm" role="button">Postular</a></td>
	  @elseif($FinalVac < $hoy)
	  <td>{{$FinalVac}}</td>
	  <td>Cerrada</td>
	  <td><a href="#" class="btn btn-primary btn-sm disabled" role="button">Ver M&aacute;s</a></td>
	  @else
	  <td>{{$FinalVac}}</td>
	  <td>Abierta</td>
	  <td><a href="mailto:ar-hq@ivao.aero?subject=Postular%20a%20{{$vacante->Id}}" class="btn btn-primary btn-sm disabled" role="button">Postular</a></td>
	  @endif
	</tr>
@endforeach
	 
                                                            
         </tbody>
     </table>
</div><!-- /.tabla-novedades -->
</div><!-- /.container -->
</section>
@endsection