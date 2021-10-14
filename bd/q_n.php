<?php
$conexion=mysqli_connect('localhost','root','','sion');

$eleccion= "SELECT * FROM t_cuentas c where c.situacion <> 'baja'";
$resultado=mysqli_query($conexion,$eleccion);
while ($row = $resultado ->fetch_assoc()) {
    # code...
}

echo $resultado1;
?>
