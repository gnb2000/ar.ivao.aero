<?php
require '../../conexion.php';
require '../../funciones.php';
?>
<h2>STAFF <small> Lista de miembros del Staff</small></h2>
<br />
<?php
if(isset($_GET['enviar']))
{
	if($_POST['campo'] == 'vid'){
		$search = $_POST['search'];
		$result = mysqli_query($con, "SELECT * FROM users WHERE vid = '$search'");
	}
	else if($_POST['campo'] == 'nombre'){
		$search = $_POST['search'];
		$result = mysqli_query($con, "SELECT * FROM users WHERE name LIKE '%$search%'");
	}
	else if($_POST['campo'] == 'apellido'){
		$search = $_POST['search'];
		$result = mysqli_query($con, "SELECT * FROM users WHERE surname LIKE '%$search%'");
	}
	else if($_POST['campo'] == 'email'){
		$search = $_POST['search'];
		$result = mysqli_query($con, "SELECT * FROM users WHERE email LIKE '%$search%'");
	}
	else if($_POST['campo'] == 'ip'){
		$search = $_POST['search'];
		$result = mysqli_query($con, "SELECT * FROM ip_to_user WHERE ip = '$search'");
	}
	?>
	<table class="table table-hover">
    	<thead class="thead-dark">
			<tr class="bg-primary2">
				<td>VID</td>
				<td>Nombre</td>
				<td>Alta</td>
				<td>&Uacute;ltimo Login</td>
				<td>Estado</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<?php
		while($row = mysqli_fetch_array($result))
		{
			$estado = $row['active'] == 1 ? '<span class="label label-success">Activo</span>' : $estado = '<span class="label label-danger">S/V</span>';
			
			$verificar = $row['active'] == 0 ? '<button onclick="mostrarAJAX(\'Miembros/ValidateMember.php?enviar=1&vid='.$row['vid'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Activar Cuenta">
							<img src="https://ar.ivao.aero/images/ico/stamp--plus.png" />
						</button>' : $verificar = '';
			
			echo'<tr>
					  <td>'.$row['vid'].'</td>
					  <td>'.$row['name'].' '.$row['surname'].'</td>
					  <td>'.$row['login_first'].'</td>
					  <td>'.$row['login_last'].'</td>
					  <td>'.$estado.'</td>
					  <td>
					  	<button onclick="mostrarAJAX(\'Miembros/Editar.php?vid='.$row['vid'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Editar Miembro">
							<img src="http://www.ar.ivao.aero/images/ico/pencil.png" />
						</button> 
						<button onclick="if(confirm(\'Est&aacute; seguro que desea resetear las claves TS3?\')) mostrarAJAX(\'Miembros/KeysReset.php?vid='.$row['vid'].'\', \'.tooltip-demo\')" type="button" class="btn btn-default btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Resetear claves TS3">
							<img src="https://www.ar.ivao.aero/images/ico/key--plus.png" />
						</button> 
						'.$verificar.'
					</td>
				</tr>';  
		}
		?>
		</tbody>
	</table>
	<?php
}else{
?>

<form class="form-horizontal" id="formulario" action="/" method="post" role="form">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="search">Buscar</label>  
  <div class="col-md-8">
  <input id="seacrh" name="search" placeholder="" class="form-control input-md" type="text">
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="campo"></label>
  <div class="col-md-8"> 
    <label class="radio-inline" for="campo-0">
      <input name="campo" id="campo-0" value="vid" checked="checked" type="radio">
      VID
    </label> 
    <label class="radio-inline" for="campo-1">
      <input name="campo" id="campo-1" value="nombre" type="radio">
      Nombre
    </label> 
    <label class="radio-inline" for="campo-2">
      <input name="campo" id="campo-2" value="apellido" type="radio">
      Apellido
    </label> 
    <label class="radio-inline" for="campo-3">
      <input name="campo" id="campo-3" value="email" type="radio">
      Email
    </label> 
    <label class="radio-inline" for="campo-4">
      <input name="campo" id="campo-4" value="ip" type="radio">
      IP
    </label>
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for="campo"></label>
  <div class="col-md-8"> 
	<input onclick="enviarForm('Miembros/Buscar.php?enviar=enviar', '.tooltip-demo')" type="button" class="btn btn-default" name="enviar" value="Buscar">
  </div>
</div>

</fieldset>
</form>
<?php } ?>