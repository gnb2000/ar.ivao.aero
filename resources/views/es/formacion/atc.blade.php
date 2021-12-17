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
          <div class="col-sm-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="ADC" src="https://www.ivao.aero/data/images/ratings/atc/5.gif" /> <span class="float-right"><strong style="font-size:23px;">ADC</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Mínimo: 2 Tráficos Visuales (VFR)">
                        <i class="fas fa-paper-plane fa-fw"></i> VFR <strong class="float-right">2</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Mínimo: 4 Tráficos Instrumentales en Salida (IFR)">
                        <i class="fas fa-plane fa-fw"></i> IFR Outbound <strong class="float-right">4</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Mínimo: 4 Tráficos Instrumentales en Llegada (IFR)">
                        <i class="fas fa-plane fa-fw fa-rotate-90"></i> IFR Inbound <strong class="float-right">4</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Mínimo: 1 Aproximación Frustrada">
                        <i class="fas fa-ban fa-fw"></i> APP Frustrada <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="Mínimo: 1 Tráfico sin voz, vía texto">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tr&aacute;fico v&iacute;a texto <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="Mínimo: 1 Tráfico en Emergencia (Mayday)">
                        <i class="fas fa-plane fa-fw"></i> Emergencia <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/ADC_Briefing.pdf" target="_blank">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Briefing Guide</strong> <strong class="float-right"><i class="fa fa-file-pdf-o fa-fw"></i></strong>
                    </a></li>
                    <li class="list-group-item"><a href="/formacion/biblioteca">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Manuales Biblioteca</strong> <strong class="float-right"><i class="fa fa-book fa-fw"></i></strong>
                    </a></li>
             </ul>

          </div><!-- /.col -->
          <div class="col-sm-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="APC" src="https://www.ivao.aero/data/images/ratings/atc/6.gif" /> <span class="float-right"><strong style="font-size:23px;">APC</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 8 Tr&aacute;nsitos IFR en Salida">
                        <i class="fas fa-plane fa-fw"></i> IFR Outbound <strong class="float-right">8</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 10 Tr&aacute;nsitos IFR en Llegada">
                        <i class="fas fa-plane fa-fw fa-rotate-90"></i> IFR Inbound <strong class="float-right">10</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 3 Tr&aacute;nsitos IFR simult&aacute;neos en APP">
                        <i class="fas fa-plane fa-fw"></i> Simultaneous APP <strong class="float-right">3</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Aproximaci&oacute;n Frustrada">
                        <i class="fas fa-ban fa-fw"></i> APP Frustrada <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Tr&aacute;nsito sin voz, v&iacute;a texto">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tr&aacute;fico v&iacute;a texto <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Tr&aacute;nsito en Emergencia">
                        <i class="fas fa-plane fa-fw"></i> Emergencia <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/APC_Briefing.pdf" target="_blank">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Briefing Guide</strong> <strong class="float-right"><i class="fa fa-file-pdf-o fa-fw"></i></strong>
                    </a></li>
                    <li class="list-group-item"><a href="/formacion/biblioteca">
                        <i class="fas fa-angle-right fa-fw"></i> <strong>Manuales Biblioteca</strong> <strong class="float-right"><i class="fa fa-book fa-fw"></i></strong>
                    </a></li>
             </ul>

          </div><!-- /.col -->
          <div class="col-sm-4">

            <div class="card">
                <!-- Default panel contents -->
                <div class="card-header"><img alt="ACC" src="https://www.ivao.aero/data/images/ratings/atc/7.gif" /> <span class="float-right"><strong style="font-size:23px;">ACC</strong></span></div>
            
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 10 Tr&aacute;nsitos en Ruta">
                        <i class="fas fa-plane fa-fw"></i> Tr&aacute;fico Simult&aacute;neo <strong class="float-right">10</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Aproximaci&oacute;n Frustrada">
                        <i class="fas fa-ban fa-fw"></i> APP Frustrada <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Tr&aacute;nsito sin voz, v&iacute;a texto">
                        <i class="fas fa-microphone-slash fa-fw"></i> Tr&aacute;fico vía texto <strong class="float-right">1</strong>
                    </li>
                    <li class="list-group-item text-danger" data-toggle="tooltip" data-placement="right" title="M&iacute;nimo: 1 Tr&aacute;nsito en Emergencia">
                        <i class="fas fa-plane fa-fw"></i> Emergencia <strong class="float-right">1</strong>
                    </li>
                </ul>
             </div><!-- /.card -->
             
             <div class="separacion-tablas"></div>
             
             <ul class="list-group">
                    <li class="list-group-item"><a href="http://files.ar.ivao.aero/Training/Manuales/ACC_Briefing.pdf" target="_blank">
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