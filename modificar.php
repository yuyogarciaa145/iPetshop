<!-- modificar.php -->
<?php
$p=addslashes(file_get_contents($_FILES['portfile']['tmp_name']));
$p1=$_POST['img']; 
$p2=$_POST['nombre']; 
$p3=$_POST['Descripcion'];
$p4=$_POST ['precio'];
if(strlen($p1 )==0 || strlen ($p2)==0 || strlen($p3)==0) {
    header('location: admin.php');
exit;
}
include('conexion.php');
$query = "update productos set portfile='{$p}', img ='{$p1}', nombre='{$p2}', Descripcion ='{$p3}', precio ='{$p4}' where clave={$_POST['Id']}";
$result = $connection ->query($query);
if(!$result){
echo("No se ha podido realizar la consulta!");
exit();
}
$connection->close();
header('location: admin.php');
exit;
?>