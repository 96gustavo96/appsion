$(document).ready(function() {

        $('#subconsultarclientes').click(function(){
            var datos=$('#formconsultar').serialize();
            $.ajax({
                type:"POST",
                url:"buscar.php",
                data:datos,
                success:function(r){
                    $('#resultadobusqueda').html(r);
                }
            });
            return false;
        });

        $('#subconsultarproductos').click(function () {
           var datos=$('#formconsultar').serialize();
           $.ajax({
                type:"POST",
                url:"buscap.php",
                data:datos,
                success:function (r) {
                    $('#resultadobusquedaproductos').html(r);                    
                }
           }) ;
           return false;
        });
        

        $('#btnGuardarCliente').click(function(e) {
            e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
            var datos =$('#formconsultar').serialize();
            $.ajax({
                type:"POST",
                url:"insertarcliente.php",
                data:datos,
                success:function(r) {
                    if(r==1){
                        alert("registro de cleinte ingresado con exito");
                        $('#modalClientes').modal('hide');
                    }else{
                        alert("registro no ingresado");
                    }
                }
            });
            
        });

        $('#btnGuardarproductos').click(function (e) {
            e.preventDefault();
            var datos = $('#formconsultar').serialize();
            $.ajax({
                type:"POST",
                url:"insertarproducto.php",
                data:datos,
                success:function (r) {
                    if (r==1) {
                        alert ("registro de producto ingresado con exito");
                        $('#modalProductos').modal('hide');
                        
                    }else{
                        alert("registro no ingresado");
                    }                 
                }
            });            
        })
        $('#btnGuardar').click(function(){                    
            var datos = $('#formconsultar').serialize();
            afiliado = $.trim($('#solicitud').val());  
            window.open("fpdf/index3.php?id="+afiliado,"productos.php",'width=900,height=900,left=320, top=200,toolbar=0,scrollbars=0,statusbar=0,menubar =0,resizable=0');

            $.ajax({
                type:"POST",
                url:"Insertar_Cuenta.php",
                data:datos,
                success:function (r) {
                    if (r==1) {
                        alert ("registro de producto ingresado con exito");
                        
                    }else{
                        alert("registro no ingresado");
                    }                 
                }
            }); 
			        										     			
        });
});
//fin de Cuentas