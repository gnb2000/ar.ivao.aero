@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
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
                        
                        <h2>Tours <small> Piernas</small></h2>
<a href="/intraweb/legs/{{$id}}/add" style="float:right;" data-original-title="Agregar" role="button" class="btn btn-success">Nueva Pierna</a>
                        <br>
                        <br>
                         
              @include('flash::message')
<table class="table table-striped">
      <thead class="thead-dark">
            <tr class="thead-dark">
              <th>#</th>
              <th>Tour</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Distancia</th>
              <th>EET</th>
              <th>Altitud M&aacute;x.</th>
              <th></th>
            </tr>
      </thead>
   <tbody>
@foreach($legs as $leg)
          <tr>
            <td>{{$leg->tour_leg}}</td>
            <td>{{$leg->code}}</td>
            <td>{{$leg->departure}}</td>
            <td>{{$leg->destination}}</td>
            <td>{{$leg->distancia}}</td>
            <td>{{$leg->EET}}</td>
            <td>{{$leg->max_altitude}}</td>
            <td style="text-align:center">
            <a href="/intraweb/legs/{{$leg->pierna}}/delete" data-original-title="Eliminar" role="button" class="btn btn-danger btn-md" >
            Eliminar
            </a>
            </td>
          </tr>
@endforeach
     </tbody>
 </table>
    
    <!-- FINAL CONTENIDO -->
  </section>
@endsection