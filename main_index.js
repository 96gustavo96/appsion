$(document).ready(function() {
    var id, opcion;
    opcion = 4;
    tablaCuentasI = $('#tablaCuentasI').DataTable({  
        "ajax":{            
            "url": "bd/crud_index.php", 
            "method": 'POST', //usamos el metodo POST
            "order": [ 0, "desc" ],
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""

        },
        "columns":[
            {"data": "id"},
            {"data": "descripcion"},
            {"data": "monto"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditarI'><i class='material-icons fas fa-pen-square'></i></button><button class='btn btn-danger btn-sm btnBorrarI'><i class='material-icons fas fa-trash'></i></button></div></div>"}
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
    opcion = 8;
    tablaCuentasE = $('#tablaCuentasE').DataTable({  
        "ajax":{            
            "url": "bd/crud_index.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "descripcion"},
            {"data": "monto"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditarE'><i class='material-icons fas fa-pen-square'></i></button><button class='btn btn-danger btn-sm btnBorrarI'><i class='material-icons fas fa-trash'></i></button></div></div>"}
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
});
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id=null;
    $(".modal-header").css( "background-color", "#20c997");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("INGRESO");
    $('#modalCRUDI').modal('show');	    
});
$("#btnNuevoE").click(function(){
    opcion = 5; //alta           
    id=null;
    $(".modal-header").css( "background-color", "#e81500");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("EGRESO");
    $('#modalCRUDI').modal('show');	    
});
$("#q_n").click(function(){
    id=1;
    $.ajax({
        url: "bd/q_n.php",
        type: "POST",
        datatype:"json",    
        data:  { id:id},    
        success: function() {
              alert('cambios');                 
         }
      });		    
});
$('#formCuentas').submit(function(e){                   
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    monto_ingresado = $.trim($('#monto_ingresado').val());    
    d_ingreso = $.trim($('#d_ingreso').val());                         
        $.ajax({
            url: "bd/crud_index.php",
            type: "POST",
            datatype:"json",    
            data:  {id:id, monto_ingresado:monto_ingresado, d_ingreso:d_ingreso, opcion:opcion},    
            success: function(data) {
            tablaCuentasI.ajax.reload(null, false);
            tablaCuentasE.ajax.reload(null, false);
            //$("#act").load('#');
            $( "#ingD" ).load(window.location.href + " #ingD" );
            $( "#ingM" ).load(window.location.href + " #ingM" );
            $( "#egrD" ).load(window.location.href + " #egrD" );
            $( "#egrM" ).load(window.location.href + " #egrM" );
            
            }
        });			        
    $('#modalCRUDI').modal('hide');	    
});
//Editar        
$(document).on("click", ".btnEditarI", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");		            
    
    id = fila.find('td:eq(0)').text();
    descripcion = fila.find('td:eq(1)').text();
    monto = fila.find('td:eq(2)').text();       
    $("#monto_ingresado").val(monto);
    $("#d_ingreso").val(descripcion);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar ingreso ");		
    $('#modalCRUDI').modal('show');		   
});
$(document).on("click", ".btnEditarE", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");		            
    
    id = fila.find('td:eq(0)').text();
    descripcion = fila.find('td:eq(1)').text();
    monto = fila.find('td:eq(2)').text();       
    $("#monto_ingresado").val(monto);
    $("#d_ingreso").val(descripcion);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar EGRESO ");		
    $('#modalCRUDI').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrarI", function(){
    fila = $(this);           
    id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/crud_index.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id:id},    
          success: function() {
                tablaCuentasI.row(fila.parents('tr')).remove().draw();
                tablaCuentasE.row(fila.parents('tr')).remove().draw();
                $( "#ingD" ).load(window.location.href + " #ingD" );
                $( "#ingM" ).load(window.location.href + " #ingM" );
                $( "#egrD" ).load(window.location.href + " #egrD" );
                $( "#egrM" ).load(window.location.href + " #egrM" );                  
           }
        });	
    }
});