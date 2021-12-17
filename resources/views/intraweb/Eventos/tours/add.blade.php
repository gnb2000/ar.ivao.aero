@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.2/tinymce.min.js" type="text/javascript"></script>
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
<form class="form-horizontal"  id="formulario" action="{{action('TourController@add')}}" method="post" role="form">
@csrf

<fieldset>
<div class="form-group col-md-4">
    <label class="control-label" for="banner">Banner</label>  
    <select id="banner" name="banner" class="form-control input-md" required>
    <option value="">Seleccionar...</option>
    @foreach($banners as $banner)
    <option value="{{$banner->id}}">{{$banner->Event}} - {{$banner->Code}}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="distancia">Distancia Total</label>
    <div class="col-md-4">
        <input class="form-control input-md" placeholder="689" id="distancia" name="distancia" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="tiempo">Tiempo Total</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="142:53" id="tiempo" name="tiempo" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="author">Autor</label>
    <div class="col-md-4">
    <input class="form-control input-md" id="author" name="author" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="acfts">Aeronaves</label>
    <div class="col-md-4">
    <input class="form-control input-md" placeholder="Ligeros, mono o multimotor a helice" id="acfts" name="acfts" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="wtc">Max Wake Turbulence</label>
    <div class="col-md-4">
      <select class="form-control" id="wtc" name="wtc">
      <option value="">Seleccionar...</option>
      <option value="1">L</option>
      <option value="2">M</option>
      <option value="3">H</option>
      <option value="4">S</option>
      </select>
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="flight_rules">Reglas de Vuelo</label>
    <div class="col-md-4">
    <select class="form-control" id="flight_rules" name="flight_rules">
		<option value="">Seleccionar...</option>
		<option value="V">VFR</option>
    <option value="I">IFR</option>
    <option value="Z">VFR/IFR</option>
    <option value="Y">IFR/VFR</option>
	</select>
    </div>
</div>

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="manual" name="manual">
    <label class="form-check-label" for="manual">Validaci&oacute;n manual</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="ias_above_250" name="ias_above_250" checked>
    <label class="form-check-label" for="ias_above_250">Evaluar IAS 250kt por debajo de FL100</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="gs_above_550" name="gs_above_550" checked>
    <label class="form-check-label" for="gs_above_550">Evaluar GS MAX 550kt</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="flight_rules" name="assess_fr" checked>
    <label class="form-check-label" for="flight_rules">Evaluar Reglas de Vuelo</label>
</div>

<div class="text-center  form-group">
  <label class="col-md-4 control-label" for="remarks">Reglas</label>
  <textarea id="remarks" name="reglas"></textarea>
</div>

<div class="text-center form-group">
  <label class="col-md-4 control-label" for="remarksen">Rules</label>
  <textarea id="remarksen" name="reglas_en"></textarea>
</div>


<div class="form-group col-md-4">
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
  
<script type="text/javascript" src="/js/TourNew.js"></script>
  
  <!-- /END THE FEATURETTES -->
  </section>
@endsection