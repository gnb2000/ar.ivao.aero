@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/datepicker/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="/assets/tinymce/tinymce.min.js"></script>
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

<h2>Tours <small> Validar Reporte</small><br /></h2>
                        
<div class="separacion-tablas"></div>
            
@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('TourController@validar', $id)}}" method="post" role="form">
  @csrf

<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="detalles">Comentarios</label>  
  <div class="col-md-4">
      <textarea id="detalles" name="comentarios" class="form-control input-md"></textarea>
  </div>
</div>
            
<hr style="margin-bottom:20px;">
      
<div class="form-group">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Enviar</button>
    <input type="reset" class="btn btn-warning" value="Restablecer" />
  </div>
</div>

    </fieldset>
</form>
<script type="text/javascript" src="/js/MeetingNew.js"></script>

         </div><!-- /.tooltip-demo -->
        
        </div><!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades-->
    
</div><!-- /.container -->
  
   <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  
  <!-- /END THE FEATURETTES -->

</section>
@endsection