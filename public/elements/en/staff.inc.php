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
$lng['atcingb'] = 'Controllers';
$lng['noatcingb'] = 'There are no online controlllers in Argentina';
$lng['trafficingb'] = 'Pilots';
$lng['notrafficingb'] = 'No departures / arrivals at Argentina aerodromes.';
$lng['atcbingb'] = '<a href="http://www.ivao.aero/atcss/new.asp" target="_blank">ATC Scheduling</a>';
$lng['noatcbingb'] = 'No bookings at the moment.';
$lng['totalonline'] = 'There are %s controlllers and <br/> %s pilots online at IVAO';
$lng['today'] = 'Today';
$lng['tomorrow'] = 'Tomorrow';
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

$filecontents = file_get_contents('http://api.ivao.aero/getdata/whazzup/?api=whazzup'); //Testing file

$rows = split("\n", $filecontents);

$filepart = '';
$pilots = array();
$pilotcount = 0;
$controllers = array();
$staff = array();
$controllercount = 0;
$generaldata = array();

foreach ($rows as $row) {
    if (substr($row,0,1) == '!') {
        $filepart = substr($row,1);
    } else {
        switch ($filepart) {
            case 'CLIENTS':
                $fields = split(":", $row);
                if ($fields[3] == 'ATC') {
                    $controllercount++;
                    if (in_array(substr($fields[0],-3), $validcontrollers) && substr($fields[0],0,strlen($countryicao)) == $countryicao) { array_push($controllers, $fields); }
                        if (substr($fields[0],0,3) == $staffcountry . '-') { array_push($staff, $fields); }
                } else {
                    $pilotcount++;
                    if (substr($fields[11],0,strlen($countryicao)) == $countryicao OR substr($fields[13],0,strlen($countryicao)) == $countryicao) {
						//$countrypcount++;
                        //if ($countrypcount <= 20) {
							array_push($pilots, $fields);
						//}
                    }
                }
                break;
            case 'GENERAL':
                list($key, $value) = split('=', $row);
                $generaldata[trim($key)] = trim($value);
                break;
        }
    }
}

//STAFF
//-------------------------------------------------------------------------------------------------------------------//
//echo '<h3 align="center"> STAFF ONLINE ('. count($staff).') </h3>';
echo '<h2><i class="fas fa-user-friends"></i> STAFF ONLINE</h2> <div class="espaciado-tabla-novedades"></div>';
if (count($staff) != 0) {
    echo '<div align="center"><table class="trafficlisttable" width="263px">';
    	foreach ($staff as $staffmember) {
			
				echo '<tr align="left">
				<td>
				<a href="http://www.ivao.aero/staff/details.asp?id=' . $staffmember[0] . '" target="_blank">' . $staffmember[0] . ' </a>
				</td>
				<td> ' . $staffmember[1] . ' </td>
				<td>
				<a href="mailto:' . $staffmember[0] . '@ivao.aero">Contact</a>
				</td>
				</tr>';}
				echo '</table></div>';
	

}else{echo '<div align="center"><table class="trafficlisttable" width="263px"> <div class="alert-staff alert-warning" role="alert">OFFLINE </div></table></div>';}
?>