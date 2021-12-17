@extends('template')

@section('titulo')
<title>Sectores :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

	<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
    <div class="tabla-novedades">
    
    		<div class="tabs">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="#cordoba" data-bs-toggle="tab">FIR C&oacute;rdoba</a></li>
                <li class="nav-item"><a class="nav-link" href="#ezeiza" data-bs-toggle="tab">FIR Ezeiza</a></li>
                <li class="nav-item"><a class="nav-link" href="#mendoza" data-bs-toggle="tab">FIR Mendoza</a></li>
                <li class="nav-item"><a class="nav-link" href="#resistencia" data-bs-toggle="tab">FIR Resistencia</a></li>
                <li class="nav-item"><a class="nav-link" href="#comodoro" data-bs-toggle="tab">FIR Comodoro</a></li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="cordoba">
                
                  <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR C&oacute;rodoba</h2>
                  <div class="separacion-tablas"></div>
    
    				      <table class="table table-striped">
							    <thead class="thead-dark">
                      <tr>
                        <th></th>
                        <th>Sector</th>
                        <th>FIR</th>
                        <th>AMDT</th>
                        <th>Fecha</th>
                        <th>Versi&oacute;n</th>
                        <th>Descripci&oacute;n</th>
                        <th></th>
                      </tr>
                  </thead>

							    <tbody>
						
            @foreach($SACF as $fila)
              @php
              $fc = explode('-', $fila->date);
              $fecha = $fc[2].'/'.$fc[1].'/'.$fc[0];
              @endphp
          			
              <tr>
                <td><img alt="sector" src="/img/check-responsive.png"></td>
                <td>{{$fila->name}}</td>
                <td>{{$fila->fir}}</td>
                <td>AIRAC {{$fila->airac}}</td>
                <td>{{$fecha}}</td>
                <td>{{$fila->version}}</td>
                <td>{{$fila->changelog}}</td>
                <td><a href="http://files.ar.ivao.aero/ATC/Sectores/{{$fila->file}}_{{$fila->version}}.sct" class="btn btn-primary btn-xs">Descargar</a></td>
              </tr>
            @endforeach		
               </tbody>
           </table>
                
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="ezeiza">
                
                  <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Ezeiza</h2>
                  <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">

        					<thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th>Sector</th>
                      <th>FIR</th>
                      <th>AMDT</th>
                      <th>Fecha</th>
                      <th>Versi&oacute;n</th>
                      <th>Descripci&oacute;n</th>
                      <th></th>
                    </tr>
                  </thead>

                <tbody>
            @foreach($SAEF as $fila)
              @php
              $fc = explode('-', $fila->date);
              $fecha = $fc[2].'/'.$fc[1].'/'.$fc[0];
              @endphp
                
              <tr>
                <td><img alt="sector" src="/img/check-responsive.png"></td>
                <td>{{$fila->name}}</td>
                <td>{{$fila->fir}}</td>
                <td>AIRAC {{$fila->airac}}</td>
                <td>{{$fecha}}</td>
                <td>{{$fila->version}}</td>
                <td>{{$fila->changelog}}</td>
                <td><a href="http://files.ar.ivao.aero/ATC/Sectores/{{$fila->file}}_{{$fila->version}}.sct" class="btn btn-primary btn-xs">Descargar</a></td>
              </tr>
            @endforeach   
                </tbody>
         </table>   
                         
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="mendoza">
                
                  <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Mendoza</h2>
                  <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">

        					<thead class="thead-dark">
                                <tr>
                                  <th></th>
                                  <th>Sector</th>
                                  <th>FIR</th>
                                  <th>AMDT</th>
                                  <th>Fecha</th>
                                  <th>Versi&oacute;n</th>
                                  <th>Descripci&oacute;n</th>
                                  <th></th>
                                </tr>
                 </thead>

                 <tbody>
            @foreach($SAMF as $fila)
              @php
              $fc = explode('-', $fila->date);
              $fecha = $fc[2].'/'.$fc[1].'/'.$fc[0];
              @endphp
                
              <tr>
                <td><img alt="sector" src="/img/check-responsive.png"></td>
                <td>{{$fila->name}}</td>
                <td>{{$fila->fir}}</td>
                <td>AIRAC {{$fila->airac}}</td>
                <td>{{$fecha}}</td>
                <td>{{$fila->version}}</td>
                <td>{{$fila->changelog}}</td>
                <td><a href="http://files.ar.ivao.aero/ATC/Sectores/{{$fila->file}}_{{$fila->version}}.sct" class="btn btn-primary btn-xs">Descargar</a></td>
              </tr>
            @endforeach   
              </tbody>
          </table>     
                
                </div><!-- /.tabpanel -->
                <div class="tab-pane" id="resistencia">
                
                  <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Resistencia</h2>
                  <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">

        					<thead class="thead-dark">
                      <tr>
                        <th></th>
                        <th>Sector</th>
                        <th>FIR</th>
                        <th>AMDT</th>
                        <th>Fecha</th>
                        <th>Versi&oacute;n</th>
                        <th>Descripci&oacute;n</th>
                        <th></th>
                      </tr>
                  </thead>

                  <tbody>
            @foreach($SARR as $fila)
              @php
              $fc = explode('-', $fila->date);
              $fecha = $fc[2].'/'.$fc[1].'/'.$fc[0];
              @endphp
                
              <tr>
                <td><img alt="sector" src="/img/check-responsive.png"></td>
                <td>{{$fila->name}}</td>
                <td>{{$fila->fir}}</td>
                <td>AIRAC {{$fila->airac}}</td>
                <td>{{$fecha}}</td>
                <td>{{$fila->version}}</td>
                <td>{{$fila->changelog}}</td>
                <td><a href="http://files.ar.ivao.aero/ATC/Sectores/{{$fila->file}}_{{$fila->version}}.sct" class="btn btn-primary btn-xs">Descargar</a></td>
              </tr>
            @endforeach   
                </tbody>
         </table>    
                
                </div><!-- /.tabpanel -->
                
                
                	<div class="tab-pane" id="comodoro">
            
                  <div class="separacion-tablas"></div>
                    <h2 class="text-primary">FIR Comodoro</h2>
                  <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">

        					<thead class="thead-dark">
                                <tr>
                                  <th></th>
                                  <th>Sector</th>
                                  <th>FIR</th>
                                  <th>AMDT</th>
                                  <th>Fecha</th>
                                  <th>Versi&oacute;n</th>
                                  <th>Descripci&oacute;n</th>
                                  <th></th>
                                </tr>
                 </thead>

                 <tbody>

            @foreach($SAVF as $fila)
              @php
              $fc = explode('-', $fila->date);
              $fecha = $fc[2].'/'.$fc[1].'/'.$fc[0];
              @endphp
                
              <tr>
                <td><img alt="sector" src="/img/check-responsive.png"></td>
                <td>{{$fila->name}}</td>
                <td>{{$fila->fir}}</td>
                <td>AIRAC {{$fila->airac}}</td>
                <td>{{$fecha}}</td>
                <td>{{$fila->version}}</td>
                <td>{{$fila->changelog}}</td>
                <td><a href="http://files.ar.ivao.aero/ATC/Sectores/{{$fila->file}}_{{$fila->version}}.sct" class="btn btn-primary btn-xs">Descargar</a></td>
              </tr>
            @endforeach   
              </tbody>
       </table>        
            		
            
            </div><!-- /.tabpanel -->
                       
            </div>
        
        </div><!-- /.col-md-8 -->
	</div><!-- /.row -->
    
</div><!-- /.tabla-novedades -->
</section>
@endsection