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
                        
                        <h2>Tours <small> Lista de Tours</small></h2>
<a href="/intraweb/tours/add" style="float:right;" data-original-title="Agregar Nuevo" role="button" class="btn btn-success">Nuevo Tour</a>
                         <br />
                         <br />
                         
              @include('flash::message')
             <table class="table table-hover">
                  <thead class="thead-dark">
                        <tr class="bg-primary2">
                          <th>Tour</th>
                          <th>Nombre</th>
                          <th>C&oacute;digo</th>
                          <th></th>
                        </tr>
                  </thead>

                 <tbody>
@foreach($tours as $tour)
      <tr>
        <td style="text-align: center;"><img src="https://files.ar.ivao.aero/Tours/{{$tour->year}}/{{$tour->image}}" alt="" style="max-height: 50%; max-width: 75%;" class="img-thumbnail"></td>
        <td>{{$tour->name}}</td>
        <td>{{$tour->code}}</td>
        <td><a href="/intraweb/legs/{{$tour->id}}/list" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Piernas"><img alt="editar" src="http://www.ar.ivao.aero/img/ico/pencil.png"></a> <a onClick="if(!confirm('&iquest;Est&aacute; seguro de que quiere eliminar el tour?')) return false;" data-original-title="Eliminar Tour" role="button" class="btn btn-default" href="/intraweb/tours/{{$tour->id}}/delete"><img alt="eliminar" src="http://www.ar.ivao.aero/img/ico/cross-circle.png"></a></td>
      </tr>
@endforeach
                                 
         </tbody>
     </table>
    
    <!-- FINAL CONTENIDO -->
  </section>
@endsection