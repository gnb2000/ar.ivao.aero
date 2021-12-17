<?php
require '../../conexion.php';
require '../../funciones.php';

$slqstats = "SELECT * FROM statistics";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
 <?php include ("../stylesheet.php"); ?> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" type="text/javascript"></script>
<script>
Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totalmembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
	  <?php
	  	$resultstats = mysqli_query($con, $slqstats);
	  	$countstats = mysqli_num_rows($resultstats);
		for($i = 0; $i < $countstats; $i++)
		{
			$rowstats = mysqli_fetch_array($resultstats);

			if($i < ($countstats - 1))
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TotalMembers'].'}, ';
			else
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TotalMembers'].'}';
		}
	  	?>  
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Members"],
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "activemembers",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
	  <?php
	  	$resultstats = mysqli_query($con, $slqstats);
	  	$countstats = mysqli_num_rows($resultstats);
		for($i = 0; $i < $countstats; $i++)
		{
			$rowstats = mysqli_fetch_array($resultstats);

			if($i < ($countstats - 1))
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['ActiveMembers'].'}, ';
			else
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['ActiveMembers'].'}';
		}
	  	?>  
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Active Members"],
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "totaltime",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
	  <?php
	  	$resultstats = mysqli_query($con, $slqstats);
	  	$countstats = mysqli_num_rows($resultstats);
		for($i = 0; $i < $countstats; $i++)
		{
			$rowstats = mysqli_fetch_array($resultstats);

			if($i < ($countstats - 1))
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TotalTime'].'}, ';
			else
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TotalTime'].'}';
		}
	  	?>  
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Total Time"],
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "timeweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
	  <?php
	  	$resultstats = mysqli_query($con, $slqstats);
	  	$countstats = mysqli_num_rows($resultstats);
		for($i = 0; $i < $countstats; $i++)
		{
			$rowstats = mysqli_fetch_array($resultstats);

			if($i < ($countstats - 1))
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TimeWeek'].'}, ';
			else
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['TimeWeek'].'}';
		}
	  	?>  
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Time per Week"],
});

Morris.Line({
  // ID of the element in which to draw the chart.
  element: "regweek",
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: 
  [
	  <?php
	  	$resultstats = mysqli_query($con, $slqstats);
	  	$countstats = mysqli_num_rows($resultstats);
		for($i = 0; $i < $countstats; $i++)
		{
			$rowstats = mysqli_fetch_array($resultstats);

			if($i < ($countstats - 1))
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['RegWeek'].'}, ';
			else
				echo '{date: "'.$rowstats['Date'].'", value: '.$rowstats['RegWeek'].'}';
		}
	  	?>  
  ],
  xkey: "date",
  ykeys: ["value"],
  labels: ["Registers per Week"],
});
</script>
</head>
<body>
<div class="inicio-top-h1">Miembros Registrados en IVAO Argentina</div>
	<div id="totalmembers" style="height: 400px; width: 100%;"></div>

<div class="separacion-tablas"></div>

<div class="inicio-top-h1">Miembros Activos en IVAO Argentina</div>
	<div id="activemembers" style="height: 400px; width: 100%;"></div>

<div class="separacion-tablas"></div>

<div class="inicio-top-h1">Horas Online de IVAO Argentina</div>
	<div id="totaltime" style="height: 400px; width: 100%;"></div>

<div class="separacion-tablas"></div>

<div class="inicio-top-h1">Horas Online Semanales de IVAO Argentina</div>
	<div id="timeweek" style="height: 400px; width: 100%;"></div>
	
<div class="separacion-tablas"></div>

<div class="inicio-top-h1">Registros Semanales en IVAO Argentina</div>
	<div id="regweek" style="height: 400px; width: 100%;"></div>
	
</body>
</html>