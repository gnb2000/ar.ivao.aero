@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/datepicker/build/jquery.datetimepicker.full.min.js"></script>
<script src="https://cdn.tiny.cloud/1/ljvoyyao1dgbpnre8epl68gks6h5ewdkn6davzj5oew4pcy5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
<form class="form-horizontal"  id="formulario" action="{{action('EventController@add')}}" method="post" role="form">
@csrf

<fieldset>
<div class="form-group col-md-4">
    <label class="control-label" for="banner">Banner</label>  
    <select id="banner" name="banner" class="form-control input-md" required>
    <option value="">Seleccionar...</option>
    @foreach($banners as $banner)
    <option value="{{$banner->File}}">{{$banner->Event}} - {{$banner->Code}}</option>
    @endforeach
    </select>
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="nombre">Nombre</label>  
  <input id="nombre" name="nombre" placeholder="Nombre evento" class="form-control input-md" required type="text">
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="fechainicio">Fecha Inicio</label>
  <input autocomplete="off" class="form-control input-md"  id="fechainicio" name="fechainicio" type="text" required />
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="fechafin">Fecha Finalizaci&oacute;n</label>
  <input autocomplete="off" class="form-control input-md"  id="fechafin" name="fechafin" type="text" required />
</div>

<div class="form-group col-md-4">
  <label class="control-label" for="idioma">Idioma</label>
  <select class="form-control" id="idioma" name="idioma">
    <option value="">Seleccionar...</option>
    <option value="es">Espa&ntilde;ol</option>
    <option value="en">English</option>
  </select>
</div>


<div class="form-group col-md-4">
  <label class="control-label" for="descripcion">Descripci&oacute;n</label>
  <textarea cols="50" rows="10" id="descripcion" name="descripcion"></textarea>
</div>

<!-- Select Basic -->
<div style="text-align: center;" class="form-group col-md-4">
  <label class="control-label" for="detalles">Detalles</label><br />
  <textarea id="detalles" name="detalles"></textarea>
</div><br />

<!-- Multiple Radios (inline) -->
<div class="form-group col-md-4">
  <label class="control-label" for="tipo">Tipo</label>
  <select class="form-control input-md"  name="tipo" id="tipo">
    <option value="">Seleccionar...</option>
    <option value="Evento Presencial">Presencial</option>
    <option value="Puente">Puente</option>
    <option value="Fly In">Fly In</option>
    <option value="Fly Out">Fly Out</option>
    <option value="Fly In&Out"> Fly In&amp;Out</option>
    <option value="SAR">SAR</option>
    <option value="Competencia">Competencia</option>
    <option value="Crowded Skies">Crowded Skies</option>
    <option value="Full Control">Full Control</option>
  </select>
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
  
  <!-- /END THE FEATURETTES -->
<script src="/js/EventNew.js"></script>

  </section>
@endsection