<?php
    $conexion=mysqli_connect('localhost','root','','sion');
    
    $id_v=$_POST['id_v'];
    $sql="SELECT * FROM vendedor v where v.id = '$id_v' ";
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
                            
                        <h5 class="link-light" id="nombreyapellido" value="'.$fila['NombreyApellido'].'">'.$fila['NombreyApellido'].'</h5>
                        <h5 class="link-light"> '.$fila['DNI'].'</h5>
                        <button class="btn btn-danger" id="categorizacion" type="button">CATEGORIZACION</button>

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
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ADELANTOS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">HORARIOS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-premios" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">PREMIOS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-licitaciones" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">LIQUIDACION</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="container">
                                <div class="row">
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre y Apellido:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Nombre_y_Apellido" value="'.$fila['NombreyApellido'].'">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">DNI:</label>
                                            <div class="col-sm-4">
                                            <input value="'.$fila['DNI'].'" type="text" class="form-control" id="DNIi">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono 1:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="Telefono_1" value="">
                                            </div>
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Monto Fijo:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Fecha_de_Ingreso" value="'.$fila['monto_fijo'].'">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="card text-center"> 
                                        <div class="row">
                                            <div class="col-4 ">
                                                <div class="card-header">
                                                <span>NUEVo ADELANTO</span><br><br>
                                                <footer class="blockquote-footer">para poder realizar un adelanto para '.$fila['NombreyApellido'].' porfavor especfica el monto<cite title="Source Title">MONTO</cite></footer>
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
                                                                <input type="number" class="form-control" id="montos_adelanto">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                            <button type="button" class="btn btn-primary adelanto" id="g_licitacion">Guardar eh Imprimir</button>
                                                            
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
                                                        <th >PERSONAL</th>
                                                        <th >MONTO DE ADELANTO</th>                       
                                                        <th >Fecha Generada</th>                           
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ';
                                                    $sql_query = "SELECT * FROM adelantos WHERE id_vendedor = $id_v order by id DESC";
                                                    $resultado1=mysqli_query($conexion,$sql_query);
                                                    while( $libro = mysqli_fetch_assoc($resultado1) ) {
                                                        $salida.='
                                                    <tr>
                                                    <td>'.$libro['id'].'</td>
                                                    <td>'.$libro['id_vendedor'].'</td>
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="container caja">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button  class="btn bg-info "id="btn-horarios" ><i class="fas fa-print"></i> IMPRIMIR HORARIOS</button>
                                    </div>
                                    <br>
                                    <div class="col-lg-6">
                                        <div class="table-responsive">        
                                            <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                                                <thead class="text-center">
                                                    <tr>            
                                                        <th >FECHA</th>
                                                        <th >DIA</th>                            
                                                        <th >HORARIO</th>                            
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ';
                                                
                                                $sql_query = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '06:00:00' and H_Ingreso < '15:00:00' and MONTH(fecha) = 9 order by id DESC";
                                                $resultado1=mysqli_query($conexion,$sql_query);
                                                #$sql_query2 = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '22:00:00' and MONTH(fecha) = MONTH(CURRENT_DATE()) order by id DESC";
                                                #$resultado2=mysqli_query($conexion,$sql_query2);
                                                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                                while ($libros = mysqli_fetch_assoc($resultado1)) {
                                                    # code...
                                                    $diae= $libros['fecha'];
                                                    $diaente= strtotime($diae);
                                                    $dia = date('N',$diaente);                                                    
                                                    $salida.='
                                                    <tr>
                                                    <td>'.$libros['fecha'].'</td>
                                                    <td>'.$dias[$dia].'</td>
                                                    <td>'.$libros['H_Ingreso'].'
                                                    ';
                                                    if ($dias[$dia]=='Sábado') {
                                                        if ($libros['H_Ingreso']>='09:15:01' && $libros['H_Ingreso']<='10:00:10') {
                                                            $salida.='
                                                            <span class="badge bg-warning text-dark">TARDE -$100</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='10:00:11' && $libros['H_Ingreso']<='13:00:00') {
                                                            $salida.='
                                                            <span class="badge bg-danger ">MUY TARDE -$500</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='09:15:00') {
                                                            $salida.='
                                                            <span class="badge bg-success ">EN HORARIO</span>
                                                            ';
                                                        }
                                                    }else {
                                                        
                                                        if ($libros['H_Ingreso']>='08:15:01' && $libros['H_Ingreso']<='09:00:10') {
                                                            $salida.='
                                                            <span class="badge bg-warning text-dark">TARDE -$100</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='09:00:11' && $libros['H_Ingreso']<='12:00:00') {
                                                            $salida.='
                                                            <span class="badge bg-danger ">MUY TARDE -$500</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='08:15:00') {
                                                            $salida.='
                                                            <span class="badge bg-success ">EN HORARIO</span>
                                                            ';
                                                        }
                                                    }
                                                    $salida.='
                                                    </td>
                                                    
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
                                                    ';                                                
                                                }
                                                
                                                    $salida.='                        
                                                </tbody>        
                                            </table>               
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="table-responsive">        
                                            <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                                                <thead class="text-center">
                                                    <tr>  
                                                        <th >FECHA</th>
                                                        <th >DIA</th>                            
                                                        <th >HORARIO</th>                            
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ';
                                                
                                                $sql_query = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '21:00:00' and MONTH(fecha) = 9 order by id DESC";
                                                $resultado1=mysqli_query($conexion,$sql_query);
                                                #$sql_query2 = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '22:00:00' and MONTH(fecha) = MONTH(CURRENT_DATE()) order by id DESC";
                                                #$resultado2=mysqli_query($conexion,$sql_query2);
                                                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                                while ($libros = mysqli_fetch_assoc($resultado1)) {
                                                    # code...
                                                    $diae= $libros['fecha'];
                                                    $diaente= strtotime($diae);
                                                    $dia = date('N',$diaente);                                                    
                                                    $salida.='
                                                    <tr>
                                                    <td>'.$libros['fecha'].'</td>
                                                    <td>'.$dias[$dia].'</td>
                                                    <td>'.$libros['H_Ingreso'].'
                                                    ';
                                                    if ($dias[$dia]=='Sábado') {
                                                        if ($libros['H_Ingreso']>='09:15:01' && $libros['H_Ingreso']<='10:00:10') {
                                                            $salida.='
                                                            <span class="badge bg-warning text-dark">TARDE -$100</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='10:00:11' && $libros['H_Ingreso']<='13:00:00') {
                                                            $salida.='
                                                            <span class="badge bg-danger ">MUY TARDE -$500</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='09:15:00') {
                                                            $salida.='
                                                            <span class="badge bg-success ">EN HORARIO</span>
                                                            ';
                                                        }
                                                    }else {
                                                        
                                                        if ($libros['H_Ingreso']>='17:15:01' && $libros['H_Ingreso']<='18:00:10') {
                                                            $salida.='
                                                            <span class="badge bg-warning text-dark">TARDE -$100</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='18:00:11' && $libros['H_Ingreso']<='21:00:00') {
                                                            $salida.='
                                                            <span class="badge bg-danger ">MUY TARDE -$500</span>
                                                            ';
                                                        }
                                                        if ($libros['H_Ingreso']>='16:00:00' && $libros['H_Ingreso']<='17:15:00') {
                                                            $salida.='
                                                            <span class="badge bg-success ">EN HORARIO</span>
                                                            ';
                                                        }
                                                    }
                                                    $salida.='
                                                    </td>
                                                    
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
                                                    ';                                                
                                                }
                                                    $salida.='                        
                                                </tbody>        
                                            </table>               
                                        </div>
                                    </div>                                    
                                </div>  
                            </div> 
                        </div>
                        <div class="tab-pane fade " id="pills-premios" role="tabpanel" aria-labelledby="pills-premios-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="card text-center"> 
                                        <div class="row">
                                                <div class="card-header">
                                                <br>
                                                <footer class="blockquote-footer">para poder asignar un premio para '.$fila['NombreyApellido'].' porfavor especfica el monto y los detalles<cite title="Source Title">MONTO</cite></footer>
                                                </div>
                                            <div class="col-12">
                                                <div class="card-body"> 
                                                    <form id="form-licitacion" method="post">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-2 mb-3 row">
                                                                <div class="form-floating mb-3">
                                                                    <input value="'.$fila['id'].'" type="hidden" class="form-control" id="id_v">
                                                                    <input  type="numer" class="form-control" id="montos_premio" placeholder="$$$">
                                                                    <label for="floatingInput">MONTO</label>
                                                                </div>    
                                                            </div>
                                                            <div class="col-lg-9 mb-3 row">
                                                                <div class="form-floating">
                                                                    <textarea  class="form-control" placeholder="Agregue un detalle del premio" id="detalles"></textarea>
                                                                    <label for="floatingTextarea">DETALLES</label>
                                                                </div>   
                                                            </div>
                                                            <div class="col-lg-1">
                                                            <button type="button" class="btn btn-primary premio btn-lg " id="g_premio"><i class="fa fa-check-circle"></i></button>
                                                            
                                                            </div>                                        
                                                    </div>
                                                    </form>                                                    
                                                </div>
                                            </div>                                    
                                        </div>  
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="table-responsive">        
                                            <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                                                <thead class="text-center">
                                                    <tr>                 
                                                        <th >#</th> 
                                                        <th >MONTO</th>                       
                                                        <th >Fecha Generada</th>                           
                                                        <th >DETALLES</th>                           
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                ';
                                                $sql_query = "SELECT * FROM premios WHERE id_vendedor = $id_v order by id DESC";
                                                $resultado1=mysqli_query($conexion,$sql_query);
                                                while( $libro = mysqli_fetch_assoc($resultado1) ) {
                                                    $salida.='
                                                <tr>
                                                <td>'.$libro['id'].'</td>
                                                <td>'.$libro['monto'].'</td>
                                                <td>'.$libro['fecha'].'</td>
                                                <td>'.$libro['detalles'].'</td>
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
                        <div class="tab-pane fade " id="pills-licitaciones" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                            <div class="row">
                            <button type="button" class="btn btn-outline-success">LIQUIDAR</button>
                            
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