<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">

	@import url(http://ar.ivao.aero/wp-content/themes/vantage/style.css);

</style>
<?php 

//Include Connect

include('connect.php');

//Define variables

$dataLocal = file_get_contents('http://api.ivao.aero/getdata/whazzup/?api=whazzup');

$dataCallsign = $_GET['cs'];

$dataRecord = split("\n", $dataLocal);

$dataError = 'Error al obtener la información'; 

	

	// Go through each record and perform this script

	foreach ($dataRecord as $dataRecords) {

    	

		// Split each record into seperate fields

		$dataField = split(":", $dataRecords);

	

			// This script will on function id the callsign provided is equal to the callsign within the record

			if ($dataField[0] == $dataCallsign) {

			

				// Check to see if the category in the record is PILOT

				if ($dataField[3] == 'PILOT') { ?><title><?php echo $dataCallsign; ?> Detalles del vuelo</title><script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBfMLEtRcJv8UYWZ2ehXNgurrXclgpqPWA"

      type="text/javascript"></script>

    <script type="text/javascript">



    //<![CDATA[



    function load() {

      if (GBrowserIsCompatible()) {

        var map = new GMap2(document.getElementById("map"));

  		  map.addControl(new GMapTypeControl());    

        map.addMapType(G_PHYSICAL_MAP);

        map.setCenter(new GLatLng(<?php echo $dataField[5].",".$dataField[6]; ?>), 5);

    		map.setMapType(G_PHYSICAL_MAP);

    		map.removeMapType(G_HYBRID_MAP);

<?php if($dataField[45] < 30) {

		$link = 'images/acmap/aircraft_icon.png';

	} else if($dataField[45] >= 30 AND $dataField[45] < 60) {

		$link = 'images/acmap/aircraft_icon_1.png';

	} else if($dataField[45] >= 60 AND $dataField[45] < 90) {

		$link = 'images/acmap/aircraft_icon_2.png';

	} else if($dataField[45] >= 90 AND $dataField[45] < 120) {

		$link = 'images/acmap/aircraft_icon_3.png';

	} else if($dataField[45] >= 120 AND $dataField[45] < 150) {

		$link = 'images/acmap/aircraft_icon_4.png';

	} else if($dataField[45] >= 150 AND $dataField[45] < 180) {

		$link = 'images/acmap/aircraft_icon_5.png';

	} else if($dataField[45] >= 180 AND $dataField[45] < 210) {

		$link = 'images/acmap/aircraft_icon_6.png';

	} else if($dataField[45] >= 210 AND $dataField[45] < 240) {

		$link = 'images/acmap/aircraft_icon_7.png';

	} else if($dataField[45] >= 240 AND $dataField[45] < 270) {

		$link = 'images/acmap/aircraft_icon_8.png';

	} else if($dataField[45] >= 270 AND $dataField[45] < 300) {

		$link = 'images/acmap/aircraft_icon_9.png';

	} else if($dataField[45] >= 300 AND $dataField[45] < 330) {

		$link = 'images/acmap/aircraft_icon_10.png';

	} else if($dataField[45] >= 330) {

		$link = 'images/acmap/aircraft_icon_11.png';

	}

			

	echo 	"var G_DEFAULT_ICON              = new GIcon();

    		G_DEFAULT_ICON.iconSize         = new GSize(24, 24);

    		G_DEFAULT_ICON.iconAnchor       = new GPoint(12, 12);

			var blueIcon = new GIcon(G_DEFAULT_ICON);

			blueIcon.image = '".$link."';

		    markerOptions = { icon:blueIcon };

			var point = new GLatLng(".$dataField[5].",".$dataField[6].");

			map.addOverlay(new GMarker(point, markerOptions));";  ?>

      }

    }



    //]]>

    </script></head>

<body onload="load()" onunload="GUnload()"><?

				// Prepare data

				$dataName = explode(' ',$dataField[2]);

				$dataAC = substr($dataField[9],2,4);

				$dataStatus	= $dataField[46] == 1 ? "On Ground" : "Airborne";

				

				if($dataField[41] == 2) { $dataRating = 'FS1'; }

				elseif($dataField[41] == 3) { $dataRating = 'FS2'; }

				elseif($dataField[41] == 4) { $dataRating = 'FS3'; }

				elseif($dataField[41] == 5) { $dataRating = 'PP'; }

				elseif($dataField[41] == 6) { $dataRating = 'SPP'; }

				elseif($dataField[41] == 7) { $dataRating = 'CP'; }

				elseif($dataField[41] == 8) { $dataRating = 'ATP'; }

				elseif($dataField[41] == 9) { $dataRating = 'SFI'; }

				elseif($dataField[41] == 10) { $dataRating = 'CFI'; }

				

				$dataDep = $dataField[11];

				$dataArr = $dataField[13];

				

				echo	"<div id=\"innerContentColumn\"><h3>Informaci&oacute;n de Vuelo</h3>\r\n".

						"<table>\r\n";

						if(!file_exists('images/airlines/'.substr($dataCallsign,0,3).'.gif')) { } else {

				echo	"<tr height=\"20\"><td colspan=\"2\"><img src=\"images/airlines/".substr($dataCallsign,0,3).".gif\"/></td></tr>\r\n";

						}

				echo	"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Callsign:</td><td>".$dataCallsign."</td></tr>\r\n".




						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Departing:</td><td>".$dataField[11]."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Arriving:</td><td>".$dataField[13]."</td></tr>\r\n".




						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Aircraft:</td><td>".$dataAC."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Passengers:</td><td>".$dataField[44]."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Filed N/F:</td><td>".$dataField[10].$dataField[12]."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Route:</td><td>".$dataField[30]."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">Status:</td><td>".$dataStatus."</td></tr>\r\n".

						"<tr height=\"20\"><td width=\"30px\" class=\"upright\">PIC:</td><td>".$dataRating." (<a href='http://ivao.aero/members/person/details.asp?ID=".$dataField[1]."'>".$dataField[1]."</a>)</td></tr>\r\n".

						"<tr><td colspan=\"2\"></td></tr>\r\n".

						"</table><div id=\"map\" align=\"center\" style=\"margin-top: 7px; width: 100%; height: 500px\"></div></div></body></html>";



        		// Check to see if the category in the record is ATC

				} else if ($dataField[3] == 'ATC') { ?><title><?php echo $dataCallsign; ?> Detalles de posici&oacute;n</title></head><body><?		

				$dataName = explode(' ',$dataField[2]);

				$dataATIS = explode('^',$dataField[35]);
				
				$count = 0;

				

				if($dataField[41] == 2) { $dataRating = 'AS1'; }

				elseif($dataField[41] == 3) { $dataRating = 'AS2'; }

				elseif($dataField[41] == 4) { $dataRating = 'AS3'; }

				elseif($dataField[41] == 5) { $dataRating = 'ADC'; }

				elseif($dataField[41] == 6) { $dataRating = 'APC'; }

				elseif($dataField[41] == 7) { $dataRating = 'ACC'; }

				elseif($dataField[41] == 8) { $dataRating = 'SEC'; }

				elseif($dataField[41] == 9) { $dataRating = 'SAI'; }

				elseif($dataField[41] == 10) { $dataRating = 'CAI'; }



				echo	"<div id=\"innerContentColumn\"><h3>Informaci&oacute;n de la Posici&oacute;n</h3>\r\n".

						"<table>\r\n".

						"<tr height=\"20\"><td class=\"menu-upright\">Callsign:</td><td>".$dataCallsign."</td></tr>\r\n".

						"<tr height=\"20\"><td class=\"menu-upright\">Frequency:</td><td>".$dataField[4]." MHz</td></tr>\r\n".

						"<tr height=\"20\"><td class=\"menu-upright\">ATIS:</td><td>";

						foreach($dataATIS as $line) { echo ($count==0 ? $line : substr($line,1)).'<br />'; $count++; }

				echo	"</td></tr>\r\n".

						"<tr height=\"20\"><td class=\"menu-upright\">Controlador:</td><td>(<a href='http://ivao.aero/members/person/details.asp?ID=".$dataField[1]."'>".$dataField[1]."</a>)</td></tr>\r\n".

						"</table></div></body></html>";



			}

        

			} 

        

    }

 ?>