<?php
        include 'conexion.php';
        
        $DNI=$_POST['DNIBC'];
        $sql="SELECT * FROM t_clientes WHERE DNI LIKE '%$DNI%'";
        $resultado=mysqli_query($conexion,$sql);
        $salida="";

        if ($resultado->num_rows>0) {
            $fila = $resultado ->fetch_assoc();
            $salida.="
            <div class='row'>
                <div class='col-lg-7'>
                    <div class='input-group flex-nowrap'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' id='addon-wrapping'>Nombre</span>
                        </div>
                        <input  readonly id='nombre' value='".$fila['Nombre_y_Apellido']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                    </div>
                </div>    
                <div class='col-lg-5'>    
                    <div class='input-group flex-nowrap'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' id='addon-wrapping'>DNI</span>
                        </div>
                        <input id='DNI_Clientes' name='DNI_Clientes' readonly value='".$fila['DNI']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                    </div>            
                </div>
            </div>
            <span>&nbsp;</span>
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='input-group flex-nowrap'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' id='addon-wrapping'>Direccion</span>
                        </div>
                        <input readonly value='".$fila['Direccion']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                    </div>
                </div> 
            </div>
            <span>&nbsp;</span>
            <div class='row'>
                
                <div class='col-lg-6'>    
                    <div class='input-group mb-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text' id='addon-wrapping'>F. de Ing.</span>
                            </div>
                            <input readonly value='".$fila['Fecha_de_Ingreso']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                    </div>            
                </div>
                <div class='col-lg-6'>    
                    <div class='input-group mb-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text' id='addon-wrapping'>Telefono</span>
                            </div>
                            <input readonly value='".$fila['Telefono_1']."' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                    </div>            
                </div>
            </div>
            
            
            ";
        }else {
            $salida.="No hay datos:( ";

        }
        echo $salida;
    ?>
