<?php
require '../../conexion.php';

$id = (int)$_GET['id'];
$sql = "DELETE FROM trainer_training WHERE id = $id";
mysqli_query($con, $sql) or die('<p class="alert-danger">Ha habido un error al eliminar el training.</p>'.mysqli_error($con));

echo '<div class="alert alert-success" role="alert" style="text-align: center;"><i class="fa fa-info-circle fa-fw fa-2"></i> Registro eliminado correctamente.<br /><a onClick="mostrarAJAX(\'Entrenamiento/TTManage.php\', \'.tooltip-demo\')" href="#"><strong>Volver</strong></a></div>';
?>