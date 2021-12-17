@extends('template')

@section('titulo')
<title>FAQ :: IVAO Argentina</title>
@endsection

@section('contenido')
<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
      <div class="container marketing">

  <!-- DOS COLUMNAS -->
  
  
    <div class="tabla-novedades">
  
    <h2>Preguntas Frecuentes</h2><br />
    <div class="accordion" id="accordion">
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse1" aria-expanded="true" aria-controls="FAQcollapse1">Es necesario estar registrado?</button>
            </h3>
            <div id="FAQcollapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">S&iacute;. Para tener acceso a todos los servicios ofrecidos en la Divisi&oacute;n Argentina, es necesario estar registrado en IVAO. Deber&aacute;s crear una cuenta personal con tu nombre real mediante el formulario de alta. Puedes hacerlo, accediendo <a class="text-info" href="https://www.ivao.aero/members/person/register.htm"><strong>aqu&iacute;</strong></a>.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse2" aria-expanded="false" aria-controls="FAQcollapse2">No estoy registrado en IVAO</button>
            </h3>
            <div id="FAQcollapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">Puedes registrarte <a href="https://www.ivao.aero/members/person/register.htm" class="text-info">aqu&iacute;</a>.</p>

                    <p style="text-align:justify">El sistema no te permite registrarte? En ese caso, es probable que ya tengas una cuenta de usuario en IVAO, si este es el caso, por favor escr&iacute;benos a <a href="mailto:miembros@ar.ivao.aero" class="text-info">miembros@ar.ivao.aero</a> para encontrar una soluci&oacute;n. Recuerda que la normativa proh&iacute;be tener m&aacute;s de una cuenta por usuario.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse3" aria-expanded="false" aria-controls="FAQcollapse3">No puedo conectarme a IVAO</button>
            </h3>
            <div id="FAQcollapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
                <div class="accordion-body">
                <p style="text-align:justify">Los miembros no conectados en m&aacute;s de 3 meses a la red de IVAO, como piloto o ATC, son clasificados como miembros inactivos, es por ello que si es el caso, el sistema no te permitir&aacute; conectarte directamente a la red de IVAO. Puedes reactivar tu cuenta, accediendo a <a href="https://www.ivao.aero/Login.aspx?r=Member.aspx" class="text-info">https://www.ivao.aero/Member.aspx</a>, indicando tus datos de acceso, VID y Website Password. Una vez puedas visualizar tu perfil personal, deber&aacute;s hacer click en <strong>Email my credentials</strong>.</p>
                
                <p style="text-align:justify">Despu&eacute;s de seguir los pasos indicados, en un tiempo aproximado a 15 minutos tendr&aacute;s nuevamente tu cuenta de usuario activa y podr&aacute;s conectarte a la red de IVAO. Si tienes m&aacute;s dudas, puedes ponerte en contacto con el Departamento de Miembros escribiendo a <a href="mailto:miembros@ar.ivao.aero" class="text-info">miembros@ar.ivao.aero</a>.</p>
                
                <p><strong>&iexcl;Bienvenido de nuevo a IVAO!</strong></p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse4" aria-expanded="false" aria-controls="FAQcollapse4">He creado dos cuentas por error</button>
            </h3>
            <div id="FAQcollapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">Si has creado dos cuentas por error, deber&aacute;s contactar con el <strong>Departamento de Miembros de HQ</strong> escribiendo a <a href="mailto:members@ivao.aero" class="text-info">members@ivao.aero</a> (recuerda hacerlo en ingl&eacute;s), indicando los n&uacute;meros VID de las cuentas que has creado, as&iacute; como la cuenta que deseas mantener. En las pr&oacute;ximas horas te responder&aacute;n con los cambios realizados.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse5" aria-expanded="false" aria-controls="FAQcollapse5">No aparecen mis medallas en el perfil</button>
            </h3>
            <div id="FAQcollapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">En ese caso, deber&aacute;s contactar con el Departamento de Miembros de HQ escribiendo un email en ingl&eacute;s a <a href="mailto:members@ivao.aero" class="text-info">members@ivao.aero</a> exponiendo tu problema. Si las medallas son divisionales o recompensas de IVAO Argentina, puedes escribirnos un email a <a href="mailto:miembros@ar.ivao.aero" class="text-info">miembros@ar.ivao.aero</a></p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse6" aria-expanded="false" aria-controls="FAQcollapse6">Mis horas no han sido actualizadas</button>
            </h3>
            <div id="FAQcollapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">Las horas como piloto o ATC, son actualizadas el d&iacute;a siguiente a las 12 UTC. Esta es la raz&oacute;n por la que no puede visualizar las horas en su perfil.</p>

                    <p style="text-align:justify">En caso que est&eacute;s un largo tiempo inactivo, por ejemplo en plataforma con el simulador sin funcionamiento o en pausa, deber&aacute;s tener en cuenta que el sistema lo considerar&aacute; sandbagging y no contabilizar&aacute; las horas, por lo que ser&aacute;n eliminadas.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading7">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse7" aria-expanded="false" aria-controls="FAQcollapse7">He perdido mi contrase&ntilde;a</button>
            </h3>
            <div id="FAQcollapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">En caso de p&eacute;rdida de contrase&ntilde;a, puede restablacerla haciendo click <a href="https://www.ivao.aero/members/person/password.htm" class="text-info">aqu&iacute;</a>.</p>
                </div>
            </div>
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading8">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse8" aria-expanded="false" aria-controls="FAQcollapse8">&iquest;Con qui&eacute;n debo contactar?</button>
            </h3>
            <div id="FAQcollapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">Al momento de contactar con el equipo de IVAO Argentina es muy importante enviar el mail al lugar correcto. Los correos para contacto directo a los departamentos son:</p>

                    <ul>
                    <li>Consultas generales - hola@ar.ivao.aero</li>
                    <li>Ayuda a Miembros - miembros@ar.ivao.aero</li>
                    <li>Entrenamiento - entrenamiento@ar.ivao.aero</li>
                    <li>Relaciones P&uacute;blicas - rrpp@ar.ivao.aero</li>
                    <li>Operaciones Especiales - so@ar.ivao.aero</li>
                    <li>Operaciones ATC - atc@ar.ivao.aero</li>
                    <li>Eventos - eventos@ar.ivao.aero</li>
                    <li>Direcci&oacute;n - direccion@ar.ivao.aero</li>
                    <li>Soporte Web/General - web@ar.ivao.aero</li>
                    <li>Soporte y Privilege Key TS3 - miembros@ar.ivao.aero</li>
                    <li>Soporte Hosting de VA/SOG - hostmaster@ar.ivao.aero</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQcollapse6" aria-expanded="false" aria-controls="FAQcollapse6">
                Cómo solicito un cambio de División? <i class="fas fa-chevron-down float-right"></i>
                </button>
            </h3>
            <div id="FAQcollapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <p style="text-align:justify">De acuerdo con el artículo 4.1.6 de las Rules and Regulations, todos los miembros puede solicitar un cambio de división en cualquier momento siempre que sean aprobados por la Dirección de las divisiones y el Departamento de Miembros.</p>
                    
                    <p style="text-align:justify">Puedes solicitar el cambio de división de forma automatica, logueandote en el sistema de IVAO Argentina y en tu <strong>Área Personal</strong>, opción <strong>Perfil</strong>, podrás seleccionar <strong class="text-danger">Division Change</strong>. O escribiendo un email a members@ivao.aero, con copia a xx-hq@ivao.aero y xx-hq@ivao.aero. Deberás remplazar xx por el código de división a la que perteneces y a la que quieres optar. Deberás redactar un email en inglés indicando como asunto: Division Transfer VID XXXXXX, describiendo tus motivaciones para hacer el cambio de división, así como la división a la que perteneces y a la que quieres optar.</p>
                    
                    <p style="text-align:justify" class="text-warning">Recuerda que solamente se permite un cambio de división cada 12 meses (1 año).</p>
                    
                    <img src="../images/FAQ/perfil.jpg" />
                </div>
            </div>
        </div>
        -->
    </div>
    
</div>    <!-- /.tabla-novedades -->
</div><!-- /.container -->
</section>
@endsection