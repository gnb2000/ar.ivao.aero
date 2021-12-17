<?php	
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	 
	 require('../conexion.php');
	 include('../stylesheet.php');
	 
	 $vid = $_COOKIE['vid'];
	 
	
	 
	$buscar = "SELECT * FROM staff_members WHERE vid = '$vid' AND (permisos = 'ADM' OR departamento = 'MEMBER') "; //
	$result = mysqli_query($con, $buscar);
	$count = mysqli_num_rows($result);
	
	if($count != 0){
		
		if(isset($_POST['subir_file']))//para saber si el botón registrar fue presionado.
		{
			$target_dir = "../files/Miembros/Estadisticas";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			
			if($_POST['file'] == '') {$file = basename($_FILES["file"]["name"]);}
			else {$file = $_POST['file'];}
				
			if($_FILES['file']['tmp_name'] != ''){
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
					$errExitoFile = "File URL: https://files.ivao.com.ar/Miembros/Estadisticas/". basename( $_FILES['file']['name']). "";
				} else {
					$errErrorFile = "Sorry, there was an error uploading your file.";
				}
			}
		}
		
	?>
<table style="width:100%">
	<tr>
		<td>
		</td>
		<td>
			<form enctype="multipart/form-data" action="estadisticas.php" method="post" class="form-horizontal">
				<fieldset>
					<!-- Form Name -->
					<legend>Agregar Archivo</legend>
					<!-- File Button --> 
					<div class="form-group">
						<label class="col-md-4 control-label" for="imagen">Subir Estadisticas</label>
						<div class="col-md-4">
							<input id="file" name="file" class="input-file" type="file">
							<span class="help-block">Solamente si no la subio via FTP. Agregar fecha al final del archivo. (Ej. estadisticas-21-08-2016.xlsx)</span>  
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
