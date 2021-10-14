<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $Nombre_y_Apellido = (isset($_POST['Nombre_y_Apellido'])) ? $_POST['Nombre_y_Apellido'] : '';
    $DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
    $Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
    $ProvLocalidad = (isset($_POST['ProvLocalidad'])) ? $_POST['ProvLocalidad'] : '';
    $Fecha_de_Ingreso = (isset($_POST['Fecha_de_Ingreso'])) ? $_POST['Fecha_de_Ingreso'] : '';
    $Telefono_1 = (isset($_POST['Telefono_1'])) ? $_POST['Telefono_1'] : '';
    $Telefono_2 = (isset($_POST['Telefono_2'])) ? $_POST['Telefono_2'] : '';
    $sql="INSERT INTO t_clientes (Nombre_y_Apellido, DNI, Direccion, Provincia_y_Localidad, Fecha_de_Ingreso, Telefono_1, Telefono_2) VALUES('$Nombre_y_Apellido', '$DNI', '$Direccion', '$ProvLocalidad', '$Fecha_de_Ingreso', '$Telefono_1', '$Telefono_2') ";
    echo mysqli_query($conexion,$sql); 
?>