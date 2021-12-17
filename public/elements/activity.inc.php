<?php
    header("refresh: 300;");
?>
<?
include('connect.php');
/**
 * IVAO Traffic list
 *
 * @author Aki Kettunen www.akikettu.net
 * @package defaultPackage
 */
/*
BEGINNG OF CONFIGURATION
*/

// For easy translation..
$lng['staffingb'] = '<a href="staff.html">Staff</a>';
$lng['atcingb'] = 'Controladores';
$lng['noatcingb'] = 'No hay controladores conectados en Argentina';
$lng['trafficingb'] = 'Pilotos';
$lng['notrafficingb'] = 'No hay tráfico de salida / llegada en aeródromos de Argentina.';
$lng['atcbingb'] = '<a href="http://www.ivao.aero/atcss/new.asp" target="_blank">Reservas ATC</a>';
$lng['noatcbingb'] = 'Sin Reservas de momento.';
$lng['totalonline'] = 'Hay %s controladores y <br/> %s pilotos conectados en IVAO';
$lng['today'] = 'Hoy';
$lng['tomorrow'] = 'Mañana';
$weekdays = array(
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    0 => 'Sunday'
);

// Put here 2 first letter of airport ICAO codes
$countryicao = 'SA';  

// Put here country code of staff members
$staffcountry = 'AR';

//===============================
$airports = array(
//    'SAEF' => '<span style="acc">Fir Ezeiza</span>', 
    'SAEF' => 'FIR Ezeiza', 
    'SAMF' => 'FIR Mendoza',
    'SARR' => 'FIR Resistencia', 
    'SACF' => 'FIR Cordoba',
    'SAVF' => 'FIR Comodoro Rivadavia',
    'SABA' => 'TMA Baires',
    
'SAAC' => 'Concordia',
'SAAG' => 'Gualeguaychu',
'SAAJ' => 'Junin',
'SAAP' => 'Parana',
'SAAR' => 'Rosario',
'SAAV' => 'Santa Fe',
'SABA' => 'Baires Radar',
'SABE' => 'Aeroparque',
'SACO' => 'Cordoba',
'SACE' => 'Escuela de Aviacion Militar',
'SADF' => 'San Fernando',
'SADJ' => 'Mariano Moreno',
'SADP' => 'El Palomar',
'SAEZ' => 'Ezeiza',
'SAME' => 'Mendoza',
'SAMM' => 'Malarge',
'SAMR' => 'San Rafael',
'SANC' => 'Catamarca',
'SANE' => 'Santiago del Estero',
'SANL' => 'La Rioja',
'SANT' => 'Tucuman',
'SANU' => 'San Juan',
'SAOC' => 'Rio Cuarto',
'SAOR' => 'Villa Reynolds',
'SAOS' => 'Valle del Conlara',
'SAOU' => 'San Luis',
'SARC' => 'Corrientes',
'SARE' => 'Resistencia',
'SARF' => 'Formosa',
'SARI' => 'Cataratas del Iguazy',
'SARL' => 'Paso de los Libres',
'SARP' => 'Posadas',
'SASA' => 'Salta',
'SASJ' => 'Jujuy',
'SAST' => 'Tartagal',
'SATG' => 'Goya',
'SATR' => 'Reconquista',
'SAVC' => 'Comodoro Rivadavia',
'SAVE' => 'Esquel',
'SAVT' => 'Trelew',
'SAVV' => 'Viedma',
'SAWC' => 'El Calafate',
'SAWB' => 'Base Marambio',
'SAWE' => 'Rio Grande',
'SAWG' => 'Rio Gallegos',
'SAWH' => 'Ushuaia',
'SAZB' => 'Bahia Blanca',
'SAZG' => 'General Pico',
'SAZM' => 'Mar del Plata',
'SAZY' => 'Chapelco',
'SAZN' => 'Neuquen',
'SAZR' => 'Santa Rosa',
'SAZS' => 'S C se Bariloche',
'SAZT' => 'Tandil',

);

$validcontrollers = array('DEL','GND','TWR','APP','CTR');

$service = array(
'DEL' => 'Delivery',
'GND' => 'Ground',
'TWR' => 'Tower',
'APP' => 'Radar',
'CTR' => 'Sector'
);

$ctrlevel = array(
   1 => 'OBS',
   2 => 'AS1',
   3 => 'AS2',
   4 => 'AS3',
   5 => 'ADC',
   6 => 'APC',
   7 => 'ACC',
   8 => '<span class="green">I1</span>',
   9 => '<span class="green">I2</span>',
  10 => '<span class="green">I3</span>',
  11 => '<span class="red">SUP</span>',
  12 => '<span class="red">ADM</span>'
);


$validvoiceservers = array(
'AM2V' => 'am2.ts.ivao.aero',
'AM3V' => 'am3.ts.ivao.aero',
'AS1V' => 'as1.ts.ivao.aero',
'AS2V' => 'as2.ts.ivao.aero',
'AS3V' => 'as3.ts.ivao.aero',
'EU1V' => 'eu1.ts.ivao.aero',
'EU2V' => 'eu2.ts.ivao.aero',
'EU3V' => 'eu3.ts.ivao.aero',
'EU4V' => 'eu4.ts.ivao.aero',
'EU5V' => 'eu5.ts.ivao.aero',
'EU6V' => 'eu6.ts.ivao.aero',
'EU7V' => 'eu7.ts.ivao.aero',
'EU8V' => 'eu8.ts.ivao.aero',
'EU9V' => 'eu9.ts.ivao.aero'
);

/*
END OF CONFIGURATION
*/

//http://www.ivao.aero/whazzup/status.txt
//http://dataservice.gatools.org/data/ivao.txt

function remove_accent( $string )
{
   $string = htmlentities($string);
   return preg_replace("/&([a-z])[a-z]+;/i","$1",$string);
}

// DOWNLOAD ONLINE-LISTAUS
//---------------------------------------------------------------------------------------------------------

//$filecontents = file_get_contents('squawk/whazzup.txt');

$filecontents = file_get_contents('https://ar.ivao.aero/elements/whazzup.txt'); //Testing file

$rows = split("\n", $filecontents);

$filepart = '';
$pilots = array();
$pilotcount = 0;
$controllers = array();
$staff = array();
$controllercount = 0;
$generaldata = array();

foreach ($rows as $row) {
	
    if (substr($row,0,1) == '!') $filepart = substr($row,1);
    else
	{
        switch ($filepart) {
            case 'CLIENTS':
                $fields = split(":", $row);
                if ($fields[3] == 'ATC')
				{
                    if (substr($fields[0], 0, 2) == $countryicao) $controllers[] = $fields;
                        if (substr($fields[0],0,3) == $staffcountry . '-') $staff[] = $fields;
                }
				else if (substr($fields[11],0,strlen($countryicao)) == $countryicao OR substr($fields[13],0,strlen($countryicao)) == $countryicao)
				{
					$pilots[] = $fields;
                }
                break;
            case 'GENERAL':
                list($key, $value) = split('=', $row);
                $generaldata[trim($key)] = trim($value);
                break;
        }
    }
}



// General data 
echo'<h2><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> ACTIVIDAD <small> Argentina</small></h2>
           <div class="espaciado-tabla-novedades"></div>
                    		<div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                      
                      		<div id="texto-actividad">'.count($pilots).'</div>
                      		<div style="text-align: center;">
                      		<h2 class="tooltips" data-toggle="tooltip" data-placement="bottom" title="Pilotos"><i class="fa fa-plane fa-3"></i></h2></div>
                      
                      </div><!-- /.col-md-4 col-sm-4 col-xs-4 -->
                      <div class="col-md-4 col-sm-4 col-xs-4">
                      		
                            <div id="texto-actividad">'.count($controllers).'</div>
                            <div style="text-align: center;">
                      		<h2 class="tooltips" data-toggle="tooltip" data-placement="bottom" title="ATC"><i class="fa fa-headphones fa-3"></i></h2></div>
                      
                      </div><!-- /.col-md-4 col-sm-4 col-xs-4 -->
                      <div class="col-md-4 col-sm-4 col-xs-4">
                      
                      		<div id="texto-actividad">'. count($staff).'</div>
                      		<div style="text-align: center;">
                      		<h2 class="tooltips" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Peak 24H"><i class="fa fa-clock-o fa-3"></i></h2></div>
                      
                      </div><!-- /.col-md-4 col-sm-4 col-xs-4 -->
					  </div>';
?>