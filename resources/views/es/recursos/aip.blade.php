@extends('template')

@section('titulo')
<title>AIP / Cartas :: IVAO Argentina</title>
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
			        <a class="list-group-item list-group-item-action active" href="http://ais.anac.gov.ar/aip" target="_blank" role="tab"><i class="fas fa-home"></i>&nbsp; AIP/MADHEL ANAC</a>
              <a class="list-group-item list-group-item-action" target="_blank" href="https://files.ar.ivao.aero/Training/Manuales/Instructivo_AIP.pdf" role="tab"><i class="fas fa-image fa-fw"></i>&nbsp; Instructivo AIP</a>
              <a class="list-group-item list-group-item-action" target="_blank" href="https://files.ar.ivao.aero/Training/Manuales/Madhel.pdf" role="tab"><i class="fas fa-image fa-fw"></i>&nbsp; Madhel en PDF</a>
            </div><!-- /.list-group -->

        </div><!-- /.col-md-3 -->

             
        <div class="col-md-9">   
            <!-- Tab panes -->
            
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" >
                  <img src="https://i.imgur.com/e6KMUHP.png" class="img-thumbnail"/>

              </div><!-- /.tabpanel -->
          </div><!-- /.tabcontent -->    
      </div> <!-- /.col-md-9 -->
	</div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
</div><!-- /.container marketing -->
</section>
@endsection