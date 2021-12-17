@extends('template')

@section('titulo')
<title>Weather :: IVAO Argentina</title>
@endsection

@section('contenido')     
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

			<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
    
    	<div class="row">
        	<div class="col-md-3">
            
            <div class="list-group">
              <a class="list-group-item list-group-item-action active" href="#infrared" aria-controls="infrared" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Infrared</a>
              <a class="list-group-item list-group-item-action" href="#tops" aria-controls="tops" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Cloud Tops</a>
              <a class="list-group-item list-group-item-action" href="#visibleEN" aria-controls="visibleEN" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Visible</a>
              <a class="list-group-item list-group-item-action" href="#metarEN" aria-controls="metarEN" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; METAR</a>
              <a class="list-group-item list-group-item-action" href="#tafEN" aria-controls="tafEN" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; TAF</a>
            </div><!-- /.list-group -->

              </div><!-- /.col-md-3 -->
              <div class="col-md-9">
            
              <!-- Tab panes -->
              <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="infrared">
            
                    <h2>Infrared Satellite Image</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/VAP_C09_ARG_ALTA_20191217_175017Z.jpg" alt="Smiley face">
            
            </div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane" id="tops">
            
                    <h2>Satellite Image Cloud Tops</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/TOP_C13_ARG_ALTA_20191217_180017Z.jpg" alt="Smiley face"> 
            
            </div><!-- /.tabpanel -->
             <div role="tabpanel" class="tab-pane" id="visibleEN">
            
                    <h2>Visible Satellite Image</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/VIS_C02_ARG_ALTA_20191217_180017Z.jpg" alt="Smiley face">
            
            </div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane" id="metarEN">
            
                    <h2>METAR</h2>
					<div class="separacion-tablas"></div>
					
            		<pre><?php echo file_get_contents($_SERVER['DOCUMENT_ROOT']."/weather/source/ARmetar.txt"); ?></pre>
					
            </div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane" id="tafEN">
            
                    <h2>TAF</h2>
					<div class="separacion-tablas"></div>

					<pre><?php echo file_get_contents($_SERVER['DOCUMENT_ROOT']."/weather/source/ARtaf.txt"); ?></pre>
					
            </div><!-- /.tabpanel -->
           </div><!-- /.tab-content -->
                
        
        </div><!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
  </div><!-- /.container -->
</section>
@endsection