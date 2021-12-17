<?php
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

function remove_accent( $string )
{
   $string = htmlentities($string);
   return preg_replace("/&([a-z])[a-z]+;/i", "$1", $string);
}

// DOWNLOAD ONLINE-LISTAUS
//---------------------------------------------------------------------------------------------------------

$whazzup = json_decode(file_get_contents('/var/www/vhosts/ar.ivao.aero/httpdocs/datafeed/whazzupv2.json'), TRUE);
if(is_null($whazzup)) die();

$observers = $whazzup['clients']['observers'];

$staff = array();
foreach($observers as $observer)
{
    if (substr($observer['callsign'],0,3) == 'AR-') 
    {
        $fields = array($observer['callsign'], $observer['userId']);
        array_push($staff, $fields);
    }
}

//STAFF
//-------------------------------------------------------------------------------------------------------------------//
//echo '<h3 align="center"> STAFF ONLINE ('. count($staff).') </h3>';
if (count($staff) != 0)
{
    echo '<div align="center"><table class="trafficlisttable" width="263px">';
	foreach ($staff as $staffmember)
    {
		
		echo '<tr align="left">
		<td>
		<a href="http://www.ivao.aero/staff/details.asp?id=' . $staffmember[0] . '" target="_blank">' . $staffmember[0] . ' </a>
		</td>
		<td> ' . $staffmember[1] . ' </td>
		<td>
		<a href="mailto:' . $staffmember[0] . '@ivao.aero">Contactar</a>
		</td>
		</tr>';
    }
	echo '</table></div>';
	
}
else echo '<div align="center"> <div class="alert-staff alert-warning" role="alert">OFFLINE </div></div>';
?>