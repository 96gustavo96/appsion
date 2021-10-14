<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-plus-square"></i></button>    
            </div>    
        </div>    
    </div>    
    <br>  

    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>                            
                            <th >DNI</th> 
                            <th >Nombre y Apellido</th>                               
                            <th>Direccion</th>  
                            <th>Fecha de Ingreso</th>
                            <th>Telefono 1</th>
                            <th>Telefono 2</th>                            
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
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formClientes">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-9">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre y Apellid:</label>
                    <input type="text" class="form-control" id="Nombre_y_Apellido">
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">DNI:</label>
                    <input type="text" class="form-control" id="DNI">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-9">
                    <div class="form-group">
                    <label for="" class="col-form-label">Direccion:</label>
                    <input type="text" class="form-control" id="Direccion">
                    </div>               
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">Fecha de Ingreso:</label>
                    <input type="text" class="form-control" id="Fecha_de_Ingreso">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">Telefono 1:</label>
                        <input type="text" class="form-control" id="Telefono_1">
                        </div>
                    </div>    
                    <div class="col-lg-4">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Telefono 2:</label>
                        <input type="number" class="form-control" id="Telefono_2">
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
</div>

<script type="text/javascript">
    
</script>
<script type="text/javascript" src="main_clientes.js"></script>

<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>