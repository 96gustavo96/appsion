<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $id_boletas = ((isset($_POST['id_boletas'])) ? $_POST['id_boletas'] : '') + 1;
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $N_Cuenta = (isset($_POST['id'])) ? $_POST['id'] : '';
    $Socio = (isset($_POST['Socio'])) ? $_POST['Socio'] : '';
    $Provincia = (isset($_POST['Provincia'])) ? $_POST['Provincia'] : '';
    $Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
    $Vencimiento = (isset($_POST['Vencimiento'])) ? $_POST['Vencimiento'] : '';
    $Plan = (isset($_POST['Plan'])) ? $_POST['Plan'] : '';
    $P_Cuota = (isset($_POST['P_C'])) ? $_POST['P_C'] : '';
    $C_Cuota = (isset($_POST['C_Cuota'])) ? $_POST['C_Cuota'] : '';
    $N_Cuota = (isset($_POST['N_Cuota'])) ? $_POST['N_Cuota'] : '';
    $sql="INSERT INTO t_boletas (Codigo,id, Socio, Provincia, Direccion, Vencimiento, Plan, P_Cuota, C_Cuotas, N_Cuota)VALUES (CONCAT($id_boletas, $N_Cuenta ),'$id', '$Socio', '$Provincia', '$Direccion', '$Vencimiento', '$Plan', '$P_Cuota', '$C_Cuota', '$N_Cuota')";
    $consulta = "UPDATE t_cuentas SET N_Cuotas= $N_Cuota, situacion ='impago'  WHERE id = $id";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo mysqli_query($conexion,$sql); 
?>