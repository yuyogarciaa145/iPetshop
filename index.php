<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href ="./css/user.css"/>
    <title>usuario</title>
</head>
<body>
    <div class="banner-area">
        <div class="content-area">
           <div class="content">
           <h1><a href="usuario.php"><img src="./img/logo.png" width="256"></a></h1><br>
              <p>Bienvenido a nuestro sitio web aqui podras encontrar ditintos 
                  articulos para tu mascota</p>
                  <br>
              <a type="button" class="btn" href="#Productos">Ver Productos</a>
           </div>
        </div>
    </div>
    <br><a name="Productos"></a>
	<div id="header">
			<ul class="nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contacto.html">Contactos</a></li>
				<li><a href="FDP.php">Formas de pago</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Logout</a></a></li>
				<li><a href="">Acerca de</a>
					<ul>
						<li><a href="tienda.php">Tienda</a></li>
						<li><a href="datos.html">Datos de provedor</a></li>
						<li><a href="devo.php">Politicas de devoluciones
						</a></li>
					</ul>
				</li>
			</ul>
	</div><br><br>
    <br><br><br><br><br><br>
    <center><h1>Catálogo de Productos</h1></center>
      <?php
            echo "<center>";
            echo "<div class='forma'>";
            include ('conexion.php');
            $query = "SELECT * FROM productos";
            $result = $connection -> query($query);
            if (!$result) {
                echo("No se ha podido realizar la consulta!");
                exit();
            }
            $nrows=$result-> num_rows;
            $connection->close ();
            echo "<table class='content-table'>";
            for ($i =0; $i <$nrows ; $i++) {
                echo "<form action='addcarrito.php' method ='post'>";
                $result -> data_seek ($i);
                $row = $result -> fetch_assoc ();
                echo "<table border='0' class='content-table'>";
                echo "<tr>";
                echo "<td colspan='3'>";
                ?>
                <img width="220" src="data:image/png;base64,<?php
                echo base64_encode($row['portfile']); 
                ?>"/>
                <?php
                echo "</td>";
                echo "</tr>"; 
                echo "<tr>";
                echo "<td>";
                echo $row ['nombre'];
                echo ",&#160;";
                echo "&#160;( $&#160;";
                echo $row ['precio'];
                echo ")";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='3'>";
                echo $row['Descripcion'];
                echo "</td>";
                echo "</tr>"; 
                echo "<tr>";
                echo "<td colspan='3'>";
                echo "<a href=addcarrito.php?Pid={$row['clave']}>
                <img src='icon/add.png' width ='35'></a>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";
                }
            echo "</div>";
        echo "</center>";
      ?>
</body>
</html>