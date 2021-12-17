@extends('template')

@section('titulo')
<title>Primeros Pasos :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA P&aacute;GINA -->
<section>
    <div class="container marketing">

    <div class="tabla-novedades">
    <div class="row">
    <div class="col-md-3">
        <div class="list-group" role="tablist">
            <a class="list-group-item list-group-item-action active" href="#inicio" aria-controls="inicio" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicio</a>
            <a class="list-group-item list-group-item-action" href="#ivac" aria-controls="ivac" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Instalaci&oacute;n IvAc</a>
            <a class="list-group-item list-group-item-action" href="#ts2" aria-controls="ts2" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Team Speak 2</a>
            <a class="list-group-item list-group-item-action" href="#sectores" aria-controls="sectores" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Descarga Sectores</a>
            <a class="list-group-item list-group-item-action" href="#configuracion" aria-controls="configuracion" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Configuraci&oacute;n</a>
            <a class="list-group-item list-group-item-action" href="#conexion" aria-controls="conexion" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Conexi&oacute;n</a>
            <a class="list-group-item list-group-item-action" href="#atc" aria-controls="atc" role="tab" data-bs-toggle="list"><i class="fa fa-angle-double-right fa-fw"></i>&nbsp; Inicios como ATC</a>
        </div>            
        <div class="list-group">
            <a class="list-group-item list-group-item-action" target="_blank" href="http://files.ar.ivao.aero/Training/Manuales/Start_ATC.pdf"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp; Descargar Gu&iacute;a</a>
        </div>      
    </div><!-- /.col-md-3 -->
    <div class="col-md-9">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="inicio">
    
        <h2>Inicio - Primeros Pasos <small> Controladores</small></h2>
          <div class="separacion-tablas"></div>
          
              <div class="md-columna-7">
                
                  <p style="text-align:justify">Esta secci&oacute;n te mostrar&aacute; los pasos necesarios para conectarse en IVAO como Controlador de Tr&aacute;fico A&eacute;reo (ATC). Esta pensado para darte una visi&oacute;n general de las herramientas que se utilizan y algunas instrucciones b&aacute;sicas acerca de c&oacute;mo proceder en este nuevo entorno.</p>
          <p style="text-align:justify">Si no lo has hecho todav&iacute;a, necesitar&aacute;s <strong><a href="https://www.ivao.aero/members/person/register3.asp" target="_blank">registrarte en IVAO</a></strong> para crear tu cuenta personal de usuario.</p>
          
          <p style="text-align:justify">M&aacute;s espec&iacute;ficamente, te enseñaremos a:</p>
                  <ul>
                    <li>Descargar, instalar y configurar el software necesario.</li>
                    <li>Conectarte a la red IVAO (“IVAN” IVAO Network)</li>
                    <li>Descarga de Sectores.</li>
                    <li>Configurar un ATIS.</li>
                    <li>Obtener m&aacute;s informaci&oacute;n y ayuda.</li>
                  </ul>
          <br>
          <div style="font-family: Arial; font-weight:bold; color: #2a4982; font-size: 11pt; padding-top: 25px;">
Departamento de Operaciones ATC</div>
          <div style="font-weight:bold; color: #666666; font-size: 10pt; padding-bottom: 25px;">
IVAO Argentina</div>
                
                </div><!-- /.md-columna-7 -->
                
                <div class="col-md-5">
                
                <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/primerospasos_banner.jpg" />
                
                </div><!-- /.col-md-5 -->
          
          
          

    </div><!-- /.tabpanel -->

      <div role="tabpanel" class="tab-pane" id="ivac">
        
        <h2>Instalaci&oacute;n IvAc <small> Primeros Pasos</small></h2>
          <div class="separacion-tablas"></div>
          
<p style="text-align:justify">Lo primero que necesitar&aacute; es descargar el software para las operaciones de ATC; el <strong>IvAc</strong>, que le permitir&aacute; conectarse a la red como controlador.<p>

<p style="text-align:justify">Puede descargarlo desde las p&aacute;ginas del <strong>Departamento de Desarrollo de Software</strong>, donde deber&aacute; seleccionar las opciones en el menú de: <strong>IVAO ATC client</strong> → <strong>Downloads</strong>.</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp-atc-1.png" /> </p>
<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp-atc-2.png" /> </p>
<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp-atc-3.png" /> </p>
<p style="text-align:justify">Una vez se descargue el programa, deber&iacute;a ejecutar el archivo de extensi&oacute;n “.exe” e instalarlo en su computadora.</p>

<p style="text-align:justify">Se instalar&aacute; tambi&eacute;n el manual del <strong>IvAc</strong>. Asegúrese de leerlo durante sus primeras horas conectado para familiarizarse con la operaci&oacute;n del software.</p>
        
                
        
        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="ts2">
    
<h2>Team Speak 2 <small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>

    <p style="text-align:justify">Usamos el programa <strong>Team Speak 2</strong> para simular las comunicaciones v&iacute;a voz. La comunicaci&oacute;n por texto se permite en ciertos casos pero es preferible hacerlo por voz. El Team Speak viene incluido en el paquete de instalaci&oacute;n del IvAc y se instalar&aacute; autom&aacute;ticamente durante la instalaci&oacute;n del paquete. En caso que el proceso anterior no haya sido correctamente instalado, podr&aacute; descargarlo desde <a href="#">aqu&iacute;</a>.</p>
        
        <div class="alert alert-danger">
        
        <p class="text-black"><strong>Atenci&oacute;n</strong>! </p>
        <br>
        <ul>
        <li>IVAO solo est&aacute; disponible con la versi&oacute;n de Team Speak 2. </li>
        <li>Si dispone de otra versi&oacute;n, deber&aacute; igualmente hacer la instalaci&oacute;n de Team Speak 2.</li>
        </ul>
        
        </div><!-- /.alert alert-danger -->
        
        <p>Una vez tenga instalado y haya ejecutado el Team Speak, hay algunas opciones que debe cambiar:</p>
        
        <p>Abra <strong>Settings</strong> → S<strong>ound Input/Output Settings</strong></p>
        
        <p>Debe seleccionar la opci&oacute;n "<strong>Push to talk</strong>" y seleccionar una tecla presionando “<strong>Set</strong>”. Aqu&iacute; puede verse como el bot&oacute;n CONTROL DERECHA ha sido seleccionado como “Push to Talk” (“Presione para Hablar”).</p>
        
        <p>Ahora, cada vez que quiera transmitir a un piloto en frecuencia, deber&aacute; mantener presionada la tecla asignada al Push to Talk, mientras transmite su mensaje, cuando finalice tan solo su&eacute;ltela. Evite usar el m&eacute;todo de “Voice Activation” ya que esto abre el micro cada vez que detecta un ruido como el ruido de fondo o su respiraci&oacute;n. Puede estar transmitiendo en el canal sin que lo sepa.</p>
        
        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="sectores">
    
<h2>Sectores IvAc<small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>
        
<p style="text-align:justify">Un sector (Sector File) es el "mapa" que aparece en tu pantalla radar. Contiene capas con datos de informaci&oacute;n sobre la localizaci&oacute;n y disposici&oacute;n del aeropuerto, puntos y fijos, aerov&iacute;as, y fronteras de los espacios a&eacute;reos. Dependiendo del detalle que se proporcione, tambi&eacute;n puede mostrar informaci&oacute;n geogr&aacute;fica como las pistas/calles de rodaje de un aeropuerto, l&iacute;neas de costa, r&iacute;os, carreteras, etc.</p>

<p style="text-align:justify">Para trabajar en una posici&oacute;n ATC, es esencial descargar y utilizar un sector de control. Podr&aacute; descargar el sector deseado desde <a href="/controladores/sectores">aqu&iacute;</a></p>

<p style="text-align:justify">Descargue y guarde el sector que quiera en su computadora.</p>

        </div><!-- /.tabpanel -->
        
         <div role="tabpanel" class="tab-pane" id="configuracion">
    
<h2>Configuraci&oacute;n IvAc <small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>
        
<p style="text-align:justify">¿Listo para separar, ordenar y acelerar el flujo de tr&aacute;nsito a&eacute;reo? Antes deber&aacute; observar c&oacute;mo hacerlo adecuadamente.</p>

<p style="text-align:justify">Por ello su primera conexi&oacute;n deber&iacute;a ser como observador, sin trabajo como controlador. Esto le ayudar&aacute; a familiarizarse con el software y aprender sin presiones de los pilotos que vuelen en su &aacute;rea de control ¡Utilice esta oportunidad de escuchar en frecuencias activas para aprender!</p>

<p style="text-align:justify">Le mostraremos c&oacute;mo conectarse como observador en su aeropuerto favorito. Como observador, usted es libre de observar c&oacute;mo se desarrollan las operaciones de vuelo y apreciar el tr&aacute;nsito a&eacute;reo en el sector que este mirando, asimismo podr&aacute; escuchar a los controladores activos. Por lo tanto no tiene ninguna responsabilidad, eso significa que no se encargas de ningún tr&aacute;nsito todav&iacute;a.</p>

<p style="text-align:justify">Ejecute el IvAc y abra el sector que descarg&oacute; anteriormente. Para abrirlo, haga clic en el menú PVD y seleccione Load Sector.</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp2.jpg" /> </p>

<p>Ahora, presione la opci&oacute;n <strong>CONNECT</strong></p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp3.jpg" /> </p>

<p>Inserte los detalles en la ventana de conexi&oacute;n:</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp4.jpg" /> </p>

<p style="text-align:justify"><strong>Callsign</strong>: Su indicativo. En esta ocasi&oacute;n, te conectar&aacute;s como observador, asi que el indicativo deber&aacute; ser cualquier cosa, pero acabado en "_OBS". Te aconsejamos usar la abreviatura de divisi&oacute;n seguido de tus iniciales, por ejemplo; ARNL_OBS o bien del aeropuerto o &aacute;rea que guste observar.</p>

<p style="text-align:justify"><strong>Real Name</strong>: Su nombre completo como el que utiliz&oacute; para el registro en IVAO.</p>

<p style="text-align:justify"><strong>VID</strong>: La VID de IVAO que se le proporcion&oacute; cuando se uni&oacute; a la red.</p>

<p style="text-align:justify"><strong>Password</strong>: La contraseña (IVAN Password) que te lue asignada cuando se registr&oacute; en IVAO.</p>

<p style="text-align:justify"><strong>Server Address</strong>: El servidor al que quiera conectarse. Para obtener el mejor resultado, seleccione el que aparece por defecto.</p>

<p style="text-align:justify"><strong>Port</strong>: ¡Deje esta casilla tal y como est&aacute;!</p>

<p style="text-align:justify"><strong>Voice</strong>: Seleccione esta casilla para que autom&aacute;ticamente te conecte a un servidor de Team Speak.</p>

<p style="text-align:justify">Una vez haya completado todos los datos, presione “Connect”.
Cuando se haya conectado exitosamente, recibir&aacute; un mensaje de bienvenida en la pestaña MSG del COMMbox del IVAC, y el bot&oacute;n de CONNECT aparacer&aacute; ahora como DISCON.</p>


        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="conexion">
    
<h2>Conexi&oacute;n a IVAO <small> Primeros Pasos</small></h2>
<div class="separacion-tablas"></div>
        
<p style="text-align:justify">Su primera conexi&oacute;n como controlador de tr&aacute;nsito a&eacute;reo requiere una comprensi&oacute;n b&aacute;sica sobre los procedimientos empleados en el lugar donde vaya a controlar. Cheque&eacute; los <a href="">procedimientos</a> y las <a href="">cartas</a>.</p>

<p style="text-align:justify">Algunas cosas importantes a tener en cuenta cuando nos conectamos a la red:</p>

<p style="text-align:justify">Antes de conectarse como un ATC activo, asegúrese de tener el sector apropiado y los documentos requeridos como cartograf&iacute;a e informaci&oacute;n del aer&oacute;dromo. Los pilotos conf&iacute;an en que tienes un conocimiento b&aacute;sico de tu espacio a&eacute;reo y del aeropuerto, as&iacute; como de sus procedimientos. Para tus primeros pasos, se recomienda que te conectes como controlador de superficie o torre en un lugar poco transitado (que puede que no sea su aeropuerto favorito) para acostumbrarse a tus nuevos deberes y ambiente.</p>

<p style="text-align:justify">Una vez se haya preparado, puede intentar esta conexi&oacute;n. Los pasos son los mismos que los anteriormente citados pero con los siguientes cambios:</p>

<p style="text-align:justify"><strong>Callsign</strong>: Introducir [OACI]_GND (para una posici&oacute;n de superficie) o [OACI]_TWR (para una posici&oacute;n de torre). Reemplaza [OACI] por el c&oacute;digo OACI apropiado para el aeropuerto elegido. Sin los corchetes.</p>
<p style="text-align:justify"><strong>Voice</strong>: Como es muy recomendado usar procedimientos de voz, active esta casilla y seleccione el servidor que prefiera.</p>
<p style="text-align:justify">Cuando todos los campos est&eacute;n completados, presione el bot&oacute;n "<strong>Connect</strong>".</p>
<hr>
<br>
<h2>Pasos Finales <small> Conexi&oacute;n a Team Speak 2</small></h2>
<br>

<p style="text-align:justify">El <strong>IvAc</strong> establece una conexi&oacute;n con el servidor de <strong>Team Speak</strong> seleccionado, pero no crear&aacute; el canal ATC. H&aacute;galo usted mismo, seleccionando <strong>Channels</strong> → <strong>Create New Channel</strong> en el Team Speak.</p>

<p style="text-align:justify">Introduce tu indicativo - el mismo utilizado en el Ivac, ejemplo: SAZM_TWR - en el nombre del campo y presiona “<strong>Create Channel</strong>”.</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/primerospasos_5.jpg" /> </p>

        </div><!-- /.tabpanel -->
        
        <div role="tabpanel" class="tab-pane" id="atc">
    
<h2>Control de Tr&aacute;nsito A&eacute;reo <small> Primeros Pasos</small></h2>
<br>

<h3>ATIS <small> Servicio Autom&aacute;tico de Informaci&oacute;n de Terminal</small></h3>
<div class="separacion-tablas"></div>
        
<p style="text-align:justify">El ATIS brinda informaci&oacute;n importante acerca del estado del aeropuerto, es importante configurarlo correctamente. Los datos meteorol&oacute;gicos se incluyen autom&aacute;ticamente. Deber&aacute; añadir la informaci&oacute;n acerca de las pistas, altitud y nivel de transici&oacute;n.</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/pp6.jpg" /> </p>

<p style="text-align:justify"><strong>Importante</strong>: Las pistas son normalmente asignadas según la direcci&oacute;n de viento y los valores de transici&oacute;n se pueden obtener de las cartas aunque los procedimientos locales pueden diferir. Deber&iacute;a entonces buscar informaci&oacute;n local acerca del aeropuerto a controlar.</p>

<hr>
<br>

<h2>Interacci&oacute;n con los Pilotos <small> Servicio de Tr&aacute;nsito A&eacute;reo</small></h2>

<p style="text-align:justify">En l&iacute;neas generales, las posiciones m&aacute;s b&aacute;sicas ATC son “Superficie/Ground” (ZZZZ_GND) y “Torre/Tower” (ZZZZ_TWR). Como controlador de superficie ser&aacute; responsable de todos los movimientos en superficie de las aeronaves, exceptuando las pistas.</p>

<p style="text-align:justify">Esto quiere decir que dentro de sus tareas estar&aacute; otorgar permisos de tr&aacute;nsito y autorizaciones y guiar a los aviones desde la terminal a la pista y viceversa, de una manera segura y r&aacute;pida. Como controlador de torre es responsable de los despegues y aterrizajes de los aviones en su aeropuerto, y de las aeronaves que vuelen en las cercan&iacute;as. Deber&aacute; asignar autorizaciones de despegue y aterrizaje; y separar las aeronaves unas de otras para que la operaci&oacute;n sea segura. M&aacute;s informaci&oacute;n acerca de tus tareas en el centro de formaci&oacute;n de IVAO.</p>

<p style="text-align:justify">Como controlador aqu&iacute; en IVAO, utilizar&aacute; la pantalla del IvAc para ver el tr&aacute;fico conectado y utilizar&aacute; la voz o el texto para comunicarte con ellos. Abajo tiene un ejemplo de c&oacute;mo aparecer&aacute; su pantalla de radar.</p>

<p> <img alt="pp" class="img-thumbnail" src="/img/controladores/Primeros-Pasos/primerospasos_7.jpg" /> </p>

<p style="text-align:justify"><strong>1. Flight Strip</strong>: Cuando seleccione un vuelo, le aparecer&aacute; una tira de informaci&oacute;n con las partes m&aacute;s importantes de su plan de vuelo.</p>

<p style="text-align:justify">2. As&iacute; es c&oacute;mo se ve cada vuelo en tu pantalla radar, lo que se llama “etiqueta” o label. Se compone de un pequeño cuadrado (donde est&aacute; la aeronave) y su etiqueta con los datos m&aacute;s importantes del vuelo (velocidad, altitud, tipo de aeronave y otros)</p>
<p style="text-align:justify">3. Commbox: A trav&eacute;s del commbox, puede comunicarse con los pilotos mediante texto, pedir METAR en los diferentes aeropuertos, hablar por chat privados, realizar coordinaciones con ATC adyacentes, etc.</p>

        </div><!-- /.tabpanel -->
        
      </div><!-- /.tab-content -->
          
    </div><!-- /.col-md-9 -->
  </div><!-- /.row -->
</div><!-- /.tabla-novedades -->
</div><!-- /.container -->
</section>
@endsection