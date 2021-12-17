<?php
require '../../conexion.php';
require '../../funciones.php';

$staff = $_COOKIE['vid'];
$ip = $_SERVER['REMOTE_ADDR'];
$hoy = date('d-m-Y H:i');

if($_GET['enviar'] == 1)
{
	$vid = $_GET['vid'];
	
	$headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
			   "Content-Type: text/html; charset=utf-8\r\n".
			   "MIME-Version: 1.0\r\n";
	$body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Cuenta Validada</h2>Le informamos que nuestro staff ha validado su cuenta. Puede hacer login accediendo a https://ar.ivao.aero. Bienvenido a IVAO Argentina.<br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Staff</strong>: ".obtenerNombreUsuario($staff, $con)."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $hoy UTC</div><br /><br /></body></html>";

	mysqli_query($con, "UPDATE users SET active = 1 WHERE vid = $vid");
	mail(obtenerEmailUsuario($vid, $con), 'Cuenta Validada', $body, $headers);
	
	echo $errorA;
	echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Miembro validado correctamente<br><a onClick="mostrarAJAX(\'Miembros/ValidateMember.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
	
}
else
{
$resUser = mysqli_query($con, "SELECT * FROM users WHERE active = 0 ORDER BY regTime DESC");
$filasUser = mysqli_num_rows($resUser);

?>

                    	<!-- INICIO CONTENIDO -->
                        
<h2>Validar <small> Lista de miembros</small></h2>
					 
                        <div class="separacion-tablas"></div>						
                        
               
                        <div style="margin-top: 15px;"></div>
                         <table class="table table-hover">
        					<thead class="thead-dark">
                                <tr class="bg-primary2">
                                  <td>VID</td>
                                  <td>Nombre</td>
                                  <td>Registro</td>
                                  <td></td>
								  <td></td> 
                                </tr>
                             </thead>

                             <tbody>
                             	<?php 
while($filaUser = mysqli_fetch_array($resUser))
{
	echo'<tr>
			  <td>'.$filaUser['vid'].'</td>
			  <td><strong>'.$filaUser['name'].' '.$filaUser['surname'].'</strong></td>
			  <td>'.$filaUser['login_first'].'</td>
			  <td align="center">'; ?>
			  <a onClick="if(confirm('&iquest;Est&aacute; seguro que desea validar esta cuenta?')) mostrarAJAX('Miembros/ValidateMember.php?enviar=1&vid=<?php echo $filaUser['vid']; ?>', '.tooltip-demo')" data-original-title="Validar" role="button" class="btn btn-info btn-xs" >
			  Validar
			  </a>
			  <?php echo '
			  </td>
			  <td>'.$filaUser['permisos'].'</td>
             </tr>';  
}
		  ?>
	 </tbody>
 </table>
<?php } ?>
                        <!-- FINAL CONTENIDO -->