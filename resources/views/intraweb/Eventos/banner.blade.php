@extends('templateIntraweb')

@section('titulo')
<title>Intraweb :: IVAO Argentina</title>
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
<form class="form-horizontal" action="{{action('BannerController@addBanner')}}" enctype="multipart/form-data" method="post">
@csrf
<fieldset>
<!-- Form Name -->
<h2>Relaciones Públicas <small>Cargar Banner</small></h2>

<!-- File input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="imagen">Archivo</label>  
  <div class="col-md-4">
  <input id="imagen" name="imagen" class="form-control input-md" required type="file">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>
  <div class="col-md-4">
    <label class="radio-inline">
    <input type="radio" name="tipo" value="1" /> Evento
    </label>
    <label class="radio-inline">
    <input type="radio" name="tipo" value="2" /> Tour
    </label>
  </div>
</div> 


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Nombre">Nombre del Evento</label>  
  <div class="col-md-4">
  <input id="Nombre" name="Nombre" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Codigo">Código del evento</label>  
  <div class="col-md-4">
  <input id="Codigo" name="Codigo" placeholder="i.e. INDEPENDECIA17, LIBERTADOR17" class="form-control input-md" required type="text">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Enviar"></label>
  <div class="col-md-4">
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

</section>
@endsection