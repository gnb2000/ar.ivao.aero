@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/funciones.js" type="text/javascript"></script>
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

<h2>Entrenamiento <small> Agregar Asistencia</small></h2>
<br />

@include('flash::message')
<form enctype="multipart/form-data" class="form-horizontal" id="formulario" action="{{action('PointsController@add')}}" method="post">
  @csrf
<fieldset>


<div class="form-group">
    <label class="col-md-3 control-label" for="id">ID del Examen/Training</label>
    <div class="col-md-4">
      <select id="id" name="id" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      @foreach($trainings as $training)
      <option value="{{$training->id}}">{{$training->id}}</option>
      @endforeach
      @foreach($exams as $exam)
      <option value="{{$exam->id}}">{{$exam->id}}</option>
      @endforeach
     </select>
    </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label" for="url">Counting Sheet</label>
    <div class="col-md-6">
     <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        <input class="form-control input-md" id="url" name="archivo" type="file" />
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="fecha">Fecha de Asistencia</label>
    <div class="col-md-3">
        <input onChange="DateChange(this)" autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="comments">Controladores</label>
    <div class="col-md-3">
        <select id="selATCs" style="width: 300px;" name="atcs[]" multiple></select>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="comments">Pilotos</label>
    <div class="col-md-3">
        <select id="selPilots" style="width: 300px;" name="pilotos[]" multiple></select>
    </div>
</div> 

<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Agregar</button>
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