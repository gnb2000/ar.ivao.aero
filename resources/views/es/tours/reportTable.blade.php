@extends('template')

@section('titulo')
<title>Tour Report :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

<div class="container marketing">
<h2>Tours <small> Reportar Vuelo</small><br /></h2>
                        
<div class="separacion-tablas"></div>

<a style="float:right; color: white;" data-original-title="Reporte Manual" href="/tours/report/manual" role="button" class="btn btn-success btn-lg">Reporte Manual</a><br><br>

@include('flash::message')
<table class="table table-striped">
      <thead class="thead-dark">
            <tr class="thead-dark">
              <th>#</th>
              <th>Tour</th>
              <th>Pierna</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Conexi&oacute;n</th>
              <th>Desconexi&oacute;n</th>
              <th></th>
            </tr>
      </thead>
   <tbody>
@foreach($flights as $flight)
          <tr>
            <td>F{{$flight->id}}</td>
            <td>{{$flight->code}}</td>
            <td>{{$flight->leg}}</td>
            <td>{{$flight->dep_icao}}</td>
            <td>{{$flight->arr_icao}}</td>
            <td>{{$flight->conn_time}}</td>
            <td>{{$flight->disc_time}}</td>
            <td><a href="/flights/{{$flight->id}}/report" data-original-title="Reportar" role="button" class="btn btn-success" >Reportar</a></td>
          </tr>
@endforeach
     </tbody>
 </table>

  <!-- INICIO TABLA -->
   </div><!-- /.container -->
</section>
@endsection