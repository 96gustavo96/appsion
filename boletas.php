<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->

<div class="container">
        <div class="row">
        
            <div class="col-lg-6">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-plus-square"></i></button>    
            <button id="P_Boletas" type="button" class="btn btn-success" data-toggle="modal" data-bs-target="#exampleModal1"><i class="material-icons fas fa-file-pdf"></i></button>    
            <a href="fpdf/index2.php" type="submit" target="_blank" class="btn btn-danger" id="btn-imrimir">imprimir</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal</button>        
</div>    
    </div>    
    <br>  

    <div class="container caja">
        <div class="row">
            <form id="form_boletas" method="post">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaBoletas" class="table table-striped table-bordered table-condensed" style="width:100%" >
                            <thead class="text-center">
                                <tr>                            
                                    <th >Codigo</th> 
                                    <th >ID</th> 
                                    <th >Cuenta</th>
                                    <th >Socio</th>                               
                                    <th>Provincia</th>  
                                    <th>Direccion</th>
                                    <th>Vto.</th>
                                    <th>Plan</th>                            
                                    <th>P. Cuota</th>
                                    <th>Nº Cuota</th>
                                    <th>C. Cuota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            </tbody>        
                        </table>               
                    </div>
                </div>
            </form>
        </div>  
    </div>   

<!-- Modal -->
<div class="modal fade" id="modal_pagos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pagar Boletas Masivas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tipo de Pago</label>
                                    </div>
                                    <select name="Cobrador" class="custom-select" id="inputGroupSelect01">
                                                                              
                                        <option id="" value="Transferencias">Transferencias</option>                                       
                                        <option id="" value="Efectivo" selected>Efectivo</option>                                       
                                        <option id=""  value="Externo">Cobranza externa</option>                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class='col-lg-12'>
                                <div class='input-group flex-nowrap'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text' id='addon-wrapping'>ingrese el codigo de la Boleta</span>
                                    </div>
                                    <input id="txthotelname" name="checkListItem" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>         
</div>
<!--modal boletas por localidad-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">GENERAR BOLETAS POR LOCALIDAD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">      
                <!-- <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">        
                        <div class="form-floating">                
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">                
                                                                                                  
                            </select>
                            <label for="floatingSelect">LOCALIDAD</label>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <br>
                        <figure class="text-center">                
                            <figcaption class="blockquote-footer">
                            SE OBTIENE LOS DATOS DE LOS CLIENTES PAGADOS EHH IMPAGOS CON ELLO SE  GENERA LA PROXIMA BOOLETA  
                            O DIRECTAMENTE SE QUITAN LOS NUMEROS Y TAMBIEN SE DA DE BAJA AL CLIENTE QUE NO PAGO EN 90 DIAS
                            HABILES
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-1"></div>
                </div> --> 
                <div class="row">
                
                <?php 
                    $buscar= "SELECT * FROM t_cuentas c inner join t_clientes cl on c.DNI = cl.DNI where c.situacion!= 'baja' and c.N_Cuotas = 1 order by b.fecha_P desc";
                    $resultado=mysqli_query($mysqli,$buscar); 
                    $d10=0;
                    $a10=0;
                    $monto=0;
                    $c=000;
                    $x = str_pad($c, 3, "0", STR_PAD_LEFT);
                    echo $x;
                    while ($x <= 999) {
                        $x=$x+1;
                        $x = str_pad($x, 3, "0", STR_PAD_LEFT);
                        $row = mysqli_fetch_assoc($resultado);
                        
                        echo ('
                        <h6>'.$x.'</h6><br>
                        ');
                    }
                    
                ?> 
                <!--<?php 
                    $buscar= "SELECT b.Socio, b.id, b.N_Cuota, b.fecha_P, c.situacion FROM t_boletas b inner join t_cuentas c on b.id = c.id where b.fecha_P >='2021-04-01 00:00:00' and c.u_fecha_p < '2021-05-01 00:00:00' and c.situacion!= 'baja'order by b.fecha_P desc";
                    $resultado=mysqli_query($mysqli,$buscar); 
                    $d10=0;
                    $a10=0;
                    $monto=0;
                    
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        
                        if ($row['fecha_P'] >= '2021-04-01 00:00:00' && $row['fecha_P'] <= '2021-04-10 23:59:00') {
                            $a10 = $a10 +1;
                            /*$ponerfec="UPDATE t_cuentas c set c.u_fecha_p ='$row[fecha_P]' , c.situacion = 'Baja' where c.id = '$row[id]'";
                            $resu=mysqli_query($mysqli,$ponerfec); */
                            $monto.='
                            <div class="row">
                                <div class="col-lg-3 border-primary">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="'.$row['Socio'].'">
                                        <label for="floatingInput">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-lg-1 border-primary">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="'.$row['id'].'">
                                        <label for="floatingInput">Plan</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 border-primary">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="'.$row['N_Cuota'].'">
                                        <label for="floatingInput">Nº Cuota</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 border-primary">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="'.$row['fecha_P'].'">
                                        <label for="floatingInput">Fecha Pago</label>
                                    </div>
                                </div>
                                <div class="col-lg-3 border-primary">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" value="'.$row['situacion'].'">
                                        <label for="floatingInput">Fecha Pago</label>
                                    </div>
                                </div>
                            </div>
                            ';
                        }else {
                            
                            $d10 =$d10 +1;
                            /*$ponerfec="UPDATE t_cuentas c set c.u_fecha_p ='$row[fecha_P]' , c.situacion='Baja' where c.id = '$row[id]'";
                            $resu=mysqli_query($mysqli,$ponerfec); */
                            
                        }
                        
                    }
                    $monto.='
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">        
                        <button type="button" class="btn btn-primary position-relative">
                            clientes pagos hasta el 10
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                '.$a10.'
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div> 
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary position-relative">
                            clientes pagos despues del 10
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                '.$d10.'
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button> 
                    </div>
                    <div class="col-lg-3"></div>
                         
                        ';
                    echo $monto;
                ?> -->
                </div>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info" id="G_ordenes">Generar</button>
            </div>
        </div>
    </div>
</div>
<!--modal nueva boleta-->

<div class="modal fade" id="modalBoleta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formNboleta">    
            <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="input-group">
                                <input name="n_cuent" id="n_cuent" type="text" class="form-control bg-light  small" placeholder="Buscar Cuenta...">
                                <div class="input-group-append">
                                    <button id="consultarboletas" class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>                                                    
                        </div>
                    </div>
                    <div class="container">
                        
                        <div class="row">
                            <div id="resultadobusqueda"></div>
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardarBoleta" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>

<script language="javascript" type="text/javascript">  
        $(document).ready(function() 
            {    
                
                $("#P_Boletas").click(function(){                
                    $('#modal_pagos').modal('show');	    
                });
                $("#G_ordenes").click(function(){                
                    x = $("#LOCALIDAD").val();
                    $.ajax({
                    url: "bd/G_BOLETA.php",
                    type: "POST",
                    datatype:"json",    
                    data:  {x:x},    
                        success: function(resultado1) {
                            alert("boleta Pagada");
                        }
                    }); 
                });
                $("#G_Boletas").click(function(){                
                    $('#modalBoletalocalidad').modal('show');	    
                });
              $('#txthotelname').keypress(function(e){   
               if(e.which == 13){ 
                x = $("#txthotelname").val();
                y = $("#inputGroupSelect01").val();
                
                $.ajax({
                url: "bd/p_boleta.php",
                type: "POST",
                datatype:"json",    
                data:  {x:x,y:y},    
                    success: function(resultado1) {
                        alert("boleta Pagada");
                    }
                });
                $('input[name=checkListItem').val('');
               }   
              });    
              
           });  
    </script>
<script type="text/javascript" src="main_boletas.js"></script>



<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>