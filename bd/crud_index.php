<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$monto_ingresado = (isset($_POST['monto_ingresado'])) ? $_POST['monto_ingresado'] : '';
$d_ingreso = (isset($_POST['d_ingreso'])) ? $_POST['d_ingreso'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';




switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_caja (descripcion, monto,Tipo,fecha,pago) VALUES('$d_ingreso', '$monto_ingresado', 'ingreso',NOW(), 'Efectivo') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_caja ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;        
    case 2:        
        $consulta = "UPDATE t_caja SET monto='$monto_ingresado', descripcion='$d_ingreso' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();   
            
        
        $consulta = "SELECT * FROM t_caja  ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM t_caja WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM t_caja WHERE tipo = 'ingreso' order by id DESC";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "INSERT INTO t_caja (descripcion, monto,Tipo,fecha,pago) VALUES('$d_ingreso', '$monto_ingresado', 'egreso',NOW(),'Efectivo') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_caja ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;
    case 8:
        $consulta = "SELECT * FROM t_caja WHERE tipo='egreso'  order by id DESC";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}




print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;