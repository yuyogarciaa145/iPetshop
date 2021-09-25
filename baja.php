<?php
$p1 = $_GET['Id'];
if (strlen($p1) == 0) {
header ("Location:admin.php");
exit ;
}
echo "<html>";
echo "<head>";
echo "<title> Bajas de Empleados </title>";
echo "<link rel='stylesheet' type ='text/css'
href = './css/baja.css'/>";
echo "</head>";
echo "<body>";
echo "<form name='formulario' action ='eliminar.php'
method ='post'>";
echo "<center>";
echo "<h1>Bajas de Productos</h1 >";
echo " </center>";
include ('conexion.php');
$query = "select clave, portfile, nombre, Descripcion,
precio from Productos where clave =".$p1.";";
$result = $connection->query($query);
if (!$result){
echo ("No se ha podido realizar la consulta!");
exit;
}
$row = $result->fetch_assoc();
$connection->close();
echo "<input type = 'hidden' name='Id' value='",$p1,"'>";
echo "<center>";
echo "<table class='content-table'>";
echo "<tr class='pie' height ='80'>";
echo "<td>&nbsp;&nbsp;Datos del Producto&nbsp;&nbsp;</td>";
echo "</tr>";
echo "<tr class='p' height ='60'>";
?>
<td><img width="150" src="data:image/png;base64,<?php
echo base64_encode($row['portfile']); 
?>"/></td>
<?php
echo "</tr>";
echo "<tr class='p' height ='60'>";
echo "<td>Nombre:<br>
<input type ='text' name='nombre' value ='",
$row['nombre'],"'disabled></td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
echo "<td>Descripcion:<br >
<input type ='text' name ='lastname' value ='",
$row['Descripcion'],"'disabled></td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
echo "<td>Precio:<br>
<input type='text' name ='title' value='",
$row['precio'],"'disabled></td >";
echo " </tr>";
echo "<tr height='80'>";
echo "<td class='num'><input class='boton' type='submit' value='Eliminar'></td >";
echo "</tr>";
echo "</table>";
echo "</center>";
echo "</form>";
echo "</body>";
echo "</html>";
?>
