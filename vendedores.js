$(document).ready(function() {
    var DNI, opcion;
    opcion = 4;
        
    tablaClientes = $('#tablaClientes').DataTable({
        "order": [[ 0, "desc" ]],
        "ajax":{            
            "url": "bd/crud_vendedores.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "NombreyApellido"},   
            {"data": "DNI"},   
            {"data": "monto_fijo"},   
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
    $('#formvendedor').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        DNI = $.trim($('#DNI').val());                            
        monto = $.trim($('#monto').val());                            
        Nombre_y_Apellido = $.trim($('#N_y_A').val());                            
            $.ajax({
              url: "bd/crud_vendedores.php",
              type: "POST",
              datatype:"json",    
              data:  { DNI:DNI, monto:monto, Nombre_y_Apellido:Nombre_y_Apellido,opcion:opcion},    
              success: function(data) {
                tablaClientes.ajax.reload(null, false);
                alert('INGRESADO');
               }
            });			        
        $('#exampleModal').modal('hide');
    											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");		            
        
        
        id_v= fila.find('td:eq(0)').text();
        $.ajax({
            type:"POST",
            url:"buscarvendedor.php",
            data:{ id_v:id_v},
            success:function (r) {
                $('#resultado').html(r); 
                $(".modal-header").css("background-color", "#36b9cc");
                $(".modal-header").css("color", "white" );
                $(".modal-title").text("CUENTA");		
                $('#modalCRUD').modal('show');                   
            }
        }) ;		   
    });
    $(document).on("click", "#btn-horarios", function(){
        var x = $("#DNIi").val();
        window.open("fpdf/index5.php?id="+x,"productos.php",'width=900,height=900,left=320, top=200,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');
	    
    });
    //ADELANTOS
    $(document).on("click", ".adelanto", function(){
        opcion= 5;
        id = $.trim($('#id-c').val()); 
        montos = $.trim($('#montos_adelanto').val()); 
        $.ajax({
            url: "bd/crud_vendedores.php",
            type: "POST",
            datatype:"json",    
            data:  {id:id,montos:montos, opcion:opcion},    
            success: function(data) {
                //window.open("fpdf/index4.php",'width=900,height=900,left=320, top=200,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');
                tablaCuentas.ajax.reload(null, false);
             }
          });			        
      $('#modalCRUD').modal('hide');
    });
    //PREMIOS
    $(document).on("click", "#g_premio", function(){
        opcion= 6;
        id = $.trim($('#id_v').val()); 
        premio = $.trim($('#montos_premio').val()); 
        detalles = $.trim($('#detalles').val()); 
        $.ajax({
            url: "bd/crud_vendedores.php",
            type: "POST",
            datatype:"json",    
            data:  {id:id,premio:premio,detalles:detalles, opcion:opcion},    
            success: function(data) {
                //window.open("fpdf/index4.php",'width=900,height=900,left=320, top=200,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');
                tablaCuentas.ajax.reload(null, false);
                alert('datos ingresados');
             }
          }); 	   
      $('#modalCRUD').modal('hide');
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        Nombre_y_Apellido = parseInt($(this).closest('tr').find('td:eq(1)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+Nombre_y_Apellido+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud_vendedores.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, Nombre_y_Apellido:Nombre_y_Apellido},    
              success: function() {
                  tablaClientes.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
    });
    $(document).on("click", "#categorizacion", function(){
        
 
        id_boletas = $.trim($('#Nombre_y_Apellido').val()); 
        alert (id_boletas); 
        //window.open ('fpdf/index7.php?id='+id_boletas); 
    });
});
//fin de Cuentas