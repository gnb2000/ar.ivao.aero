<?
require('../../conexion.php');

$key = $_GET['Key'];
$vid = $_GET['Vid'];
$va = $_GET['VA'];
$callsign = $_GET['Callsign'];

$buscarKey = "SELECT * FROM va_list WHERE VaKey = '$key'";
$resultKey = mysqli_query($con, $buscarKey);
$countKey = mysqli_num_rows($resultKey);

if($key != '' or $vid != '' or $va != '' or $callsign != '')
{
	if($countKey == 1)
	{
		while($row = mysqli_fetch_array($resultKey))
		{
			if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va)
			{
				$buscarCall = "SELECT * FROM va_members WHERE CallNumber = $callsign AND VaIntId = $va";
				$resultCall = mysqli_query($con, $buscarCall);
				$countCall = mysqli_num_rows($resultCall);
				if($countCall == 0)
				{
					$AddMember = "INSERT INTO va_members (Vid, VaIntId, CallNumber) VALUES ('$vid', '$va', '$callsign')";
					mysqli_query($con, $AddMember) or die(mysqli_error($con));
					$array = array('OK');
					echo $array;
				}else{
					echo 'Ya existe alguien con ese Callsign';
				}
			}else{
				echo 'Key no corresponde a la VA o VA inactiva.';
			}
		}
	}else{
		echo 'Key '.$key.' no existe '.$countKey.'';
	}
}else{
	echo 'Faltan datos';
}
?>