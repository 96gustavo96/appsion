<?php
$conexion=mysqli_connect('localhost','root','','sion');

$x = (isset($_POST['x'])) ? $_POST['x'] : '';
$y = (isset($_POST['y'])) ? $_POST['y'] : '';
$z = (isset($_POST['z'])) ? $_POST['z'] : '';

$z = date("Y-m-d", strtotime($z));

$sql="SELECT * FROM t_boletas WHERE Codigo = '$x'";
$resultado=mysqli_query($conexion,$sql);

if ($z) {
    $z= $z.date(' H:i:s');
}else {
    $z=date("Y-m-d H:i:s");
}

if ($resultado->num_rows>0) {
    $fila = $resultado ->fetch_assoc();
    $sql1="UPDATE t_boletas SET situacion='Pagado' , fecha_P = '$z', L_Pago = '$y' WHERE Codigo='$x' ";
    $resultado1=mysqli_query($conexion,$sql1);
    $sql1="UPDATE t_cuentas SET situacion='Pagado' WHERE id='$fila[id]' ";
    $resultado1=mysqli_query($conexion,$sql1);
    if ($y == "Efectivo") {
        $sql1="INSERT INTO t_caja (descripcion, monto,Tipo,fecha, pago) VALUES ('Pago Boleta de Cliente: $fila[Socio], CUOTA: $fila[N_Cuota], EFECTIVO, MONTO $fila[P_Cuota]' ,$fila[P_Cuota],'ingreso','$z', '$y') ";
        $resultado1=mysqli_query($conexion,$sql1);
    }
    if ($y=="Transferencias") {
        $sql1="INSERT INTO t_caja (descripcion, monto, Tipo,fecha, pago) VALUES ('Pago Boleta de Cliente: $fila[Socio] CUOTA: $fila[N_Cuota], TRANSFERENCIA, MONTO : $fila[P_Cuota]', $fila[P_Cuota], 'ingreso','$z', '$y') ";
        $resultado1=mysqli_query($conexion,$sql1);
    }
    if ($y=="Externo") {
        $sql1="INSERT INTO t_caja (descripcion, monto, Tipo,fecha, pago) VALUES ('Pago Boleta de Cliente: $fila[Socio] CUOTA: $fila[N_Cuota], PAGO EXTERNO, MONTO : $fila[P_Cuota]', $fila[P_Cuota], 'ingreso','$z', '$y') ";
        $resultado1=mysqli_query($conexion,$sql1);
    }
    
}

echo $resultado1;
?>
