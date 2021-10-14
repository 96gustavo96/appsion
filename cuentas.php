<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->

<!--inicio de cuerpo-->

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-plus-square"></i></button>    
            <a href="fpdf/index2.php" id="btnpdf"  target="_blank" type="button" class="btn btn-warning" data-toggle="modal"><i class="material-icons fas fa-file-pdf"></i></a>    
            <button id="actualizar" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-sync-alt"></i>  Actualizar las Cuentas</button>    

            </div>    
        </div>    
    </div>    
    <br>  

    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaCuentas" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>                 
                            <th >Registro</th> 
                            <th >DNI</th>
                            <th >Nombre y Apellido</th> 
                            <th >cuota generada</th>
                            <th >Plan</th>
                            <th>Pr. Cuotas</th>
                            <th>S</th>                            
                            <th>Dir.</th>                            
                            <th>Loc.</th>                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   


<!--Modal para CRUD-->
<div class="modal fade bd-example-modal-lg" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            
        <form id="formCuentas">    
            <div id="resultado"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>


<!--Modal para CRUD
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCuentas">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="" class="col-form-label">DNI Cliente:</label>
                            <input type="text" class="form-control" id="DNI">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="" class="col-form-label">ID Producto:</label>
                            <input type="text" class="form-control" id="Id_Producto">
                        </div> 
                    </div> 
                    <div class="col-lg-6">
                    <label for="" class="col-form-label">Situacion:</label>
                        <select name="situacion" class="custom-select" id="situacion">
                            <option  value ="Impago"selected>Impago</option>
                            <option   value ="Pagado">Pagado</option>                                            
                        </select>
                    </div>   
                </div>
                <div class="row"> 
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Plan:</label>
                            <input type="text" class="form-control" id="Plan">
                        </div>               
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Grupo:</label>
                            <input type="text" class="form-control" id="Grupo">
                        </div>               
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="" class="col-form-label">Numero de Sorteo:</label>
                    <input type="text" class="form-control" id="N_Sorteo">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">Cantidad de Cuotas:</label>
                        <input type="text" class="form-control" id="C_Cuotas">
                        </div>
                    </div>    
                    <div class="col-lg-4">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Precio Cuota:</label>
                        <input type="number" class="form-control" id="P_Cuota">
                        </div>            
                    </div> 
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">Vencimiento:</label>
                        <input type="text" class="form-control" id="Vencimiento">
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>-->

<script language="javascript" type="text/javascript">  
        $(document).ready(function() 
            {    
           
              $('#txthotelname').keypress(function(e){   
               if(e.which == 13){ 
                x = $("#txthotelname").val();
                if (x == 15) {
                    alert("es 15");
                }
                $('input[name=checkListItem').val('');
               }   
              });    
              
           });  
    </script>
<script type="text/javascript" src="main_cuenta.js"></script>
<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>