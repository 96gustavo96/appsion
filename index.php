<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->
<div class="container">
    <div class="row"> <!--INGRESOS Y GASTOS DIARIOS Y MENSUALES-->
        <div class="col-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">INGRESO DIARIO</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="ingD">
                            <?php 
                                $hoy=date("Y-m-d"); 
                                $buscar= "SELECT monto FROM t_caja WHERE Tipo = 'ingreso' AND  fecha >= '$hoy 07:00:00' AND  fecha <= '$hoy 22:00:00'";
                                $resultado=mysqli_query($mysqli,$buscar);
                                $monto=0;
                                
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    
                                    $monto = $monto + $row['monto'];
                                }
                                echo '$',$monto;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">GASTO DIARIO</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 " id="egrD">
                            <?php 
                                $hoy = date("Y-m-d");
                                $buscar= "SELECT monto FROM t_caja WHERE Tipo = 'egreso' AND  fecha >= '$hoy 07:00:00' AND  fecha <= '$hoy 22:00:00'";
                                $resultado=mysqli_query($mysqli,$buscar);
                                $monto=0;
                                
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    
                                    $monto = $monto + $row['monto'];
                                }
                                echo '$',$monto;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">INGRESO MENSUAL</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="ingM">
                            <?php 
                                $buscar= "SELECT monto FROM t_caja WHERE Tipo = 'ingreso' AND  YEAR(fecha) = YEAR(CURRENT_DATE()) AND MONTH(fecha)  = MONTH(CURRENT_DATE())";
                                $resultado=mysqli_query($mysqli,$buscar);
                                $monto=0;
                                
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    
                                    $monto = $monto + $row['monto'];
                                }
                                echo '$',$monto;
                            ?>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">GASTO MENSUAL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 " id="egrM">
                                    <?php 
                                        $buscar= "SELECT monto FROM t_caja WHERE Tipo = 'egreso' AND  YEAR(fecha) = YEAR(CURRENT_DATE()) AND MONTH(fecha)  = MONTH(CURRENT_DATE())";
                                        $resultado=mysqli_query($mysqli,$buscar);
                                        $monto=0;
                                        
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            
                                            $monto = $monto + $row['monto'];
                                        }
                                        echo '$',$monto;
                                    ?>
                            </div>
                        </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
               
    </div>
    <br> 
    <div class="row">
        <div class="col-md-auto ms-md-3">
            <a href="fpdf/caja_mensual.php" target="_blank" class="btn bg-teal btn-icon-split text-center">
                <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">CIERRRE DE CAJA MENSUAL</span>
            </a> 
        </div> 
        <div class="col-md-auto ms-md-3">
            <a href="fpdf/caja_diaria.php" target="_blank" class="btn bg-teal btn-icon-split text-center">
                <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">CIERRRE DE CAJA DIARIA</span>
            </a> 
        </div>        
        <div class="col-md-auto ms-md-3">
            <a id="q_n" target="_blank" class="btn bg-teal btn-icon-split text-center">
                <span class="icon text-white-50">
                <i class="fas fa-file-pdf"></i>
                </span>
                <span class="text">quitar numeros</span>
            </a> 
        </div>        
    </div>
    <br>                  
    
    <div class="row"><!--BOTONES DE INGRESOS Y GASTOS-->         
        <div class="col-6"><!--ingresos generales-->
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>INGRESOS GENERALES</h4>
                </div>
                <div class="card-body text-center">
                    <button id="btnNuevo" type="button" class="btn btn-success btn-circle" data-toggle="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                    </button>
                       
                    <br>
                    <div class="table-responsive">        
                        <table id="tablaCuentasI" class="table table-striped table-bordered table-condensed" style="width:100%" >
                            <thead class="text-center">
                                <tr>                 
                                    <th >#</th> 
                                    <th >description</th>
                                    <th >$</th>                            
                                    <th>ACT</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            </tbody>        
                        </table>               
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6"><!--Egresos generales-->
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>EGRESOS GENERALES</h4>
                </div>
                <div class="card-body text-center">
                    <button id="btnNuevoE" type="button" class="btn btn-danger btn-circle" data-toggle="modal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                    </button>  
                    <br>
                    <div class="table-responsive">        
                        <table id="tablaCuentasE" class="table table-striped table-bordered table-condensed" style="width:100%" >
                            <thead class="text-center">
                                <tr>                 
                                    <th >#</th> 
                                    <th >description</th>
                                    <th >$</th>                            
                                    <th>ACT</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            </tbody>        
                        </table>               
                    </div>
                </div>
                
            </div>
        </div>
        <!--MODAL-->
        <div class="modal-ingreso">
            <div class="modal fade bd-example-modal-lg" id="modalCRUDI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <form class="form" id="formCuentas">    
                        <div class="modal-body">
                            <div class="form-group">
                            
                                <label for="exampleFormControlInput1">Monto Ingresado</label>
                                <input class="form-control monto" id="monto_ingresado" type="number" placeholder="$$$">
                                
                                <label for="exampleFormControlTextarea1">Descripcion del Ingreso</label>
                                <textarea class="form-control descripcion" id="d_ingreso" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                        </div>
                    </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="main_index.js"></script>
<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>