<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$opcions = (isset($_POST['opcions'])) ? $_POST['opcions'] : '';


switch ($opcions) {
    case 6:
        $consulta = "SELECT * FROM t_boletas order by id_boletas desc";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    
}



print json_encode($data1, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;