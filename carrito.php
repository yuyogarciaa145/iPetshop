<!--carrito.php-->
<html>
<head>
    <title>Carrito de Compras</title >
    <meta http-equiv="content-type"  content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="./css/carrito1.css"/>
</head>
<body>
    <?php
        echo "<center>";
        echo "<h1>Carrito de compras...</h1>";
        echo "<h2>Altas de Productos&nbsp; <a href='index.php'>";
        echo "<img src='icon/buy.png' width='55px'> </a></h2>";
        echo "</center>";
        echo "<center>";
        echo "<table width='80%'>"; 
        echo "<form name='formulario' method ='post'>";
        echo "<tr>";
        echo "<th width='300px'>Numero</th>";
        echo "<th width='300px'>Producto</th>";
        echo "<th width='300px'>Nombre</th>";
        echo "<th width='150px'>Cantidad</th>";
        echo "<th width='150px'>Precio Unitario</th>";
        echo "<th width='150px'>Subtotal</th> ";
        echo "<th width='150px'>Eliminar</th>";
        echo "</tr>";
        include ('conexion.php');
            $query = "SELECT * FROM Carrito order by id";
            $result = $connection->query($query);
            if (!$result) {
            echo("No se ha podido realizar la consulta!");
            exit();
            }
            $nrows=$result-> num_rows;
            $connection->close ();
            $total = 0; 
            $subtotal =0;
            for ($i =0; $i <$nrows ; $i++) {
                $result -> data_seek ($i);
                $row = $result -> fetch_assoc();
                echo "<center>";
                echo "<form>";
                echo "<tr height ='60'>";
                echo "<td>", $i +1, "</td >";
                echo "<td><img width='150' src='img/",$row['img'],"'</td>";  
                echo "<td>", $row ['nombre'], "</td>";
                echo "<td>", $row ['cantidad'], "</td>";
                echo "<td>", $row ['precio'], "</td>";
                echo "<td>", $row ['subtotal'],"</td>";
                echo "<td><a href=bajaProducto.php?Id={$row['id']}>
                <img src='icon/delete.png' width='35'></a></td>";
                echo "</tr>";
                $subtotal = $row ['subtotal'];
                $total = $total + $subtotal;
            }
            echo "<tr height='80'>
                <th colspan='7'> Total:",($total),"</th ></tr>";
        echo "</center>";
        echo "</table>";
        echo "<a name='submit' href='Compra.php'>Comprar</a>";
        echo "</center>";
    ?>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nrows;
    $total;
    include('conexion.php');
    $query ="INSERT INTO compra(Cant_total, total) values
    ('{$nrows}','{$total}')";
    $result = $connection->query($query);
    if (!$result) {
        echo ("No se ha podido realizasr la consulta !");
        exit();
    }
    $connection -> close ();
    header('location: checkout.php');
    exit;

}
?>