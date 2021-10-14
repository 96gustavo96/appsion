$(document).ready(function() {
    
    
    


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
    $("#actualizar").click(function(){
        opcion= 5;
        $.ajax({
            url: "bd/crud_Cuentas.php",
            type: "POST",
            datatype:"json",    
            data:  {opcion:opcion},    
            success: function(data) {
            tablaCuentas.ajax.reload(null, false);
            if(data!=0){
                alert("registro de cleinte ingresado con exito");
                $('#modalClientes').modal('hide');
            }else{
                alert("registro no ingresado");
            }
            }
        })	    
    });
    
    // $('#form-licitacion').submit(function(e){  
    //     opcion= 7;
    //     id = $.trim($('#id').val()); 
    //     monto = $.trim($('#monto').val()); 
    //     $.ajax({
    //         url: "bd/crud_Cuentas.php",
    //         type: "POST",
    //         datatype:"json",    
    //         data:  {id:id,monto:monto, opcion:opcion},    
    //         success: function(data) {
    //             alert ("Exitos");
    //           tablaCuentas.ajax.reload(null, false);
    //          }
    //       });			        
    //   $('#modalCRUD').modal('hide');
    // });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formCuentas').submit(function(e){   
        opcion= 2;                      
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val());    
        Nombre_y_Apellido = $.trim($('#Nombre_y_Apellido').val());
        DNI = $.trim($('#DNI').val());  
        Fecha_de_Ingreso = $.trim($('#Fecha_de_Ingreso').val());   
        Direccion = $.trim($('#Direccion').val()); 
        Provincia_y_Localidad = $.trim($('#Provincia_y_Localidad').val());
        Telefono_1 = $.trim($('#Telefono_1').val());
        Telefono_2 = $.trim($('#Telefono_2').val());
        Cobrador = $.trim($('#Cobrador').val());                          
        situacion = $.trim($('#situacion').val());    
        Id_Producto = $.trim($('#Id_Producto').val());
        Plan = $.trim($('#Plan').val());  
        Grupo = $.trim($('#Grupo').val());   
        P_Cuota = $.trim($('#P_Cuota').val()); 
        N_Cuotas = $.trim($('#N_Cuotas').val());
        N_Sorteo = $.trim($('#N_Sorteo').val());
        N_Sorteo2 = $.trim($('#N_Sorteo2').val());
        N_Sorteo3 = $.trim($('#N_Sorteo3').val());                          
        N_Sorteo4 = $.trim($('#N_Sorteo4').val());
        Vendedor = $.trim($('#Vendedor').val());                          
        Vencimiento = $.trim($('#Vencimiento').val());                          
        C_Cuotas = $.trim($('#C_Cuotas').val());                          
        Precio_Total = $.trim($('#Precio_Total').val());                          
            $.ajax({
              url: "bd/crud_Cuentas.php",
              type: "POST",
              datatype:"json",    
              data:  {Precio_Total:Precio_Total,C_Cuotas:C_Cuotas,Vencimiento:Vencimiento,id:id, Nombre_y_Apellido:Nombre_y_Apellido, DNI:DNI, Fecha_de_Ingreso:Fecha_de_Ingreso, Direccion:Direccion, Provincia_y_Localidad:Provincia_y_Localidad ,Telefono_1:Telefono_1, Telefono_2:Telefono_2, Cobrador:Cobrador, situacion:situacion,Id_Producto:Id_Producto, Plan:Plan, Grupo:Grupo, P_Cuota:P_Cuota, N_Cuotas:N_Cuotas, N_Sorteo:N_Sorteo ,N_Sorteo2:N_Sorteo2, N_Sorteo3:N_Sorteo3, N_Sorteo4:N_Sorteo4, Vendedor:Vendedor, opcion:opcion},    
              success: function(data) {
                  alert ("Exitos");
                tablaCuentas.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    
    
    
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_Cuentas.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaCuentas.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
    });

    //editar
    $(document).on("click", ".btnEditar", function(){		        
       

        fila = $(this).closest("tr");	        
        Afiliado = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
        $.ajax({
                type:"POST",
                url:"buscarcuenta.php",
                data:{Afiliado:Afiliado},
                success:function (r) {
                    $('#resultado').html(r); 
                    $(".modal-header").css("background-color", "#36b9cc");
                    $(".modal-header").css("color", "white" );
                    $(".modal-title").text("CUENTA");		
                    $('#modalCRUD').modal('show');  
                    $("#id").attr("readonly", false);    
                    $("#Nombre_y_Apellido").attr("readonly", false);
                    $("#DNI").attr("readonly", false);
                    $("#Fecha_de_Ingreso").attr("readonly", false);
                    $("#Direccion").attr("readonly", false);
                    $("#Provincia_y_Localidad").attr("readonly", false);
                    $("#Telefono_1").attr("readonly", false);
                    $("#Telefono_2").attr("readonly", false);
                    $("#Cobrador").attr("readonly", false);
                    $("#situacion").attr("readonly", false);
                    $("#Id_Producto").attr("readonly", false);
                    $("#Plan").attr("readonly", false);
                    $("#Grupo").attr("readonly", false);
                    $("#P_Cuota").attr("readonly", false);
                    $("#N_Cuotas").attr("readonly", false);
                    $("#N_Sorteo").attr("readonly", false);
                    $("#N_Sorteo2").attr("readonly", false);
                    $("#N_Sorteo3").attr("readonly", false);
                    $("#N_Sorteo4").attr("readonly", false);
                    $("#Vendedor").attr("readonly", false);                   
                }
        }) ;		   
    });

});
//fin de Cuentas