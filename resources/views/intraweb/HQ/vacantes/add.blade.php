@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">

<script src="/assets/tinymce/tinymce.min.js" type="text/javascript" type="text/javascript"></script>
<script src="/assets/datepicker/build/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script src="/js/EventNew.js" type="text/javascript"></script>
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
<form class="form-horizontal"  id="formulario" action="{{action('StaffController@addVacancy')}}" method="post" role="form">
  @csrf

<fieldset>

<!-- Posicion STAFF -->
<div class="form-group">
  <label class="col-md-4 control-label" for="posicion"><strong>Posición</strong></label>  
  <div class="col-md-4">
      <select id="posicion" name="posicion" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      @foreach($positions as $position)
      <option value="{{$position->Id}}">{{$position->Id}} - {{$position->PosName}}</option>
      @endforeach
      </select>
  </div>
</div>


<!-- Fecha de finalizacion -->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha"><strong>Fecha Finalizaci&oacute;n</strong></label>
  <div class="col-md-6">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="tipo" value="0">
      <label class="form-check-label" for="tipoFecha"> Indeterminado</label>
    </div>
		<div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="tipo" value="1">
      <label class="form-check-label" for="tipoFecha">
        <div class="input-group mb-3">
          <input type="text" name="fecha" class="form-control" placeholder="YYYY/MM/DD">
        </div>
      </label> 
		</div>
  </div>
</div>

<!-- Estado de vacante 
<div class="form-group">
  <label class="col-md-4 control-label" for="estado"><strong>Estado de vacante</strong></label>
  <div class="col-md-6">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="estado" value="1">
      <label class="form-check-label" for="estadoRadio">Abierta</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="estado" value="0">
      <label class="form-check-label" for="estadoRadio">Cerrada</label>
    </div>
  </div>
</div> -->

<!-- Texto adicional -->
<div class="form-group">
  <div class="col-md-4">
    <label class="form-label" for="texto"><strong>Texto</strong></label>
    <textarea name="texto" id="text" class="form-control" cols="80" rows="7"></textarea>
  </div>
</div>



<div class="form-group">
  <div class="col-md-4">
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
@endsection