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
<h2>Tours <small> Agregar Pierna</small></h2>

        <div class="tooltip-demo">
              @include('flash::message')
<form class="form-horizontal"  id="formulario" action="{{action('TourController@addLeg', $id)}}" method="post" role="form">
@csrf

<fieldset>
<div class="form-group">
  <label class="col-md-4 control-label" for="tour">Tour</label>
  <div class="col-md-4">
  <input class="form-control input-md" value="{{$code}}" id="tour" name="tour" type="text" disabled />
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="leg">Pierna</label>
    <div class="col-md-4">
        <input class="form-control input-md" maxlength="2" id="leg" name="leg" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="origen">Origen</label>
    <div class="col-md-4">
        <input class="form-control input-md" maxlength="4" id="origen" name="origen" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="destino">Destino</label>
    <div class="col-md-4">
        <input class="form-control input-md" maxlength="4" id="destino" name="destino" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="distancia">Distancia (NM)</label>
    <div class="col-md-4">
        <input class="form-control input-md" id="distancia" name="distancia" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="eet">EET</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="03:53" id="eet" name="eet" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="max_alt">Altitud M&aacute;x.</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="41000" id="max_alt" name="max_alt" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="detalles">Observaciones</label>
  <textarea id="detalles" name="texto"></textarea>
</div>

<div class="form-group col-md-4">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Agregar</button>
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
</div> <!-- /.contenidocentral -->
  
   <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">
  
  <!-- /END THE FEATURETTES -->

  </section>
@endsection