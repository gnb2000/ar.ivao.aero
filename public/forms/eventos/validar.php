		$query = "SLECT * FROM rep_puntos_pil WHERE Vid = '$vid'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
		if($count == 0){
			$sql = "INSERT INTO rep_puntos_pil (Vid, Puntos) VALUES ('$Vid', 1)"
		}else{
			$sql = "UPDATE rep_puntos_pil SET Punto = Punto+1, created = now(), UsrTkId = '$TkId' WHERE vid = '$vid' "
		}