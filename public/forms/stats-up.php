<?
include("../conexion.php");
if(isset($_POST['Enviar'])){
	$Today = date('Y-m-d');
	
	$result = mysqli_query($con, 'SELECT * FROM estadisticas ORDER BY id DESC LIMIT 1') or die('Invalid query: ' . mysqli_error());
	while ($row = mysqli_fetch_assoc($result)) {
		$TimeWeek = ($_POST['TotalTime'] - $row['TotalTime']);
		
		$sql = "INSERT INTO estadisticas (Date, TotalMembers, ActiveMembers, TotalTime, TimeWeek, RegWeek, TimeRanking) VALUES ('".$Today."', '".$_POST['TotalMembers']."', '".$_POST['ActiveMembers']."', '".$_POST['TotalTime']."', '".$TimeWeek."', '".$_POST['RegWeek']."', '".$_POST['TimeRanking']."')";
		
		mysqli_query($con, $sql) or die('Invalid query: ' . mysqli_error());
	}
	
	
}

?>

<form class="form-horizontal" action="stats-up.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Stats Update</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalMembers">Total Members</label>  
  <div class="col-md-4">
  <input id="TotalMembers" name="TotalMembers" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ActiveMembers">Active Members</label>  
  <div class="col-md-4">
  <input id="ActiveMembers" name="ActiveMembers" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalTime">Total Time</label>  
  <div class="col-md-4">
  <input id="TotalTime" name="TotalTime" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="RegWeek">Registered this Week</label>  
  <div class="col-md-4">
  <input id="RegWeek" name="RegWeek" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TimeRanking">Time Ranking</label>  
  <div class="col-md-4">
  <input id="TimeRanking" name="TimeRanking" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Enviar"></label>
  <div class="col-md-4">
    <button id="Enviar" name="Enviar" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>
