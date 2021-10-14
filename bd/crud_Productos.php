<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$f_ingreso = (isset($_POST['f_ingreso'])) ? $_POST['f_ingreso'] : '';
$precio_contado = (isset($_POST['precio_contado'])) ? $_POST['precio_contado'] : '';
$precio_cuotas = (isset($_POST['precio_cuotas'])) ? $_POST['precio_cuotas'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_productos (nombre, f_ingreso, precio_contado, precio_cuotas) VALUES('$nombre', '$f_ingreso', '$precio_contado', '$precio_cuotas') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_productos ORDER BY Id_Producto DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE t_productos SET nombre='$nombre', f_ingreso='$f_ingreso', precio_contado='$precio_contado', precio_cuotas='$precio_cuotas' WHERE Id_Producto='$Id_Producto' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM t_productos WHERE Id_Producto='$Id_Producto' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM t_productos WHERE Id_Producto='$nombre' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM t_productos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;