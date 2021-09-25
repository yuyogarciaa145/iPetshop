<?php

    session_start();

    if(!isset($_SESSION['roll_id'])){
        header('location: login.php');
    }else{
        if($_SESSION['roll_id'] != 2){
            header('location: login.php');
        }
    }
?>

<html>
<head>
    <title>Checkout</title >
    <meta http-equiv="content-type"  content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" href="./css/by.css"/>
</head>
<body>
    <?php
        echo "<center>";
        echo "<h1>Checkout...</h1>";
        echo "</center>";
        echo "<center>";
        echo"<h2>Formas de Pago</h2>";
        echo "<a href='carrito.php'><img src='./icon/back.png' width='60px'></a><br><br>";
        echo "<a class='btn' href='Debito.php'>Debito</a>&nbsp;&nbsp;";
        echo "<a class='btn' href='Credito.php'>Credito</a><br><br><br><br>";
        echo "<form action='compra.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>";
        echo "<input REQUIRED class='tx' type='text' placeholder='Numero de tarjeta'/>";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        echo "<input REQUIRED class='tx' type='text' placeholder='fecha'/>";
        echo "</td>";
        echo "</tr>"; 
        echo "<tr>";
        echo "<td>";
        echo "<input REQUIRED class='tx' type='text' placeholder='CVV'/>";
        echo "</td>";
        echo "</tr>";
        echo "</table><br>";
        echo "<form/>";
        echo"<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th width='300px'>Numero</th>";
        echo "<th width='300px'>Producto</th>";
        echo "<th width='300px'>Nombre</th>";
        echo "<th width='150px'>Cantidad</th>";
        echo "<th width='150px'>Subtotal</th>";
        echo "</tr>";
        echo "</thead>";
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
            $cargo=66;
            for ($i =0; $i <$nrows ; $i++) {
                $result -> data_seek ($i);
                $row = $result -> fetch_assoc();
                echo "<center>";
                echo "<form>";
                echo "<tbody>";
                echo "<tr height ='60'>";
                echo "<td>", $i +1, "</td >";
                echo "<td><img width='60' src='img/",$row['img'],"'</td>";  
                echo "<td>", $row ['nombre'], "</td>";
                echo "<td>", $row ['cantidad'], "</td>";
                echo "<td>$", $row ['subtotal'],"</td>";
                echo "</tr>";
                $subtotal = $row ['subtotal'];
                $total = $total + $subtotal;
                $total = $total + $cargo;
            }
            echo "<tr height='80'>
            <th colspan='7'> Total:",$nrows,"</th ></tr>;
            <th colspan='7'> Cargo de envio:$",$cargo,"</th ></tr>;
            <th colspan='7'> Total:",$total,"</th ></tr>";
            echo "</tbody>";
        echo "</center>";
        echo "</table><br><br>";
        echo "<input type='submit' class='btn' value='Finalizar compra'>";
        echo "</center>";
    ?>
</body>
</html>