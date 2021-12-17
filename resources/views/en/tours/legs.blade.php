@extends('template')

@section('titulo')
<title>Tour Legs :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

<div class="container marketing">
            
<table class="table table-striped">
      <thead class="thead-dark">
            <tr class="thead-dark">
              <th>#</th>
              <th>Departure</th>
              <th>Destination</th>
              <th>Distance</th>
              <th>EET</th>
              <th>Max Altitude</th>
            </tr>
      </thead>
   <tbody>
@foreach($legs as $leg)
          <tr>
            <td>{{$leg->tour_leg}}</td>
            <td>{{$leg->departure}} ({{$leg->depname}})</td>
            <td>{{$leg->destination}} ({{$leg->arrname}})</td>
            <td>{{$leg->distance}} NM</td>
            <td>{{$leg->EET}} h</td>
            <td>{{$leg->max_altitude}}</td>
          </tr>
@endforeach
     </tbody>
 </table>

  <!-- INICIO TABLA -->
   </div><!-- /.container -->
</section>
@endsection