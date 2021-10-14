<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $f_ingreso = (isset($_POST['f_ingreso'])) ? $_POST['f_ingreso'] : '';
    $precio_contado = (isset($_POST['precio_contado'])) ? $_POST['precio_contado'] : '';
    $precio_cuotas = (isset($_POST['precio_cuotas'])) ? $_POST['precio_cuotas'] : '';
    $sql="INSERT INTO t_productos (nombre, f_ingreso, precio_contado, precio_cuotas) VALUES('$nombre', '$f_ingreso', '$precio_contado', '$precio_cuotas') ";
    echo mysqli_query($conexion,$sql); 
?>