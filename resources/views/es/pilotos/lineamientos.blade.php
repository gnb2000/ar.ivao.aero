@extends('template')

@section('titulo')
<title>Lineamientos :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>

      <div class="container marketing">

      <div class="tabla-novedades">
       
       <div class="row"> 
          <div class="col-sm-3">
          
            <div class="list-group" role="tablist"> 
              <a class="list-group-item list-group-item-action active" href="#ifr" aria-controls="ifr" role="tab" data-bs-toggle="tab"><i class="fa fa-plane fa-fw"></i>&nbsp; IFR Instrumental</a>
              <a class="list-group-item list-group-item-action" href="#vfr" aria-controls="vfr" role="tab" data-bs-toggle="tab"><i class="fa fa-plane fa-fw"></i>&nbsp; VFR Visual</a>
              <a class="list-group-item list-group-item-action" href="#svfr" aria-controls="svfr" role="tab" data-bs-toggle="tab"><i class="fa fa-star fa-fw"></i>&nbsp; S-VFR Visual Especial</a>
        <a class="list-group-item list-group-item-action" href="#fp" aria-controls="fp" role="tab" data-bs-toggle="tab"><i class="fa fa-file fa-fw"></i>&nbsp; Plan de Vuelo</a>
            </div><!-- /.list-group -->


          </div><!-- /.col-sm-3 -->
          <div class="col-sm-9">
          
              <div class="tab-content">
                                    
                    <div role="tabpanel" class="tab-pane active" id="ifr">
                            
                            <h2 class="title">IFR Instrumental <small> Reglas de Vuelo Instrumental </small><span class="line"></span></h2>
                            
                                <div class="separacion-tablas"></div>
                                    
                                    <p align="justify">El vuelo IFR, a diferencia del VFR, no tiene limitaciones en materia de horarios, espacios a&eacute;reos, etc. sin embargo se ve sometido a la realizaci&oacute;n de procedimientos instrumentales y debe estar sujeto a continua comunicaci&oacute;n con el ATC al desarrollarse, y tambi&eacute;n realizando procedimientos instrumentales de llegada, salida y aproximaci&oacute;n. Son estos &uacute;ltimos lo que restringen a los vuelos IFR de la salida o llegada, ya que si la m&iacute;nimas de visibilidad no est&aacute;n dadas para una carta en particular y esta es la m&aacute;s restrictiva, el aer&oacute;dromo se encuentra cerrado para aterrizajes.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Salidas y llegadas normalizadas (SID y STAR)</h4>
                                                                        
                                    <p align="justify">Todos los vuelos IFR que se desarrollen en aer&oacute;dromos con llegadas y salidas instrumentales, deben ponerlas en su plan de vuelo y deben saber que estar&aacute; sujeta a determinaci&oacute;n del ATC activo en cuesti&oacute;n.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Aproximaciones visuales y circulaci&oacute;n visual</h4>
                                                                        
                                    <p align="justify">Cuando por iniciativa del ATC o del piloto se pueda realizar una aproximaci&oacute;n visual, se mantendr&aacute; siempre contacto visual con la pista y el terreno y se mantendr&aacute;n las m&iacute;nimas de separaci&oacute;n IFR entre aeronaves. En caso de circulaci&oacute;n visual, se realizar&aacute; el procedimiento instrumental de aproximaci&oacute;n (IAP) correspondiente y cuando el piloto indique visual con la pista realizar&aacute; la aproximaci&oacute;n visual hacia la cabecera opuesta u otra pista que resultara conveniente el aterrizaje previa autorizaci&oacute;n del ATC.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Procedimiento de espera</h4>
                                                                        
                                    <p align="justify">Los circuito de espera tipo hip&oacute;dromo se realizar&aacute;n a FL140 o por debajo seguir&aacute;n trayectorias lineales de 1 minutos (tramo controlado y tramo no controlado) y de 1 ½ minutos por encima de FL140. Los virajes ser&aacute;n Clase I siempre, excepto aeronaves a reacci&oacute;n que realizarán virajes de Clase II.</p>
                                    
                                    <p align="justify">La velocidad m&aacute;xima en espera depender&aacute; del nivel y tipo de aeronaves. Las aeronaves propulsadas a h&eacute;lice mantendr&aacute;n hasta 14000 pies 170 nudos, y por encima 175 nudos. Las aeronaves a reacci&oacute;n mantendr&aacute;n hasta 6000 pies 210 nudos, encima de 6000 y hasta 14000 pies 220 nudos, y de 14000 hacia arriba 240 nudos.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Operaciones RVSM – M&iacute;nimas de Separaci&oacute;n Vertical Reducida</h4>
                                                                        
                                    <p align="justify">Las aeronaves que deseen adoptar niveles de vuelo RVSM en el espacio a&eacute;reo comprendido entre FL290 y FL410 deber&aacute;n especificar en su plan de vuelo que est&aacute;n capacitadas para dicha operaci&oacute;n en la secci&oacute;n de equipamiento del mismo.</p>
                  
                  <h4>Niveles de Vuelo</h4>
                  <p align="center"><img alt="Regla Semicircular de Niveles de Vuelo" src="/img/ReglaSemicircular.png" /></p>
                            

                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane" id="vfr">
                            
                            <h2 class="title">VFR Visual <small> Reglas de Vuelo Visual </small><span class="line"></span></h2>
                            
                                <div class="separacion-tablas"></div>
                                    
                                    <p align="justify">El vuelo bajo las VFR se encuentra limitado por espacio a&eacute;reo, meteorolog&iacute;a, horario y nivel. Asimismo cumple con las reglas de vuelo general  y las reglas de vuelo visual establecidas en las RAAC (Regulaciones Argentinas de Aviaci&oacute;n Civil) y las reglas de vuelo controlado o no controlado dependiendo del espacio a&eacute;reo en el que el vuelo VFR se desarrollo.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Espacios a&eacute;reos</h4>
                                                                        
                                    <p align="justify">Ning&uacute;n vuelo VFR podr&aacute; desarrollarse en espacio a&eacute;reo clase A, comprendido por todas las aerov&iacute;as y TMA desde FL195 hacia arriba de forma ilimitada (Ver AIP ENR 1.4).</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Horario</h4>
                                                                        
                                    <p align="justify">Ning&uacute;n vuelo VFR se desarrollar&aacute; en horario nocturno en vuelo de navegaci&oacute;n, es decir; cuando el aer&oacute;dromo de salida sea distinto al aer&oacute;dromo de llegada y el vuelo se desarrolle m&aacute;s all&aacute; del espacio a&eacute;reo ATZ o CTR del aer&oacute;dromo en cuesti&oacute;n. Sin embargo, se podr&aacute;n realizar vuelos VFR nocturnos locales dentro de los l&iacute;mites del ATZ o CTR del aer&oacute;dromo habilitado para vuelo nocturno.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Meteorolog&iacute;a</h4>
                                                                        
                                    <p align="justify">Para que un vuelo VFR despegue o aterrice de un aer&oacute;dromo deben darse los siguientes m&iacute;nimos meteorol&oacute;gicos, por debajo de ellos el aer&oacute;dromo est&aacute; cerrado para vuelo VFR y ninguna aeronave aterrizar&aacute; ni despegar&aacute; de all&iacute;, ni ning&uacute;n ATC podr&aacute; autorizar despegues ni aterrizajes a vuelos VFR.</p>
                                    
                                    <p align="justify">Las m&iacute;nimas meteorol&oacute;icas para vuelo VFR en aer&oacute;dromos controlados son de 5000 metros de visibilidad y 1000 pies de techo de nubes(*), para aer&oacute;dromo NO controlados que est&eacute;n dentro de un CTR se mantienen los mismos valores, y para los aer&oacute;dromos NO controlados fuera de un CTR la visibilidad será de 2500 metros y 1000 pies de techo de nubes (*)</p>
                                                               
                                    <p align="justify">(*) Definimos como techo de nubes, la primer capa de nubes que cubra más de la mitad del cielo, es decir: BKN u OVC.</p>
                                    <p align="justify">Asimismo las aeronaves en vuelo VFR deben mantener en condiciones meteorol&oacute;gicas visuales (VMC) en su vuelo en ruta, por debajo de estas el vuelo VFR no debe continuarse.</p>
                                    
                                    <p align="justify">Los vuelos VFR en ruta que vuelen a FL100 o por encima deben mantenerse lateralmente separadas a 1500 metros de las nubes y a 1000 pies verticalmente en espacio a&eacute;reo clase C, D y G, y en espacio a&eacute;reo clase B libre de nubes. Sin embargo los vuelos VFR en ruta que vuelen por debajo de FL100 deben mantenerse lateralmente separadas a 1500 metros de las nubes y a 1000 pies verticalmente en espacio a&eacute;reo clase B, C, D y G. Las aeronaves en ATZ o CTR deben mantener separaci&oacute;n lateral de 1500 metros y vertical de 500 pies.</p>
                                    
                                    <p align="justify">Respecto a la visibilidad, en cualquier espacio a&eacute;reo y fase del vuelo, a FL100 o por encima, esta deber&aacute; ser de 8000 metros, y por debajo de 5000 metros.</p>
                                    
                                    <hr style="margin-bottom: 19px;">
                                    
                                    <h4>Nivel</h4>
                                                                        
                                    <p align="justify">Todas las aeronaves que vuelen VFR deberán desarrollar sus vuelos con niveles PARES o IMPARES de acuerdo al curso o derrota que mantengan, es decir; Aquellos que vuelen entre 000° y 179° mantendrán un nivel IMPAR, y los que vuelen entre 180° y 359° un nivel PAR. Si el vuelo va a desarrollarse en espacio aéreo no controlado deberá adicionarse 500 pies a este nivel, y si se desarrolla en espacio aéreo controlado deberá mantenerse un nivel de vuelo redondo. Ejemplo; Aeronave volando con curso 070° en espacio aéreo no controlado podría llevar niveles tales como: 1500, 3500, 5500, etc. hasta alcanzar FL195 que es el máximo nivel para vuelos VFR. Sin embargo una aeronave que vuele con curso 280° en una TMA (espacio aéreo controlado) deberá mantener niveles tales como; 2000, 4000, 6000, 8000, etc. hasta FL180 ya que este es el último nivel de vuelo controlado con curso entre 180° y 359° por debajo de FL195.</p>
                  
                  <p align="center"><img alt="Regla Semicircular de Niveles de Vuelo" src="/img/ReglaSemicircularVFR.png" /></p>
                            

                    </div><!-- tabpanel -->
                    
                    <div role="tabpanel" class="tab-pane" id="svfr">
                            
                            <h2 class="title">S-VFR Especial <small> Reglas de Vuelo Visuales Especiales </small><span class="line"></span></h2>
                            
                                <div class="separacion-tablas"></div>
                                    
                                    <p align="justify">Ante ciertas circunstancias debidamente justificadas, la autoridad competente, autorizará el desarrollo de vuelos VFR por debajo de las mínimas meteorológicas establecidas para aeródromo. Adoptándose en aeródromos controlados y en NO controlados dentro de CTR, las minimas para aeródromos NO controladores fuerta de CTR, siendo los valores de visibilidad reducidos a 2500 metros.</p>


                    </div><!-- tabpanel -->
                    <div role="tabpanel" class="tab-pane" id="fp">
                            
                            <h2 class="title">Plan de Vuelo <small> Formulario de Plan de Vuelo </small><span class="line"></span></h2>
                            
                                <div class="separacion-tablas"></div>
                                    
                                    <h4>Introducci&oacute;n</h4>

                  <p align="justify">Seg&uacute;n las Regulaciones Argentinas de Aviaci&oacute;n Civil (RAAC) no solo es conveniente la presentaci&oacute;n del Plan de Vuelo antes de iniciar cualquier vuelo, sino que en muchos casos es obligatoria. Es por ello que vamos a ver las distintas formas, paso a paso, de c&oacute;mo confeccionar uno.</p>

                  <p align="justify">Para dar conocimiento a las dependencias de los Servicios de Tr&aacute;nsito del Plan de Vuelo propuesto est&aacute; el <u>formulario de Plan de vuelo</u> en el cual se debe plasmar lo m&aacute;s exacta y detalladamente lo que se tiene planeado hacer; nivel o altitud requerida, velocidad a mantener durante la ruta, ruta que ser&aacute; volada, horarios y tiempos estimados tanto a destino como a punto, etc. Asimismo sirve para dar conocimiento a las dependencias ATS del tipo y color de aeronave, autonom&iacute;a, equipos de supervivencia, radiobalizas, personas a bordo lo cual facilitar&aacute; la b&uacute;squeda del mismo en caso de que este sea parte de un accidente.</p>
                  
                  <hr style="margin-bottom: 19px;">

                  <h4>Presentaci&oacute;n obligatoria</h4>

                  <p align="justify">Es obligatoria la presentaci&oacute;n de un plan de vuelo en los siguientes casos:</p>

                  <ul>
                    <li>Cuando en el vuelo deban ser prestados los servicios de control de tr&aacute;nsito a&eacute;reo.</li>
                    <li>Cuando el vuelo sea IFR.</li>
                    <li>Cuando sea necesario el cruce de fronteras internacionales.</li>
                    <li>Cuando el vuelo sea comercial regular.</li>
                    <li>Cuando el vuelo sea efectuado por aeronaves extranjeras, pasavantes o del Estado.</li>
                    <li>Cuando el vuelo sea VFR y se requieran los servicios de Alerta.</li>
                    <li>O bien cuando la autoridad aeron&aacute;utica lo requiera.</li>
                  </ul>

                  <p align="justify">Este debe ser presentado en una oficina ARO-AIS. Asimismo se puede presentar por tel&eacute;fono o por radio siempre y cuando:</p>

                  <ul>
                    <li>No haya ATS en el aer&oacute;dromo de salida.</li>
                    <li>El vuelo se efectu&eacute; entre dos aer&oacute;dromos dentro del mismo TMA.</li>
                    <li>O bien el vuelo sea sanitario o corresponda a una operaci&oacute;n de ayuda por rescate, emergencia social o cat&aacute;strofe.</li>
                  </ul>
                  
                  <hr style="margin-bottom: 19px;">

                  <h4>Tiempos</h4>

                  <p align="justify">El plan de vuelo debe ser presentado 45 minutos antes de la EOBT (Hora estimada fuera de calzos - Estimated Off-Block Time) para los vuelos controlados.</p>

                  <p align="justify">La comunicaci&oacute;n de un plan de vuelo presentado en el aire (abreviado como AFIL) debe realizarse con 10 minutos de anticipaci&oacute;n si la comunicaci&oacute;n es directa o bien 20 minutos de anticipaci&oacute;n si la comunicaci&oacute;n es indirecta.</p>

                  <p align="justify">El plan tiene una vigencia de su iniciaci&oacute;n de 30 minutos para los vuelos controlados y de 60 minutos para los no controlados, pasado este tiempo y si no se enmend&oacute; el mismo con una demora (DLA) este pierde su vigencia.</p>
                  
                  <hr style="margin-bottom: 19px;">

                  <h2>Cambios</h2>

                  <p align="justify">Se debe notificar a los ATS cualquier cambio en el plan de vuelo. Recordemos que los Servicios de B&uacute;squeda y Salvamento (SAR &ndash; <em>Search and Rescue</em>) nos buscaran en la ruta presentada en caso de un accidente.</p>
                  
                  <hr style="margin-bottom: 19px;">

                  <h4>Terminaci&oacute;n</h4>

                  <p align="justify">Un plan de vuelo se termina cuando se notifica directamente a una dependencia</p>

                  <p align="justify">ATS o bien cuando se cancela este por parte del piloto al pasar por la dependencia ATS m&aacute;s cercana al destino. El hecho de cancelar el plan de vuelo implica la renuncia al Servicio de Alerta.</p>
                  
                  <hr style="margin-bottom: 19px;">
                  <br>
                  <p align="justify"><a class="text-info" href="index.php?pagina=formacion/biblioteca">Manual Completo</a></p> 



                    </div><!-- tabpanel -->
                    
        
        </div><!-- /.tabla-novedades -->

                </div><!-- /.tab-content -->
          
          </div><!-- /.col-sm-9 -->
   </div><!-- /.row -->
 </div>
</section>
@endsection