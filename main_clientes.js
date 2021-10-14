$(document).ready(function() {
    var DNI, opcion;
    opcion = 4;
        
    tablaClientes = $('#tablaClientes').DataTable({
        "order": [[ 0, "desc" ]],
        "ajax":{            
            "url": "bd/crud_clientes.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "DNI"},
            {"data": "Nombre_y_Apellido"},            
            {"data": "Direccion"},
            {"data": "Fecha_de_Ingreso"},
            {"data": "Telefono_1"},
            {"data": "Telefono_2"},
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


 //inicio Clientes   
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formClientes').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        Nombre_y_Apellido = $.trim($('#Nombre_y_Apellido').val());    
        DNI = $.trim($('#DNI').val());
        Direccion = $.trim($('#Direccion').val());    
        Fecha_de_Ingreso = $.trim($('#Fecha_de_Ingreso').val());    
        Telefono_1 = $.trim($('#Telefono_1').val());
        Telefono_2 = $.trim($('#Telefono_2').val());                            
            $.ajax({
              url: "bd/crud_clientes.php",
              type: "POST",
              datatype:"json",    
              data:  { Nombre_y_Apellido:Nombre_y_Apellido, DNI:DNI, Direccion:Direccion, Fecha_de_Ingreso:Fecha_de_Ingreso, Telefono_1:Telefono_1 , Telefono_2:Telefono_2 ,opcion:opcion},    
              success: function(data) {
                tablaClientes.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');
    											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta 
        $("#formClientes").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");		            
        
        DNI = fila.find('td:eq(0)').text();
        Nombre_y_Apellido = fila.find('td:eq(1)').text();
        Direccion = fila.find('td:eq(2)').text();
        Fecha_de_Ingreso = fila.find('td:eq(3)').text();
        Telefono_1 = fila.find('td:eq(4)').text();
        Telefono_2 = fila.find('td:eq(5)').text();        
        $("#DNI").val(DNI);
        $("#Nombre_y_Apellido").val(Nombre_y_Apellido);
        $("#Direccion").val(Direccion);
        $("#Fecha_de_Ingreso").val(Fecha_de_Ingreso);
        $("#Telefono_1").val(Telefono_1);
        $("#Telefono_2").val(Telefono_2);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        DNI = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+DNI+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_clientes.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, DNI:DNI},    
              success: function() {
                  tablaClientes.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
    });
});
//fin de Cuentas