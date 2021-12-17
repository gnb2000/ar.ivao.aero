@extends('template')

@section('titulo')
<title>Biblioteca Virtual :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

			<div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
    
    
    		<div class="tabs">

              <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link" href="#manuales" data-bs-toggle="tab">Manuales</a></li>
              <li class="nav-item"><a class="nav-link" href="#briefings" data-bs-toggle="tab">Briefings</a></li>
              <li class="nav-item"><a class="nav-link" href="#icao" data-bs-toggle="tab">Documentos ICAO / ANAC</a></li>
            </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="manuales">
                
                <div class="separacion-tablas"></div>
                		<h2>Manuales</h2>
                <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">
							    <thead class="thead-dark">
                          <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Rango ATC</th>
                            <th>Rango Piloto</th>
                            <th>Autor</th>
                            <th></th>
                          </tr>
                  </thead>
							 <tbody>
                @foreach($manuales as $manual)
                            <tr>
                              <td><img alt="sector" src="/img/check-responsive.png"></td>
                              <td>{!! $manual->name !!}</td>
                              @if ($manual->type == "general")
                                <td>{{$manual->atc_rating}}</td>
                                <td>{{$manual->pilot_rating}}</td>
                              @elseif ($manual->type == "atc")
                                <td>{{$manual->atc_rating}}</td>
                                <td>N/A</td>
                              @else
                                <td>N/A</td>
                                <td>{{$manual->pilot_rating}}</td>
                              @endif
                              <td>{!! $manual->author !!}</td>
                              <td><a href="http://files.ar.ivao.aero/Training/Manuales/{{$manual->file}}" class="btn btn-primary btn-sm">Descargar</a></td>
                            </tr>
  						  @endforeach
               </tbody>
           </table>      
        </div><!-- /.tabpanel -->
          
				<div role="tabpanel" class="tab-pane" id="briefings">
                
                <div class="separacion-tablas"></div>
                		<h2>Exam Briefing Guides</h2>
                    <div class="separacion-tablas"></div>
    
    				<table class="table table-striped">
                  <thead class="thead-dark">
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th></th>
                        </tr>
                  </thead>
							 <tbody>
						@foreach($briefings as $briefing)
						  @php
  							$briefing->file = $briefing->file == ""
                          ? $briefing->IvaoLink
                          : 'http://files.ar.ivao.aero/Training/Manuales/'.$briefing->file;
  			      @endphp
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{!! $briefing->name !!}</td>
                        <td><a href="{{$briefing->file}}" class="btn btn-primary btn-sm">Descargar</a></td>
                      </tr>
						@endforeach

                   </tbody>
               </table>
                
            </div><!-- /.tabpanel -->
                           
        <div role="tabpanel" class="tab-pane" id="icao">
                
                <div class="separacion-tablas"></div>
                    <h2>Documentos ICAO / ANAC</h2>
                    <div class="separacion-tablas"></div>
    
            <table class="table table-striped">
                  <thead class="thead-dark">
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th></th>
                        </tr>
                  </thead>
               <tbody>
            @foreach($icaos as $icao)
              @php
                $icao->file = $icao->file == ""
                          ? $icao->IvaoLink
                          : 'http://files.ar.ivao.aero/Training/Manuales/'.$icao->file;
              @endphp
                      <tr>
                        <td><img alt="sector" src="/img/check-responsive.png"></td>
                        <td>{!! $icao->name !!}</td>
                        <td><a href="{{$icao->file}}" class="btn btn-primary btn-sm">Descargar</a></td>
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