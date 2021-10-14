
<?php
require_once "vistas/parte_superior.php";

$x = (isset($_POST['x'])) ? $_POST['x'] : '';
$mostar='';
$bajas="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON cl.DNI = c.DNI  WHERE cl.Provincia_y_Localidad LIKE '%suncho%' and c.situacion = 'baja' ";
$resultadob=mysqli_query($mysqli,$bajas);
$impago="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON cl.DNI = c.DNI  WHERE c.situacion LIKE '%BAJA%' and cl.Provincia_y_Localidad LIKE '%quimili%' and c.N_Cuotas < 24 and c.N_Cuotas >0 AND cl.Fecha_de_Ingreso <'2021-06-27 00:00:00'";
$resultadoi=mysqli_query($mysqli,$impago);
$pagado="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON cl.DNI = c.DNI  WHERE cl.Provincia_y_Localidad LIKE '%quimili%' and c.N_Cuotas = 4 ";
$resultadop=mysqli_query($mysqli,$pagado);

$baja=$resultadob->num_rows ;
$pagado=$resultadop->num_rows;

while ($fila = $resultadoi ->fetch_assoc()) {
    # code...
    $boleta= "SELECT * FROM t_boletas b WHERE b.id = '$fila[id]' AND b.fecha_P< '2021-08-28 00:00:00' and b.fecha_P >'2021-06-01 00:00:00'";
    $boletar=mysqli_query($mysqli,$boleta);
    $boleta2= "SELECT * FROM t_boletas b WHERE b.id = '$fila[id]' AND b.fecha_P< '2021-08-28 00:00:00' and b.fecha_P >'2021-07-01 00:00:00'";
    $boletar2=mysqli_query($mysqli,$boleta2);
    if ($boletar->num_rows == null) {
        /*$cambio= "UPDATE t_cuentas c set c.N_Sorteo= 0,c.N_Sorteo2= 0,c.N_Sorteo3= 0,c.N_Sorteo4= 0 WHERE c.id = '$fila[id]'";
        $cambios=mysqli_query($mysqli,$cambio);
        echo ('<h1>'.$fila['id'].' no pago durante 2 meses se LE quitO los numeros</h1>');*/

        #DAR DE BAJA
        /*$cambio= "UPDATE t_cuentas c set c.situacion= 'Baja' WHERE c.id = '$fila[id]'";
        $cambios=mysqli_query($mysqli,$cambio);
        echo ('el Cliente'.$fila['id'].'Fue dado de baja' );*/
    }else {
        /*$cambio= "UPDATE t_cuentas c set c.N_Sorteo= 0,c.N_Sorteo2= 0,c.N_Sorteo3= 0,c.N_Sorteo4= 0 WHERE c.id = '$fila[id]'";
        $cambios=mysqli_query($mysqli,$cambio);
        echo ('<h1>'.$fila['id'].' no pago durante 2 meses se tiene que quitar los numeros</h1>');*/

    }
}

$mostar.='
<div class="container">
    <div class="row"> 
        <div class="col">
            <div class="card text-center">
                <div class="card-header">
                Boletas por localidad
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Seleccione una localidad</h5>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>SELECCIONE UNA OPCION</option>
                            <option value="1">Quimili</option>
                            <option value="2">Weisburg</option>
                            <option value="3">Yuchan</option>
                            <option value="1">Otumpa</option>
                            <option value="2">Vilelas</option>
                            <option value="3">El Colorado</option>
                            <option value="1">Monte Quemado</option>
                            <option value="2">Cabure</option>
                            <option value="3">Nueva Esperanza</option>
                            <option value="1">Boqueron</option>
                            <option value="2">El Mojon</option>
                            <option value="3">Taco Pozo</option>
                            <option value="3">Telares</option>
                            <option value="1">Sumampa</option>
                            <option value="2">Pampa los Guanacos</option>
                            <option value="3">Sachayoj</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card text-white bg-success mb-3" >   
                                    <div class="card-header text-white">Activos</div>                     
                                    <div class="card-body text-white">
                                        <h5 class="card-text">0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card text-white bg-info mb-3" >   
                                    <div class="card-header text-white">Impagos</div>                     
                                    <div class="card-body text-white">
                                        <h5 class="card-text">0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card text-white bg-danger mb-3" > 
                                    <div class="card-header text-white">Baja</div>                       
                                    <div class="card-body text-white">
                                        <h5 class="card-text">0</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <br>
    </div>
    <div class="row">
        <div class="bd-example">
            <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Info. Personal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Info. Cuenta</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Boletas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-licitaciones" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Licitaciones</button>
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container">
                        <div class="row">
                                
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Direccion" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Direccion" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Direccion" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Direccion" value="">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container">
                        <div class="row">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-1 col-form-label">Registro:</label>
                                    <div class="col-sm-2">
                                        <input redonly type="text" class="form-control" id="id" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Plan:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="Plan" value="">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Precio porc.:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="Precio_Total" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Precio porc.:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="Precio_Total" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Precio porc.:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="Precio_Total" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Precio porc.:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="Precio_Total" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    
                                    
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 4:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="N_Sorteo4" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 4:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="N_Sorteo4" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 4:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="N_Sorteo4" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 4:</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="N_Sorteo4" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Vendedor:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="Vendedor" value="">
                                    </div>
                                    <label  class="col-sm-2 col-form-label">Cobrador:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="Cobrador" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Vencimiento:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="Vencimiento" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Situacion:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="situacion" value="">
                                    </div>
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Cant. Cuotas:</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="C_Cuotas" value="">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="container caja">
                        <div class="row">
                            <div class="col">
                            <button class="btn bg-info"><i class="fas fa-plus"></i></button>
                            </div>
                            <br>
                            <div class="col-lg-12">
                            <div class="table-responsive">        
                                <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                                    <thead class="text-center">
                                        <tr>                 
                                            <th >#</th> 
                                            <th >Codigo</th>
                                            <th >Cuenta</th>
                                            <th >Precio Cuota</th>
                                            <th >Nº Cuota</th>                            
                                            <th >Situacion</th>                            
                                            <th >Fecha Generada</th>
                                            <th >F. Pagada</th>                            
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button id="" class="btn btn-info btn-sm btnVisualizar">
                                                        <i class="material-icons fas fa-eye"></i>
                                                    </button>                                                
                                                    <button id="" class="btn btn-danger btn-sm btnBorrar">
                                                        <i class="material-icons fas fa-trash"></i>
                                                    </button>
                                                </div>
                                        </div></td></tr>                       
                                    </tbody>        
                                </table>               
                            </div>
                            </div>
                        </div>  
                    </div> 
                </div>
                <div class="tab-pane fade " id="pills-licitaciones" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container">
                        
                        <div class="ro">
                        <!-- Button trigger modal -->
                            <div class="card text-center"> 
                                <div class="row">
                                    <div class="col-4 ">
                                        <div class="card-header">
                                        <span>NUEVA LICITACION</span><br><br>
                                        <footer class="blockquote-footer">Para realizar la licitacion necesitas un <cite title="Source Title">MONTO</cite></footer>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body"> 
                                            <form id="form-licitacion" method="post">
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-7 mb-3 row">                                            
                                                    <label for="inputLicitacio" class="col-sm-3 col-form-label">MONTO</label>
                                                        <div class="col-sm-9">
                                                        <input value="" type="hidden" class="form-control" id="id-c">
                                                        <input type="number" class="form-control" id="montos">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                    <button type="button" tipe class="btn btn-primary licitacion" id="g_licitacion">Guardar eh Imprimir</button>
                                                    
                                                    </div>                                        
                                            </div>
                                            </form>                                                    
                                        </div>
                                    </div>                                    
                                </div>  
                            </div><br>
                            <div class="col-lg-12">
                                <div class="table-responsive">        
                                    <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                                        <thead class="text-center">
                                            <tr>                 
                                                <th >#</th> 
                                                <th >Cuenta</th>
                                                <th >MONTO DE LICITACION</th>                       
                                                <th >Fecha Generada</th>                           
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <button id="" class="btn btn-info btn-sm btnVisualizar">
                                                            <i class="material-icons fas fa-eye"></i>
                                                        </button>                                                
                                                        <button id="" class="btn btn-danger btn-sm btnBorrar">
                                                            <i class="material-icons fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                            </div></td></tr>
                                                                
                                        </tbody>        
                                    </table>               
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
';

/*
while ($fila = $resultadop ->fetch_assoc()) {
    $boleta= "SELECT * FROM t_boletas b WHERE b.id = '$fila[id]' and b.N_Cuota = 4 and b.situacion= 'impago' order by b.id_boletas desc limit 1";
    $boletar=mysqli_query($mysqli,$boleta);
    if ($boletar->num_rows == null) {
        echo ('<h1> '.$fila['id'].' EL cliente se tiene que dar de baja</h1>');
        $mostar.='
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        El Cliente '.$fila['Nombre_y_Apellido'].' tiene su cuota '.$fila['N_Cuotas'].' situacion '.$fila['situacion'].'.
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        ';
    }else {
        echo ('<h1>'.$fila['id'].' al cliente se  le tiene que dar el numero</h1>');
    }
}
*/
echo $mostar;
require_once "vistas/parte_inferior.php";
?>
