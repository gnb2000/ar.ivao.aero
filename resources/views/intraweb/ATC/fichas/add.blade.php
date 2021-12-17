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

<h2>ATC <small> Fichas</small></h2>
<br />

@include('flash::message')
<form class="form-horizontal" id="formulario" enctype="multipart/form-data" action="{{action('SheetController@add')}}" method="post">
  @csrf
    <div class="form-group">
      <label class="col-md-4 control-label" for="icao">ICAO</label>  
      <div class="form-group col-md-4">
        <input placeholder="i.e. SAAC" class="form-control input-md" id="icao" name="icao" type="text" required />
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
      <label class="col-md-4 control-label" for="version">Versi&oacute;n</label>  
      <div class="form-group col-md-4">
        <input placeholder="i.e. 1.2" class="form-control input-md" id="version" name="version" type="text" required />
      </div>
    </div>
            
    <!-- File input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="archivo">Archivo</label>  
      <div class="col-md-4">
        <input accept=".pdf" id="archivo" name="archivo" class="form-control input-md" required type="file">
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