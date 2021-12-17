@extends('template')

@section('titulo')
<title>Primeros Pasos :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA P&aacute;GNA -->
<section>
      <div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
    <div class="row">
          <div class="col-sm-3">
          
          
          <div class="list-group" role="tablist">
              <a class="list-group-item list-group-item-action active" href="#inicio" aria-controls="inicio" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicio</a>
              <a class="list-group-item list-group-item-action" href="#ivap" aria-controls="ivap" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Instalaci&oacute;n ALTITUDE</a>
              <a class="list-group-item list-group-item-action" href="#mtl" aria-controls="mtl" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; MTL</a>
              <a class="list-group-item list-group-item-action" href="#conexion" aria-controls="conexion" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Primera Conexi&oacute;n</a>
              <a class="list-group-item list-group-item-action" href="http://files.ar.ivao.aero/Training/Manuales/Plan de Vuelo.pdf" target="_blank"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Plan de Vuelo</a>
               <!--<a class="list-group-item list-group-item-action" href="#piloto" aria-controls="piloto" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicios como Piloto</a> -->
            </div>
            
            <!--<div class="separacion-tablas"></div>
            
            <div class="list-group">
              <a class="list-group-item" target="_blank" href="http://files.ar.ivao.aero/Training/Manuales/Plan de Vuelo.pdf"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp; Plan de vuelo</a>
            </div> -->
          
          
          </div><!-- /.col-sm-3 -->
          <div class="col-sm-9">
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inicio">
    
        <h2>Inicio - Primeros Pasos <small> Pilotos</small></h2>
          <div class="separacion-tablas"></div>
          
              <div class="md-columna-7">
                
          <p style="text-align:justify">Esta secci&oacute;n te mostrar&aacute; los pasos necesarios para volar en IVAO como piloto. Esta pensado para darte una visi&oacute;n general de las herramientas que se utilizan y algunas instrucciones b&aacute;sicas acerca de c&oacute;mo proceder en este nuevo entorno.</p>
          <p style="text-align:justify">Si no lo has hecho todav&iacute;a, necesitar&aacute;s <strong><a class="text-info" href="https://www.ivao.aero/members/person/register3.asp" target="_blank">registrarte en IVAO</a></strong> para crear tu cuenta personal de usuario.</p>
          
          <p style="text-align:justify">M&aacute;s espec&iacute;ficamente, te enseñaremos a:</p>
                  <ul>
                    <li>Descargar, instalar y configurar el software necesario.</li>
                    <li>Conectarte a la red IVAO (“IVAN” IVAO Network)</li>
                    <li>Mandar un plan de vuelo sencillo.</li>
                  </ul>
          <br>
          <div style="font-family: Arial; font-weight:bold; color: #2a4982; font-size: 11pt; padding-top: 25px;">
Departamento de Operaciones de Vuelo</div>
          <div style="font-weight:bold; color: #666666; font-size: 10pt; padding-bottom: 25px;">
IVAO Argentina</div>
                
                </div><!-- /.md-columna-7 -->
                
                <div class="col-sm-5">
                
                <img alt="pp" class="img-thumbnail" src="/img/pilotos/primerospasos_banner.jpg" />
                
                </div><!-- /.col-sm-5 -->
          
          
          

    </div><!-- /.tabpanel -->

      <div role="tabpanel" class="tab-pane" id="ivap">
        
        <h2>Instalaci&oacute;n ALTITUDE <small> Primeros Pasos</small></h2>
          <div class="separacion-tablas"></div>
          
<p style="text-align:justify">Para empezar a volar tendrás que descargar, instalar y configurar el software necesario, conectarse a 
la red, enviar un simple y sencillo plan de vuelo, interactuar con el Controlador de Tránsito Aéreo (ATC), y si no está, cómo actuar en ese caso.<p>

<p align="justify">Lo primero que tiene que hacer es descargar el software para piloto, el Altitude, que le permitirá conectarse a la red a través de su simulador de vuelo (Microsoft Flight Simulator, Prepar3D o X-Plane)</p>

<p align="justify">Puede descargarlo desde <a class="text-info" href="https://www.ivao.aero/softdev/beta/altitudebeta.asp">aqu&iacute;</a></p>

<p style="text-align:justify">Una vez se haya descargado el programa, ejecute el archivo e instale el programa. El instalador lo guiar&aacute; a trav&eacute;s de toda la instalaci&oacute;n.</p>

<p align="justify">Previamente, los softwares de IVAO utilizaban el TeamSpeak 2 para las comunicaciones con los ATC. Desde el lanzamiento del nuevo software Altitude, &eacute;sto no es necesario.</p>

<p align="justify">Le recomendamos leer el <a class="text-info" href="http://mediawiki.ivao.aero/index.php?title=IVAO_Pilot_Software" target="ext">manual del Altitude</a> para descubrir el resto de las funciones no descritas en este tutorial.</p>
        
                
        </div><!-- /.tabpanel -->
        
    <div role="tabpanel" class="tab-pane" id="mtl">
    
<h2>MTL<small> Libreria de Tránsito Multijugador</small></h2>
<div class="separacion-tablas"></div>
        
<p style="text-align:justify">Las MTL (Multiplayer Traffic Library) le permitirá “ver” otras aeronaves a su alrededor de usuarios de IVAO que estén volando en las cercanías. Lo que se suele conocer como “tránsito”. Para ello se instalarán cientos de aeronaves con sus compañías en su simulador de vuelo.</p>

<p style="text-align:justify">El paquete de MTL esta incluido en su descarga de IvAp y se instalaran automaticamente una vez finalizada la instalación des IvAp.</p>

<p style="text-align:justify">El gestor de descarga de las MTL se ejecutara automaticamente, y usted tendrá dos opciones, instalar la libreria completa, o solamante las aeronaves seleccionadas.</p>

<p style="text-align:justify">1. Para instalar la libreria completa apretar el botón "FULL INSTALL" y elejir a continuación el servidor de descarga.</p>

<p style="text-align:justify">2. Para instalar solamente algunas aeronaves, deberá seleccionar la casilla de la izquierda de las aeronaves que desee, y luego apretar el botón "Download". En la próxima ventana seleccionar el servidor de descarga.</p>

        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="conexion">
    
<h2>Primera Conexión<small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>
        
<p align="justify">Los siguientes pasos se basan en X-Plane 11, el &uacute;nico simulador que tiene diferencias es el Microsoft Flight Simulator 2020 (detalladas mas abajo). Ahora bien, &iexcl;comencemos! Cargue su simulador y cree un vuelo conect&aacute;ndose en plataforma. <strong>Nunca en la pista en uso (o activa).</strong></p>

<p align="justify">El software que instalaste previamente, el Altitude, creó un ejecutable en el escritorio de tu PC llamado "IVAO Pilot Client". Una vez que estés listo dentro del avión en plataforma, ejecutá el Altitude. (NOTA: Si utilizas el MSFS 2020, antes de ejecutar el Altitude debes ejecutar el "IVAO Pilot Core".</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image005.jpg"/></p>

<p align="justify">Cuando veas esta pantalla cargada, procedé a hacer click en “offline”. La siguiente pantalla que aparece, es para logearte en la red.</p>

<p>&nbsp;</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image008.jpg"/></p>

<p>&nbsp;</p>

<ul>
    <li><strong>Callsign</strong>: El indicativo, matrícula o numero de vuelo que vayas a utilizar. (NOTA: Es MUY importante que este sea el mismo que utilices cuando envíes el plan de vuelo, detallado mas abajo).</li>
    <li><strong>VID</strong>: Tu VID de IVAO (Enviado por email cuando te registraste).</li>
    <li><strong>Password</strong>: Tu contraseña de IVAO, también enviada por email. (NOTA: IVAN password).</li>
    <li><strong>Real Name</strong>: Tu nombre real, con el que te registraste.</li>
    <li><strong>Server</strong>: El servidor al que quiera conectarse. Para un mejor rendimiento, utilizá el que le propone el programa de forma automática.</li>
    <li><strong>MTL Aircraft</strong>: La aeronave y colores que queres que vea el resto de usuarios. Si no encuentra el modelo MTL de la aeronave que vuela busque uno de performance o prestaciones similares. Por ejemplo; Vuela un Cessna 172, no ponga el MTL de un Boeing 777, hágalo con el Cessna 172 y si no lo hubiere con un Cessna 182 o similar.</li>
</ul>

<p>Una vez que presiones CONNECT, ya estarás conectado a la red.</p>

<p>Con el nuevo software de IVAO, el plan de vuelo se envía también de forma externa, ingresando a <a class="text-info" target="_blank" href="https://fpl.ivao.aero/home">esta web</a>, ingresando con tu VID y Web Password, podrás acceder al apartado "FILE A FLIGHT PLAN".</p>

<p><strong>AVISO IMPORTANTE</strong>: El callsign, matrícula o número de vuelo que elijas en esta web, debe ser el mismo que elijas en el Altitude a la hora de conectarte, para que éste cargue automáticamente tu plan de vuelo.</p>

<p>Es de importancia que leas los manuales en la <a class="text-info" href="https://ar.ivao.aero/formacion/biblioteca" target="_blank">biblioteca</a> de la división donde vas a encontrar el <a class="text-info" href="http://files.ar.ivao.aero/Training/Manuales/Plan de Vuelo.pdf" target="_blank">manual</a> de Plan de Vuelo con la información necesaria para llenar &eacute;ste.</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image011.jpg"/></p>

<p><strong>ALGUNAS COSAS IMPORTANTES ANTES DE CONECTARSE A LA RED:</strong></p>

<ul>
  <li>Aseg&uacute;rese cuando te conecte, su aeronave est&eacute; estacionada en la terminal o plataforma. No se conecte en una pista o calle de rodaje. &iexcl;Podr&iacute;a haber alguien despegando/aterrizando! Cuando escojas un aeropuerto en tu simulador, este lo coloca autom&aacute;ticamente en la pista activa as&iacute; que debes seleccionar manualmente la posici&oacute;n de estacionamiento.</li>
  <li>No utilices opci&oacute;n de desplazamiento en su simulador para moverte por el aeropuerto una vez se conecte. Si tienes que cambiar de puerta o puesto de estacionamiento, hazlo cargando de nuevo con tu simulador de vuelo a una nueva posici&oacute;n.</li>
  <li>Si te conectas con un indicativo de compa&ntilde;&iacute;a a&eacute;rea, deber&aacute;s utilizar el c&oacute;digo ICAO seguido de n&uacute;mero o letras.</li>
</ul>

        </div>
        <!-- <div role="tabpanel" class="tab-pane" id="fp">
    
<h2>Plan de Vuelo <small> Enviando un plan de vuelo</small></h2>
<div class="separacion-tablas"></div>
        
<p align="justify">En la red de IVAO, es OBLIGATORIO enviar un plan de vuelo previo a cada vuelo. De lo contrario ser&aacute; desconectado autom&aacute;ticamente por el sistema apenas este note que est&aacute; volando y sin plan de vuelo.</p>

<p  align="justify">Antes o despu&eacute;s de conectarte a IVAO, abra el IvAp y presione el bot&oacute;n &ldquo;ACARS&rdquo; y&nbsp; luego &ldquo;SEND FLIGHTPLAN&rdquo;, para luego rellenar el formulario.&nbsp;</p>

<p  align="justify">La mayor&iacute;a de campos pueden ser desconocidos para usted. &iexcl;Pero no se preocupe! Para su primer vuelo ser&aacute; suficiente con escoger unas reglas de vuelo, un aer&oacute;dromo de salida y llegada, y la ruta.</p>

<p  align="justify">Algunos espacios a&eacute;reos son muy complejos y pueden estar muy congestionados. Le recomendamos que haga su primer vuelo en un aeropuerto peque&ntilde;o y tranquilo (No en el aeropuerto internacional de su capital).&nbsp;</p>

<p  align="justify">La manera m&aacute;s f&aacute;cil es realizar un vuelo local (esto es que empieza y acaba en el mismo aeropuerto) en reglas de vuelo visual (navegando sin usar los instrumentos), por ejemplo practicando unos despegues y aterrizajes en circuito. Para dicho vuelo, podr&iacute;a ayudarle la imagen para rellenar tu plan de vuelo:</p>

<p  align="justify"><strong>Campo 8</strong> Flight Rules: &ldquo;V&rdquo; para vuelo Visual.</p>

<p  align="justify"><strong>Campo 13 </strong>Departure Aerodrome: Introduzca el c&oacute;digo OACI de su aeropuerto de salida.</p>

<p  align="justify"><strong>Campo 15</strong> Route: &ldquo;LCL&rdquo; or &ldquo;DCT&rdquo; para vuelo local.</p>

<p  align="justify"><strong>Campo 16</strong> Destination Aerodrome: Introduzca el c&oacute;digo OACI de su aeropuerto de destino, en este caso el mismo que el de salida.</p>

<p  align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image020.jpg"/></p>

<p  align="justify">M&aacute;s adelante, querr&aacute; volar una ruta de A a B, utilizando reglas de vuelo instrumental. Para hacerlo deber&aacute; seguir rutas a&eacute;reas llamadas aerov&iacute;as. Hay muchas fuentes para buscar estas rutas como por ejemplo la base de datos de rutas de IVAO (IVAO Route Database).</p>

<p  align="justify">Necesitar&aacute; tener cartas de vuelo para su ruta. Los controladores a&eacute;reos tambi&eacute;n utilizan estos mapas donde se describen los procedimientos de vuelo de las aeronaves. Puede encontrar las cartas en nuestro sitio web en la secci&oacute;n <em>Recursos</em>.</p>

<p  align="justify"><strong>CONSEJO:</strong> S&Iacute;, LO SABEMOS. PUEDE QUE A ESTAS ALTURAS EST&Eacute; PERDIDO Y NO SEPA MUY BIEN DE QU&Eacute; ESTA MOS HABLANDO. VISITE NUESTRO <a href="http://www.ivao.com.ar/">SITIO WEB</a> EN LA SECCI&Oacute;N<strong> FORMACI&Oacute;N</strong> O BIEN CONTACTESE CON EL <strong>DEPARTAMENTO DE ENTRENAMIENTO</strong> A <a href="mailto:entrenamiento@ar.ivao.aero" class="text-muted">entrenamiento@ar.ivao.aero</a> QUE CON MUCHO GUSTO LO AYUDAREMOS. RECUERDE QUE PARA ESO ESTAMOS.</p>


        </div> --> <!-- /.tabpanel -->
        
    </div><!-- /.tab-content -->
          
 </div><!-- /.col-sm-9 -->
  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
</div> <!-- container marketing -->
</section>
@endsection