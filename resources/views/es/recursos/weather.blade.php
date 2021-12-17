@extends('template')

@section('titulo')
<title>Meteorolog&iacute;a :: IVAO Argentina</title>
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
            
            <div class="list-group" role="tablist">
              <a class="list-group-item list-group-item-action disabled" href="#infrarojo" aria-controls="infrarojo" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Infrarojo</a>
              <a class="list-group-item list-group-item-action disabled" href="#topes" aria-controls="topes" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Topes Nubosos</a>
              <a class="list-group-item list-group-item-action disabled" href="#visible" aria-controls="visible" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Visible</a>
              <a class="list-group-item list-group-item-action active" href="#metar" aria-controls="metar" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; METAR</a>
              <a class="list-group-item list-group-item-action" href="#taf" aria-controls="taf" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; TAF</a>
            </div><!-- /.list-group -->

              </div><!-- /.col-md-3 -->
              <div class="col-md-9">
            
              <!-- Tab panes -->
              <div class="tab-content">
				<div role="tabpanel" class="tab-pane" id="infrarojo">
            
                    <h2>Imagen Satelital Infraroja</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/VAP_C09_ARG_ALTA_20191217_175017Z.jpg" alt="Smiley face">
            
				</div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane" id="topes">
            
                    <h2>Imagen Satelital Topes Nubosos</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/TOP_C13_ARG_ALTA_20191217_180017Z.jpg" alt="Smiley face"> 
            
            </div><!-- /.tabpanel -->
             <div role="tabpanel" class="tab-pane" id="visible">
            
                    <h2>Imagen Satelital Visible</h2>
					<div class="separacion-tablas"></div>
    
            		<img src="https://estaticos.smn.gob.ar/vmsr/satelite/VIS_C02_ARG_ALTA_20191217_180017Z.jpg" alt="Smiley face">
            
            </div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane active" id="metar">
            
                    <h2>METAR</h2>
					<div class="separacion-tablas"></div>
					
            		<pre><?php echo file_get_contents($_SERVER['DOCUMENT_ROOT']."/weather/source/ARmetar.txt"); ?></pre>
					
            </div><!-- /.tabpanel -->
            <div role="tabpanel" class="tab-pane" id="taf">
            
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