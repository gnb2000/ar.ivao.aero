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
        
  		<div class="col-md-9 text-center">

        <div class="tooltip-demo">

        <h2>Entrenamiento <small> Puntos de {{$userName->name}} {{$userName->surname}} ({{$userName->vid}})</small></h2>

        
        

        
        @foreach ($points as $point)
        @if ($point->type == 'a')
            <p><span class="badge bg-success text-white p-2">Puntos ATC: {{ $point->points }}</span></p>
        @else
            <p><span class="badge bg-success text-white p-2">Puntos Piloto: {{ $point->points }}</span></p>
            @if ( $point->points < 10)
              <span class="badge bg-warning text-dark p-2"> Puntos restantes para "Pilot Support: Bronze": {{10-($point->points)}}</span>
            @elseif ( $point->points >= 10 && $point->points < 20 )
              <span class="badge bg-warning text-dark p-2"> Puntos restantes para "Pilot Support: Silver": {{20-($point->points)}} </span>
            @elseif ( $point->points  >= 20 &&  $point->points  < 40 )
              <span class="badge  bg-warning text-dark p-2"> Puntos restantes para "Pilot Support: Gold": {{40-($point->points)}} </span>
            @elseif ( $point->points >= 40 &&  $point->points  < 60 )
              <span class="badge  bg-warning text-dark p-2"> Puntos restantes para "Pilot Support: Platinum": {{60-($point->points)}} </span>
            @elseif ( $point->points  >= 60 &&  $point->points  < 80 )
              <span class="badge bg-warning text-dark p-2"> Puntos restantes para "Pilot Support: Diamond": {{80-($point->points)}} </span>    
            @endif
            </p>
        @endif
        @endforeach
        

        </div><!-- /.tooltip-demo -->
        
      </div><!-- /.col-md-9 -->
	  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
  </div><!-- /.container -->
  

  </section>
@endsection