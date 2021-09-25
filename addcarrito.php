<?php
$p1 = $_GET['Pid'];
if (strlen($p1) == 0) {
header ("Location: index.php");
exit ;
}
echo "<html>";
echo "<head>";
echo "<title> Datos de Producto </title>";
echo "<link rel='stylesheet' type ='text/css'
href = './css/baja.css'/>";
echo "</head>";
echo "<body>";
echo "<form name='formulario' action='add.php' method ='post'>";
include ('conexion.php');
$query = "select * from Productos where clave =".$p1.";";
$result = $connection->query($query);
if (!$result){
echo ("No se ha podido realizar la consulta!");
exit;
}
$row = $result->fetch_assoc();
$connection->close();
echo "<input type ='hidden' name='Pid' value='",$p1,"'>";
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
<input type ='text'  value ='",
$row['nombre'],"'disabled></td>";
echo "</tr>";
echo "<tr class='p' height='60'>";
echo "<td>Precio:<br>
<input type='text' value='",
$row['precio'],"'disabled></td >";
echo " </tr>";
echo "<tr class='p' height='60'>";
echo "<td>Cantidad:<br>
<input type='text' name='cantidad' value='1'></td >";
echo " </tr>";
echo "<tr height='80'>";
echo "<td class='num'><input class='boton' type='submit' value='Agregar'></td >";
echo "</tr>";
echo "<input type='hidden' name='img' value='",$row['img'],"'>";
echo "<input type='hidden' name='nombre' value='",$row['nombre'],"'>";
echo "<input type='hidden' name='precio' value='",$row['precio'],"'>";
echo "</table>";
echo "</center>";
echo "</form>";
echo "</body>";
echo "</html>";
?>