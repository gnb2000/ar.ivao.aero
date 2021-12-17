@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
@endsection

@section('headextra')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link href="/assets/datepicker/build/jquery.datetimepicker.min.css" rel="stylesheet">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
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
        

                      <!-- INICIO CONTENIDO -->
<h2>Actividad ATC<small> Jefes de FIR</small></h2>
<br />
<div class="alert alert-warning" role="alert"><strong>Atenci&oacute;n!</strong> Recuerde seleccionar las fechas en el sistema UTC.</div>
<form class="form-horizontal" action="{{action('OnlineController@FIRStats')}}" method="post" role="form">
  @csrf
  <fieldset>
    <!-- Text input-->
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