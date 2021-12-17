@extends('template')

@section('titulo')
<title>Informaci&oacute;n :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGINA -->
<section>

			<div class="container marketing">
 <!-- DOS COLUMNAS -->
  
          
	<div class="tabla-novedades">
    	<div class="tooltip-web">
          		
        <div class="row">
          <div class="col-md-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="PP" src="https://www.ivao.aero/data/images/ratings/pilot/5.gif" /> <span class="float-right"><strong style="font-size:23px;">PP</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Aeronave: Monomotor Ligero">
                        <i class="fas fa-paper-plane fa-fw"></i> Aeronave <strong class="float-right">Monomotor Ligero</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Instrumentales">
                        <i class="fas fa-plane fa-fw"></i> Instrumental <strong class="float-right">VOR y ADF</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del Piloto Automatico">
                        <i class="fas fa-plane fa-fw fa-rotate-90"></i> Uso del P. Automatico <strong class="float-right">Permitido</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del GPS">
                        <i class="fas fa-ban fa-fw"></i> Uso del GPS <strong class="float-right">Permitido</strong>
                    </li>
					<li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Tipo de vuelo: VFR">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tipo de Vuelo <strong class="float-right">VFR</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Distancia minima entre Aeropuertos: 20nm">
                        <i class="fas fa-microphone-slash fa-fw"></i> Distancia Minima <strong class="float-right">20nm</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="Maximo de planes de vuelo permitidos: 1">
                        <i class="fas fa-plane fa-fw"></i> Plan de Vuelo <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/PP_Briefing.pdf" target="_blank">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Briefing Guide</strong> <strong class="float-right"><i class="fa fa-file-pdf-o fa-fw"></i></strong>
                    </a></li>
                    <li class="list-group-item"><a href="/formacion/biblioteca">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Manuales Biblioteca</strong> <strong class="float-right"><i class="fa fa-book fa-fw"></i></strong>
                    </a></li>
             </ul>

          </div><!-- /.col -->
          <div class="col-md-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="SPP" src="https://www.ivao.aero/data/images/ratings/pilot/6.gif" /> <span class="float-right"><strong style="font-size:23px;">SPP</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Aeronave: Monomotor Ligero">
                        <i class="fas fa-paper-plane fa-fw"></i> Aeronave <strong class="float-right">Bimotor  Chico o Mediano</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Instrumentos">
                        <i class="fas fa-plane fa-fw"></i> Instrumentos <strong class="float-right"> 2 VOR, 1 ILS, 1 ADF y 1 DME</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del Piloto Automatico">
                        <i class="fas fa-plane fa-fw fa-rotate-90"></i> Uso del P. Automatico <strong class="float-right">Permitido</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del GPS">
                        <i class="fas fa-ban fa-fw"></i> Uso del GPS <strong class="float-right">Permitido</strong>
                    </li>
					<li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Tipo de vuelo: IFR. Utilización de SID, STAR e IAC">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tipo de Vuelo <strong class="float-right">IFR (Uso SID, STAR e IAC)</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Distancia minima entre Aeropuertos: 50nm">
                        <i class="fas fa-microphone-slash fa-fw"></i> Distancia Minima <strong class="float-right">50nm</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="Maximo de planes de vuelo permitidos: 1">
                        <i class="fas fa-plane fa-fw"></i> Plan de Vuelo <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/SPP_Briefing.pdf" target="_blank">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Briefing Guide</strong> <strong class="float-right"><i class="fa fa-file-pdf-o fa-fw"></i></strong>
                    </a></li>
                    <li class="list-group-item"><a href="/formacion/biblioteca">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Manuales Biblioteca</strong> <strong class="float-right"><i class="fa fa-book fa-fw"></i></strong>
                    </a></li>
             </ul>

          </div><!-- /.col -->
          <div class="col-md-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="CP" src="https://www.ivao.aero/data/images/ratings/pilot/7.gif" /> <span class="float-right"><strong style="font-size:23px;">CP</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Aeronave: Monomotor Ligero">
                        <i class="fas fa-paper-plane fa-fw"></i> Aeronave <strong class="float-right">Reactor</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Instrumentos">
                        <i class="fas fa-plane fa-fw"></i> Instrumentos <strong style="font-size: 12px" class="float-right">2 VOR, 1 ILS, 1 ADF, 1 DME y 1 RMI</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del Piloto Automatico">
                        <i class="fas fa-plane fa-fw fa-rotate-90"></i> Uso del P. Automatico <strong class="float-right">Permitido</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Uso del GPS">
                        <i class="fas fa-ban fa-fw"></i> Uso del GPS <strong class="float-right">Permitido</strong>
                    </li>
					<li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Tipo de vuelo: IFR. Utilización de SID, STAR e IAC">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tipo de Vuelo <strong class="float-right">IFR (Uso SID, STAR e IAC)</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Distancia minima entre Aeropuertos: 50nm">
                        <i class="fas fa-microphone-slash fa-fw"></i> Distancia Minima <strong class="float-right">50nm</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="Maximo de planes de vuelo permitidos: 1">
                        <i class="fas fa-plane fa-fw"></i> Plan de Vuelo <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/CP_Briefing.pdf" target="_blank">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Briefing Guide</strong> <strong class="float-right"><i class="fa fa-file-pdf-o fa-fw"></i></strong>
                    </a></li>
                    <li class="list-group-item"><a href="/formacion/biblioteca">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Manuales Biblioteca</strong> <strong class="float-right"><i class="fa fa-book fa-fw"></i></strong>
                    </a></li>
             </ul>

          </div><!-- /.col -->
        </div>
            
    	</div><!-- /.tooltip-web -->
	</div><!-- /.tabla-novedades -->
</section>
@endsection