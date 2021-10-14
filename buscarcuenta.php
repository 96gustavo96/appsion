<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    $id=$_POST['Afiliado'];
    $sql="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON c.DNI = cl.DNI WHERE c.id = '$id' ";
    $resultado=mysqli_query($conexion,$sql);

    $salida="";

    if ($resultado->num_rows>0) {
        $fila = $resultado ->fetch_assoc();
        $salida.='

        <div class="modal-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">                                            
                        <div class="usuario" style="height: 150px;">
                            <img style="height: 130px;"  src="perfil.jpg"  class="rounded-circle img-thumbnail" alt="..."><br><span class="badge rounded-pill bg-success">ACTIVO</span>
                        </div>
                            
                        <h5 class="link-light">'.$fila['Nombre_y_Apellido'].' <br> '.$fila['DNI'].'</h5>
                    </div>
                </div>
                
            </div>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre y Apellido:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Nombre_y_Apellido" value="'.$fila['Nombre_y_Apellido'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">DNI:</label>
                                            <div class="col-sm-4">
                                            <input value="'.$fila['DNI'].'" type="text" class="form-control" id="DNI">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono 1:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="Telefono_1" value="'.$fila['Telefono_1'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono 2:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="Telefono_2" value="'.$fila['Telefono_2'].'">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha de Ingreso:</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" id="Fecha_de_Ingreso" value="'.$fila['Fecha_de_Ingreso'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Localidad y Provincia:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Provincia_y_Localidad" value="'.$fila['Provincia_y_Localidad'].'">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="Direccion" value="'.$fila['Direccion'].'">
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
                                                <input redonly type="text" class="form-control" id="id" value="'.$fila['id'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Plan:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="Plan" value="'.$fila['Plan'].'">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Grupo:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="Grupo" value="'.$fila['Grupo'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Cuotas Generadas:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="N_Cuotas" value="'.$fila['N_Cuotas'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Precio:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="P_Cuota" value="'.$fila['P_Cuota'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Precio porc.:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="Precio_Total" value="'.$fila['Precio_Total'].'">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 1:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="N_Sorteo" value="'.$fila['N_Sorteo'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 2:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="N_Sorteo2" value="'.$fila['N_Sorteo2'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 3:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="N_Sorteo3" value="'.$fila['N_Sorteo3'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-1 col-form-label">Sorteo 4:</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="N_Sorteo4" value="'.$fila['N_Sorteo4'].'">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Vendedor:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Vendedor" value="'.$fila['Vendedor'].'">
                                            </div>
                                            <label  class="col-sm-2 col-form-label">Cobrador:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Cobrador" value="'.$fila['Cobrador'].'">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Vencimiento:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="Vencimiento" value="'.$fila['Vencimiento'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Situacion:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="situacion" value="'.$fila['situacion'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Cant. Cuotas:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="C_Cuotas" value="'.$fila['C_Cuotas'].'">
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
                                                ';
                                                $sql_query = "SELECT * FROM t_boletas WHERE id = $id order by N_Cuota DESC";
                                                $resultado1=mysqli_query($conexion,$sql_query);
                                                while( $libro = mysqli_fetch_assoc($resultado1) ) {
                                                    $salida.='
                                                <tr>
                                                <td>'.$libro['id_boletas'].'</td>
                                                <td>'.$libro['Codigo'].'</td>
                                                <td>'.$libro['id'].'</td>
                                                <td>'.$libro['P_Cuota'].'</td>
                                                <td>'.$libro['N_Cuota'].'</td>
                                                <td>'.$libro['situacion'].'</td>
                                                <td>'.$libro['fecha_G'].'</td>
                                                <td>'.$libro['fecha_P'].'</td>
                                                <td>
                                                    <div class="text-center">
                                                        <div class="btn-group">
                                                            <button id="'.$libro['id_boletas'].'" class="btn btn-info btn-sm btnVisualizar">
                                                                <i class="material-icons fas fa-eye"></i>
                                                            </button>                                                
                                                            <button id="'.$libro['id_boletas'].'" class="btn btn-danger btn-sm btnBorrar">
                                                                <i class="material-icons fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                </div></td></tr>
                                                '; }  $salida.='                        
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
                                                                <input value="'.$fila['id'].'" type="hidden" class="form-control" id="id-c">
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
                                                    ';
                                                    $sql_query = "SELECT * FROM t_licitaciones WHERE id_cuenta = $id order by id DESC";
                                                    $resultado1=mysqli_query($conexion,$sql_query);
                                                    while( $libro = mysqli_fetch_assoc($resultado1) ) {
                                                        $salida.='
                                                    <tr>
                                                    <td>'.$libro['id'].'</td>
                                                    <td>'.$libro['id_cuenta'].'</td>
                                                    <td>'.$libro['monto'].'</td>
                                                    <td>'.$libro['fecha'].'</td>
                                                    <td>
                                                        <div class="text-center">
                                                            <div class="btn-group">
                                                                <button id="'.$libro['id'].'" class="btn btn-info btn-sm btnVisualizar">
                                                                    <i class="material-icons fas fa-eye"></i>
                                                                </button>                                                
                                                                <button id="'.$libro['id'].'" class="btn btn-danger btn-sm btnBorrar">
                                                                    <i class="material-icons fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                    </div></td></tr>
                                                    '; }  $salida.='                        
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
    }else {
        $salida.='No hay datos:( ';

    }
    echo $salida;
?>