@extends('template')

@section('titulo')
<title>Guidelines :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

      <div class="container marketing">

      <div class="tabla-novedades">
   
   <div class="row"> 
          <div class="col-md-3">
          
          	<div class="list-group" role="tablist"> 
              <!--<a class="list-group-item active" href="#lineamientos" aria-controls="lineamientos" role="tab" data-bs-toggle="tab"><i class="fa fa-plane fa-fw"></i>&nbsp; Lineamientos</a>-->
              <a class="list-group-item list-group-item-action active" href="#ifr" aria-controls="ifr" role="tab" data-bs-toggle="tab"><i class="fa fa-plane fa-fw"></i>&nbsp; IFR Instrumental</a>
              <a class="list-group-item list-group-item-action" href="#vfr" aria-controls="vfr" role="tab" data-bs-toggle="tab"><i class="fa fa-plane fa-fw"></i>&nbsp; VFR Visual</a>
              <a class="list-group-item list-group-item-action" href="#svfr" aria-controls="svfr" role="tab" data-bs-toggle="tab"><i class="fa fa-star fa-fw"></i>&nbsp; S-VFR Special Visual</a>
			  <a class="list-group-item" href="#fp" aria-controls="fp" role="tab" data-bs-toggle="tab"><i class="fa fa-file fa-fw"></i>&nbsp; Flightplan</a>
            </div><!-- /.list-group -->


          </div><!-- /.col-md-3 -->
          <div class="col-md-9">
          
          		<div class="tab-content">
                
    				<!-- <div role="tabpanel" class="tab-pane active" id="lineamientos">
                            
                            <h2 class="title">Lineamientos <small> Pilotos </small><span class="line"></span></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                   <p>Texto... QuÃ© son los lineamientos</p>
                    
                    </div>tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane active" id="ifr">
                            
                            <h2 class="title">IFR Instrumental <small> Instrumental Flight Rules</small><span class="line"></span></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                    <p align="justify">The IFR flight, unlike VFR, does not have any limitation regarding timetables, airspaces, etc. However, it must perform instrumental procedures and is subject to continuous communication with the ATC. Son estos Ãºltimos lo que restringen a los vuelos IFR de la salida o llegada, ya que si la mÃ­nimas de visibilidad no estÃ¡n dadas para una carta en particular y esta es la mÃ¡s restrictiva, el aerÃ³dromo se encuentra cerrado para aterrizajes.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Standard departures and arrivals (SID/STAR)</h4>
                                                                        
                                    <p align="justify">All the IFR flights that are developed at airports with instrumental departures and arrivals and wish to include it on the flightplan, must be advised that they will be subject to determination of the active ATC.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Visual approaches and circling to land</h4>
                                                                        
                                    <p align="justify">When a visual approach can be performed, visual contact with the runway and the terrain and the IFR separation minimums between aircrafts shall always be kept. In case of circling to land, the corresponding instrument approach procedure (IAP) will be performed and, when the pilot indicates visual contact with the runway, the visual approach to the opposite runway or the convenient runway will be performed as cleared by ATC.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Holding procedure</h4>
                                                                        
                                    <p align="justify">Holdings will be performed below FL140 following a lineal pattern of 1 minute (controlled leg and non-controlled leg) and 1.5 minutes above FL140. Turns will always be Class I, except jets, which perform a Class II turn.</p>
                                    
                                    <p align="justify">The maximum holding speed depends on the flight level and type of aircraft. Turboprop aircrafts shall maintain 170kt up to FL140 and 175kt above FL140. Jets will maintain 210kt up to 6000ft, 220kt between 6000ft and FL140, and 240kt above FL140.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>RVSM Operations â€“ Reduced Vertical Separation Minimum</h4>
                                                                        
                                    <p align="justify">Aircrafts that wish to adopt RVSm flight levels in the airspace between Fl290 and FL410 will have to specify in the flightplan that they are able to perform this operation in the equipment of the same.</p>
									
									<h4>Flight Levels</h4>
									<p align="center"><img alt="Regla Semicircular de Niveles de Vuelo" src="images/ReglaSemicircular.png" /></p>
                            

                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane" id="vfr">
                            
                            <h2 class="title">VFR Visual <small> Visual Flight Rules</small><span class="line"></span></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                    <p align="justify">VFR flights are limited by airspace, weather, timetable and flight level. Likewise, it complies with the general and visual flight rules established on the RAAC (Civil Aviation Argentinian Regulations) and the controlled/non-controlled flight rules depending on the airspace where the flight is developed.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Airspaces</h4>
                                                                        
                                    <p align="justify">No VFR flights will be allowed to be developed in class A airspace, composed by all the airways and TMAs from FL195 upwards (See AIP ENR 1.4).</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Timetable</h4>
                                                                        
                                    <p align="justify">No VFR flights will be developed at night on navigation, that is to say, when the destination aerodrome is different from the departure aerodrome and the flight is developed further than the CTR of the departure aerodrome. However, local night VFR flights inside the CTR of the night flight allowed aerodrome will be able to be performed.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Weather</h4>
                                                                        
                                    <p align="justify">For a VFR flight to take off or land on an aerodrome, the following weather minimums must take place. Below them, the aerodrome is closed for VFR flights and no aircrafts will take off or land nor ATCs will be allowed to clear take-offs or landings to VFR flights.</p>
                                    
                                    <p align="justify">Weather minimums for a VFR flight at controlled aerodromes are 5000 m of visibility and 1000ft of ceiling (*). For a NON-controlled aerodrome inside a CTR, the same minimums will apply. For a NON-controlled aerodrome outside a CTR, visibility will change to 2500 m.</p>
                                                               
                                    <p align="justify">(*) We define as ceiling, the first layer of clouds that covers more than the half of the sky (BKN or OVC).</p>
                                    <p align="justify">Likewise, aircrafts under VFR must keep flying under visual meteorological conditions (VMC). Otherwise, the flight shall not continue.</p>
                                    
                                    <p align="justify">VFR flights enroute that fly at FL100 or above must keep separated horizontally by 1500 m from the clouds and 1000ft vertically in class C, D and G airspaces and clear of clouds in class B airspace. However, VFR flights that fly below FL100 must keep separated horizontally by 1500 m from the clouds and 1000ft vertically in class B, C, D and G airspaces. Aircrafts inside the CTR shall keep a vertical distance of 500ft.</p>
                                    
                                    <p align="justify">Regarding the visibility, in any airspace and any phase of the flight, at FL100 or above, it shall be greater than 8000 m and below FL100, it shall be 5000 m.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Flight Level</h4>
                                                                        
                                    <p align="justify">All aircrafts that fly under VFR must develop their flights with ODD or EVEN flight levels according to their course, that is to say, those which fly between 000Â° and 179Â° wil maintain an ODD flight level and those which fly between 180Â° and 359Â° an EVEN flight level. Non-controlled flights shall maintain the corresponding flight level + 500ft and controlled flights will maintain a flight level ending with 0. For example: An aircraft flying on heading 070Â° in a non-controlled airspace could fly on altitudes such as: 1500ft, 3500ft, 5500ft, etc. up to FL195 (the maximum FL for VFR flights). However, an aircraft on heading 280Â°, in a TMA (controlled airspace) shall maintain altitudes such as: 2000, 4000, 6000, 8000, etc. up to FL180 (last controlled flight level between 180Â° y 359Â° below FL195).</p>
									
									<p align="center"><img alt="Regla Semicircular de Niveles de Vuelo" src="images/ReglaSemicircularVFR.png" /></p>
                            

                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane" id="svfr">
                            
                            <h2 class="title">Special VFR <small> Special Visual Flight Rules</small><span class="line"></span></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                    <p align="justify">On certain circumstances correctly justified, the competent authority will authorize the development of VFR flights below the weather minimums established for the aerodrome. Minimums for NON-controlled aerodromes outside a CTR will be reduced to a visibility of 2500 m.</p>


                    </div><!-- tabpanel -->
                    <div role="tabpanel" class="tab-pane" id="fp">
                            
                            <h2 class="title">Flightplan <small> Flightplan Form </small><span class="line"></span></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                    <h4>Introduction</h4>

									<p align="justify">According to Civil Aviation Argentinian Regulations (RAAC) presenting a Flightplan is not only convenient, but in many cases it is mandatory. Therefore, we are going to see, step by step, how to fill and present a flightplan.</p>

									<p align="justify">In order to acknowledge the Air Traffic Service facilities about the Flightplan, we shall file the <u>Flightplan Form</u>, which we must indicate with detail what we have planned, required altitude or flight level, cruise speed, route, timetable and the estimated flight time in. Likewise, it is useful for the ATC to know the colour and type of aircraft, autonomy, equipment, navaids and people on board, which would ease a search in case of accident.</p>
									
									<hr style="margin-bottom: 19px;">

									<h4>Mandatory Filing</h4>

									<p align="justify">It is mandatory to file a flightplan in the following cases:</p>

									<ul>
										<li>When ATS must be provided airborne.</li>
										<li>When the flight is developed under IFR.</li>
										<li>When international borders need to be crossed.</li>
										<li>When the flight is scheduled.</li>
										<li>When the aircraft is foreigner or a state one.</li>
										<li>When flying under VFR and alert service is required.</li>
										<li>When it is required by the aviation authority.</li>
									</ul>

									<p align="justify">This must be filed in an ARO-AIS office. Likewise, it may be filed by phone or radio whenever:</p>

									<ul>
										<li>There is no ATS at the departure aerodrome.</li>
										<li>The filght is performed between 2 aerodromes within the same TMA.</li>
										<li>The flight is operating under special missions, like ambulance, social emergency or rescue.</li>
									</ul>
									
									<hr style="margin-bottom: 19px;">

									<h4>Timing</h4>

									<p align="justify">The flightplan must be filed at least 45 mins before the EOBT (Estimated Off-Block Time) for the controlled flights.</p>

									<p align="justify">The communication of a flightplan filed airborne (abbreviated as AFIL) must be performed 10 minutes in advance if the communication is direct or 20 minutes if the communication is indirect.</p>

									<p align="justify">The flightplan has an expiry of 30 mins for controlled flights and 60 mins for non-controlled flights, unless a Delay request (DLA) takes place.</p>
									
									<hr style="margin-bottom: 19px;">

									<h2>Changes</h2>

									<p align="justify">Any change in the flightplan must be reported to the ATS. Remember that the Search Services (SAR &ndash; <em>Search and Rescue</em>) will look for us in the route filed in the flightplan.</p>
									
									<hr style="margin-bottom: 19px;">

									<h4>End</h4>

									<p align="justify">A flightplan is ended when it is directly reported to an ATS facility.</p>

									<p align="justify">Or when it is cancelled by the pilot when leaving the closest ATS facility to the destination. The fact of cancelling the flightplan means renouncing to the Alerting Service.</p>
									
									<hr style="margin-bottom: 19px;">
									<br>
									<p align="justify"><a href="index.php?pagina=formacion/en/biblioteca">Complete Manual</a></p> 



                    </div><!-- tabpanel -->
                    
        
        </div><!-- /.tabla-novedades -->

               	</div><!-- /.tab-content -->
          
          </div><!-- /.col-md-9 -->
   </div><!-- /.row -->
 </div>
</section>
@endsection