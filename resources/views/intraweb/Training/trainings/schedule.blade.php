@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
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

<h2>Entrenamiento <small> Programar Entrenamiento</small></h2>
<br />

@include('flash::message')
<form enctype="multipart/form-data" class="form-horizontal" id="formulario" action="{{action('TrainingController@trainingSchedule')}}" method="post">
  @csrf
<fieldset>

<div class="form-group">
  <label class="col-md-3 control-label" for="id">ID</label>
   <div class="col-md-3">
        <input class="form-control input-md" id="id" name="id" placeholder="i.e. 1545" type="text" required />
   </div> 
</div>

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

<div class="form-group">
  <label class="col-md-3 control-label" for="rango">Entrenamiento</label>
   <div class="col-md-3">
      <select id="rango" name="rango" class="form-control input-md" required>
          <option value="">Seleccionar...</option>
          <option value="ADC">ADC</option>
          <option value="APC">APC</option>
          <option value="ACC">ACC</option>
      </select>
   </div> 
</div>

<div class="form-group">
    <label class="col-md-4 control-label" for="posicion">Posici&oacute;n ATC</label>  
    <div class="col-md-4">
      <select id="posicion" name="posicion" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
          <option value="SADP_TWR">SADP_TWR</option>
          <option value="SACO_TMA_APP">SACO_APP</option>
          <option value="SAME_TMA_APP">SAME_APP</option>
          <option value="SAEF_CTR">SAEF_CTR</option>
     </select>
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="fecha">Fecha</label>
    <div class="col-md-3">
        <input autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Programar</button>
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

<script src="/js/Schedule.js" type="text/javascript"></script>

@endsection