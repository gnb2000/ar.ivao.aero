<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Enviar Escenario</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<?
		include('../conexion.php');
	
		if(isset($_POST['submit'])){
			$icao = $_POST['ICAO'];
			$name = $_POST['name'];
			$developer = $_POST['developer'];
			$cost = $_POST['cost'];
			$link = $_POST['link'];
			$compatible = implode(':', $_POST['compatible']);
			
			if(mysqli_query($con, "INSERT INTO members_escenarios (icao, name, developer, cost, link, simulators) VALUES ('$icao', '$name', '$developer', $cost, '$link', '$compatible')")){
				$exito = '<div class="alert alert-success col-md-4" role="alert">Se ha agregado con éxito!</div>';
			}
		}
			
	?>

	<form class="form-horizontal" action="escenarios.php" method="post">
	<fieldset>
	
	<!-- Form Name -->
	<legend>Enviar Escenario</legend>
	
	<?php 
	if(isset($exito)){
		echo'<div class="col-md-4"></div>
		<div class="form-group">'.$exito.'</div>';
	}
	?>
	
	<div class="form-group">
		
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="ICAO">ICAO</label>  
	  <div class="col-md-2">
	  <input id="ICAO" name="ICAO" placeholder="XXXX" class="form-control input-md" required="" type="text">
		
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="name">Nombre del Escenario</label>  
	  <div class="col-md-4">
	  <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text">
		
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="developer">Desarrollador</label>  
	  <div class="col-md-4">
	  <input id="developer" name="developer" placeholder="" class="form-control input-md" required="" type="text">
		
	  </div>
	</div>
	
	<!-- Multiple Radios (inline) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="cost">Costo</label>
	  <div class="col-md-4"> 
		<label class="radio-inline" for="cost-0">
		  <input name="cost" id="cost-0" value="1" checked="checked" type="radio">
		  Freeware
		</label> 
		<label class="radio-inline" for="cost-1">
		  <input name="cost" id="cost-1" value="2" type="radio">
		  Payware
		</label>
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="link">Link Descarga/Compra</label>  
	  <div class="col-md-4">
	  <input id="link" name="link" placeholder="" class="form-control input-md" required="" type="text">
		
	  </div>
	</div>
	
	<!-- Select Multiple -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="compatible">Simuladores Compatibles</label>
	  <div class="col-md-4">
		<select id="compatible" name="compatible[]" class="form-control" multiple="multiple">
		  <option value="FS9">FS2004/9</option>
		  <option value="FSX">FSX</option>
		  <option value="P3D2">P3D V2</option>
		  <option value="P3D3">P3D V3</option>
		  <option value="X9">XPL 9</option>
		  <option value="X10">XPL 10</option>
		  <option value="X11">XPL 11</option>
		</select>
	  </div>
	</div>
	
	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="summit"></label>
	  <div class="col-md-8">
		<button type="submit" id="submit" name="submit" class="btn btn-success">Enviar</button>
	  </div>
	</div>
	
	</fieldset>
	</form>
</body>
</html>