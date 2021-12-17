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
          
<form class="form-horizontal" id="formulario" action="{{action('UserController@edit', $miembro->vid)}}" method="post" role="form">
  @csrf

<fieldset>
<!-- Form Name -->
<h2>Miembros <small> Editar</small></h2>

<!-- File input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vid">VID</label>  
  <div class="col-md-4">
  <input id="vid" placeholder="{{$miembro->vid}}" class="form-control input-md" disabled type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" value="{{$miembro->name}}" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="apellido">Apellido</label>
    <div class="col-md-4">
        <input class="form-control input-md" value="{{$miembro->surname}}" id="apellido" name="apellido" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>
    <div class="col-md-4">
    <input class="form-control input-md" value="{{$miembro->email}}" id="email" name="email" type="text" required />
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="cumple">Cumplea&ntilde;os</label>
    <div class="col-md-4">
    <input class="form-control input-md" value="{{$miembro->birthday}}" id="cumple" name="cumple" type="text" required />
    </div>
</div>

<div class="form-group">
  <div class="col-md-4">
  <button type="submit" class="btn btn-default" name="enviar">Editar</button>
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