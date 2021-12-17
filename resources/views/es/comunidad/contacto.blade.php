@extends('template')

@section('titulo')
<title>Contacto :: IVAO Argentina</title>
@endsection

@section('headextra')
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
function guardarDatos()
{   
    event.preventDefault();
    
    var nombre = $('#name').val() + ' ' + $('#surname').val();
    var vid  = $('#vid').val();
    var email = $('#email').val();
    var asunto = $('#asunto').val();
    var message = $('#message').val();
    var topic = $('#topic').val();
    var recaptcha = $('#g-recaptcha-response').val();
    
    if(recaptcha)
    {
        $.ajax
        ({
            url: 'https://ar.ivao.aero/contacto/enviar-contacto.php',
            type: 'POST',
            data: {name: nombre, vid: vid, email: email, asunto: asunto, message: message, topic: topic},
            beforeSend: function() { $('.form-horizontal').html('<br /><center style="margin-top: 50px;"><span style="margin-right:8px;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i></span> <div style="font-size: 20px;margin-top: 25px;">Loading... Do not close the window</div></center>'); },
            error: function(xhr) { $('.form-horizontal').html(xhr.status + ' ' + xhr.statusText); },
            success: function(result) { $('.form-horizontal').html(result); }
        });
    }
    else alert('Por favor, accione el CAPTCHA.');
}

$(function() {
    $('.required-icon').tooltip({
        placement: 'right',
        title: 'Requerido'
        });
});
</script>
@endsection

@section('contenido')

<!-- Inicio
================================================== -->
<!-- CONTENIDO DE LA PÁGNA -->
<section>
  <div class="container marketing">

  <!-- DOS COLUMNAS -->


        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <div class="tabla-novedades">
                    
                    <h2 class="title"><i class="glyphicon glyphicon-envelope fa-fw"></i> Formulario de Contacto<span class="line"></span></h2>
                    
                                <div class="separacion-tablas"></div>
                                
                                
                            <form class="form-horizontal" onsubmit="guardarDatos()" method="post" action="#">
                            
                            
                    
                        @if(Auth::check())     

                            <!-- VID input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="name">VID:</label>
                              <div class="col-md-9">
                                <input class="form-control" type="text" id="vid" placeholder="VID" value="{{$usuario->vid}}" maxlength="6" disabled />

                              </div><!-- /.col-md9 -->
                            </div><!-- /.form-group -->

                            <!-- email input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="name">Email:</label>
                              <div class="col-md-9 required-field-block">
                                <input required class="form-control" type="email" id="email" placeholder="Email" value="{{$usuario->email}}" disabled />
                                
                                        <span class="required-icon">
                                            <span class="text">*</span>
                                        </span><!--/.requiered-icon -->

                                        
                              </div><!-- /.col-md9 -->
                            </div><!-- /.form-group -->
                                
                        @else         

                            <!-- VID input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="name">VID:</label>
                              <div class="col-md-9">
                                <input class="form-control" type="text" id="vid" placeholder="VID" maxlength="6" />

                              </div><!-- /.col-md9 -->
                            </div><!-- /.form-group -->

                            <!-- email input-->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="name">Email:</label>
                              <div class="col-md-9 required-field-block">
                                <input required class="form-control" type="email" id="email" placeholder="Email" />
                                
                                        <span class="required-icon">
                                            <span class="text">*</span>
                                        </span><!--/.requiered-icon -->
                                        
                              </div><!-- /.col-md9 -->
                            </div><!-- /.form-group -->
                        
                        @endif
                        
                        
                        <!-- departamento input-->
                        <div class="form-group">
                        
                            
                          <label class="col-md-3 control-label" for="topic">Tema de Ayuda:</label>
                          <div class="col-md-9 required-field-block">
                            <select class="form-control" id="topic">
                            <option value="">Seleccionar...</option>
                            <option value="General">Consulta general</option>
                            <option value="Cambio Division">Cambio divisi&oacute;n</option>
                            <option value="Datos Personales">Datos personales</option>
                            <option value="Denuncia">Denuncia</option>
                            <option value="Eventos">Eventos</option>
                            <option value="Tours">Tours</option>
                            <option value="Registro VA">Registro VA</option>
                            <option value="Error general">Web / Error general</option>
                            <option value="Codigo">Web / Codigo (Error 403, 404, 500...)</option>
                            <option value="Corte del Servicio">Web / Corte del servicio</option>
                            <option value="Discord">Discord</option>
                            <option value="Primeros Pasos">Primeros Pasos en IVAO</option>
                            <option value="Software / Instalar">Software / C&oacute;mo instalar</option>
                            <option value="Software / Error">Software / Error</option>
                            <option value="GCA">Solicitar GCA</option>
                            <option value="Entrenamiento ATC">Solicitar Entrenamiento ATC</option>
                            <option value="Entrenamiento Piloto">Solicitar Entrenamiento de Vuelo</option>
                            <option value="ATC">Operaciones ATC</option>
                            <option value="SO">Operaciones Especiales</option>
                            </select>
                            

                          </div><!-- /.col-md9 -->
                        </div><!-- /.form-group -->
                        
                        <!-- asunto input-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="name">Asunto:</label>
                          <div class="col-md-9 required-field-block">
                            <input required class="form-control" type="text" id="asunto" placeholder="Asunto">
                            
                                    <span class="required-icon">
                                        <span class="text">*</span>
                                    </span><!--/.requiered-icon -->
                                    
                          </div><!-- /.col-md9 -->
                        </div><!-- /.form-group -->
                        
                        <!-- Mensaje input-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="name">Mensaje:</label>
                          <div class="col-md-9 required-field-block">
                            <textarea required class="form-control" rows="4" id="message"></textarea>
                            
                                    <span class="required-icon">
                                        <span class="text">*</span>
                                    </span><!--/.requiered-icon -->
                                    
                          </div><!-- /.col-md9 -->
                        </div><!-- /.form-group -->
                        
                        <!-- Captcha input-->
                        <div class="form-group">
                        <label class="col-md-3 control-label" for="CaptchaCode"></label>
                          <div class="col-md-9 required-field-block">
                            
                            <div id="recaptcha" class="g-recaptcha" data-sitekey="6LdXwQ8UAAAAADCpFkOgIyt_uOCZ56lIasty7TUJ"></div>
                                    
                          </div><!-- /.col-md9 -->
                        </div><!-- /.form-group -->

                        
                        <!-- Button input-->
                        <div class="form-group">
                          <div class="col-md-9">
                         <input type="submit" onClick="guardarDatos();" value="Enviar Formulario" class="btn btn-outline btn-success btn-lg">
                          </div><!-- /.col-md9 -->
                        </div><!-- /.form-group -->

                            </form>
                            

        </div><!-- /.tabla-novedades -->
        
        </div><!-- /.col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 -->



</div><!-- /.marketing-container -->
</section>
@endsection