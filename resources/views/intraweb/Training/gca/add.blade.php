@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="/assets/tinymce/tinymce.min.js" type="text/javascript"></script>
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

<h2>ATC <small> Fichas</small></h2>
<br />

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('GcaController@add')}}" method="post">
  @csrf
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="vid">Miembro (VID)</label>
    <div class="col-md-4">
        <input placeholder="e.g. 123456" class="form-control input-md" id="vid" name="vid" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Miembro (Nombre)</label>
    <div class="col-md-4">
        <input placeholder="e.g. Federico Chuste" class="form-control input-md" id="nombre" name="nombre" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="fecha">Fecha Aceptaci&oacute;n</label>
    <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md" id="fecha" name="fecha" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rango">Rango</label>
   <div class="col-md-4">
      <select id="rango" name="rango" class="form-control input-md" required>
      <option value="">Seleccionar...</option>
      <option value="ADC">ADC</option>
      <option value="APC">APC</option>
      <option value="ACC">ACC</option>
      </select>
   </div> 
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="detalles">Restricciones</label><br />
  <br />
  <center><textarea rows="8" cols="60" id="detalles" name="restricciones"></textarea></center>
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
<script src="/js/GCA.js" type="text/javascript"></script>

  </section>
@endsection