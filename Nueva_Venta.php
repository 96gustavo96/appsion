<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->
<!--ingreso de venta-->

<!--iniciode Cuenta-->
<div class="container">
    <div class="formCuentas">
        <form id="formconsultar" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <!--Clientes-->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">CLIENTES</h6>
                        </div>
                        <div class="card-body">

                            <div class="input-group mb-3 ">
                                <input id="DNIBC" name="DNIBC" type="number" class="form-control" placeholder="Ingrese DNI..." aria-label="Ingrese DNI..." aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-lg" type="button" id="subconsultarclientes"><i class="fas fa-search"></i></button>
                                </div>
                                <span>&nbsp;</span>
                                <div class=" row col-lg-6">
                                    <button id="btnNuevo" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalClientes">AGREGAR NUEVO CLIENTE</button>

                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div id="resultadobusqueda"></div>
                                </div>
                            </div>
                            <div class="grub">
                                <div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Nombre y Apellido:</label>
                                                            <input type="text" class="form-control" name="Nombre_y_Apellido" id="Nombre_y_Apellido">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">DNI:</label>
                                                            <input type="text" class="form-control" name="DNI" id="DNI">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Direccion:</label>
                                                            <input type="text" class="form-control" name="Direccion" id="Direccion">
                                                        </div>
                                                    </div>
                                                </div>                                        
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Provincia o Localidad:</label>
                                                            <input type="text" class="form-control" name="ProvLocalidad" id="ProvLocalidad">
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Fecha de Ingreso:</label>
                                                            <input type="date" class="form-control" name="Fecha_de_Ingreso" id="Fecha_de_Ingreso">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Telefono 1:</label>
                                                            <input type="text" class="form-control" name="Telefono_1" id="Telefono_1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Telefono 2:</label>
                                                            <input type="number" class="form-control" name="Telefono_2" id="Telefono_2">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                <button id="btnGuardarCliente" class="btn btn-dark">Guardar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--Productos-->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">PRODUCTOS</h6>
                        </div>
                        <div class="card-body">

                            <div class="input-group mb-3 ">
                                <input id="idp" name="idp" type="text" class="form-control" placeholder="Ingrese ID..." aria-label="Ingrese ID..." aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-lg" type="button" id="subconsultarproductos"><i class="fas fa-search"></i></button>
                                </div>
                                <span>&nbsp;</span>
                                <div class=" row col-lg-6">
                                    <button id="btnNuevo2" type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modalProductos">AGREGAR NUEVO PROD.</button>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div id="resultadobusquedaproductos"></div>
                                </div>
                            </div>
                            <div class="grub">
                                <div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Nombre:</label>
                                                            <input type="text" class="form-control" name="nombre" id="nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Fecha de Ingreso:</label>
                                                            <input type="date" class="form-control" name="f_ingreso" id="f_ingreso">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Precio de Contado:</label>
                                                            <input type="text" class="form-control" name="precio_contado" id="precio_contado">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="" class="col-form-label">Precio de la Cuota:</label>
                                                            <input type="text" class="form-control" name="precio_cuotas" id="precio_cuotas">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                <button id="btnGuardarproductos" class="btn btn-dark">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="col-lg-12">
                    <!--Extras-->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">EXTRAS</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Solicitud</span>
                                        </div>
                                        <input oninput="autoCompleteNew()"  id="solicitud" name="solicitud" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Plan</span>
                                        </div>
                                        <input   id="Plan" name="Plan" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Grupo</span>
                                        </div>
                                        <input id="Grupo" name="Grupo" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>N° de Sorteo</span>
                                        </div>
                                        <input id="N_Sorteo" name="N_Sorteo" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Vendedor</label>
                                        </div>
                                        <select name="Vendedor" class="custom-select" id="inputGroupSelect01">
                                            <option id="Vendedor" selected>Seleccione...</option>
                                            <?php
                                            include 'conexion.php';

                                            $consulta = "SELECT * FROM vendedor";
                                            $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error());

                                            ?>
                                            <?php foreach ($ejecutar as $opciones) : ?>
                                                <option id="Vendedor" value="<?php echo $opciones['NombreyApellido'] ?>"><?php echo $opciones['NombreyApellido'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Cobrador</label>
                                        </div>
                                        <select name="Cobrador" class="custom-select" id="inputGroupSelect01">
                                            <option id="Cobrador" selected>Seleccione...</option>
                                            <?php
                                            include 'conexion.php';

                                            $consulta = "SELECT * FROM cobrador";
                                            $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error());

                                            ?>
                                            <?php foreach ($ejecutar as $opciones) : ?>
                                                <option id="Cobrador" value="<?php echo $opciones['NombreyApellido'] ?>"><?php echo $opciones['NombreyApellido'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>N Cuotas</span>
                                        </div>
                                        <input  id="N_Cuotas" name="N_Cuotas" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>situacion</span>
                                        </div>
                                        <input  id="situacion" name="situacion" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="dropdown-divider"></div>
                            &nbsp;
                            <div class="row">
                                <div class='col-lg-3 '>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>C. de Cuotas</span>
                                        </div>
                                        <input oninput="calcular()" id="C_Cuotas" name="C_Cuotas" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Entrega</span>
                                        </div>
                                        <input  id="Entrega" name="Entrega" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>

                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Total</span>
                                        </div>
                                        <input readonly id="Precio_Total" name="Precio_Total" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                                
                                <div class='col-lg-3'>
                                    <div class='input-group flex-nowrap'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='addon-wrapping'>Vencimiento</span>
                                        </div>
                                        <input  id="Vencimiento" name="Vencimiento" value='' type='text' class='form-control' placeholder='' aria-label='Ingrese dato' aria-describedby='addon-wrapping'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card ">
                        <button type="submit" id="btnGuardar" class="btn btn-info btn-block btn-lg">Guardar</button>
                    </div>
                </div>

        </form>
    </div>
</div>
<script type="text/javascript">
    function calcular() {
        try {
            var a = parseFloat(document.getElementById("valorcontado").value) || 0,
                b = parseFloat(document.getElementById("C_Cuotas").value) || 0;
            e = parseFloat(document.getElementById("Precio_Total").value = a * b);
        } catch (error) {}
    }


    function autoCompleteNew() {            
        var value = $.trim($('#valorCopiado').val());         
        $("#Plan").val(value.replace().toUpperCase()); 
    }
</script>


<script type="text/javascript" src="main_NVenta.js"></script>
<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>