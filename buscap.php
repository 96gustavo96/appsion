<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $id=$_POST['idp'];
    $sql="SELECT * FROM t_productos WHERE nombre LIKE '%$id%'";
    $resultado=mysqli_query($conexion,$sql);
    $salida="";

    if ($resultado->num_rows>0) {
        $fila = $resultado ->fetch_assoc();
        $salida.="
        <div class='row'>
            <div class='col-lg-4'>
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='addon-wrapping'>ID</span>
                    </div>
                    <input  readonly name='Id_Productos' id='Id_Productos' value='".$fila['Id_Producto']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                </div>
            </div>    
            <div class='col-lg-8'>    
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='addon-wrapping'>Fecha de Ingreso</span>
                    </div>
                    <input readonly value='".$fila['f_ingreso']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                </div>          
            </div>
        </div>
        <span>&nbsp;</span>
        <div class='row'>
            <div class='col-lg-12'>
                
                <div class='input-group flex-nowrap'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text' id='addon-wrapping'>Modelo</span>
                    </div>
                    <input name='valorCopiado' id='valorCopiado' readonly value='".$fila['nombre']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                </div> 
            </div> 
        </div>
        <span>&nbsp;</span>
        <div class='row'>
            
            <div class='col-lg-6' style='display: none'>    
                <div class='input-group mb-3'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' id='addon-wrapping'>Precio de contado</span>
                        </div>
                        <input id='p_cont' name='p_cont'  readonly value='".$fila['precio_contado']."' type='text' class='form-control monto' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                </div>            
            </div>
            <div class='col-lg-6'>    
                <div class='input-group mb-3'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' id='addon-wrapping'>Precio en cuotas</span>
                        </div>
                        <input id='valorcontado' name='valorcontado'  value='".$fila['precio_cuotas']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                </div>            
            </div>
        </div>
        
        
        ";
    }else {
        $salida.="No hay datos:( ";

    }
    echo $salida;
?>