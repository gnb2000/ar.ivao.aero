 <?php	
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
 
 require('../conexion.php');
 include('../stylesheet.php');
 
 $vid = $_COOKIE['vid'];
 
$target_dir = "../files/Eventos/Images/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
 
$buscar = "SELECT * FROM staff_members WHERE vid = '$vid' AND (departamento = 'EVENT' OR permisos = 'ADM') "; //
$result = mysqli_query($con, $buscar);
$count = mysqli_num_rows($result);

if($count != 0){
	
 
	if(isset($_POST['agregar']))//para saber si el botón registrar fue presionado.
	{
		$errMissing = '<br>
		<div class="alert alert-warning alert-dismissible fade in" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  <strong>Atención!</strong> Complete todos los campos requeridos.
		</div>
		<br>';
		
		if($_POST['nombre'] == '') echo $errMissing;
		elseif($_POST['fecha'] == '') echo $errMissing;
		elseif($_POST['hora'] == '') echo $errMissing;
		elseif($_POST['home'] == '') echo $errMissing;
		elseif($_POST['descripcion'] == '') echo $errMissing;
		elseif($_POST['detalles'] == '') echo $errMissing;
		//elseif($_POST['imagen'] == '') echo $errMissing;
		elseif($_POST['tipo'] == '') echo $errMissing;
		else
		{
			$evento = $_POST['nombre'];
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			$home = $_POST['home'];
			$descrip = $_POST['descripcion'];
			$detalles = $_POST['detalles'];
			if($_POST['imagen'] == '') {$imagen = basename($_FILES["imagen"]["name"]);}
			else {$imagen = $_POST['imagen'];}
			$tipo = $_POST['tipo'];
			
			if($_FILES['imagen']['tmp_name'] != ''){
				if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
					$errExitoF = "The file ". basename( $_FILES['imagen']['name']). " has been uploaded. ".$target_file."";
				} else {
					$errError = "Sorry, there was an error uploading your file.";
				}
			}
				$buscar = "SELECT * FROM eventos WHERE fecha = '$fecha' AND hora = '$hora' "; //
				$result = mysqli_query($con, $buscar);
				$count = mysqli_num_rows($result);
				if($count == 0){
						$sql = "INSERT INTO eventos (nombre, fecha, hora, home, descripcion, detalles, imagen, tipo) VALUES ('$evento', '$fecha', '$hora', '$home', '$descrip', '$detalles', '$imagen', '$tipo')" ;
				
						mysqli_query($con, $sql) or die('<div class="alert alert-warning alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Atención!</strong> Error al ingresar en la Base de Datos.
						</div>');
						
						$errExito = '<div class="alert alert-sucess alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  <strong>Éxito</strong> Se ha registrado el evento correctamente.
					  <a href="evento-add.php">Agregar otro evento</a>
						</div>';
						}else{
							$errError = '<br>
							<div class="alert alert-warning alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							  <strong>Atención!</strong> Ya hay un evento en ese dia a esa misma hora.
							</div>
							<br>';
						}
		}
		//echo $errExitoF;
		echo $errExito;
		echo $errError;
	}
	else
	{
?>
<form enctype="multipart/form-data" action="evento-add.php" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Agregar Evento</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" placeholder="" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha">Fecha</label>  
  <div class="col-md-4">
  <input id="fecha" name="fecha" placeholder="YYYY-MM-DD" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hora">Hora</label>  
  <div class="col-md-4">
  <input id="hora" name="hora" placeholder="HH:MM" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="home">Texto de HOME</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="home" name="home">Texto para la la página inicial (max. 150 caracteres).</textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="descripcion">Descripción</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="descripcion" name="descripcion">Texto de descripción del evento (max. 250 caracteres).</textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="detalles">HTML</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="detalles" name="detalles">Pegar código HTML del Topic en el foro.</textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="imagen">Nombre de Imagen</label>  
  <div class="col-md-4">
  <input id="imagen" name="imagen" placeholder="imagen.jpg" class="form-control input-md" type="text">
  <span class="help-block">Agregar la extensión de la imagen, solamente si ya la subio via FTP</span>  
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="imagen">Subir Imagen</label>
  <div class="col-md-4">
    <input id="imagen" name="imagen" class="input-file" type="file">
	<span class="help-block">Solamente si no la subio via FTP</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo</label>
  <div class="col-md-4">
    <select id="tipo" name="tipo" class="form-control">
      <option value="Puente">Puente</option>
      <option value="Fly-In">Fly-In</option>
      <option value="SAR">SAR</option>
      <option value="Competencia">Competencia</option>
      <option value="Otros">Otros</option>
    </select>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="agregar"></label>
  <div class="col-md-8">
    <button id="agregar" name="agregar" class="btn btn-success">Agregar</button>
    <button id="clean" name="clean" class="btn btn-danger">Limpiar</button>
  </div>
</div>

</fieldset>
</form>
<?
	}
}else{
	echo 'Sin autorización '.$count.'';
}
?>