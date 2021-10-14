<?php
$conexion=mysqli_connect('localhost','root','','sion');


$x = (isset($_POST['x'])) ? $_POST['x'] : '';
$sql="SELECT * FROM vendedor WHERE DNI = $x";
$resultado=mysqli_query($conexion,$sql);
$fila = $resultado ->fetch_assoc();
date_default_timezone_set('America/Argentina/Tucuman');  
$hoy = date("H:i:s");

if ($hoy>='08:15:00' and $hoy <='09:30:00') {
    $M_D=$fila['monto_fijo'] - 100;
    $sql2="UPDATE vendedor SET monto_fijo = '$M_D' WHERE DNI = $x";
    $resultado2=mysqli_query($conexion,$sql2);
}
if ($hoy>='09:30:01' and $hoy <='14:00:00') {
    $M_D=$fila['monto_fijo'] - 500;
    $sql2="UPDATE vendedor SET monto_fijo = '$M_D' WHERE DNI = $x";
    $resultado2=mysqli_query($conexion,$sql2);
}
if ($hoy>='18:15:00' and $hoy <='19:30:00') {
    $M_D=$fila['monto_fijo'] - 100;
    $sql2="UPDATE vendedor SET monto_fijo = '$M_D' WHERE DNI = $x";
    $resultado2=mysqli_query($conexion,$sql2);
}
if ($hoy>='19:30:01' and $hoy <='22:00:00') {
    $M_D=$fila['monto_fijo'] - 500;
    $sql2="UPDATE vendedor SET monto_fijo = '$M_D' WHERE DNI = $x";
    $resultado2=mysqli_query($conexion,$sql2);
}


$sql1="INSERT INTO t_asistencia(fecha, DNI,Nombre_y_Apellido,H_Ingreso) VALUES (CURDATE(), $x,'$fila[NombreyApellido]', CURTIME()) ";
$resultado1=mysqli_query($conexion,$sql1);


echo $resultado1;
?>