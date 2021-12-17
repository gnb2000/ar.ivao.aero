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

<h2>Entrenamiento <small> Asignar Entrenador</small><br /></h2>
                        
<div class="separacion-tablas"></div>

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('TrainingController@assign', $id)}}" method="post" role="form">
  @csrf
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="trainer">Entrenador</label>  
  <div class="col-md-4">
      <select id="trainer" name="trainer" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      @foreach($trainers as $trainer)
      <option value="{{$trainer->vid}}">{{$trainer->name}}</option> 
      @endforeach
      </select>
    
  </div>
</div>
            
            <hr style="margin-bottom:20px;">
      
<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Asignar</button>
    <input type="reset" class="btn btn-warning" value="Restablecer" />
  </div>
</div>

    </fieldset>
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