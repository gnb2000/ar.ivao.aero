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
<form class="form-horizontal" id="formulario" action="{{action('StatisticController@add')}}" method="post" enctype="multipart/form-data" role="form">
  @csrf

<fieldset>
<!-- Form Name -->
<h2>Miembros <small> Cargar Estad&iacute;sticas</small></h2>

<!-- File input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="file">File</label>  
  <div class="col-md-4">
  <input id="file" name="file" class="form-control input-md" required type="file">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalMembers">Total Members</label>  
  <div class="col-md-4">
  <input id="TotalMembers" name="TotalMembers" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ActiveMembers">Active Members</label>  
  <div class="col-md-4">
  <input id="ActiveMembers" name="ActiveMembers" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalTime">Total Time</label>  
  <div class="col-md-4">
  <input id="TotalTime" name="TotalTime" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="RegWeek">Registered this Week</label>  
  <div class="col-md-4">
  <input id="RegWeek" name="RegWeek" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Button -->
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

  </section>
@endsection