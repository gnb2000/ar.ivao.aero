<?
/*
API SYSTEM FOR VA
By Andrés Robinson (301728)
For IVAO Argentina

Version 0.0.4

Documentation:
https://docs.google.com/document/d/1hQQkkboN-38nMkVk7q1LgSTz8J_OiJFp5jn-9PKyi_c/edit?usp=sharing
*/
function array2xml($array, $wrap='ROW0', $upper=true) {
    // set initial value for XML string
    $xml = '<result />';
    // wrap XML with $wrap TAG
    if ($wrap != null) {
        $xml .= "<$wrap>\n";
    }
    // main loop
    foreach ($array as $key=>$value) {
        // set tags in uppercase if needed
        if ($upper == true) {
            $key = strtoupper($key);
        }
        // append to XML string
        $xml .= "<$key>" . htmlspecialchars(trim($value)) . "</$key>";
    }
    // close wrap TAG if needed
    if ($wrap != null) {
        $xml .= "\n</$wrap>\n";
    }
    // return prepared XML string
    return $xml;
}


//Connecion Hook
require('../../conexion.php');

//Create variables from GET
$key = $_GET['key'];
$vid = $_GET['vid'];
$va = $_GET['va'];
$callsign = $_GET['cs'];
$callsignOld = $_GET['ocs'];
$callsignNew = $_GET['ncs'];
$op = $_GET['op'];
$email = $_GET['em'];

$format = $_GET['out'];
if($format == 'xml'){
	//header('Content-type: text/xml');
}elseif($format == 'plain'){
	header("Content-Type: plain/text");
}

//Main KEY check system
$buscarKey = "SELECT * FROM va_list WHERE VaKey = '$key'";
$resultKey = mysqli_query($con, $buscarKey);
$countKey = mysqli_num_rows($resultKey);

//Check if the operation is set
if($op != '')
{
	//Starts ADD operations
	if($op == 'add'){
		if($key != '' or $vid != '' or $va != '' or $callsign != '') //check requirements
		{
			if($countKey == 1) //If key is valid
			{
				while($row = mysqli_fetch_array($resultKey)) //Look for KEY details
				{
					if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va) //Check if the key is owned by the VA and if VA is active
					{
						//Callsign check
						$buscarCall = "SELECT * FROM va_members WHERE CallNumber = $callsign AND VaIntId = $va";
						$resultCall = mysqli_query($con, $buscarCall);
						$countCall = mysqli_num_rows($resultCall);
						if($countCall == 0) //Check if callsign is valid
						{
							//Inserts new member in the DB
							$AddMember = "INSERT INTO va_members (Vid, VaIntId, CallNumber) VALUES ('$vid', '$va', '$callsign')";
							mysqli_query($con, $AddMember) or die(mysqli_error($con));
							$result = 'OK';
							echo $array;
						}else{
							$result = 'Callsign already in use';
						}
					}else{
						$result = 'Wrong Key or VA is Inactive';
					}
				}
			}else{
				$result = 'Unknown Key';
			}
		}else{
			$result = 'Missing Data';
		}
	}
	elseif($op == 'del')
	{
		if($key != '' or $vid != '' or $va != '' or $callsign != '') //check requirements
		{
			if($countKey == 1) // If KEY is valid
			{
				while($row = mysqli_fetch_array($resultKey)) //Look for KEY details
				{
					if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va) //Check if the key is owned by the VA and if VA is active
					{
						//Callsign Check
						$buscarCall = "SELECT * FROM va_members WHERE CallNumber = $callsign AND VaIntId = $va";
						$resultCall = mysqli_query($con, $buscarCall);
						$countCall = mysqli_num_rows($resultCall);
						if($countCall == 1)
						{
							//Delete member from DB
							$AddMember = "DELETE FROM va_members WHERE Vid = $vid AND VaIntId = $va AND CallNumber = $callsign";
							mysqli_query($con, $AddMember) or die(mysqli_error($con));
							$result = 'OK';
						}else{
							$result = 'Callsign you are trying to delet do not exist';
						}
					}else{
						$result = 'Wrong Key or VA is Inactive';
					}
				}
			}else{
				$result = 'Unknown Key';
			}
		}else{
			$result = 'Missing Data';
		}
	}
	elseif($op == 'chng')
	{
		if($key != '' or $vid != '' or $va != '' or $callsignOld != '' or $callsignNew != '') //check requirements
		{
			if($countKey == 1) // If KEY is valid
			{
				while($row = mysqli_fetch_array($resultKey)) //Look for KEY details
				{
					if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va) //Check if the key is owned by the VA and if VA is active
					{
						//Check for current callsign
						$buscarCallOld = "SELECT * FROM va_members WHERE CallNumber = $callsignOld AND VaIntId = $va";
						$resultCallOld = mysqli_query($con, $buscarCallOld);
						$countCallOld = mysqli_num_rows($resultCallOld);
						if($countCallOld == 1)
						{
							//Check for new Callsign
							$buscarCallNew = "SELECT * FROM va_members WHERE CallNumber = $callsignNew AND VaIntId = $va";
							$resultCallNew = mysqli_query($con, $buscarCallNew);
							$countCallNew = mysqli_num_rows($resultCallNew);
							if($countCallNew == 0)
							{
								//Updates member callsign on DB
								$AddMember = "UPDATE va_members SET CallNumber = $callsignNew WHERE vid = $vid AND VaIntId = $va";
								mysqli_query($con, $AddMember) or die(mysqli_error($con));
								$result = 'OK';
							}else{
								$result = 'The new callsign is already in use';
							}
						}else{
							$result = 'The callsign you are trying to change do not exist';
						}
					}else{
						$result = 'Wrong Key or VA is Inactive';
					}
				}
			}else{
				$result = 'Unknown Key';
			}
		}else{
			$result = 'Missing Data';
		}
	}
	elseif($op == 'list')
	{
		if($key != '' or $va != '') //check requirements
		{
			if($countKey == 1) // If KEY is valid
			{
				while($row = mysqli_fetch_array($resultKey)) //Look for KEY details
				{
					if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va) //Check if the key is owned by the VA and if VA is active
					{
						//Callsign Check
						$buscarCall = "SELECT * FROM va_members WHERE VaIntId = $va";
						$resultCall = mysqli_query($con, $buscarCall);
						$countCall = mysqli_num_rows($resultCall);
						if($countCall != 0)
						{
							while($row = mysqli_fetch_array($resultCall)){
								$result = print_r($row);
							}
						}else{
							$result = 'No members';
						}
					}else{
						$result = 'Wrong Key or VA is Inactive';
					}
				}
			}else{
				$result = 'Unknown Key';
			}
		}else{
			$result = 'Missing Data';
		}
	}
	elseif($op == 'chck')
	{
		if($key != '' or $va != '' or $vid != '' or $email != '') //check requirements
		{
			if($countKey == 1) // If KEY is valid
			{
				while($row = mysqli_fetch_array($resultKey)) //Look for KEY details
				{
					if($row['VaKey'] == $key && $row['VaStatus'] == 1 && $row['IntId'] == $va) //Check if the key is owned by the VA and if VA is active
					{
						//Callsign Check
						$buscarCall = "SELECT * FROM users WHERE vid = $vid AND email = '$email'";
						$resultCall = mysqli_query($con, $buscarCall);
						$countCall = mysqli_num_rows($resultCall);
						if($countCall != 0)
						{
							$result = 'TRUE';
						}else{
							$result = 'FALSE';
						}
					}else{
						$result = 'Wrong Key or VA is Inactive';
					}
				}
			}else{
				$result = 'Unknown Key';
			}
		}else{
			$result = 'Missing Data';
		}
	}else{
		$result = 'Unknown Operation';
	}
}else{
	$result = 'No operation selected';
}
if($op != 'list'){
	if($format == 'plain'){
		echo $result;
	}elseif($format == 'xml'){
		echo '<result>'.$result.'</result>';
	}else{
		echo '<pre>'.$result.'</pre>';
	}
}elseif($op == 'list'){
	if($format == 'xml'){
		print array2xml($row);
	}elseif($format == 'json'){
		echo json_encode($row);
	}
	
}

