@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/jquery.datetimepicker.css" rel="stylesheet">

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

<h2>HQ <small> Nueva Reuni&oacute;n</small></h2>
<br />
<div class="alert alert-danger" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde seleccionar las fechas en el sistema UTC.</div>

          
@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('MeetingController@add')}}" method="post" role="form">
  @csrf
  <fieldset>
    <!-- Text input-->
    <div class="form-group col-md-4">
      <label class="control-label" for="fecha">Fecha</label>
      <input autocomplete="off" class="form-control input-md" id="fecha" name="f1" type="text" required />
    </div>
    <div class="form-group">
      <label class="control-label" for="detalles">Detalles</label><br />
      <textarea id="detalles" name="detalles"></textarea>
    </div><br />
    <div class="form-group col-md-4">
      <div class="btn-group">
        <button type="submit" class="btn btn-success">Enviar</button>
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
<script src="/js/MeetingNew.js" type="text/javascript"></script>

  </section>
@endsection