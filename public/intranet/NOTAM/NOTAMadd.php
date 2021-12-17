<script type="text/javascript">
$.datetimepicker.setLocale('es');
$('#fechainicio').datetimepicker({format: 'Y-m-d H:i'});
$('#fechafin').datetimepicker({format: 'Y-m-d H:i'});
</script>

<?
require '../../conexion.php';
require '../../funciones.php';

$vid = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['enviar']))
{
	$nombre = $_POST['nombre'];
	$dStart = $_POST['fechainicio'];
	$dEnd = $_POST['fechafin'];
	$dPub = date("Y-m-d H:i:s");
	$text = $_POST['text'];
	
	$resPub = mysqli_query($con, 'SELECT * FROM notam_sys ORDER BY id DESC LIMIT 1');
	$filaPub = mysqli_fetch_array($resPub);
	
	$PubIdSec = explode('/',$filaPub['PubId']);
	$PubIdNum = substr($PubIdSec[0], -1, 5);
	$PubIdNum2 = $PubIdNum + 1;
	$PubIdNum3 = str_pad($PubIdNum2, 5, "0", STR_PAD_LEFT);
	$PubYear = date("Y");
	$PubId = 'AR'.$PubIdNum3.'/'.$PubYear.'';
	
	
	$sql1 =  "INSERT INTO notam_sys (PubId, Nombre, DateStart, DateEnd, DatePub, Texto) VALUES ('$PubId', '$nombre', '$dStart', '$dEnd', '$dPub', '$text')";
	$sql2 = "INSERT INTO acciones_staff(vid, accion, ip) VALUES($vid, 'Se ha agregado el NOTAM $nombre', '$ip')";
	
	mysqli_multi_query($con, $sql1.'; '.$sql2.';') or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	//mysqli_next_result($con);
	
	//mysqli_query($con, $sql3) or die('<p class="alert-danger">Ha habido un error al insertar en la base de datos.</p>'.mysqli_error($con));
	
	
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Datos actualizados correctamente<br><a onClick="mostrarAJAX(\'NOTAM/NOTAMlist.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}else{
?>                        
                        <h2>NOTAMs <small> Nuevo NOTAM</small></h2>

<form class="form-horizontal" id="formulario" action="/" enctype="multipart/form-data" method="post" role="form">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" placeholder="Resumen del NOTAM" class="form-control input-md" required type="text">
    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechainicio">Fecha Inicio</label>
    <div class="col-md-4">
        <input class="form-control input-md"  id="fechainicio" name="fechainicio" type="text" required />
    </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for="fechafin">Fecha Finalizaci&oacute;n</label>
    <div class="col-md-4">
        <input class="form-control input-md"  id="fechafin" name="fechafin" type="text" required />
    </div>
</div>

<div style="text-align: center;" class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripci&oacute;n</label>
  <div class="col-md-4">
  	<textarea class="form-control" id="text" name="text"></textarea>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4">
	<input onclick="enviarForm('NOTAM/NOTAMadd.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-success btn-xs" name="enviar" value="Agregar">
    <input type="reset" class="btn btn-warning btn-xs" value="Restablecer" />
  </div>
</div>
</fieldset>
</form>
<?
}
?>