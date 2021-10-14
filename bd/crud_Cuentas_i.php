<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
$Id_Producto = (isset($_POST['Id_Producto'])) ? $_POST['Id_Producto'] : '';
$Plan = (isset($_POST['Plan'])) ? $_POST['Plan'] : '';
$Grupo = (isset($_POST['Grupo'])) ? $_POST['Grupo'] : '';
$N_Sorteo = (isset($_POST['N_Sorteo'])) ? $_POST['N_Sorteo'] : '';
$C_Cuotas = (isset($_POST['C_Cuotas'])) ? $_POST['C_Cuotas'] : '';
$P_Cuota = (isset($_POST['P_Cuota'])) ? $_POST['P_Cuota'] : '';
$Vencimiento = (isset($_POST['Vencimiento'])) ? $_POST['Vencimiento'] : '';
$P= "Impago";


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_cuentas (DNI, Id_Producto, Plan, Grupo, N_Sorteo,C_Cuotas,P_Cuota,Vencimiento) VALUES('$DNI','$Id_Producto', '$Plan', '$Grupo','$N_Sorteo', '$C_Cuotas','$P_Cuota','$Vencimiento') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_cuentas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE t_cuentas SET DNI='$DNI', Id_Producto='$Id_Producto', Plan='$Plan', Grupo='$Grupo', N_Sorteo ='$N_Sorteo' ,  C_Cuotas='$C_Cuotas', P_Cuota='$P_Cuota', Vencimiento='$Vencimiento' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM t_cuentas WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM t_cuentas WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM t_cuentas WHERE situacion = '$P'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;