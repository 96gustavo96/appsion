<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_boletas= (isset($_POST['id_boletas'])) ? $_POST['id_boletas'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$Socio = (isset($_POST['Socio'])) ? $_POST['Socio'] : '';
$Provincia = (isset($_POST['Provincia'])) ? $_POST['Provincia'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Vencimiento = (isset($_POST['Vencimiento'])) ? $_POST['Vencimiento'] : '';
$Plan = (isset($_POST['Plan'])) ? $_POST['Plan'] : '';
$P_Cuota = (isset($_POST['P_Cuota'])) ? $_POST['P_Cuota'] : '';
$N_Cuota = (isset($_POST['N_Cuota'])) ? $_POST['N_Cuota'] : '';
$C_Cuotas = (isset($_POST['C_Cuotas'])) ? $_POST['C_Cuotas'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_boletas (id, Socio, Provincia, Direccion, Vencimiento, Plan,P_Cuota,C_Cuotas, N_Cuota) VALUES('$id','$Socio', '$Provincia', '$Direccion', '$Vencimiento', '$Plan', '$P_Cuota','$C_Cuotas','$N_Cuota') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_boletas ORDER BY id_boletas DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE t_boletas SET  id='$id',  Socio='$Socio', Provincia='$Provincia', Direccion='$Direccion', Vencimiento='$Vencimiento', Plan='$Plan', P_Cuota='$P_Cuota',C_Cuotas='$C_Cuotas', N_Cuota='$N_Cuota' WHERE id_boletas='$id_boletas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();       
        
        $consulta = "SELECT * FROM t_boletas WHERE id_boletas='$id_boletas' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM t_boletas WHERE id_boletas='$id_boletas' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM t_boletas order by id_boletas desc";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;