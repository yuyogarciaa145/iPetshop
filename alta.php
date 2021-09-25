<?php
echo "<html>";
echo "<head>";
echo "<title> Altas de Productos </title>";
echo "<link rel='stylesheet' type ='text/css'
href = './css/altas.css'/>";
echo " </head >";
echo "<body>";
echo "<form name ='formulario' action='insertar.php'
method ='post' enctype='multipart/form-data' >";
echo "<center>";
echo "<h1>Altas de Productos</h1>";
echo "<table class='content-table'>";
echo "<tr class='pie'>";
echo "<td class='pie'>&nbsp;&nbsp;Introduzca los Datos 
&nbsp;&nbsp;</td>";
echo " </tr>";
echo "<tr height='32'>";
echo "<td class='p'>Portfile:<br><input  class='files' type=file REQUIRED name='portfile'></td>";
echo "</tr>";
echo "<tr height='60'>";
echo "<td class='p'>Nombre de imagen:<br><input type=text name='img'></td>";
echo " </tr>";
echo "<tr height='60'>";
echo "<td class='p'>Nombre de Producto:<br><input type=text name='nombre'></td>";
echo " </tr>";
echo "<tr height='60'>";
echo "<td class='p'>Descripcion: <br><input type=textarea name='Descripcion'></td>";
echo " </tr>";
echo "<tr height ='60'>";
echo "<td class='p'>Precio:<br><input type=text name=precio></td >";
echo " </tr>";
echo "<tr height='80'>";
echo "<td class='num'><input class='boton' type='submit' value='Agregar'></td>";
echo " </tr>";
echo " </table>";
echo " </center>";
echo " </form>";
echo " </body>";
echo " </html>";
?>