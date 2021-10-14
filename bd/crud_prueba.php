<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$Nombre_y_Apellido = (isset($_POST['Nombre_y_Apellido'])) ? $_POST['Nombre_y_Apellido'] : '';
$DNI = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
$Fecha_de_Ingreso = (isset($_POST['Fecha_de_Ingreso'])) ? $_POST['Fecha_de_Ingreso'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Provincia_y_Localidad = (isset($_POST['Provincia_y_Localidad'])) ? $_POST['Provincia_y_Localidad'] : '';
$Telefono_1 = (isset($_POST['Telefono_1'])) ? $_POST['Telefono_1'] : '';
$Telefono_2 = (isset($_POST['Telefono_2'])) ? $_POST['Telefono_2'] : '';
$Cobrador = (isset($_POST['Cobrador'])) ? $_POST['Cobrador'] : '';
$situacion = (isset($_POST['situacion'])) ? $_POST['situacion'] : '';
$Id_Producto = (isset($_POST['Id_Producto'])) ? $_POST['Id_Producto'] : '';
$Plan = (isset($_POST['Plan'])) ? $_POST['Plan'] : '';
$Grupo = (isset($_POST['Grupo'])) ? $_POST['Grupo'] : '';
$P_Cuota = (isset($_POST['P_Cuota'])) ? $_POST['P_Cuota'] : '';
$N_Cuotas = (isset($_POST['N_Cuotas'])) ? $_POST['N_Cuotas'] : '';
$N_Sorteo = (isset($_POST['N_Sorteo'])) ? $_POST['N_Sorteo'] : '';
$N_Sorteo2 = (isset($_POST['N_Sorteo2'])) ? $_POST['N_Sorteo2'] : '';
$N_Sorteo3 = (isset($_POST['N_Sorteo3'])) ? $_POST['N_Sorteo3'] : '';
$N_Sorteo4 = (isset($_POST['N_Sorteo4'])) ? $_POST['N_Sorteo4'] : '';
$Vendedor = (isset($_POST['Vendedor'])) ? $_POST['Vendedor'] : '';
$Vencimiento = (isset($_POST['Vencimiento'])) ? $_POST['Vencimiento'] : '';
$C_Cuotas = (isset($_POST['C_Cuotas'])) ? $_POST['C_Cuotas'] : '';
$Precio_Total = (isset($_POST['Precio_Total'])) ? $_POST['Precio_Total'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO t_cuentas (DNI, Id_Producto, Plan, Grupo, N_Sorteo,C_Cuotas,P_Cuota,Vencimiento,situacion) VALUES('$DNI','$Id_Producto', '$Plan', '$Grupo','$N_Sorteo', '$C_Cuotas','$P_Cuota','$Vencimiento','$situacion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM t_cuentas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE t_cuentas SET Vencimiento='$Vencimiento' , C_Cuotas='$C_Cuotas',Precio_Total='$Precio_Total', id='$id', DNI='$DNI',  Cobrador='$Cobrador', situacion='$situacion', Plan='$Plan', Grupo ='$Grupo', P_Cuota ='$P_Cuota', N_Cuotas ='$N_Cuotas', N_Sorteo ='$N_Sorteo' ,  N_Sorteo2='$N_Sorteo2', N_Sorteo3='$N_Sorteo3', N_Sorteo4='$N_Sorteo4', Vendedor='$Vendedor' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        $consulta = "UPDATE t_clientes SET  Nombre_y_Apellido='$Nombre_y_Apellido',  DNI='$DNI', Fecha_de_Ingreso='$Fecha_de_Ingreso', Direccion='$Direccion', Provincia_y_Localidad='$Provincia_y_Localidad', Telefono_1 ='$Telefono_1', Telefono_2 ='$Telefono_2' WHERE DNI='$DNI' ";		
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
        $consulta = "SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON c.DNI = cl.DNI INNER JOIN t_boletas b ON b.id = c.id where b.fecha_G >= '2021-05-01' and b.fecha_P is not null ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        //cambio de pago a impago
            $consulta="SELECT * FROM t_cuentas WHERE situacion ='pagado' limit 30";
            if ($resultado->num_rows=30) {
                $inset = "INSERT INTO t_boletas (Socio) VALUES ('$Socio')";
                $resultado = $conexion->prepare($inset);
                $resultado->execute();
            }
            


            $consulta = "UPDATE t_cuentas SET situacion='Impago' WHERE situacion = 'Pagado' limit 30";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT * FROM t_cuentas WHERE id='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;