<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require '../../conexion.php';
require '../../funciones.php';
$staff = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['enviar']))
{
	$Today = date('Y-m-d');
	$url = $_FILES['file']['name'];
	$ext = explode('.', $url);
	$extension = '.'.$ext[1];
	
	$result = mysqli_query($con, 'SELECT * FROM statistics ORDER BY id DESC LIMIT 1') or die('Invalid query: ' . mysqli_error($con));
	$row = mysqli_fetch_array($result);
	
	$TimeWeek = $_POST['TotalTime'] - $row['TotalTime'];
	$id = $row['id'];
	
	$sql2 = "INSERT INTO staff_actions(vid, action, ip) VALUES($staff, 'Se ha subido una nueva estad&iacute;stica, '$ip')";
	$sql1 = "INSERT INTO statistics (Date, TotalMembers, ActiveMembers, TotalTime, TimeWeek, RegWeek, TimeRanking) VALUES ('".$Today."', '".$_POST['TotalMembers']."', '".$_POST['ActiveMembers']."', '".$_POST['TotalTime']."', '".$TimeWeek."', '".$_POST['RegWeek']."', '".$_POST['TimeRanking']."')";
	mysqli_multi_query($con, $sql1.'; '.$sql2) or die('Invalid query: ' . mysqli_error($con));
	mysqli_next_result($con); //Movemos el puntero al siguiente resultado del multiquery ya que, si no lo hacemos, no podremos ejecutar la siguiente consulta. 
	
	$lastID = mysqli_insert_id($con);
	$first = $lastID - 4;
	
	move_uploaded_file($_FILES['file']['tmp_name'], '/var/www/vhosts/ar.ivao.aero/files.ar.ivao.aero/Miembros/Estadisticas/'.$lastID.$extension);
	
	$headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
					"Content-Type: text/html; charset=utf-8\r\n".
					"MIME-Version: 1.0\r\n";	
	$body = '<html><body><center><img src="https://ar.ivao.aero/images/logomail.png" alt="IVAO Argentina" /></center><br /><br /><div style="border-bottom: 2px solid #a0a0a0;"></div><br /><h2>Nueva Estad&iacute;stica Cargada</h2>Le informamos que '.obtenerNombreUsuario($staff, $con).' ha cargado una nueva estad&iacute;stica. Para m&aacute;s info, acceda a la intraweb.<br /><br /><br /><div style="border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;"><strong>Fecha</strong>: '.date('d-m-Y').'</div><br /></body></html>';
	
	mail('ar-hq@ivao.aero', 'Nueva Estadistica', $body, $headers);
				
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados.</div>';
}
else
{
?>

<form class="form-horizontal" action="#" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<h2>Miembros <small> Cargar Estad&iacute;sticas</small></h2>

<!-- File input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="file">File</label>  
  <div class="col-md-4">
  <input id="file" name="file" class="form-control input-md" required type="file">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalMembers">Total Members</label>  
  <div class="col-md-4">
  <input id="TotalMembers" name="TotalMembers" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ActiveMembers">Active Members</label>  
  <div class="col-md-4">
  <input id="ActiveMembers" name="ActiveMembers" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TotalTime">Total Time</label>  
  <div class="col-md-4">
  <input id="TotalTime" name="TotalTime" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="RegWeek">Registered this Week</label>  
  <div class="col-md-4">
  <input id="RegWeek" name="RegWeek" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="TimeRanking">Time Ranking</label>  
  <div class="col-md-4">
  <input id="TimeRanking" name="TimeRanking" class="form-control input-md" required type="text">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Enviar"></label>
  <div class="col-md-4">
    <button onclick="enviarForm('Miembros/StatsUpload.php?enviar=enviar', '.tooltip-demo')" name="Enviar" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>
<?php } ?>
