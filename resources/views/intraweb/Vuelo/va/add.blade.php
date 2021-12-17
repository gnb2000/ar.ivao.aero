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
<form class="form-horizontal" id="formulario" action="{{action('VAController@add')}}" method="post" role="form">
  @csrf
<div class="form-group">
  <label class="col-xs-3 control-label" for="tipo">Tipo</label>
  <div id="tipo" class="form-group">
      <input value="1" name="tipo" type="radio" required /> VA
      <input value="2" name="tipo" type="radio" required /> SOG
  </div>
</div> 


<div class="form-group">
  <label class="col-md-3 control-label" for="id">ID VA System</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="i.e. 19857" id="id" name="id" type="text" required />
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-3 control-label" for="nombre">Nombre</label>  
    <div class="col-md-3">
          <input class="form-control input-md" id="nombre" name="nombre" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="icao">ICAO</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="icao" name="icao" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="iata">IATA</label>
    <div class="col-md-3">
          <input class="form-control input-md" id="iata" name="iata" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="url">Web</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="http://flybondivirtual.com.ar/" id="url" name="url" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="logo">Logo</label>
    <div class="col-md-3">
          <input class="form-control input-md" placeholder="https://www.ivao.aero/data/images/logo2/L-FBZ.jpg" id="logo" name="logo" type="text" required />
    </div>
</div>
            
            <hr style="margin-bottom:20px;">
      
    <div class="form-group">
      <div class="col-md-4">
        <button type="submit" class="btn btn-success">Agregar</button>
        <input type="reset" class="btn btn-warning" value="Restablecer" />
      </div>
    </div>
          
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