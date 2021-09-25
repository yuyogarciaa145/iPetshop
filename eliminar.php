<!-- eliminar . php -->
<?php
include('conexion.php');
$query= "delete from productos where clave={$_POST['Id']}";
$result= $connection->query($query);
if (!$result){
echo("No se ha podido realizar la consulta!");
exit();
}
$connection->close();
header('location: admin.php');
exit;
?>