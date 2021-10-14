<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <input type="text" class="form-control" id="txthotelname" name="checkListItem">
            </div>
            <div class="col-lg-9">                
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
                            <th>#</th> 
                            <th>Fecha</th>                               
                            <th>Nombre y Apellido</th>  
                            <th>DNI</th>
                            <th>Horario de Ingreso</th>                              
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formClientes">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2">
                    <div class="form-group">
                    <label for="" class="col-form-label">DNI:</label>
                    <input type="text" class="form-control" id="DNI">
                    </div>
                    </div>
                    <div class="col-lg-5">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre y Apellido:</label>
                    <input type="text" class="form-control" id="Nombre_y_Apellido">
                    </div> 
                    </div>    
                    <div class="col-lg-5">
                    <div class="form-group">
                    <label for="" class="col-form-label"> Direccion:</label>
                    <input type="text" class="form-control" id="Direccion">
                    </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Loc. y Prov.:</label>
                    <input type="text" class="form-control" id="Localidad_y_Provincia">
                    </div>               
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">F. de Nac.:</label>
                    <input type="date" class="form-control" id="F_Nacimiento">
                    </div>
                    </div> 
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">Tipo:</label>
                    <input type="text" class="form-control" id="Tipo">
                    </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                        <label for="" class="col-form-label">Telefono 1:</label>
                        <input type="number" class="form-control" id="Telefono_1">
                        </div>
                    </div>    
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Telefono 2:</label>
                        <input type="number" class="form-control" id="Telefono_2">
                        </div>            
                    </div> 
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label"> Email:</label>
                        <input type="text" class="form-control" id="Email">
                        </div>            
                    </div>
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="" class="col-form-label">F. de Ing.:</label>
                        <input type="date" class="form-control" id="Fecha_de_Ingreso">
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

<script language="javascript" type="text/javascript">  
        $(document).ready(function()   {   
              $('#txthotelname').keypress(function(e){   
               if(e.which == 13){ 
                    x = $("#txthotelname").val();
                    $.ajax({
                        url: "bd/asistencia.php",
                        type: "POST",
                        datatype:"json",    
                        data:  {x:x},    
                            success: function(resultado1) {
                                alert("REGISTRO HORARIO INGRESADO");
                                $('input[name=checkListItem').val('');
                            }
                        });
                        
               }   
              });    
              
           });  
    </script>

<script type="text/javascript" src="main_asistencia.js"></script>

<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>