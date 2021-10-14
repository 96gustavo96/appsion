<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    
    $N_Cuenta = (isset($_POST['n_cuent'])) ? $_POST['n_cuent'] : '';
    $sql="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON c.DNI = cl.DNI WHERE id = '$N_Cuenta'";
    $sql1= "SELECT id_boletas FROM  t_boletas order by id_boletas desc limit 1 ";
    $resultado1=mysqli_query($conexion,$sql1);
    $resultado=mysqli_query($conexion,$sql);
    $salida="";

    if ($resultado->num_rows>0) {
        $fila = $resultado ->fetch_assoc();
        $fila1 = $resultado1 ->fetch_assoc();        
        $salida.="
    <div class='row'> 
        <div class='col-lg-4'style='display:none ' >
            <div class='form-group'>
                <label  class='col-form-label'>Socio:</label>
                <input value='".$fila1['id_boletas']."' type='text' class='form-control bg-light border-0 small'name='id_boletas' id='id_boletas'>
            </div>
            <div class='form-group'>
                <label  class='col-form-label'>Socio:</label>
                <input value='".$fila['id']."' type='text' class='form-control bg-light border-0 small'name='id' id='id'>
            </div>               
        </div>
        <div class='col-lg-4'>
            <div class='form-group'>
                <label class='col-form-label'>Socio:</label>
                <input value='".$fila['Nombre_y_Apellido']."' type='text' class='form-control bg-light border-0 small' name='Socio' id='Socio'>
            </div>               
        </div>
        <div class='col-lg-8'>
            <div class='form-group'>
                <label class='col-form-label'>Provincia:</label>
                <input value='".$fila['Provincia_y_Localidad']."' type='text' class='form-control bg-light border-0 small' name='Provincia' id='Provincia'>
            </div>
        </div>  
    </div>
    <div class='row'>
        <div class='col-lg-12'>
            <div class='form-group'>
            <label  class='col-form-label'>Direccion:</label>
            <input value='".$fila['Direccion']."' type='text' class='form-control bg-light border-0 small' name='Direccion' id='Direccion'>
            </div>
        </div>    
    </div>
    <div class='row'>
        <div class='col-lg-5'>    
            
            <div class='form-group'>
                <label  class='col-form-label'>Vencimiento:</label>
                <input value='".$fila['Vencimiento']."' class='form-control bg-light border-0 small' name='Vencimiento' id='Vencimiento' >
            </div>           
        </div> 
        <div class='col-lg-7'>    
            <div class='form-group'>
            <label for'' class='col-form-label'>Plan:</label>
            <input value='".$fila['Plan']."' type='text' class='form-control bg-light border-0 small' name='Plan' id='Plan'>
            </div>            
        </div> 
    </div>
    <div class='row'>
        <div class='col-lg-4'>    
            <div class='form-group'>
            <label for=' class='col-form-label'>$$:</label>
            <input value='".$fila['P_Cuota']."' type='text' class='form-control bg-light border-0 small' name='P_C' id='P_C'>
            </div>            
        </div> 
        <div class='col-lg-4'>    
            <div class='form-group'>
            <label for=' class='col-form-label'>Cantidad de Cuota:</label>
            <input value='".$fila['C_Cuotas']."' type='text' class='form-control bg-light border-0 small' name='C_Cuota' id='C_Cuota'>
            </div>            
        </div>
        <div class='col-lg-4'>    
            <div class='form-group'>
            <label for=' class='col-form-label'>N° Cuota:</label>
            <input value='".$fila['N_Cuotas']."' type='text' class='form-control bg-light  small' name='N_Cuota' id='N_Cuota'>
            </div>            
        </div> 
    </div>
        ";
    }else {
        $salida.="No hay datos:( ";

    }
    echo $salida;
?>