<html>
<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>

<center>
<div id="totalmembers" style="height: 400px; width: 75%;"></div>
<br>
<div id="activemembers" style="height: 400px; width: 75%;"></div>
<br>
<div id="totaltime" style="height: 400px; width: 75%;"></div>
<br>
<div id="timeweek" style="height: 400px; width: 75%;"></div>
<br>
<div id="regweek" style="height: 400px; width: 75%;"></div>

	<?
	include ("../conexion.php"); 
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	echo'<table>
	<tr>
		<td>Date</td>
		<td>Total Members</td>
		<td>Active Members</td>
		<td>Total Time</td>
		<td>Time per Week</td>
		<td>Register per Week</td>
		<td>Time Ranking</td>
	</tr>
	';
	while($row = mysqli_fetch_array($result)){
		echo '
		<tr>
			<td>'.$row['Date'].'</td>
			<td>'.$row['TotalMembers'].'</td>
			<td>'.$row['ActiveMembers'].'</td>
			<td>'.$row['TotalTime'].'</td>
			<td>'.$row['TimeWeek'].'</td>
			<td>'.$row['RegWeek'].'</td>
			<td>'.$row['TimeRanking'].'</td>
		</tr>
		';
	}
	echo '</table>';
	?>
</center>
</body>
<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totalmembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?
	include ("../conexion.php");
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
		if($i < $count){
			echo '{ date: "'.$row['Date'].'", value: '.$row['TotalMembers'].' },';
		}else{
			echo '{ date: "'.$row['Date'].'", value: '.$row['TotalMembers'].' }';
		}
	
	$i ++;
	
	}
	?>
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Members"],
  ymin: 'auto'
});
</script>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: "activemembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?
	include ("../conexion.php");
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
		if($i < $count){
			echo '{ date: "'.$row['Date'].'", value: '.$row['ActiveMembers'].' },';
		}else{
			echo '{ date: "'.$row['Date'].'", value: '.$row['ActiveMembers'].' }';
		}
	
	$i ++;
	
	}
	?>
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Active Members"],
  ymin: 'auto'
});
</script>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totaltime",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?
	include ("../conexion.php");
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
		if($i < $count){
			echo '{ date: "'.$row['Date'].'", value: '.$row['TotalTime'].' },';
		}else{
			echo '{ date: "'.$row['Date'].'", value: '.$row['TotalTime'].' }';
		}
	
	$i ++;
	
	}
	?>
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Time"],
  ymin: 'auto'
});
</script>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: "timeweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?
	include ("../conexion.php");
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
		if($i < $count){
			echo '{ date: "'.$row['Date'].'", value: '.$row['TimeWeek'].' },';
		}else{
			echo '{ date: "'.$row['Date'].'", value: '.$row['TimeWeek'].' }';
		}
	
	$i ++;
	
	}
	?>
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Time p/ Week"],
});
</script>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: "regweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?
	include ("../conexion.php");
	$sql = "SELECT * FROM estadisticas";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
		if($i < $count){
			echo '{ date: "'.$row['Date'].'", value: '.$row['RegWeek'].' },';
		}else{
			echo '{ date: "'.$row['Date'].'", value: '.$row['RegWeek'].' }';
		}
	
	$i ++;
	
	}
	?>
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Registers p/ Week"],
});
</script>