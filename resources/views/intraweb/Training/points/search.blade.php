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
          

        @include('flash::message')
        <form class="form-horizontal" id="formulario" action="{{action('PointsController@search')}}" method="post" role="form">
          @csrf

        <fieldset>
        <h2>Entrenamiento <small> Consultar puntos de un miembro</small></h2>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-2 control-label" for="search">VID</label>  
          <div class="col-md-8">
          <input id="search" name="search" placeholder="Ingrese VID del miembro" class="form-control input-md" type="text">
          </div>
        </div>

        <div class="form-group col-md-4">
            <button name="enviar" type="submit" class="btn btn-success">Buscar</button>
        </div>

        </fieldset>
                  
        </form>

        </div><!-- /.tooltip-demo -->
        
      </div><!-- /.col-md-9 -->
	  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
  </div><!-- /.container -->
  

  </section>
@endsection