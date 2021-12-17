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
          
          
          <div class="list-group">
              <a class="list-group-item active" href="#inicio" aria-controls="inicio" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicio</a>
              <a class="list-group-item" href="#ivap" aria-controls="ivap" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Instalación IvAp</a>
              <a class="list-group-item" href="#ts2" aria-controls="ts2" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Team Speak 2</a>
        <a class="list-group-item" href="#mtl" aria-controls="mtl" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; MTL</a>
              <a class="list-group-item" href="#conexion" aria-controls="conexion" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Primera Conexión</a>
              <a class="list-group-item" href="#fp" aria-controls="fp" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Plan de Vuelo</a>
              <a class="list-group-item" href="#piloto" aria-controls="piloto" role="tab" data-toggle="tab"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicios como Piloto</a>
            </div>
            
            <div class="separacion-tablas"></div>
            
            <div class="list-group">
              <a class="list-group-item" target="_blank" href="http://files.ar.ivao.aero/Training/Manuales/Start_Pilotos.pdf"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp; Descargar Guía</a>
            </div>
          
          
          </div><!-- /.col-sm-3 -->
          <div class="col-sm-9">
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inicio">
    
        <h2>Inicio - Primeros Pasos <small> Pilotos</small></h2>
          <div class="separacion-tablas"></div>
          
              <div class="md-columna-7">
                
          <p style="text-align:justify">Esta secci&oacute;n te mostrar&aacute; los pasos necesarios para volar en IVAO como piloto. Esta pensado para darte una visi&oacute;n general de las herramientas que se utilizan y algunas instrucciones b&aacute;sicas acerca de c&oacute;mo proceder en este nuevo entorno.</p>
          <p style="text-align:justify">Si no lo has hecho todav&iacute;a, necesitar&aacute;s <strong><a href="https://www.ivao.aero/members/person/register3.asp" target="_blank">registrarte en IVAO</a></strong> para crear tu cuenta personal de usuario.</p>
          
          <p style="text-align:justify">M&aacute;s espec&iacute;ficamente, te enseñaremos a:</p>
                  <ul>
                    <li>Descargar, instalar y configurar el software necesario.</li>
                    <li>Conectarte a la red IVAO (“IVAN” IVAO Network)</li>
                    <li>Mandar un plan de vuelo sencillo.</li>
                    <li>Interactuar con el Controlador de Tr&aacute;nsito A&eacute;reo (ATC), o c&oacute;mo actuar si &eacute;ste no est&aacute;.</li>
                    <li> Obtener m&aacute;s informaci&oacute;n y ayuda.</li>
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
        
        <h2>Instalaci&oacute;n IvAp <small> Primeros Pasos</small></h2>
          <div class="separacion-tablas"></div>
          
<p style="text-align:justify">Para empezar a volar tendrás que descargar, instalar y configurar el software necesario, conectarse a 
la red, enviar un simple y sencillo plan de vuelo, interactuar con el Controlador de Tránsito Aéreo (ATC), y si no está, cómo actuar en ese caso.<p>

<p align="justify">Lo primero que tiene quehacer es descargar el software para piloto, el IvAp, que le permitirá conectarse a la red a través de su simulador de vuelo (Microsoft Flight Simulator, Prepar3D o X - Plane)</p>

<p align="justify">Puede descargarlo desde <a href="https://www.ivao.aero/softdev/ivap.asp#dl">aquí</a></p>

<p style="text-align:justify">Dependiendo del simulador que utilicé deberá descargar la versión correspondente</p>
    <ul>
      <li>FS 2002 and FS 2004 - Versión 1</li>
        <li>P3D/FS X - Versión 2</li>
        <li>X Plane – Versión X-IvAp</li>
    </ul>

<p style="text-align:justify">Una vez se haya descargado el programa, ejecute el archivo e instale el programa. Durante el proceso de instalación te preguntará si deseainstalar el TeamSpeak 2 y el FSUIPC.</p>

<p align="justify">Utilizamos el TeamSpeak 2, un programa de comunicación, para simular las comunicaciones radiales por voz con el controlador de  tránsito aéreo (ATC). Si no lo tiene instalado previamente, deberá seleccionarlo para instalarlo.</p>

<p align="justify">El FSUIPC es un pequeño módulo necesario para su vuelo en red. Si no tiene el FSUIPC instalado en su computadora (o siquiera le suena haberlo instalado alguna vez), seleccione también el FSUIPC para que se instale.</p>

<p align="justify">Le recomendamos echarle un vistazo al <a href="https://www.ivao.aero/softdev/mirrors.asp?software=IvApManES" target="ext">manual del IvAp</a> para una descripción detallada de cada una de las opciones</p>
        
                
                
        
        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="ts2">
    
<h2>Team Speak 2 <small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>

    <p style="text-align:justify">Usamos el programa <strong>Team Speak 2</strong> para simular las comunicaciones v&iacute;a voz. La comunicaci&oacute;n por texto se permite en ciertos casos pero es preferible hacerlo por voz. El Team Speak viene incluido en el paquete de instalaci&oacute;n del IvAc y se instalar&aacute; autom&aacute;ticamente durante la instalaci&oacute;n del paquete. En caso que el proceso anterior no haya sido correctamente instalado, podr&aacute; reinstalar el IvAp.</p>
        
        <div class="alert alert-danger">
        
        <p class="text-black"><strong>Atenci&oacute;n</strong>! </p>
        <br>
        <ul>
        <li>IVAO solo est&aacute; disponible con la versi&oacute;n de Team Speak 2. </li>
        <li>Si dispone de otra versi&oacute;n, deber&aacute; igualmente hacer la instalaci&oacute;n de Team Speak 2.</li>
        </ul>
        
        </div><!-- /.alert alert-danger -->
        
        <p>Una vez tenga instalado y haya ejecutado el Team Speak, hay algunas opciones que debe cambiar:</p>
        
        <p>Abra <strong>Settings</strong> → <strong>Sound Input/Output Settings</strong></p>
        
        <p>Debe seleccionar la opci&oacute;n "<strong>Push to talk</strong>" y seleccionar una tecla presionando “<strong>Set</strong>”. Aqu&iacute; puede verse como el bot&oacute;n CONTROL DERECHA ha sido seleccionado como “Push to Talk” (“Presione para Hablar”).</p>
        
        <p>Ahora, cada vez que quiera transmitir a un piloto en frecuencia, deber&aacute; mantener presionada la tecla asignada al Push to Talk, mientras transmite su mensaje, cuando finalice tan solo su&eacute;ltela. Evite usar el m&eacute;todo de “Voice Activation” ya que esto abre el micro cada vez que detecta un ruido como el ruido de fondo o su respiraci&oacute;n. Puede estar transmitiendo en el canal sin que lo sepa.</p>
        
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
        
<p align="justify">Los siguientes pasos se basan en FS2004 (FS9), de todas formas, son iguales para los dem&aacute;s simuladores. Ahora bien, &iexcl;comencemos! Cargue su simulador y cree un vuelo conect&aacute;ndose en plataforma. <strong>Nunca en la pista en uso (o activa).</strong></p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image002.jpg"/></p>

<p align="justify">Notar&aacute; que aparece una nueva opci&oacute;n en la barra superior llamada &ldquo;IVAO&rdquo; (presionando ALT si vuela a pantalla completa o para los usuarios de FSX ser&aacute; <em>Addons &rarr; IVAO</em>). Seleccione este men&uacute; y presione &ldquo;<em>Start IvAp</em>&rdquo;. El IvAp se cargar&aacute; entonces y ver&aacute; un icono con puntos rojos y verdes en su barra de tareas, cerca de la hora.</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image005.jpg"/></p>

<p align="justify"><strong>NOTA: </strong>LOS USUARIOS DE FSX NO VER&Aacute;N ESTOS PUNTOS.</p>

<p align="justify">Ver&aacute; varias cosas carg&aacute;ndose autom&aacute;ticamente en su simulador de vuelo (El programa del IvAp y la conexi&oacute;n multijugador), simplemente deje que se completen estos procesos. Cuando vea 3 puntos verdes y uno rojo, como en la imagen, entonces el programa ya habr&aacute; acabado.</p>

<p align="justify">Ahora ver&aacute; la ventana IvAp en la parte izquierda de su simulador de vuelo.</p>

<p>&nbsp;</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image008.jpg"/></p>

<p>&nbsp;</p>

<p><strong>ALGUNAS COSAS IMPORT ANTES ANTES DE CONECTARSE A LA RED:</strong></p>

<ul>
  <li>Aseg&uacute;rese cuando te conecte, su aeronave est&eacute; estacionada en la terminal o plataforma. No se conecte en una pista o calle de rodaje. &iexcl;Podr&iacute;a haber alguien despegando/aterrizando! Cuando escoge un aeropuerto en tu simulador, este lo coloca autom&aacute;ticamente en la pista activa as&iacute; que seleccione manualmente la posici&oacute;n de estacionamiento.</li>
  <li>No utilice opci&oacute;n de desplazamiento en su simulador para moverse por el aeropuerto una vez se conecte. Si tiene que cambiar de puerta o puesto de estacionamiento, hazlo cargando de nuevo con tu simulador de vuelo a una nueva posici&oacute;n.</li>
  <li>Si se conecta con un indicativo de compa&ntilde;&iacute;a a&eacute;rea, deber&aacute; utilizar el c&oacute;digo ICAO seguido de n&uacute;mero o letras.</li>
</ul>

<p align="justify">Para conectarse, presione el bot&oacute;n <strong>CONN</strong>. Entonces aparecer&aacute; una nueva ventana.</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image011.jpg"/></p>

<p align="justify">Vaya introduciendo los datos.</p>

<p align="justify"><strong>Callsign:</strong> El indicativo de su avi&oacute;n. Puede ser la matr&iacute;cula del mismo o el n&uacute;mero de vuelo por ejemplo.</p>

<p align="justify"><strong>Real Name: </strong>Su nombre completo que introdujo en su registro a IVAO.</p>

<p align="justify"><strong>VID:</strong> Su n&uacute;mero de usuario IVAO VID que recibi&oacute; durante el registro. <strong>Base Airport:</strong> Un aeropuerto cercano a donde vive.</p>

<p align="justify"><strong>Password:</strong> La contrase&ntilde;a IVAN password que le asignaron luego de su registro.</p>

<p align="justify"><strong>Aircraft Type:</strong> El tipo de aeronave que est&aacute; volando.</p>

<p align="justify"><strong>MTL Model: </strong>La aeronave y colores que quieres que vea el resto de usuarios. Si no encuentra el modelo MTL de la aeronave que vuela busque uno de performance o prestaciones similares. Por ejemplo; Vuela un Cessna 172, no ponga el MTL de un Boeing 777, h&aacute;galo con el Cessna 172 y si no lo hubiere con un Cessna 182 o similar. <strong>Server:</strong> El servidor al que quiera conectarse. Para un mejor rendimiento, utilice el que le propone el programa de forma autom&aacute;tica.</p>

<p align="justify"><strong>Port: </strong>Deje esta casilla tal cual.</p>

<p align="justify"><strong>Transmit/Receive:</strong> Si puede transmitir y recibir por voz, seleccione esta opci&oacute;n.</p>

<p align="justify"><strong>Receive (Listen) Only:</strong> Si solo puede recibir, pero no transmitir, seleccione aqu&iacute;. <strong>No Voice: </strong>Si s&oacute;lo puede comunicarse por texto, seleccione esta opci&oacute;n.</p>

<p align="justify"><strong>IMPORTANTE</strong>: ASEG&Uacute;RESE QUE LA AERONAVE EST&Eacute; APARCADA EN LA TERMINAL ANTES DE CONECTARSE</p>

<p align="justify">Cuando todos los datos est&eacute;n introducidos correctamente, presione el bot&oacute;n de &ldquo;<strong>Connect</strong>&rdquo;.</p>

<p align="justify">Si se ha conectado correctamente, la se&ntilde;al &ldquo;OFFLINE&rdquo; cambiar&aacute; a &ldquo;ONLINE&rdquo; y recibir&aacute; un mensaje de bienvenida en ingl&eacute;s en la ventana de di&aacute;logo del IvAp, poni&eacute;ndose todos los puntos de la barra de tareas en verde.</p>

<p>&nbsp;</p>

<p align="center"><img alt="pp" class="img-thumbnail" src="/img/pilotos/Primeros-Pasos/clip_image014.jpg"/></p>


        </div>
        <div role="tabpanel" class="tab-pane" id="fp">
    
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


        </div><!-- /.tabpanel -->
        
    </div><!-- /.tab-content -->
          
 </div><!-- /.col-sm-9 -->
  </div><!-- /.row -->
    
    </div><!-- /.tabla-novedades -->
</div> <!-- container marketing -->
</section>
@endsection