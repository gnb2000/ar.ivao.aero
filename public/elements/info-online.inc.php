<head>
<link rel="stylesheet" id="wpex-style-css" href="http://ar.ivao.aero/wp-content/themes/vantage/style.css?ver=1.3.4" type="text/css" media="all">
</head>
<?php
    header("refresh: 300;");
?>
<?

// For easy translation..
$lng['staffingb'] = '<a href="staff.html">Staff</a>';
$lng['atcingb'] = 'Controladores';
$lng['noatcingb'] = 'No hay controladores conectados en Argentina';
$lng['trafficingb'] = 'Pilotos';
$lng['notrafficingb'] = 'No hay tráfico de salida / llegada en aeródromos de Argentina.';
$lng['atcbingb'] = '<a href="http://www.ivao.aero/atcss/new.asp" target="_blank">Reservas ATC</a>';
$lng['noatcbingb'] = 'Sin Reservas de momento.';
$lng['totalonline'] = 'Hay %s controladores y <br/> %s pilotos conectados en IVAO';
$countryicao = 'SA';  
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

$filecontents = file_get_contents('http://api.ivao.aero/getdata/whazzup/?api=whazzup'); //Testing file

$rows = split("\n", $filecontents);

$filepart = '';
$pilots = array();
$pilotcount = 0;
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

// Pilots '.$airports($apicao).' '. $service[$position].'
//-------------------------------------------------------------------------------------------------------------------//

// Check there is ATC online then show count
//echo '<h3 align="center">' . $lng['trafficingb'] ;
//if(count($pilots) != 0) echo ' ('.count($pilots).')';
//echo '</h3>';
//
if (count($pilots) != 0) {
    echo '<h3 align="center">' . $lng['trafficingb'].' ('.count($pilots).')</h3><div align="center" style="padding-left:4px;max-height:420px;min-height:200px;overflow:hidden"><div id="mousemove" style="max-height:420px;width:210px;overflow:auto"><table class="trafficlisttable">';
    foreach ($pilots as $pilot) {
        $realname = $pilot[2];
        if (substr($realname,-5,1) == ' ') {
            $realname = substr($realname,0,-5);
        }
        $realname = remove_accent(ucwords($pilot[2]));
        echo '<tr align="center"><td width="75"><a href="flighttrack.php?cs=' . $pilot[0] . '" onClick="MM_openBrWindow(\'flighttrack.php?cs=' . $pilot[0] . '\',\'\',\'scrollbars=no,resizable=yes,width=430,height=525\');return false" target="_blank">' . $pilot[0] . '</a></td><td width="33">' . $pilot[11] . '</td><td width="40">&gt;&nbsp;' . $pilot[13] . '</td></tr>';
    }
    echo '</table></div></div>';
} else {
    echo '<h3 align="cenetr">' . $lng['trafficingb'].' </h3><p style="margin-bottom: 20px; color: #999;"><i>' .$lng['notrafficingb'] . '</i></p>';
}


//STAFF
//-------------------------------------------------------------------------------------------------------------------//
if (count($staff) != 0) {
    echo '<h3 align="center"> Staff ('. count($staff).') </h3><div align="center" style="padding-left:4px;max-height:420px;min-height:200px;overflow:hidden"><div id="mousemove" style="max-height:420px;width:210px;overflow:auto"><table class="trafficlisttable" width="155px">';
    	foreach ($staff as $staffmember) {
			
				echo '<tr align="center"><td><a href="http://www.ivao.aero/staff/details.asp?id=' . $staffmember[0] . '" target="_blank" onClick="MM_openBrWindow(\'http://www.ivao.aero/staff/details.asp?id=' . $staffmember[0] . '\',\'\',\'scrollbars=yes,resizable=yes,width=700,height=600\');return false">' . $staffmember[2] . ' (AR-'. substr($staffmember[0],3). ')</a></td></tr>';
			}
		
    echo '</table></div>';


}

// General data 
//-------------------------------------------------------------------------------------------------------------------//
/*$year = substr($generaldata['UPDATE'], 0, 4);
$month = substr($generaldata['UPDATE'], 4, 2);
$day = substr($generaldata['UPDATE'], 6, 2);
$hour = substr($generaldata['UPDATE'], 8, 2); 
$minute = substr($generaldata['UPDATE'], 10, 2);

$str_valid = $hour.":".$minute."z - ".$day."/".$month."/".$year ; 

echo 'Hay '; echo count($controllers); echo' Controladores, '; echo count($pilots); echo' Pilotos, and '; echo count($staff); echo' Miembros de Staff online in AR.';

echo '<div class="trafficlistnettotal" style="font-size:9px">' . sprintf($lng['totalonline'], $controllercount, $pilotcount) . '<br/>Updated at '. $str_valid .'</div>';
*/
?>