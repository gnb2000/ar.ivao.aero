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
        <h2>Vuelo <small> Elite Pilots</small></h2>

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('VAController@eliteAdd')}}" method="post" role="form">
  @csrf
    <div class="form-group">
      <label class="col-md-4 control-label" for="vid">Miembro</label>  
      <div class="col-md-4">
        <select id="vid" name="vid" class="form-control input-md" required>
        <option value="">Seleccionar...</option>
        @foreach($users as $usuario)
        <option value="{{$usuario->vid}}">{{$usuario->vid}} - {{$usuario->name}} {{$usuario->surname}}</option>
        @endforeach
       </select>
      
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="position">Posici&oacute;n</label>  
      <div class="col-md-4">
          <input id="position" placeholder="EPA001" name="position" class="form-control input-md" required type="text">     
      </div>
    </div>

            <hr style="margin-bottom:20px;">
      
    <div class="form-group">
      <div class="col-md-4">
        <button type="submit" class="btn btn-success">Agregar</button>
        <input type="reset" class="btn btn-warning" value="Restablecer" />
      </div>
    </div>
          
    </form>

         </div><!-- /.tooltip-demo -->
        
        </div><!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
    </div><!-- /.container -->
</div> <!-- /.contenidocentral -->
  
   <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  
  <!-- /END THE FEATURETTES -->

  </section>
@endsection