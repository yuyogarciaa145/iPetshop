<!--bajaProducto.php -->
<?php
$p1 = $_GET['Id'];
include('conexion.php');
$query= "DELETE FROM carrito where id='{$p1}'";
$result= $connection->query($query);
if (!$result){
echo("No se ha podido realizar la consulta!");
exit();
}
$connection->close();
header('location: carrito.php');
exit;
?>