<?php
header('Access-Control-Allow-Origin: *');

$nombre = $_POST['name'];
$vid  = (int)$_POST['vid'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$message = $_POST['message'];
$topic = $_POST['topic'];
$to = '';


if(in_array($topic, ['Cambio Division', 'Datos Personales'])) 							       $to = 'miembros@ar.ivao.aero';
else if(in_array($topic, ['Eventos', 'Tours'])) 										               $to = 'eventos@ar.ivao.aero';
else if($topic == 'ATC') 																                           $to = 'atc@ar.ivao.aero';
else if($topic == 'Registro VA') 														                       $to = 'vuelo@ar.ivao.aero';
else if($topic == 'SO') 																                           $to = 'so@ar.ivao.aero';
else if(in_array($topic, ['GCA', 'Entrenamiento ATC', 'Entrenamiento Piloto'])) 	 $to = 'entrenamiento@ar.ivao.aero';
else if(in_array($topic, ['Error general', 'Codigo', 'Corte del Servicio'])) 			 $to = 'web@ar.ivao.aero';
else if($topic == 'Denuncia') 															                       $to = 'direccion@ar.ivao.aero';
else 																					                                     $to = 'rrpp@ar.ivao.aero';

if($nombre != '' && $email != '' && $asunto != '' && $message != '')
{
    $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
               "Content-Type: text/html; charset=utf-8\r\n".
               "MIME-Version: 1.0\r\n";

    $date = date('d-m-Y H:i');

    $body = 
        "<html><body><center><img src=\"https://ar.ivao.aero/img/logo.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Nuevo Mensaje</h2>Le informamos que un miembro ha utilizado el formulario de contacto de la web.<br /><br /><br />\n
        <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>VID</strong>: $vid</div>\n
        <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Email</strong>: $email</div>\n
        <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Asunto</strong>: $topic</div>\n
        <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Mensaje</strong>: $message</div>\n
        <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $date</div> </body></html>";
       
    mail($to, $asunto, $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');
		
	 echo '<center><div class="alert alert-success" role="alert" style="margin: 25px 0px 25px 0px;"><strong>¡Formulario enviado correctamente!</strong><br />Nos pondremos en contacto con usted lo antes posible</div></center>';	
}
else echo '<div class="alert alert-danger" role="alert" style="margin: 25px 0px 25px 0px;">Por favor ingresa todos los datos requeridos. <br><a href="https://ar.ivao.aero/comunidad/contacto"> <strong>Volver al Formulario</strong></a></div>';
?>