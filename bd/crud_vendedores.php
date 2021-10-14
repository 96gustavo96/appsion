<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$Nombre_y_Apellido = (isset($_POST['Nombre_y_Apellido'])) ? $_POST['Nombre_y_Apellido'] : '';
$monto = (isset($_POST['monto'])) ? $_POST['monto'] : '';
$premio = (isset($_POST['premio'])) ? $_POST['premio'] : '';
$detalles = (isset($_POST['detalles'])) ? $_POST['detalles'] : '';
$DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$montos = (isset($_POST['montos'])) ? $_POST['montos'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO vendedor (NombreyApellido,monto_fijo,DNI) VALUES('$Nombre_y_Apellido','$monto','$DNI') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM vendedor ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2: 
        $con="SELECT * FROM vendedor WHERE DNI='$DNI'"; 
        $resultado=mysqli_query($conexion,$con);
        $fila = $resultado ->fetch_assoc();   
        $montof= $fila['monto_fijo'] - $monto;
        $consulta = "UPDATE vendedor SET  monto_fijo = '$montof'  WHERE DNI='$DNI' , ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM vendedor WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM vendedor WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM vendedor";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "INSERT INTO adelantos (id_vendedor, monto) VALUES('$id','$montos') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM adelantos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;
    case 6:
        $consulta = "INSERT INTO premios (id_vendedor, monto,detalles) VALUES('$id','$premio','$detalles') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM adelantos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;