<?php
    require 'conexion.php';
    $productos = $conexion->prepare("SELECT * FROM productos");
    $productos->execute();
    $productos = $productos->fetchAll();
?>