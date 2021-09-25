<!-- insertar.php -->
<?php
$p=addslashes(file_get_contents($_FILES['portfile']['tmp_name']));
$p1=$_POST['img']; 
$p2=$_POST['nombre'];
$p3=$_POST['Descripcion'];
$p4=$_POST['precio'];
if ( strlen( $p1 )==0 || strlen( $p2 )==0 || strlen( $p3 )==0) {
    header('location: admin.php');
exit;
}
include('conexion.php');
$query ="INSERT INTO productos(portfile, img, nombre, Descripcion, precio) values
('{$p}','{$p1}','{$p2}','{$p3}','{$p4}')";
$result = $connection->query($query);
if (!$result) {
echo ("No se ha podido realizasr la consulta !");
exit();
}
$connection -> close ();
header('location: admin.php');
exit;
?>