<?php

    session_start();

    if(!isset($_SESSION['roll_id'])){
        header('location: login.php');
    }else{
        if($_SESSION['roll_id'] != 1){
            header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type ="text/css" href ="css/portada.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<?php
echo "<center>";
echo "<h1>ADMINISTRADOR</h1>";
echo "<h2>Altas de Empleados &nbsp; <a href=alta.php>
<img src=icon/add.png width='43'>
</a></h2>";
echo " </center>";
include ('conexion.php');
$query = "select clave, portfile, nombre, Descripcion,
precio from Productos order by clave";
$result = $connection -> query($query);
if (!$result) {
echo("No se ha podido realizar la consulta!");
exit();
}
$nrows=$result-> num_rows;
$connection->close ();
echo "<center>";
echo "<table class='content-table'>";
echo "<tr class='primer' height='80'>";
echo "<th width='50'>Clave </th >
<th width = '150'>Producto</th>
<th width = '300'>Nombre</th>
<th width = '400'>Descripcion</th>
<th width = '250'>Precio</th>
<th width = '150'>Modificar</th>
<th width = '150'>Eliminar</th>";
echo "</tr>";
for ($i =0; $i <$nrows ; $i++) {
$result -> data_seek ($i);
$row = $result -> fetch_assoc ();
echo "<tr height ='60'>";
echo "<td>", $i +1, "</td >";
?>
<td><img width="64" src="data:image/jpg;base64,<?php
echo base64_encode($row['portfile']); 
?>"/></td>
<?php  
echo "<td>", $row ['nombre'], "</td >";
echo "<td>", $row ['Descripcion'], "</td >";
echo "<td>", $row ['precio'], "</td >";
echo "<td>
<a href=cambio.php?Id={$row['clave']}>
<img src='icon/modify.png' width ='35'>
</a></td>";
echo "<td>
<a href=baja.php?Id={$row['clave']}>
<img src='icon/delete.png' width='35'>
</a></td>";
}
echo "<tr class='num' height='80'>
<th colspan ='7'> Total de registros: ",($nrows),
"</th ></tr>";
echo " </table>";
echo "<a href='logout.php'>Logout</a>";
echo " </center>";
?> 
</body>
</html>