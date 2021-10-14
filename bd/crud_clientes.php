<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$Nombre_y_Apellido = (isset($_POST['Nombre_y_Apellido'])) ? $_POST['Nombre_y_Apellido'] : '';
$DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Fecha_de_Ingreso = (isset($_POST['Fecha_de_Ingreso'])) ? $_POST['Fecha_de_Ingreso'] : '';
$Telefono_1 = (isset($_POST['Telefono_1'])) ? $_POST['Telefono_1'] : '';
$Telefono_2 = (isset($_POST['Telefono_2'])) ? $_POST['Telefono_2'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_clientes (Nombre_y_Apellido, DNI, Direccion, Fecha_de_Ingreso, Telefono_1, Telefono_2) VALUES('$Nombre_y_Apellido', '$DNI', '$Direccion', '$Fecha_de_Ingreso', '$Telefono_1', '$Telefono_2') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_clientes ORDER BY DNI DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE t_clientes SET Nombre_y_Apellido='$Nombre_y_Apellido', Direccion='$Direccion', Fecha_de_Ingreso='$Fecha_de_Ingreso', Telefono_1='$Telefono_1', Telefono_2='$Telefono_2' WHERE DNI='$DNI' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM t_clientes WHERE DNI='$DNI' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM t_clientes WHERE DNI='$DNI' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM t_clientes";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;