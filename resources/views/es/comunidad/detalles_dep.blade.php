@extends('template')

@section('titulo')
<title>Departamentos :: IVAO Argentina</title>
@endsection

@section('contenido')

@php
$depto = $_GET['depto'];

if($depto =='HQ') $n_depto = 'Dirección';
elseif($depto =='MD') $n_depto = 'Departamento de Miembros';
elseif($depto =='TD') $n_depto = 'Departamento de Entrenamiento';
elseif($depto =='ATC') $n_depto = 'Departamento de Operaciones ATC';
elseif($depto =='VUELO') $n_depto = 'Departamento de Operaciones de Vuelo';
elseif($depto =='SO') $n_depto = 'Departamento de Operaciones Especiales';
elseif($depto =='ED') $n_depto = 'Departamento de Eventos';
elseif($depto =='PR') $n_depto = 'Departamento de Relaciones Publicas';
elseif($depto =='WEB') $n_depto = 'Departamento de Desarrollo Web';
else $n_depto = 'Jefatura de FIR';
@endphp

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
			<div class="container marketing">

  <!-- INICIO TABLA -->
  		<div class="tooltip-web">
   <div class="tabla-novedades">
   
   		<!-- CONTENT -->
            
 
		@switch($depto)
      @case('HQ') 
          <div class="row">
                  <div class="col-md-4">
                  
                  	<i class="fa fa-gavel" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                  
                  </div><!-- /.col-md-4 -->
                  <div class="col-md-8">
                  
                  
                  	<h3>Director <small> AR-DIR</small></h3>
                    	<p></p>
                    	<ul>
                        	<li>Gestión general de la división.</li>
                            <li>Creación de directivas divisionales.</li>
                            <li>Creación de planes de trabajo para cada departamento (en conjunto con los Coordinadores).</li>
                            <li>Representación y nexo de la división a nivel internacional.</li>
                            <li>Moderación general del foro de la división.</li>
                            <li>Relación entre la división y organizaciones del entorno real.</li>
                            <li>Nexo entre la división y el HQ y Concejo Ejecutivo.</li>
                            <li>Designación y capacitación de miembros al equipo staff.</li>
                            <li>Solicitud de supervisores al Concejo Ejecutivo.</li>
                            <li>Designación de moderadores.</li>
                            <li>Designación de medallas de alto grado divisional.</li>
                            <li>Publicación de NOTAMs.</li>
                        </ul>
                        
                    <div class="separacion-tablas"></div>
                    
                    <h3>Vice Director <small> AR-ADIR</small></h3>
                    	<p></p>
                    	<ul>
                            <li>Reemplazo interino del Director en caso de ausencias y por delegación del mismo.</li>
                            <li>Asistencia al Director en las tareas que esté le designe y/o delege.</li>
                        </ul>
                    
                  </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
        @break

				@case('MD')
        <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-users" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Miembros (AR-MC)</li>
                        <li>Asistente de Miembros (AR-MAC)</li>
                       </ul>
                       
                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Llevar actualizada la estadística de miembros.</li>
                           <li>Dar bienvenida y soporte a usuarios nuevos.</li>
                           <li>Contacto con miembros al momento de entrenamientos, exámenes y/o eventos.</li>
                           <li>Atención de requerimientos de los usuarios.</li>
                           <li>Explicar procedimientos y resolver solicitudes respecto a la membrecía.</li>
                           <li>Otorgación de medallas.</li>
                           <li>Gestión del sistema MODA.</li>
                           <li>Validación de etapas de tours y designación de validadores.</li>
                           <li>Gestión, coordinación y elaboración (en conunto al staff) de los tours divisionales.</li>
                           <li>Moderación del sub-foro correspondiente.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
        @break

			  @case('TD') 
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-mortar-board" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Entrenamiento (AR-TC)</li>
                        <li>Asistente de Entrenamiento (AR-TAC)</li>
                        <li>Asesores de Entrenamiento (AR-TAx)</li>
						<li>Entrenador (AR-Tx)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Impartición de sesiones de entrenamiento para pilotos y controladores.</li>
                           <li>Creación de  documentación de entrenamiento (en conjunto con los Departamentos de Operaciones Especiales, ATC y de Vuelo).</li>
                           <li>Evaluación en términos prácticos de los miembros.</li>
                           <li>Evaluación de controladores para la obtención del GCA (Certificado de Controlador Invitado).</li>
                           <li>Establecer criterio de evaluación practica.</li>
                           <li>Moderación del sub-foro correspondiente.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
          @break

			    @case('ATC')
            <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-headphones" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Operaciones ATC (AR-AOC)</li>
                        <li>Asistente de Operaciones ATC (AR-AOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Creación, modificación y eliminación de lineamientos de control de tránsito aéreo.</li>
                           <li>Creación, modificación y eliminación de posiciones de control de tránsito aéreo según dispuesto en la AIP.</li>
                           <li>Designación de posiciones ATC mínimas para cubrir en eventos (en coordinación con el Departamento de Eventos).</li>
                           <li>Designación de controladores en eventos (en Coordinación con el Departamento de Eventos).</li>
                           <li>Recepción de denuncias o quejas por falencias en la provisión de los servicios ATC.</li>
                           <li>Creación, modificación y eliminación de la FRA (Facility Rating Assignments).</li>
                           <li>Creación de estándares para obtener permisos Unrestricted.</li>
                           <li>Gestión y provisión de permisos Unrestricted.</li>
                           <li>Creación de documentos y estándares de enseñanza ATC (en coordinación con el Departamento de Entrenamiento).</li>
                           <li>Aprobación de archivos de sector para IvAc confeccionados por los Jefes de FIR.</li>
                           <li>Aprobación de procedimientos ATC (en coordinación con los Jefes de FIR).</li>
                           <li>Creación de estándares para obtener certificados de controlador invitado (GCA).</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
            @break

			   @case('VUELO')
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-plane" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Operaciones de Vuelo (AR-FOC)</li>
                        <li>Asistente de Operaciones de Vuelo (AR-FOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Creación, modificación y eliminación de lineamientos de vuelo.</li>
                           <li>Creación, modificación y eliminación de posiciones rutas en la base de datos de IVAO.</li>
                           <li>Distribución de cartografía de aeródromo, IFR y en ruta a la división.</li>
                           <li>Coordinación y gestión para alta de aerolíneas virtuales (VA).</li>
                           <li>Supervisión de las operaciones de las VA.</li>
                           <li>Creación, modificación y eliminación de normas para VA.</li>
                           <li>Nexo entre la división y las VA.</li>
                           <li>Recepción de denuncias o quejas sobre falencias en las operaciones de vuelos.</li>
                           <li>Creación de documentos y estándares de enseñanza de pilotos (en coordinación con el Departamento de Entrenamiento).</li>
                           <li>Elaboración de rutas para tours y eventos (en coordinación con los departamento de Eventos y Miembros).</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break

			   @case('SO')
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-fighter-jet" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Operaciones Especiales (AR-SOC)</li>
                        <li>Asistente de Operaciones Especiales (AR-SOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Creación, modificación y eliminación de lineamientos de operaciones especiales.</li>
                           <li>Distribución de información pertinente a operaciones especiales (se comprende en este categoría toda operación no civil ni comercial).</li>
                           <li>Coordinación y gestión para alta de grupos de operaciones especiales (SOG).</li>
                           <li>Supervisión de las operaciones de los SOG.</li>
                           <li>Creación, modificación y eliminación de normas para SO.</li>
                           <li>Nexo entre la división y los SOG.</li>
                           <li>Recepción de denuncias o quejas sobre falencias en las operaciones especiales (controladores y pilotos).</li>
                           <li>Desarrollo y coordinación de eventos y tours SO (en coordinación con los departamentos de Eventos y Miembros).</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break

			   @case('ED')
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-calendar" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Eventos (AR-EC)</li>
                        <li>Asistente de Eventos (AR-EAC)</li>
                        <li>Asesor de Eventos (AR-EA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Gestión, coordinación y desarrollo (en conjunto al staff) de eventos divisionales.</li>
                           <li>Gestión, coordinación y desarrollo (en conjunto al staff) de eventos inter-divisionales.</li>
                           <li>Alta de eventos en el foro interno de eventos.</li>
                           <li>Alta de eventos en el calendario de eventos.</li>
                           <li>Comunicación e invitación formal a VA, SOG y divisiones adyacentes.</li>
                           <li>Publicación de eventos en el foro y redes sociales.</li>
                           <li>Gestión anual del calendario de eventos anuales argentino.</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break

			   @case('PR')
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-newspaper-o" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Coordinador de Relaciones Públicas (AR-PRC)</li>
                        <li>Asistente de Relaciones Públicas (AR-PRAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Gestión de redes sociales.</li>
                           <li>Publicación de comunicaciones oficiales de la división.</li>
                           <li>Publicación de eventos, tours, exámenes, sesiones de entrenamiento, etc. en redes sociales.</li>
                           <li>Creación de material de relaciones públicas (banners, videos, imágenes, etc.)</li>
                           <li>Mantenimiento de la imagen de marca y circulares de relaciones públicas de IVAO HQ.</li>
                           <li>Ayuda a nuevos integrantes del staff con la adecuación de firmas de mail y foro.</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break

			   @case('WEB')
          <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-cogs" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Webmaster (AR-WM)</li>
                        <li>Asistente de Webmaster (AR-AWM)</li>
                        <li>Asesor de Webmaster (AR-WMA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Actualización y mantenimiento del sitio web.</li>
                           <li>Gestión y mantenimiento de los servidores divisionales.</li>
                           <li>Desarrollo de herramientas web para estadística y usuarios.</li>
                           <li>Subida al servidor de imágenes, documentos y cualquier tipo de material pertinente.</li>
                           <li>Asistencia a miembros en problemas leves en lo relativo al software de IVAO y general.</li>
                           <li>Asistencia a nuevos integrantes del staff en configuración de correos institucionales de IVAO.</li>
                           <li>Asistencia y formación a nuevos integrantes del staff en el desarrollo informático de sus funciones.</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break

			   @case('FIR')
            <div class="row">
                 <div class="col-md-4">
                 
                     <i class="fa fa-globe" style="padding: 15px 0px 0px 15px;font-size: 15em !important;"></i>
                 
                 </div><!-- /.col-md-4 -->
                 <div class="col-md-8">
                 
                     <h3>EQUIPO</h3>
                       <p></p>
                       <ul>
                       	<li>Jefes de FIR (SAxx-CH)</li>
                        <li>Asistente de FIR (SAxx-ACH)</li>
                        <li>Asesor de FIR (SAxx-CHA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Actualización y mantenimiento de los archivos de sector correspondientes.</li>
                           <li>Publicación de información relevante relativo a su FIR de jurisdicción.</li>
                           <li>Colaboración con el Departamento de Operaciones de ATC en la creación de procedimientos estándar.</li>
                           <li>Colaboración con el Departamento de Operaciones de ATC en la logística y búsqueda de controladores para eventos.</li>
                           <li>Gestión de Grupos de Control (ATC Teams).</li>
                           <li>Moderación del sub-foro correspondiente en el foro de la división.</li>
                       </ul>
                   
                 </div><!-- /.col-md-8 -->
               </div><!-- /.row -->
               @break
            @endswitch
 
        <!-- CONTENT END -->
   	
    	</div><!-- /.tooltip-web -->
    </div><!-- /.tabla-novedades-->
</section>
@endsection