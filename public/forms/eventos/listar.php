<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-24y4{background-color:#2a4982;color:#ffffff;text-align:center;vertical-align:top}
</style>
<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$hoy = date("Y-m-d"); 
require('../../conexion.php');
include('../../stylesheet.php');

$query = "SELECT * FROM rep_eventos";
$result = mysqli_query($con, $query);
?>
<table class="tg">
  <tr>
    <th class="tg-24y4">Rep ID</th>
    <th class="tg-24y4">VID</th>
    <th class="tg-24y4">Evento</th>
    <th class="tg-24y4">Posición<br></th>
    <th class="tg-24y4">Estado</th>
    <th class="tg-24y4"></th>
  </tr>
<?
while($row = mysqli_fetch_array($result)){
	if($row['Tipo'] == 2){
	$RepId= $row['EvRepId'];
	$Vid = $row['Vid'];
	$EvId = $row['EvId'];
		$EventoQuery = "SELECT * FROM eventos WHERE id = $EvId";
		$EventoResult = mysqli_query($con, $EventoQuery);
		$EventoRow = mysqli_fetch_array($EventoResult);
		$Evento = $EventoRow['nombre'];
	$AtcICAO = $row['AtcICAO'];
	$Status = $row['RepStatus'];
	
	echo
	'<tr>
	<td class="tg-031e">'.$RepId.'</td>
    <td class="tg-031e">'.$Vid.'</td>
    <td class="tg-031e">'.$Evento.'</td>
	<td class="tg-031e">'.$AtcICAO.'</td>
    <td class="tg-031e">'.$Status.'</td>
    <td class="tg-031e"><a href="http://tracker.ivao.aero/search.php?vid='.$Vid.'&callsign='.$AtcICAO.'&conntype=ATC&date='.$row['EvDate'].'&search=Search">Tracker</a></td>
	</tr>';
	}
}

?> 
</table>
<table class="tg">
  <tr>
    <th class="tg-24y4">Rep ID</th>
    <th class="tg-24y4">VID</th>
    <th class="tg-24y4">Evento</th>
    <th class="tg-24y4">Callsign<br></th>
	<th class="tg-24y4">Salida<br></th>
	<th class="tg-24y4">Llegada<br></th>
    <th class="tg-24y4">Estado</th>
    <th class="tg-24y4"></th>
  </tr>
<?
$query = "SELECT * FROM rep_eventos";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
	if($row['Tipo'] == 1){
	$RepId= $row['EvRepId'];
	$Vid = $row['Vid'];
	$EvId = $row['EvId'];
		$EventoQuery = "SELECT * FROM eventos WHERE id = $EvId";
		$EventoResult = mysqli_query($con, $EventoQuery);
		$EventoRow = mysqli_fetch_array($EventoResult);
		$Evento = $EventoRow['nombre'];
	$CallSign = $row['CallSign'];
	$ArrICAO = $row['ArrICAO'];
	$DepICAO = $row['DepICAO'];
	$Status = $row['RepStatus'];
	
	echo
	'<tr>
	<td class="tg-031e">'.$RepId.'</td>
    <td class="tg-031e">'.$Vid.'</td>
    <td class="tg-031e">'.$Evento.'</td>
	<td class="tg-031e">'.$CallSign.'</td>
	<td class="tg-031e">'.$DepICAO.'</td>
	<td class="tg-031e">'.$ArrICAO.'</td>
    <td class="tg-031e">'.$Status.'</td>
    <td class="tg-031e"><a href="http://tracker.ivao.aero/search.php?vid='.$Vid.'&callsign='.$CallSign.'&conntype=PILOT&date='.$row['EvDate'].'&search=Search">Tracker</a></td>
	</tr>';
	}
}

?> 
</table>