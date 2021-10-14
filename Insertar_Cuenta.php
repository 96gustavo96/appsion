<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $id = (isset($_POST['solicitud'])) ? $_POST['solicitud'] : '';
    $DNI = (isset($_POST['DNI_Clientes'])) ? $_POST['DNI_Clientes'] : '';
    $Id_Producto = (isset($_POST['Id_Productos'])) ? $_POST['Id_Productos'] : '';
    $Plan = (isset($_POST['Plan'])) ? $_POST['Plan'] : '';
    $Grupo = (isset($_POST['Grupo'])) ? $_POST['Grupo'] : '';
    $N_Sorteo = (isset($_POST['N_Sorteo'])) ? $_POST['N_Sorteo'] : '';
    $C_Cuotas = (isset($_POST['C_Cuotas'])) ? $_POST['C_Cuotas'] : '';
    $P_Cuota = (isset($_POST['valorcontado'])) ? $_POST['valorcontado'] : '';
    $Entrega = (isset($_POST['Entrega'])) ? $_POST['Entrega'] : '';
    $Precio_Total = (isset($_POST['p_cont'])) ? $_POST['p_cont'] : '';
    $Vendedor = (isset($_POST['Vendedor'])) ? $_POST['Vendedor'] : '';
    $Cobrador = (isset($_POST['Cobrador'])) ? $_POST['Cobrador'] : '';
    $Vencimiento = (isset($_POST['Vencimiento'])) ? $_POST['Vencimiento'] : '';
    $N_Cuotas = (isset($_POST['N_Cuotas'])) ? $_POST['N_Cuotas'] : '';
    $situacion = (isset($_POST['situacion'])) ? $_POST['situacion'] : '';
    $consulta="SELECT id FROM t_cuentas order by id desc limit 1";
    $resultado=mysqli_query($conexion,$consulta);
    $r= $resultado ->fetch_assoc();
    $r= $r['id']+1;
    $sql="INSERT INTO t_cuentas (id,DNI,Id_Producto,Plan,Grupo,N_Sorteo,C_Cuotas,P_Cuota,Entrega,Precio_Total,Vendedor,Cobrador,Vencimiento,N_Cuotas,situacion) VALUES ('$id','$DNI','$Id_Producto','$Plan','$Grupo','$N_Sorteo','$C_Cuotas','$P_Cuota','$Entrega','$Precio_Total','$Vendedor','$Cobrador','$Vencimiento','$N_Cuotas','$situacion') ";
    echo mysqli_query($conexion,$sql);
?>