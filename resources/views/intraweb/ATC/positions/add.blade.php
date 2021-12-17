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

<h2>ATC <small> Facility Ratings</small></h2>
<br />

@include('flash::message')
<form class="form-horizontal" id="formulario" action="{{action('FRAController@add')}}" method="post" role="form">
  @csrf
    <div class="form-group">
      <label class="col-md-4 control-label" for="posicion">Posici&oacute;n</label>  
      <div class="form-group col-md-4">
        <input placeholder="i.e. SAAC_TWR" class="form-control input-md" id="posicion" name="posicion" type="text" required />
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="nombre">Nombre</label>  
      <div class="form-group col-md-4">
        <input placeholder="i.e. Concordia Torre" class="form-control input-md" id="nombre" name="nombre" type="text" required />
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="fir">FIR</label>  
      <div class="col-md-4">
        <select id="fir" name="fir" class="form-control input-md" required>
        <option value="SAEF">Ezeiza</option>
        <option value="SACF">C&oacute;rdoba</option>
        <option value="SAMF">Mendoza</option>
        <option value="SAVF">Comodoro Rivadavia</option>
        <option value="SARR">Resistencia</option>
       </select>
      </div>
    </div>
            
    <div class="form-group">
      <label class="col-md-4 control-label" for="frecuencia">Frecuencia</label>  
      <div class="form-group col-md-4">
        <input placeholder="i.e. 118.6" class="form-control input-md" id="frecuencia" name="frecuencia" type="text" required />
      </div>
    </div>

            <hr style="margin-bottom:20px;">
      
    <div class="form-group">
      <div class="btn-group">
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