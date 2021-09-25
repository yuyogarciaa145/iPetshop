<?php
$p1=$_POST['img']; 
$p2=$_POST['cantidad'];
$p3=$_POST['nombre'];
$p4=$_POST['precio'];
include('conexion.php');
$query ="INSERT INTO carrito(img, cantidad, nombre, precio) values
('{$p1}','{$p2}','{$p3}','{$p4}')";
$result = $connection->query($query);
if (!$result) {
echo ("No se ha podido realizasr la consulta !");
exit();
}
$connection -> close ();
header('location: carrito.php');
exit;
?>