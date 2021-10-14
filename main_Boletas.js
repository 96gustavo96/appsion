$(document).ready(function() {
    var id_boletas, opcion;
    opcion = 4;
        
    tablaBoletas = $('#tablaBoletas').DataTable({  
        "order": [[ 0, "desc" ]],
        "ajax":{            
            "url": "bd/crud_boletas.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "Codigo"},
            {"data": "id_boletas"},
            {"data": "id"},
            {"data": "Socio"},            
            {"data": "Provincia"},
            {"data": "Direccion"},
            {"data": "Vencimiento"},
            {"data": "Plan"},
            {"data": "P_Cuota"},
            {"data": "N_Cuota"},
            {"data": "C_Cuotas"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button  type='button' class='btn btn-info btn-sm btnpdf'><i class='material-icons fas fa-file-pdf'></i></button><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons fas fa-pen-square'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons fas fa-trash'></i></button></div></div>"}
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
    $('#form-editar').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val());    
        Socio = $.trim($('#Socio').val());
        Provincia = $.trim($('#Provincia').val());    
        Direccion = $.trim($('#Direccion').val());    
        Vencimiento = $.trim($('#Vencimiento').val());
        Plan = $.trim($('#Plan').val()); 
        P_Cuota = $.trim($('#P_Cuota').val());
        N_Cuota = $.trim($('#N_Cuota').val()); 
        C_Cuotas = $.trim($('#C_Cuotas').val());                           
            $.ajax({
              url: "bd/crud_boletas.php",
              type: "POST",
              datatype:"json",    
              data:  {id_boletas:id_boletas, id:id, Socio:Socio, Provincia:Provincia, Direccion:Direccion, Vencimiento:Vencimiento , Plan:Plan , P_Cuota:P_Cuota, C_Cuotas:C_Cuotas, N_Cuota:N_Cuota, opcion:opcion},    
              success: function(data) {
                tablaBoletas.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');
    											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta 
        id_boletas = null;
        $("#formNboletas").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalBoleta').modal('show');	    
    });
    


    //Editar        
    $(document).on("click", ".btnEditar", function(e){
        e.preventDefault();
        opcion = 2;//editar
        fila = $(this).closest("tr");		            
        id_boletas = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
        id = fila.find('td:eq(1)').text();
        Socio = fila.find('td:eq(2)').text();
        Provincia = fila.find('td:eq(3)').text();
        Direccion = fila.find('td:eq(4)').text();
        Vencimiento = fila.find('td:eq(5)').text();
        Plan = fila.find('td:eq(6)').text();
        P_Cuota = fila.find('td:eq(7)').text();
        N_Cuota = fila.find('td:eq(8)').text();
        C_Cuota = fila.find('td:eq(9)').text();       
        $("#id").val(id);
        $("#Socio").val(Socio);
        $("#Provincia").val(Provincia);
        $("#Direccion").val(Direccion);
        $("#Vencimiento").val(Vencimiento);
        $("#Plan").val(Plan);
        $("#P_Cuota").val(P_Cuota);
        $("#N_Cuota").val(N_Cuota);
        $("#C_Cuota").val(C_Cuota);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });

    
    //Borrar
    $(document).on("click", ".btnBorrar", function(e){
        e.preventDefault();
        fila = $(this);           
        id_boletas = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id_boletas+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_boletas.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id_boletas:id_boletas},    
              success: function(r) {
                tablaBoletas.row(fila.parents('tr')).remove().draw();
                console.log(r) ;                 
               }
            });	
        }
    }); 
    


    $('#consultarboletas').click(function () {
        n_cuent = $.trim($('#n_cuent').val());
        $.ajax({
             type:"POST",
             url:"busca.php",
             data:{n_cuent:n_cuent},
             success:function (r) {
                 $('#resultadobusqueda').html(r);                    
             }
        }) ;
        return false;
     });

    $('#btnGuardarBoleta').click(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        var datos =$('#formNboleta').serialize();
        $.ajax({
            type:"POST",
            url:"insertarBoleta.php",
            data:datos,
            success:function(r) {
                if(r==1){
                    alert("registro de cleinte ingresado con exito");
                    $('#modalBoleta').modal('hide');
                    tablaBoletas.ajax.reload(null, false);
                    //location.href = "clientes.php";
                    
                }else{
                    alert("registro no ingresado");
                }
            }
        });
        
    });

    $(document).on("click", ".btnpdf", function(){
        
        id_boletas = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
        window.open ('fpdf/index1.php?id='+id_boletas);  
        
        // if (rows > 0) {
        //     var accion = 'generarpdf';
        //     fila = $(this).closest("tr");
        //     var id_boletas = parseInt(fila.find('td:eq(0)').text()); //capturo el ID

        //     $.ajax({
        //         type:"POST",
        //         url:"ajax.php",
        //         data:{accion:accion,id_boletas:id_boletas},
        //         success:function(r) {
        //             if(r== 1){
        //                 var info = JSON.parse(r);
        //                 console.log(info)
        //                 //                  
        //             }else{
        //                 alert("registro no ingresado");
        //             }
        //         }
        //     });
        // }

        
    });

    

});
//fin de Cuentas