$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaCuentas = $('#tablaCuentas').DataTable({  
        "ajax":{            
            "url": "bd/crud_Cuentas_i.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "DNI"},
            {"data": "Id_Producto"},
            {"data": "Plan"},
            {"data": "Grupo"},
            {"data": "N_Sorteo"},
            {"data": "C_Cuotas"},
            {"data": "P_Cuota"},
            {"data": "Vencimiento"},
            {"data": "situacion"},
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
        id=null;
        $("#formCuentas").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');	    
    });


    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formCuentas').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        Dni = $.trim($('#DNI').val());    
        Id_Producto = $.trim($('#Id_Producto').val());
        Plan = $.trim($('#Plan').val());  
        Grupo = $.trim($('#Grupo').val());   
        N_Sorteo = $.trim($('#N_Sorteo').val()); 
        C_Cuotas = $.trim($('#C_Cuotas').val());
        P_Cuota = $.trim($('#P_Cuota').val());
        Vencimiento = $.trim($('#Vencimiento').val());                          
            $.ajax({
              url: "bd/crud_Cuentas_i.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, DNI:DNI, Id_Producto:Id_Producto, Plan:Plan, Grupo:Grupo, N_Sorteo:N_Sorteo ,C_Cuotas:C_Cuotas, P_Cuota:P_Cuota, Vencimiento:Vencimiento, opcion:opcion},    
              success: function(data) {
                tablaCuentas.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        DNI = fila.find('td:eq(1)').text();
        Id_Producto = fila.find('td:eq(2)').text();
        Plan = fila.find('td:eq(3)').text();
        Grupo = fila.find('td:eq(4)').text();
        N_Sorteo = fila.find('td:eq(5)').text();
        C_Cuotas = fila.find('td:eq(6)').text();
        P_Cuota = fila.find('td:eq(7)').text();
        Vencimiento = fila.find('td:eq(8)').text();
        $("#DNI").val(DNI);
        $("#Id_Producto").val(Id_Producto);
        $("#Plan").val(Plan);
        $("#Grupo").val(Grupo);
        $("#N_Sorteo").val(N_Sorteo);
        $("#C_Cuotas").val(C_Cuotas);
        $("#P_Cuota").val(P_Cuota);
        $("#Vencimiento").val(Vencimiento);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_Cuentas_i.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaCuentas.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
    });
});
//fin de Cuentas