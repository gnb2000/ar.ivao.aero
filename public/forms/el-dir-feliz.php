<?php	
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	 
	 require('../conexion.php');
	 include('../stylesheet.php');
	 
	 $vid = $_COOKIE['vid'];
	 
	
	 
	$buscar = "SELECT * FROM staff_members WHERE vid = '$vid' AND (departamento = 'HQ' OR permisos = 'ADM') "; //
	$result = mysqli_query($con, $buscar);
	$count = mysqli_num_rows($result);
	
	if($count != 0){
		
	 
		if(isset($_POST['subir_img']))//para saber si el botón registrar fue presionado.
		{	
			$target_dir = "/home/admin/web/files.ivao.com.ar/public_html/Eventos/Images/";
			$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
			
			if($_POST['imagen'] == '') {$imagen = basename($_FILES["imagen"]["name"]);}
			else {$imagen = $_POST['imagen'];}
				
			if($_FILES['imagen']['tmp_name'] != ''){
				if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
					$errExitoImage = "Image URL: https://files.ivao.com.ar/Eventos/Images/". basename( $_FILES['imagen']['name'])."";
					
					$img = '/home/admin/web/files.ivao.com.ar/public_html/Eventos/Images/'.$_FILES['imagen']['name'];
						$percentage = 0.5;
						
						$imagick = new Imagick($img);
						
						$width = $imagick->getImageWidth();
						$height = $imagick->getImageHeight();
						
						
						$n_width = $width * $percentage;
						$n_height = $height * $percentage;
						
						$imagick->setImageFormat('jpeg');
						$imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
						$imagick->setImageCompressionQuality(90);
						$imagick->thumbnailImage($n_width, $n_height, false, false);
						
						$ne = explode('.', $_FILES['imagen']['name']);
						
						$imagick->writeImage('/home/admin/web/files.ivao.com.ar/public_html/Eventos/Images/Thumb/'.$ne[0].'.jpeg' );
					
				} else {
					$errErrorImage = "Sorry, there was an error uploading your file.";
				}
			}
		}
		
		if(isset($_POST['subir_file']))//para saber si el botón registrar fue presionado.
		{
			$target_dir = "/home/admin/web/files.ivao.com.ar/public_html/PR/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			
			if($_POST['file'] == '') {$file = basename($_FILES["file"]["name"]);}
			else {$file = $_POST['file'];}
				
			if($_FILES['file']['tmp_name'] != ''){
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
					$errExitoFile = "File URL: https://files.ivao.com.ar/PR/". basename( $_FILES['file']['name']). "";
				} else {
					$errErrorFile = "Sorry, there was an error uploading your file.";
				}
			}
		}
		
	?>
<table style="width:100%">
	<tr>
		<td>
			<form enctype="multipart/form-data" action="el-dir-feliz.php" method="post" class="form-horizontal">
				<fieldset>
					<!-- Form Name -->
					<legend>Agregar Imagen de Evento</legend>
					<!-- File Button --> 
					<div class="form-group">
						<label class="col-md-4 control-label" for="imagen">Subir Imagen</label>
						<div class="col-md-4">
							<input id="imagen" name="imagen" class="input-file" type="file">
							<span class="help-block">Solamente si no la subio via FTP</span>  
						</div>
					</div>
					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="agregar"></label>
						<div class="col-md-8">
							<button id="subir_img" name="subir_img" class="btn btn-success">Agregar</button>
							<button id="clean" name="clean" class="btn btn-danger">Limpiar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</td>
		<td>
			<form enctype="multipart/form-data" action="el-dir-feliz.php" method="post" class="form-horizontal">
				<fieldset>
					<!-- Form Name -->
					<legend>Agregar Archivo</legend>
					<!-- File Button --> 
					<div class="form-group">
						<label class="col-md-4 control-label" for="imagen">Subir Archivo</label>
						<div class="col-md-4">
							<input id="file" name="file" class="input-file" type="file">
							<span class="help-block">Solamente si no la subio via FTP</span>  
						</div>
					</div>
					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="agregar"></label>
						<div class="col-md-8">
							<button id="subir_file" name="subir_file" class="btn btn-success">Agregar</button>
							<button id="clean" name="clean" class="btn btn-danger">Limpiar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</td>
	</tr>
	<tr>
		<td>
			<hr>
			<?
				echo $errExitoImage;
				echo $errErrorImage;
			?>
		</td>
		<td>
			<hr>
			<?
				echo $errExitoFile;
				echo $errErrorFile;
			?>
		</td>
	</tr>
</table>
<?

	}else{
	echo 'Sin autorización';
	}
	?>
