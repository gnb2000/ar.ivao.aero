@extends('template')

@section('titulo')
<title>Medallas :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

			<div class="container marketing">

	<div class="tabla-novedades">
   
   <div class="row">
      <div class="col-3">
        <div class="list-group" role="tablist">
          <a id="meritos-item" class ="list-group-item list-group-item-action active" href="#meritos" aria-controls="meritos" role="tab" data-bs-toggle="list">Distinciones Divisionales</a>
          <a id="divisionales-item" class ="list-group-item list-group-item-action" href="#divisionales" aria-controls="divisionales" role="tab" data-bs-toggle="list">Medallas Divisionales</a>
          <a id="pilotos-item" class ="list-group-item list-group-item-action" href="#pilotos" aria-controls="pilotos" role="tab" data-bs-toggle="list">Medallas Pilotos</a>
          <a id="controladores-item" class ="list-group-item list-group-item-action" href="#controladores" aria-controls="controladores" role="tab" data-bs-toggle="list">Medallas Controladores</a>
          <a id="comunidad-item" class ="list-group-item list-group-item-action" href="#comunidad" aria-controls="comunidad" role="tab" data-bs-toggle="list">Medallas Comunidad</a>
          <a id="wt-item" class ="list-group-item list-group-item-action" href="#wt" aria-controls="wt" role="tab" data-bs-toggle="list">Medallas World Tour</a>
          <a id="so-item" class ="list-group-item list-group-item-action" href="#so" aria-controls="so" role="tab" data-bs-toggle="list">Medallas Operaciones Especiales</a>
          <a id="online-item" class="list-group-item list-group-item-action" href="#online" aria-controls="online" role="tab" data-bs-toggle="list">Medallas Online</a>
	    </div><!-- /.list -->          
    </div><!-- /.col-md-3 -->
    <div class="col-9">
        <div class="tab-content">
                
            <div role="tabpanel" class="tab-pane fade show active" id="meritos" aria-labelled-by="meritos-item">
                    
            		<h2>Méritos Divisionales <small> IVAO Argentina</small></h2>
                    
                    <div class="separacion-tablas"></div>
                            
                        <p align="justify">Los <strong>Méritos Divisionales</strong>, son aquellas medallas y recompensas <strong>creadas especialmente para ser usadas en la División Argentina</strong>, por lo que todos serán siempre asignados en los usuarios con perfiles propios del portal web de IVAO Argentina. Solamente podrán optar a estos méritos, los <strong>usuarios pertenecientes a la División o con GCA activo</strong>.</p>
                            
                            
      <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Mérito</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/HR.png" /></td>
          <td>Honor</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/BI.png" /></td>
          <td>Idea Brillante</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/CR.png" /></td>
          <td>Creatividad</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/CC.png" /></td>
          <td>Disertador</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/PP.png" /></td>
          <td>Relaciones Públicas</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/NW.png" /></td>
          <td>Nuevo Usuario 2.0</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/AM.png" /></td>
          <td>ATC del Mes</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/PM.png" /></td>
          <td>Piloto del Mes</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/IM2.png" /></td>
          <td>En Memoria</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/C2.0.png" /></td>
          <td>Website Designer 2.0</td>
          <td>Entregada a los diseñadores de la Web 2.0. Controlada por AR-WM y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/D2.png" /></td>
          <td>Website Developer 2.0</td>
          <td>Entregada a los desarolladores de la Web 2.0. Controlada por AR-WM y expedida por AR-MC/MAC.</tr>
        <!--<tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/FS.png" /></td>
          <td>AR Division STAFF Former</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/FS_HQ.png" /></td>
          <td>HQ STAFF Former</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>-->
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/EO.png" /></td>
          <td>Evento</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.<tr>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/EP.png" /></td>
          <td>Evento Presencial</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SE.png" /></td>
          <td>Evento Especial</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SA15.png" /></td>
          <td>STAFF del Año 2015</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SA16.png" /></td>
          <td>STAFF del Año 2016</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
         <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SA17.png" /></td>
          <td>STAFF del Año 2017</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
         <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SA20.png" /></td>
          <td>STAFF del Año 2020</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
         <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/SA21.png" /></td>
          <td>STAFF del Año 2021</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</td>
        </tr>
		    <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/EAA.png" /></td>
          <td>Participante de la EAA</td>
          <td>Controlada por AR-HQ y expedida por AR-MC/MAC.</tr>
        </td>
		    <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://ar.ivao.aero/img/medallas/400K.png" /></td>
          <td>400.000 Horas de IVAO Argentina</td>
          <td>Controlada por AR-EC/EAC y expedida por AR-MC/MAC.</tr>
        </td>
      </tbody>
    </table>
        
       
                                    
                                    
                            
                            
                            		
                    </div><!-- tabpanel -->
                    
    				<div role="tabpanel" class="tab-pane fade show" id="divisionales" aria-labelled-by="divisionales-item">
                    
                    		<h2>Medallas Divisionales <small> IVAO Argentina</small></h2>
                            
                            		<div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/SE.gif" /></td>
          <td>Sailing</td>
          <td>Entregada a cualquiera que haya participado en más de 10 eventos de planeadors. Controlada por el FOC/FOAC y expedida por la Dirección divisional.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DI.gif" /></td>
          <td>Division IFR Tour</td>
          <td>Entregada a cualquiera que finalice un tour divisional IFR. Controlada por el MC/MAC. Entregada por la Dirección divisional.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/GD.gif" /></td>
          <td>Great Division User</td>
          <td>Esta es un medalla especial, entregada a los usuarios que se encuentren fuertemente involucrados con IVAO, como ATC, como piloto, ayudando usuarios, etc. Expedida por la Dirección divisional.</td>
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DV.gif" /></td>
          <td>Division VFR Tour</td>
          <td>Entregada a cualquiera que haya finalizado un tour divisional VFR. Controlada por el MC/MAC y expedida por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/ON.gif" /></td>
          <td>Online Support</td>
          <td>Entregada a cualquier miembros que se tome el tiempo de ayudar a los demás usuarios online. Propuesta por cualquier miembro del staff y expedidad por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DS.gif" /></td>
          <td>Division Spirit</td>
          <td>Entregada a cualquiera que muestre el verdadero espíritu de IVAO. Propuesto al HQ por DIR/ADIR de la División.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/AT.gif" /></td>
          <td>ATC Events</td>
          <td>Entregada a cualquier ATC que haya participado en 10 evento organizado por la división. Controlada por el AOC/AOAC. Expedida por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DO.gif" /></td>
          <td>Documentation</td>
          <td>Entregada a cualquiera que otorgue documentación o material importante y válido a la división. Entregada por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/HE.gif" /></td>
          <td>Helos</td>
          <td>Entregada a cualquier usuarios que haya participado en más de 10 misiones o eventos con helicópteros. Controlado por el FOC/FOAC y expedidad por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/AC.gif" /></td>
          <td>Aviation Celebration Tours and Events</td>
          <td>Entregada a cualquier usuario que participe en un tour o evento conmemorativo. Expedida por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/TA.gif" /></td>
          <td>ATC Training Assistance</td>
          <td>Entregada a cualquier usuario que participe activamente en las sesiones de entrenamiento ATC organizadas por la división. Expedidad por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/TP.gif" /></td>
          <td>Pilot Training Assistance</td>
          <td>Entragada cualquier usuario que participe activamente en las sesiones de entrenamiento para pilotos organizadas por la división. Expedida por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DM.gif" /></td>
          <td>Division Meeting</td>
          <td>Entregada a cualquiera que organize reuniones o exposiciones divisionales reales. Expedida por la Dirección divisional.
          </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/OS.gif" /></td>
          <td>Division Special Operations Tour</td>
          <td>Entregada a cualquiera que finalice un tour divisional de Operaciones Especiales. Expedida por la Dirección divisional.</tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/PE.gif" /></td>
          <td>Pilot Events</td>
          <td>Entregada a cualquier piloto que haya participado en más de 10 eventos organizados por la división. Controlaad por el FOC/FOAC y expedidad por la Dirección divisional.
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/UL.gif" /></td>
          <td>ULM</td>
          <td>Entregada a cualquier que finalice un tour divisional ULM (ultralivianos). Controlada por el MC/MAC y expedidad por la Dirección divisional.
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/FT.gif" /></td>
          <td>Float Tour</td>
          <td>Entregada a cualquier u
        </tr>
        <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awardsdiv/DD.gif" /></td>
          <td>Division Pilot Skills Tour</td>
          <td>Entregada a cualquier usuario que finalice un tour divisional de aeropuertos peligrosos. Controlado por el FOC/FOAC y expedido por la Dirección divisional.
        </tr>
      </tbody>
    </table>
        
       
                                    
                                    
                            
                            
                            		
                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="pilotos" aria-labelled-by="pilotos-item">
                    
                    <h2>Medallas Pilotos <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SA.gif"> </td>
          <td>Super Aviator</td>
          <td>Entregada a cualquiera que supere dos exámenes prácticos con distinto rango, con más del 95% de puntuación. (Nota: Las dos partes del examen C-x serán contabilizadas en común). Expedida por MD/MAD.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/KS.gif"> </td>
          <td>King of the Sky</td>
          <td>Entregada a cualquiera que complete 1 VFR WT y 1 IFR WT, con más de 1000 horas como Piloto y rango Commercial Pilot.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/GW.gif"> </td>
          <td>Golden Wing</td>
          <td>Entregada a cualquiera que complete 4 VFR WT y 4 IFR WT, ostentando la medalla de King of the Sky por más de 12 meses y más de 2000 horas como Piloto.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/E1.gif"> </td>
          <td>Bronze Pilot Exam Badge</td>
          <td>Entregada a cualquiera que haya participado en 25 exámenes controlados, en un mínimo de 7 Divisiones.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/E2.gif"> </td>
          <td>Silver Pilot Exam Badge</td>
          <td>Entregada a cualquiera que haya participado en 50 exámenes controlados, en un mínimo de 7 Divisiones.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/E3.gif"> </td>
          <td>Gold Pilot Exam Badge</td>
          <td>Entregada a cualquiera que haya participado en 100 exámenes controlados, en un mínimo de 7 Divisiones.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/IP.gif"> </td>
          <td>IvAp</td>
          <td>Certificado IvAp. Entregada de forma automática.</td>
        </tr>
      </tbody>
    </table> 
          	
          	</div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="controladores" aria-labelled-by="controladores-item">
                    
                    <h2>Medallas Controladores <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SC.gif"> </td>
          <td>Super Controller </td>
          <td>Entregada a cualquiera que pase dos exámenes prácticos de ATC (con rangos diferentes) por lo menos con un 95%. Expedida por el MD o MAD.</td>
          </tr>
          <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/VC.gif"> </td>
          <td>Voice Controller</td>
          <td>Entregada a cualquiera que pase un exámen práctico con voz, con al menos 10 tránsito y fraseología apropiada. Debe ser requerida por el  examinador. Expeidad por el MD o MAD.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/V1.gif"> </td>
          <td>Voice Level 1</td>
          <td>Entregada a cualquier ATC ( siendo al menos ADC sin ser OCC o FSS) que tenga en todo momento más de 10 tráficos volando en TS al mismo tiempo y por lo menos durante 1 hora. Debe ser verificado por un Supervisor.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/V2.gif"> </td>
          <td>Voice Level 2</td>
          <td>Entregada a cualquier ATC ( siendo al menos Controller2 con VL1 desde hace más de 6 meses ) que tenga en todo momento más de 15 tráficos volando en TS al mismo tiempo y por lo menos durante 1 hora y media. Debe ser verificado por un Supervisor.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/V3.gif"> </td>
          <td>Voice Level 3</td>
          <td>Entregada a cualquier ATC ( siendo al menos Controller3 con VL2 desde hace más de 9 meses ) que tenga en todo momento más de 20 tráficos volando en TS al mismo tiempo y por lo menos durante 2 horas. Debe ser verificado por un Supervisor.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/RA.gif"> </td>
          <td>Radio</td>
          <td>Entregada a cualquier Controller3 que tenga más de 1000 horas conectadas como Controlador y por lo menos el Voice Level 1.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/IC.gif"> </td>
          <td>IvAc</td>
          <td>Certificado de Pro Controller y/o IvAc.</td>
        </tr>
      </tbody>
    </table> 
          	
                    
                      
                                    
                    
                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="comunidad" aria-labelled-by="comunidad-item">
                    
                    <h2>Medallas Comunidad <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/HO.gif"> </td>
          <td>IVAO Honorific Award </td>
          <td>Estado honorífico. Expedida por el BoG (Board of Governors).</td>
          </tr>
          <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/ME.gif"> </td>
          <td>Effective member of IVAO NPO</td>
          <td>Estado asignado por la Asamblea General de IVAO.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SP.gif"> </td>
          <td>Spirit of IVAO</td>
          <td>Entregada a cualquiera que demuestra el espíritu real de IVAO. Propuesta por DIR/ADIR al Executive.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/BI.gif"> </td>
          <td>Bright Idea</td>
          <td>Entregada por el Executive a cualquiera que tenga una idea brillante para incorporar en IVAO. Propuesta por DIR/ADIR y STAFF de la División.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/GI.gif"> </td>
          <td>Great Information</td>
          <td>Entregada a cualquiera que contribuya con información destacada a las bases de datos. P.E.: Un miembro que facilita las cartas de un aeropuerto. Expedida por el Executive.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/MH.gif"> </td>
          <td>Medal of Honour</td>
          <td>Entregada a cualquiera que colabore de una forma excepcional con IVAO. Expedida por el BoG en casos especiales.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/CR.gif"> </td>
          <td>Creativity</td>
          <td>Entregada a cualquiera que cree diseños gráficos como logotipos, medallas o presentaciones para IVAO. Propuesto por DIR/ADIR PRC/PRAC y expedida por el Executive.</td>
        </tr>
      </tbody>
    </table> 
          	
                    
                      
                                    
                    
                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="wt" aria-labelled-by="wt-item">
                    
                    <h2>Medallas World Tour <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W1.gif"> </td>
          <td>World Tour 1 </td>
          <td>Entregada después de completar 1 Tour IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
          <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W2.gif"> </td>
          <td>World Tour 2</td>
          <td>Entregada después de completar 2 Tours IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W3.gif"> </td>
          <td>World Tour 3</td>
          <td>Entregada después de completar 3 Tours IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W4.gif"> </td>
          <td>World Tour 4</td>
          <td>Entregada después de completar 4 Tours IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W5.gif"> </td>
          <td>World Tour 5</td>
          <td>Entregada después de completar 5 Tours IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W6.gif"> </td>
          <td>World Tour 6</td>
          <td>Entregada después de completar 6 Tours IFR alrededor del mundo, volando online en IVAN.</td>
          </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W7.gif"> </td>
          <td>World Tour 7</td>
          <td>Entregada después de completar 7 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W8.gif"> </td>
          <td>World Tour 8</td>
          <td>Entregada después de completar 8 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/W9.gif"> </td>
          <td>World Tour 9</td>
          <td>Entregada después de completar 9 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X1.gif"> </td>
          <td>World Tour 10</td>
          <td>Entregada después de completar 10 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X2.gif"> </td>
          <td>World Tour 11</td>
          <td>Entregada después de completar 12 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X3.gif"> </td>
          <td>World Tour 12</td>
          <td>Entregada después de completar 12 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X4.gif"> </td>
          <td>World Tour 13</td>
          <td>Entregada después de completar 13 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X5.gif"> </td>
          <td>World Tour 14</td>
          <td>Entregada después de completar 14 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X6.gif"> </td>
          <td>World Tour 15</td>
          <td>Entregada después de completar 15 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/X7.gif"> </td>
          <td>World Tour 16</td>
          <td>Entregada después de completar 16 Tours IFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/WV.gif"> </td>
          <td>World Tour VFR 1</td>
          <td>Entregada después de completar 1 Tour VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F2.gif"> </td>
          <td>World Tour VFR 2</td>
          <td>Entregada después de completar 2 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F3.gif"> </td>
          <td>World Tour VFR 3</td>
          <td>Entregada después de completar 3 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F4.gif"> </td>
          <td>World Tour VFR 4</td>
          <td>Entregada después de completar 4 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F5.gif"> </td>
          <td>World Tour VFR 5</td>
          <td>Entregada después de completar 5 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F6.gif"> </td>
          <td>World Tour VFR 6</td>
          <td>Entregada después de completar 6 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F7.gif"> </td>
          <td>World Tour VFR 7</td>
          <td>Entregada después de completar 7 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F8.gif"> </td>
          <td>World Tour VFR 8</td>
          <td>Entregada después de completar 8 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F9.gif"> </td>
          <td>World Tour VFR 9</td>
          <td>Entregada después de completar 9 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/FX.gif"> </td>
          <td>World Tour VFR 10</td>
          <td>Entregada después de completar 10 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F11.gif"> </td>
          <td>World Tour VFR 11</td>
          <td>Entregada después de completar 11 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F12.gif"> </td>
          <td>World Tour VFR 12</td>
          <td>Entregada después de completar 12 Tours VFR alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S1.gif"> </td>
          <td>World Tour S.O. 1</td>
          <td>Entregada después de completar 1 Tour S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S2.gif"> </td>
          <td>World Tour S.O. 2</td>
          <td>Entregada después de completar 2 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S3.gif"> </td>
          <td>World Tour S.O. 3</td>
          <td>Entregada después de completar 3 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S4.gif"> </td>
          <td>World Tour S.O. 4</td>
          <td>Entregada después de completar 4 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S5.gif"> </td>
          <td>World Tour S.O. 5</td>
          <td>Entregada después de completar 5 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S6.gif"> </td>
          <td>World Tour S.O. 5</td>
          <td>Entregada después de completar 6 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S7.gif"> </td>
          <td>World Tour S.O. 7</td>
          <td>Entregada después de completar 7 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S8.gif"> </td>
          <td>World Tour S.O. 8</td>
          <td>Entregada después de completar 8 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S9.gif"> </td>
          <td>World Tour S.O. 9</td>
          <td>Entregada después de completar 9 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/S10.gif"> </td>
          <td>World Tour S.O. 10</td>
          <td>Entregada después de completar 10 Tours S.O. alrededor del mundo, volando online en IVAN.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/DA.gif"> </td>
          <td>Dangerous Airport Tour 1</td>
          <td>Entregada después de completar el Dangerous Airport Tour. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D2.gif"> </td>
          <td>Dangerous Airport Tour 2</td>
          <td>Entregada después de completar 2 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D3.gif"> </td>
          <td>Dangerous Airport Tour 3</td>
          <td>Entregada después de completar 3 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D4.gif"> </td>
          <td>Dangerous Airport Tour 4</td>
          <td>Entregada después de completar 4 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D5.gif"> </td>
          <td>Dangerous Airport Tour 5</td>
          <td>Entregada después de completar 5 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D6.gif"> </td>
          <td>Dangerous Airport Tour 6</td>
          <td>Entregada después de completar 6 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D7.gif"> </td>
          <td>Dangerous Airport Tour 7</td>
          <td>Entregada después de completar 7 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D8.gif"> </td>
          <td>Dangerous Airport Tour 8</td>
          <td>Entregada después de completar 8 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/D9.gif"> </td>
          <td>Dangerous Airport Tour 9</td>
          <td>Entregada después de completar 9 Dangerous Airport Tours. Expedido por el Departamento de Operaciones de Vuelo.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/LH.gif"> </td>
          <td>Long Haul WT 1</td>
          <td>Entregada después de completar el Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L2.gif"> </td>
          <td>Long Haul WT 2</td>
          <td>Entregada después de completar 2 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L3.gif"> </td>
          <td>Long Haul WT 3</td>
          <td>Entregada después de completar 3 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L4.gif"> </td>
          <td>Long Haul WT 4</td>
          <td>Entregada después de completar 4 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L5.gif"> </td>
          <td>Long Haul WT 5</td>
          <td>Entregada después de completar 5 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L6.gif"> </td>
          <td>Long Haul WT 6</td>
          <td>Entregada después de completar 6 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L7.gif"> </td>
          <td>Long Haul WT 7</td>
          <td>Entregada después de completar 7 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/L8.gif"> </td>
          <td>Long Haul WT 8</td>
          <td>Entregada después de completar 8 Long Haul WT. Expedido por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/F1.gif"> </td>
          <td>F1 World Tour 1</td>
          <td>Entregada después de completar el F1 World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/2F.gif"> </td>
          <td>F1 World Tour 2</td>
          <td>Entregada después de completar 2 F1 World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/3F.gif"> </td>
          <td>F1 World Tour 3</td>
          <td>Entregada después de completar 3 F1 World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/4F.gif"> </td>
          <td>F1 World Tour 4</td>
          <td>Entregada después de completar 4 F1 World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/5F.gif"> </td>
          <td>F1 World Tour 5</td>
          <td>Entregada después de completar 5 F1 World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/7W.gif"> </td>
          <td>7 Wonders Tour 1</td>
          <td>Entregada después de completar el 7 Wonders Tour. Expedida por el Departamento SO.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/7W2.gif"> </td>
          <td>7 Wonders Tour 2</td>
          <td>Entregada después de completar 2, 7 Wonders Tour. Expedida por el Departamento SO.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/7W3.gif"> </td>
          <td>7 Wonders Tour 3</td>
          <td>Entregada después de completar 3, 7 Wonders Tour. Expedida por el Departamento SO.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/VP.gif"> </td>
          <td>Vintage Propeller World Tour 1</td>
          <td>Entregada después de completar el Vintage Propeller World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/VP2.gif"> </td>
          <td>Vintage Propeller World Tour 2</td>
          <td>Entregada después de completar 2 Vintage Propeller World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/MGP.gif"> </td>
          <td>Moto GP World Tour</td>
          <td>Entregada después de completar el Moto GP World Tour.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/PS.gif"> </td>
          <td>Pilot Skills WT 1</td>
          <td>Entregada después de completar el Pilot Skills WT. Expedida por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/PS2.gif"> </td>
          <td>Pilot Skills WT 2</td>
          <td>Entregada después de completar 2 Pilot Skills WT. Expedida por el Departamento de Miembros.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/BJ.gif"> </td>
          <td>Bizjet WT</td>
          <td>Entregada después de completar el Bizjet WT. Expedida por el Departamento de Miembros.</td>
        </tr>
      </tbody>
    </table> 
          	
                    
                      
                                    
                    
                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="so" aria-labelled-by="so-item">
                    
                    <h2>Medallas Operaciones Especiales <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/jf.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 10 puntos SO. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
          <tr>
        <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/jf2.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 40 puntos SO. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/jf3.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 65 puntos SO. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/jf4.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 100 puntos SO. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SO.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 10 puntos SO como ATC. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SO2.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 40 puntos SO como ATC. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
          </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SO3.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 65 puntos SO como ATC. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/SO4.gif"> </td>
          <td>Entregada a cualquiera que logre los primeros 100 puntos SO como ATC. Solicitada por SOC/SOAC y expedida por Departamento SO.</td>
        </tr>
      </tbody>
    </table> 
          	
                    
                      
                                    
                    
                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane fade show" id="online" aria-labelled-by="online-item">
                    
                    <h2>Medallas Online <small> Sede Central</small></h2>
                    
                    <div class="separacion-tablas"></div>
                                    
                                    
                                    <table class="table table-condensed">
      <thead class="thead-dark">
        <tr>
          <th>Medalla</th>
          <th>Título</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H1.gif"> </td>
          <td>+ 500 Hours </td>
          <td>Más de 500 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H2.gif"> </td>
          <td>+ 1,000 Hours</td>
          <td>Más de 1,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H3.gif"> </td>
          <td>+ 2,000 Hours</td>
          <td>Más de 2,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H4.gif"> </td>
          <td>+ 5,000 Hours</td>
          <td>Más de 5,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H5.gif"> </td>
          <td>+ 10,000 Hours</td>
          <td>Más de 10,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
          </tr>
          <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H6.gif"> </td>
          <td>+ 15,000 Hours</td>
          <td>Más de 15,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
          </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H7.gif"> </td>
          <td>+ 20,000 Hours</td>
          <td>Más de 20,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H8.gif"> </td>
          <td>+ 25,000 Hours</td>
          <td>Más de 25,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H9.gif"> </td>
          <td>+ 30,000 Hours</td>
          <td>Más de 30,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H10.gif"> </td>
          <td>+ 35,000 Hours</td>
          <td>Más de 35,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H11.gif"> </td>
          <td>+ 40,000 Hours</td>
          <td>Más de 40,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H12.gif"> </td>
          <td>+ 45,000 Hours</td>
          <td>Más de 45,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H13.gif"> </td>
          <td>+ 50,000 Hours</td>
          <td>Más de 50,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H14.gif"> </td>
          <td>+ 55,000 Hours</td>
          <td>Más de 55,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H15.gif"> </td>
          <td>+ 60,000 Hours</td>
          <td>Más de 60,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H16.gif"> </td>
          <td>+ 65,000 Hours</td>
          <td>Más de 65,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
        <tr>
          <td><img alt="medalla" class="img-thumbnail-4" src="https://www.ivao.aero/data/images/awards/H17.gif"> </td>
          <td>+ 70,000 Hours</td>
          <td>Más de 70,000 horas online como ATC/Piloto. Horas STAFF excluidas.</td>
        </tr>
      </tbody>
    </table>	  
  </div><!-- tabpanel -->   
  </div><!-- /.tab-content -->
  
  </div><!-- /.col-md-9 -->
</div><!-- /.row -->
                   
</div><!-- /.tab-novedades -->
          
</div><!-- /.container -->
</section>
@endsection