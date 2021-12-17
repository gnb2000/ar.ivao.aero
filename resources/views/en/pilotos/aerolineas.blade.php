@extends('template')

@section('titulo')
<title>VAs :: IVAO Argentina</title>
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
              <a class="list-group-item" href="#inicio" aria-controls="inicio" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicio</a>
        <a class="list-group-item" href="#politica" aria-controls="politica" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Pol&iacute;tica de Fomento</a>
              <a class="list-group-item" href="#aerolineas" aria-controls="aerolineas" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Aerol&iacute;neas Virtuales</a>
              <!--<a class="list-group-item" href="#normativa" aria-controls="normativa" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Normativa</a>-->
              <a class="list-group-item" href="#vasystem" aria-controls="vasystem" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; VA System</a>
            </div>

          </div><!-- /.col-md-3 -->
          <div class="col-md-9">
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inicio">
    
        <h2>Qu&eacute; es una VA? <small> Aerol&iacute;neas Virtuales</small></h2>
          <div class="separacion-tablas"></div>
          
              <div class="md-columna-7">

          <p style="text-align:justify">Las <strong>Aerol&iacute;neas Virtuales</strong> (VA), son organizaciones sin &aacute;nimo de lucro dedicadas a simular las operaciones de las compa&ntilde;&iacute;as a&eacute;reas. &Eacute;stas pueden ser basadas en compa&ntilde;&iacute;as reales o ficticias. Su objetivo es proporcionar una experiencia realista para los entusiastas de la aviaci&oacute;n virtual y la simulaci&oacute;n de vuelo. En los siguientes apartados, encontrar&aacute;s toda la informaci&oacute;n necesaria para solicitar el ingreso a cualquier <strong>Aerol&iacute;nea Virtual</strong> registrada en la <strong>Divisi&oacute;n Argentina</strong>.</p>
          <p style="text-align:justify">Cualquier miembro de la <strong>Divisi&oacute;n Argentina</strong> puede solicitar el alta de una <strong>Aerol&iacute;nea Virtual</strong> registrada siguiendo los pasos establecidos por IVAO.</p>

          <div style="font-family: Arial; font-weight:bold; color: #2a4982; font-size: 11pt; padding-top: 25px;">
Departamento de Operaciones de Vuelo</div>
          <div style="font-weight:bold; color: #666666; font-size: 10pt; padding-bottom: 25px;">
IVAO Argentina</div>
                
                </div><!-- /.md-columna-7 -->
                                
                <img alt="aerolineas" style="max-width: 75%;" class="img-thumbnail" src="/img/VAs_section_image.jpg" />
                         
          
          

    </div><!-- /.tabpanel --> 
  
  <div role="tabpanel" class="tab-pane" id="politica">
    
        <h2>Políticas De Fomento <small> Aerolíneas Virtuales de IVAO Argentina</small></h2>
          <div class="separacion-tablas"></div>
          
                <h4>1. TOURS</h4>

        <p align="justify">Las VA que cuenten con un tour interno y propio pueden presentar su proyecto de tour al Depto. de Operaciones de Vuelo para ser oficializado por la divisi&oacute;n.<br />
        La oficializaci&oacute;n acarrea menor carga de trabajo para el VA-Staff ya que su tour ser&aacute; cargado en el sistema MODA de reporte de tours y los validadores seran propios de la divisi&oacute;n.<br />
        Al finalizar el tour, los pilotos recibir&aacute;n su medalla de la misma manera que har&iacute;an un tour divisional.<br />
        Adem&aacute;s de estas ventajas, esto generar&iacute;a publicidad para la VA, trayendo quiz&aacute;s m&aacute;s pilotos a volar de divisiones extranjeras ya que el tour puede ser volado por cualquier persona.</p>

        <h4>2. EVENTOS</h4>

        <p align="justify">En el mismo caso que el anterior, oficializando, se tendr&aacute; 100% apoyo de IVAO Argentina e IVAO Internacional promocionandose el evento en redes sociales, foros, calendario de eventos de IVAO, entre otros. Asimismo, y a requerimiento de gestionado por la VA, la divisi&oacute;n se encargar&aacute; de buscar los controladores necesarios para cubrir el eventos.</p>

        <h4>3. GESTI&Oacute;N DE ALTA ASISTIDA</h4>

        <p align="justify">El proceso de alta de una VA puede ser engorroso, por ello la divisi&oacute;n designar&aacute; un miembro del staff qui&eacute;n le brindar&aacute; la asistencia personalizada para gestionar el alta de su aerol&iacute;nea virtual.</p>

        <h4>4. ASISTENCIA WEB</h4>

        <p align="justify">El Depto. de Desarrollo Web trabajar&aacute; junto a los miembros de la VA en un sitio web funcional y simple, pero con todo lo necesario para comenzar a operar!</p>

        <h4>5. HOSTING GRATUITO POR 6 MESES</h4>

        <p align="justify">La Direcci&oacute;n de IVAO Argentina, por seis meses otorogar&aacute; este beneficio a la aerolinas.</p>

    </div><!-- /.tabpanel -->

      <div role="tabpanel" class="tab-pane" id="aerolineas">
        
        <h2>Aerolíneas Virtuales <small> Registradas IVAO Argentina</small></h2>
          <div class="separacion-tablas"></div>
          
          <table class="table table-striped"> 
            <thead class="thead-dark"> 
              <tr> 
                  <th></th> 
                    <th>Nombre</th> 
                    <th>ICAO</th> 
                    <th>IATA</th> 
                    <th>Estado</th> 
                    <th>Web</th> 
                    <th>VASYSTEM</th> 
                </tr> 
            </thead> 
            <tbody> 
              @foreach($lista as $va)
              <tr> 
                  <td scope="row"><img style="width: 120px; height: 40px;" src="{{$va->LogoUrl}}"></td> 
                  <td>{{$va->VaName}}</td> 
                  <td>{{$va->ICAO}}</td>
                  <td>{{$va->IATA}}</td>
                  @if($va->VaStatus == 1)
                      <td><span class="label label-success">Activo</span></td>
                  @else
                      <td><span class="label label-danger">Inactivo</span></td>
                  @endif
                  <td><a href="{{$va->VaUrl}}" target="ext" class="text-info">Acceder</a></td> 
                  <td><a href="https://www.ivao.aero/vasystem/admin/va_details.asp?Id={{$va->IVAOId}}" target="ext" class="text-info">Acceder</a></td> 
              </tr>
              @endforeach
            </tbody>
        </table>
     
        
        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="normativa">
    
<h2>Normativa <small> Aerolíneas Virtuales</small></h2>
<div class="separacion-tablas"></div>

    <p style="text-align:justify">XXXXX</p>
        
        <div class="alert alert-danger">
        
        <p class="text-black"><strong>Atenci&oacute;n</strong>! </p>
        <br>
        <ul>
        <li>IVAO solo est&aacute; disponible con la versi&oacute;n de Team Speak 2. </li>
        <li>Si dispone de otra versi&oacute;n, deber&aacute; igualmente hacer la instalaci&oacute;n de Team Speak 2.</li>
        </ul>
        
        </div><!-- /.alert alert-danger -->
        
        
        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="vasystem">
    
<h2>VA System<small> Aerol&iacute;neas Virtuales</small></h2>
<div class="separacion-tablas"></div>

<div class="md-columna-7">

          <p style="text-align:justify">El <strong>VA System</strong> es el sistema responsable de la administraci&oacute;n de las operaciones a&eacute;reas y el personal de las Aerol&iacute;neas Virtuales registradas oficialmente en IVAO.</p>
          
          <p style="text-align:justify">El sistema permite, entre otras, las siguientes caracter&iacute;sticas: </p>
          
          <ul>
            <li>Datos de la Aerol&iacute;nea Virtual</li>
            <li>Sistema de Pireps</li>
            <li>Contabilizaci&oacute;n de Horas</li>
            <li>Gesti&oacute;n de STAFFs y Pilotos</li>
            <li>Administraci&oacute;n general de la Aerol&iacute;nea Virtual</li>
          </ul>
          
          <a href="https://www.ivao.aero/vasystem/country.asp?ID=AR" class="btn btn-default btn-sm" style="margin-top: 10px;"><i class="fa fa-external-link fa-fw"></i> Acceder VA System</a>
          
                </div><!-- /.md-columna-7 -->
                
                <div class="col-md-5">
                
                <img alt="aerolineas" class="img-thumbnail" src="/img/vasystem.png" />

                </div><!-- /.col-md-5 -->


        </div><!-- /.tabpanel -->

    </div><!-- /.tab-content -->
          
          </div><!-- /.col-md-9 -->
  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
</div> <!-- container marketing -->
</section>
@endsection