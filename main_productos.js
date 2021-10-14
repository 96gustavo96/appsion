$(document).ready(function() {
    var Id_Producto, opcion;
    opcion = 4;
        
    tablaProductos = $('#tablaProductos').DataTable({  
        "ajax":{            
            "url": "bd/crud_productos.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "Id_Producto"},
            {"data": "nombre"},
            {"data": "f_ingreso"},
            {"data": "precio_contado"},
            {"data": "precio_cuotas"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons fas fa-pen-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons fas fa-trash'></i></button></div></div>"}
        ],
            //Para cambiar el lenguaje a español
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            }
    });
    


    //inicio de productos

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        iId_Productod=null;
        $("#forProductos").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');	    
    });


    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formProductos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());    
        f_ingreso = $.trim($('#f_ingreso').val());
        precio_contado = $.trim($('#precio_contado').val());    
        precio_cuotas = $.trim($('#precio_cuotas').val());                             
            $.ajax({
              url: "bd/crud_Productos.php",
              type: "POST",
              datatype:"json",    
              data:  {Id_Producto:Id_Producto, nombre:nombre, f_ingreso:f_ingreso, precio_contado:precio_contado, precio_cuotas:precio_cuotas ,opcion:opcion},    
              success: function(data) {
                tablaProductos.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        Id_Producto = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        nombre = fila.find('td:eq(1)').text();
        f_ingreso = fila.find('td:eq(2)').text();
        precio_contado = fila.find('td:eq(3)').text();
        precio_cuotas = fila.find('td:eq(4)').text();
        $("#nombre").val(nombre);
        $("#f_ingreso").val(f_ingreso);
        $("#precio_contado").val(precio_contado);
        $("#precio_cuotas").val(precio_cuotas);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        nombre = parseInt($(this).closest('tr').find('td:eq(1)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+nombre+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_Productos.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, nombre:nombre},    
              success: function() {
                  tablaProductos.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
    });
});
//fin de Cuentas