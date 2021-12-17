<?php
//define variables
define('cookie_name', 'ivao_token');
define('login_url', 'http://login.ivao.aero/index.php');
define('api_url', 'http://login.ivao.aero/api.php');
define('url', 'http://ivao.com.ar/ivao/ar/alta.php');

//redirect function
function redirect() {
	setcookie(cookie_name, '', time()-3600);
	header('Location: '.url);
	exit;
}
	
//if the token is set in the link
if($_GET['IVAOTOKEN'] && $_GET['IVAOTOKEN'] !== 'error') {
	setcookie(cookie_name, $_GET['IVAOTOKEN'], time()+3600);
	header('Location: '.url);
	exit;
} elseif($_GET['IVAOTOKEN'] == 'error') {
	die('This domain is not allowed to use the Login API! Contact the System Adminstrator!');
}

//check if the cookie is set and/or is correct
if($_COOKIE[cookie_name]) {
	$xml = simplexml_load_file(api_url.'?token='.$_COOKIE[cookie_name]);
	$nombre=utf8_decode($xml[0]->firstname);
	$apellido=utf8_decode($xml[0]->lastname);
	$ratingatc=utf8_decode($xml[0]->ratingatc);
	$ratingpiloto=utf8_decode($xml[0]->ratingpilot);
	$vid=utf8_decode($xml[0]->vid);
} 
?>
