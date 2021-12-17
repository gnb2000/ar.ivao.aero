@extends('template')

@php include($_SERVER['DOCUMENT_ROOT'].'/funciones.php'); @endphp

@section('titulo')
<title>Operaciones Especiales :: IVAO Argentina</title>
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
              <a href="https://https://files.ar.ivao.aero/SO/Docs/SO_Order_WEB.pdf" class="list-group-item" role="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Orden SO</a>
              <a href="https://files.ar.ivao.aero/SO/LOA/Spec.Ops.LOA.ES.pdf" target="_blank" class="list-group-item"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Manual Control Militar</a>
              <a class="list-group-item" href="#eventos" aria-controls="eventos" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Eventos</a>
              <a class="list-group-item" href="#grupos" aria-controls="grupos" role="tab" data-bs-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Grupos y Brigadas</a>
          </div><!-- /.list-group -->  
          
          
          </div><!-- /.col-md-3 -->
          <div class="col-md-9">
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inicio">
    
        <h1>Bienvenido al Departamento de Operaciones Especiales</h1>
          <div class="separacion-tablas"></div>
          
          <p align="justify">Esperamos que aquí encuentres toda la información que estás buscando sobre Operaciones Especiales.</p>

<p align="justify">Encontrarás información sobre procedimientos, fraseología, cartografía e indicativos entre otros.</p>
<p align="justify">A Operaciones Especiales, pertenecen todos aquellos vuelos no clasificados como comerciales o generales. Ejemplos de SO son vuelos Militares, SAR, Extinción de Incendios, Operaciones Policiales, VIP, MEDEVAC, etc.</p>
<p align="justify">Recuerda que esta página web es tuya, colabora con nosotros con aquellos comentarios o información que desees aportar escríbiendonos un email.</p>

<br />

    <div style="font-family: Arial; font-weight:bold; color: #2a4982; font-size: 11pt; padding-top: 25px;">
    Departamento de Operaciones Especiales</div>
    <div style="font-weight:bold; color: #666666; font-size: 10pt;">
    IVAO Argentina</div>
    <div style="color: #666666; font-size: 10pt; padding-bottom: 25px;">
    so@ivao.com.ar</div>

    </div><!-- /.tabpanel -->

      <div role="tabpanel" class="tab-pane" id="eventos">
        
        <h1>Eventos SO</h1>
          <div class="separacion-tablas"></div>
      @if(count($pasados) == 0)
      {
        <div class="row">
          <h2 class="title"><center>No hay eventos.</center></h2>
        </div>
      }
      @else
        @foreach($pasados as $evento)
        @php
          $fechaInicio = $evento->start_date;
          $fechaFinal = $evento->end_date;
          $fechaArrayIncio = explode(" ", $fechaInicio);
          $fechaArrayFinal = explode(" ", $fechaFinal);

          $fc = explode("-", $fechaArrayIncio[0]);
          $fc_mes = obtenerNombreMes($fc[1]);
                         
          $horaArgInicio = obtenerHoraArg($fechaArrayIncio[1]);
          $horaArgFin = obtenerHoraArg($fechaArrayFinal[1]);
          $ni = explode(".",$evento->image);
        @endphp
          
          <div class="row">
            <div class="col-sm-3">                
              <img alt="eventos" src="https://files.ar.ivao.aero/Eventos/Images/Thumb/{{$ni[0]}}.jpeg" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <h2 class="title">{!! $evento->name !!} <small> {{$evento->type}}</small><span class="line"></span></h2>
              <div class="separacion-eventos"></div>
              <span style="padding-right: 25px;" data-bs-toggle="tooltip" data-placement="bottom" title="Fecha en Argentina"><i class="fa fa-calendar-o fa-fw"></i> <strong style="color: #2A4982;">{{$fc[2]}} de {{$fc_mes}} de {{$fc[0]}}</strong></span> <span style="padding-right: 25px;"><i class="fa fa-clock-o fa-fw"></i> <strong style="color: #2A4982;">
              {{date('H:i', strtotime($fechaInicio))}} UTC
              {{$horaArgInicio}} ARG - 
              {{date('H:i', strtotime($fechaFinal))}} UTC
              {{$horaArgFin}} ARG
              </strong></span>
              <div class="separacion-tablas"></div>
              <p style="text-align:justify">{{$evento->description}}</p>
              <div class="separacion-tablas"></div>
              <p><a class="btn btn-success btn-sm" href="/eventos/{{$evento->id}}" role="button"><i class="fa fa-plus-square"></i>&nbsp;&nbsp; <strong>Ver M&aacute;s</strong></a></p>
            </div>
          </div>
        @endforeach
      @endif
      <div class="separacion-tablas"></div>                   
        
        </div><!-- /.tabpanel -->
              
        <div role="tabpanel" class="tab-pane" id="grupos">
    
<h1>Grupos y Brigadas</h1>
<div class="separacion-tablas"></div>

<table class="table table-striped"> 
            <thead class="thead-dark"> 
              <tr> 
                  <th></th> 
                    <th>Nombre</th> 
                    <th>ICAO</th> 
                    <th>Estado</th> 
                    <th>Web</th> 
                    <th>VASYSTEM</th> 
                </tr> 
            </thead> 
            <tbody>
              
              @foreach($listaSOGs as $va)
              <tr> 
                  <td scope="row"><img style="width: 120px; height: 40px;" src="{{$va->LogoUrl}}"></td> 
                  <td>{{$va->VaName}}</td> 
                  <td>{{$va->ICAO}}</td>
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
        
    </div><!-- /.tab-content -->
          
    </div><!-- /.col-md-9 -->
  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
  </div > <!-- container marketing -->
</section>
@endsection