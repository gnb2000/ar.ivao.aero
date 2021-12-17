@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js" integrity="sha512-L7jgg7T9UbYc7hXogUKssqe1B5MsgrcviNxsRbO53dDSiw/JxuA/4kVQvEORmZJ6Re3fVF3byN5TT7czo9Rdug==" crossorigin="anonymous"></script>
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
        

                      <!-- INICIO CONTENIDO -->
<h2>Actividad ATC<small> FIR</small></h2>
<br />
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde seleccionar las fechas en el sistema UTC.</div>
<form class="form-horizontal" action="{{action('OnlineController@ATCFIRStats')}}" method="post" role="form">
  @csrf
  <fieldset>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="vid">VID</label>
      <div class="col-md-4">
        <input class="form-control input-md" id="vid" name="vid" type="text" required />
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="fechainicio">Fecha Inicio</label>
      <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md" id="fechainicio" name="f1" type="text" required />
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="fechafin">Fecha Fin</label>
      <div class="col-md-4">
        <input autocomplete="off" class="form-control input-md" id="fechafin" name="f2" type="text" required />
      </div>
    </div>
    <div class="form-group col-md-4">
      <div class="btn-group">
        <button type="submit" class="btn btn-success">Enviar</button>
        <input type="reset" class="btn btn-warning" value="Restablecer" />
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>
</div>
</div>
</div>

<script src="/js/ATCStats.js" type="text/javascript"></script>

</section>
@endsection