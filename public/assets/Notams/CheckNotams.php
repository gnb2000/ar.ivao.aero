<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


define('api_url', 'http://atc.notams.ivao.aero/feeders/sendNotamsDiv.php');
$user_array = json_decode(file_get_contents(api_url.'?division=AR'));

if ($user_array->nNotams == 0) echo "NO NOTAMS AVAILABLE";

if ($user_array->result)
{
	$fechaActual = date('Y-m-d H:i');
	
	$notams = '';
	$cuenta = 0;
	for($i = 0;$i < $user_array->nNotams; $i++)
	{
		$now = new DateTime('now');
		$fin = new DateTime($user_array->notams[$i]->endDate);
		if($now >= $fin && $user_array->notams[$i]->permanent == 0)
		{
			$notams .= utf8_decode($user_array->notams[$i]->text).'<br /><br />';
			$cuenta++;
		}
	}
	
	$headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
			   "Reply-To: w-dep@ar.ivao.aero\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Nuevo NOTAM caducado</h2>Le informamos que  ha caducado al menos un NOTAM. Acceda a HQ y tome las medidas oportunas. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>NOTAMs</strong>:<br /> $notams</div> <br /><br /> <div style=\"border-bottom: 1px dotted #0F0F0F;padding: 10px 0px 0px;\">Fecha de Envío: $fechaActual UTC</div><br /></body></html>";

	 if($cuenta > 0) mail('atc@ar.ivao.aero', 'Notam caducado', $body, $headers);
}
?>