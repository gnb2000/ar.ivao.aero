@extends('template')

@section('titulo')
<title>Departaments :: IVAO Argentina</title>
@endsection

@section('contenido')

@php
$depto = $_GET['depto'];

if($depto =='HQ') $n_depto = 'HQ';
elseif($depto =='MD') $n_depto = 'Members Department';
elseif($depto =='TD') $n_depto = 'Training Department';
elseif($depto =='ATC') $n_depto = 'ATC Operations Department';
elseif($depto =='VUELO') $n_depto = 'Flight Operations Department';
elseif($depto =='SO') $n_depto = 'Special Operations Department';
elseif($depto =='ED') $n_depto = 'Events Department';
elseif($depto =='PR') $n_depto = 'Public Relations Department';
elseif($depto =='WEB') $n_depto = 'Web Development Department';
else $n_depto = 'FIR Chiefs';

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
                        	<li>General management of the division.</li>
                            <li>Creation of divisional directives.</li>
                            <li>Creation of workplans for each department (together with coordinators).</li>
                            <li>Representation and nexus of the division at international level.</li>
                            <li>General moderation of the division\'s forum.</li>
                            <li>Relationship between the division and organizations of the real environment.</li>
                            <li>Nexus between the division and the HQ and the Board of Governors.</li>
                            <li>Designation and members training to the staff team.</li>
                            <li>Request of supervisors to the Board of Governors.</li>
                            <li>Designation of moderators.</li>
                            <li>Designation of awards of high divisional grade.</li>
                            <li>Publishing of NOTAMs.</li>
                        </ul>
                        
                    <div class="separacion-tablas"></div>
                    
                    <h3>Vice Director <small> AR-ADIR</small></h3>
                    	<p></p>
                    	<ul>
                            <li>Interim replacement of the Director in case of absence and delegated by him.</li>
                            <li>Assistance to the Director on designated/delegated by him.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Members Coordinator (AR-MC)</li>
                        <li>Members Assistant Coordinator (AR-MAC)</li>
                       </ul>
                       
                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCIONES</h3>
                       <p></p>
                       <ul>
                           <li>Keep members statistics up-to-date.</li>
                           <li>Welcome and support new users.</li>
                           <li>Contact with members at the time of trainings, exames and/or events.</li>
                           <li>Attention to users\' requirements.</li>
                           <li>Explain procedures and resolve requests regarding the membership.</li>
                           <li>Award granting.</li>
                           <li>Management of the MODA system.</li>
                           <li>Validation of tour legs and designation of validators.</li>
                           <li>Management, coordination and creation (together with the staff) of divisional tours.</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Training Coordinator (AR-TC)</li>
                        <li>Training Assistant Coordinator (AR-TAC)</li>
                        <li>Training Advisors (AR-TAx)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Delivery of the training sessions for pilots and controllers.</li>
                           <li>Creation of the training documentation (together with Special Operations, Flight Operations and ATC Departments).</li>
                           <li>Practical evaluation of the members.</li>
                           <li>Evaluation of controllers for obtaining the GCA (Guest Controller Approval).</li>
                           <li>Establish the practical evaluation criteria .</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>ATC Operations Coordinator (AR-AOC)</li>
                        <li>ATC Operations Assistant Coordinator (AR-AOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Creation, modification and removal of guidelines of air traffic control.</li>
                           <li>Creation, modification and removal of ATC positions as shown on the AIP.</li>
                           <li>Designation of mínimum ATC positions to cover events (in coordination with the Events ).</li>
                           <li>Designation of controllers in events (in coordination with the Events Department).</li>
                           <li>Receipt of reports or complaints about problems with the provision of ATC services.</li>
                           <li>Creation, modification and removal of the FRAs (Facility Rating Assignments).</li>
                           <li>Creation of standards to obtain Unrestricted permissions.</li>
                           <li>Management and provision of Unrestricted permissions.</li>
                           <li>Creation of documents and standards ATC training (in coordination with the Training Department).</li>
                           <li>Approval of sector files for IvAc made for the FIR Chiefs.</li>
                           <li>Approval of ATC procedures (in coordination with the FIR chiefs).</li>
                           <li>Creation of standards to obtain GCAs.</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Flight Operations Coordinator(AR-FOC)</li>
                        <li>Flight Operations Assistant Coordinator (AR-FOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Creation, modification and removal of flight operations guidelines.</li>
                           <li>Creation, modification and removal of flight routes on IVAO database.</li>
                           <li>Distribution of IFR, enroute and aerodrome charts, IFR to the division.</li>
                           <li>Coordination and management of Virtual Airlines (VA).</li>
                           <li>Supervision of VA operations.</li>
                           <li>Creation, modification and removal of rules for VAs.</li>
                           <li>Nexus between the division and VAs.</li>
                           <li>Receipt of reports or complaints about problems with flight operations.</li>
                           <li>Creation documents and training standards for pilots (in coordination with the Training Department).</li>
                           <li>Elaboration of routes for tours and events (in coordination with Events and Members Departments).</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Special Operations Coordinator (AR-SOC)</li>
                        <li>Special Operations Assistant Coordinator (AR-SOAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Creation, modification and removal of special operations guidelines.</li>
                           <li>Distribution of information regarding special operations (it is included in this category all non-civil operations).</li>
                           <li>Coordination and management for special operations groups (SOG).</li>
                           <li>Supervision of SOG operations.</li>
                           <li>Creation, modification and removal of rules for SO.</li>
                           <li>Nexus between the division and SOG.</li>
                           <li>Receipt of reports or complaints about problems with special operations (controllers and pilots).</li>
                           <li>Development and coordination of events and SO tours (in coordination with Events and Members Departments).</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Events Coordinator (AR-EC)</li>
                        <li>Events Assistant Coordinator (AR-EAC)</li>
                        <li>Events Advisor (AR-EA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Management, coordination and development (together with the staff) of divisional events.</li>
                           <li>Management, coordination and development (together with the staff) of inter-divisional events.</li>
                           <li>Insertion of events on the internal events forum.</li>
                           <li>Insertion of events on the events calendar.</li>
                           <li>Comunication and formal invitation to VAs, SOGs and adjacent divisions.</li>
                           <li>Publishng of events on the forum and social networks.</li>
                           <li>Annual management on the argentinian annual events calendar.</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Public Relations Coordinator (AR-PRC)</li>
                        <li>Public Relations Assistant Coordinator (AR-PRAC)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Social networks management.</li>
                           <li>Publishing of division official communications.</li>
                           <li>Publishing of events, tours, exams, training sessions, etc. on social networks.</li>
                           <li>Creation of public relations material (banners, videos, images, etc.)</li>
                           <li>Maintenance of the brand image and mailshots of IVAO HQ public relations.</li>
                           <li>Help to new staff members with the mail and forum signatures.</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>Webmaster (AR-WM)</li>
                        <li>Assistant Webmaster (AR-AWM)</li>
                        <li>Webmaster Advisor (AR-WMA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Update and maintenance of the website.</li>
                           <li>Divisional servers management and maintenance.</li>
                           <li>Development of web tools for users and statistics.</li>
                           <li>Upload of images, documents and any type of related material.</li>
                           <li>Assistance to members with light problems regarding general and IVAO\'s software.</li>
                           <li>Assistance to new staff members with the configuration of IVAO\'s email.</li>
                           <li>Assistance and training to new staff members with the IT development of their functions.</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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
                 
                     <h3>TEAM</h3>
                       <p></p>
                       <ul>
                       	<li>(SAxx-CH)</li>
                        <li>FIR Assistant Chief (SAxx-ACH)</li>
                        <li>FIR Chief Advisor(SAxx-CHA1)</li>
                       </ul>

                   <div class="separacion-tablas"></div>
                   
                   <h3>FUNCTIONS</h3>
                       <p></p>
                       <ul>
                           <li>Update and maintenance of the corresponding sector files.</li>
                           <li>Publishng of relevant information relative to the FIR of their jurisdiction.</li>
                           <li>Collaboration with the ATC Operations Department with the creation of standard procedures.</li>
                           <li>Collaboration with the ATC Operations Department with logistics and the search of controllers for events.</li>
                           <li>Management of de Control Groups (ATC Teams).</li>
                           <li>Moderation of the corresponding division sub-forum.</li>
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