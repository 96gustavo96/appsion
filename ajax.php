<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_boletas= (isset($_POST['id_boletas'])) ? $_POST['id_boletas'] : '';
$acion = (isset($_POST['accion'])) ? $_POST['accion'] : '';


$consulta = "SELECT * FROM t_boletas WHERE id_boletas LIKE  '$id_boletas'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();        
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;