<?
require('../../conexion.php');

$key = $_GET['Key'];
$vid = $_GET['Vid'];
$va = $_GET['VA'];
$callsign = $_GET['Callsign'];
$callsignOld = $_GET['OldCallsign'];
$callsignNew = $_GET['NewCallsign'];


$buscarKey = "SELECT * FROM va_list WHERE VaKey = '$key'";
$resultKey = mysqli_query($con, $buscarKey);
$countKey = mysqli_num_rows($resultKey);

if($key != '' or $vid != '' or $va != '' or $callsignOld != '' or $callsignNew != '')
{
	if($countKey == 1)
	{
		while($row = mysqli_fetch_array($resultKey))
		{
			if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va)
			{
				$buscarCallOld = "SELECT * FROM va_members WHERE CallNumber = $callsignOld AND VaIntId = $va";
				$resultCallOld = mysqli_query($con, $buscarCallOld);
				$countCallOld = mysqli_num_rows($resultCallOld);
				if($countCallOld == 1)
				{
					$buscarCallNew = "SELECT * FROM va_members WHERE CallNumber = $callsignNew AND VaIntId = $va";
					$resultCallNew = mysqli_query($con, $buscarCallNew);
					$countCallNew = mysqli_num_rows($resultCallNew);
					if($countCallNew == 0)
					{
						$AddMember = "UPDATE va_members SET CallNumber = $callsignNew WHERE vid = $vid AND VaIntId = $va";
						mysqli_query($con, $AddMember) or die(mysqli_error($con));
						$array = array('OK');
						echo $array;
					}else{
						echo 'Ya existe alguien con ese Callsign';
					}
				}else{
					echo 'No existe alguien con ese Callsign';
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