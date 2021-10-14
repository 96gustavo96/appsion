<?php require_once "vistas/parte_superior.php" ?>
<!--llamado a la parte superior-->

<!--inicio de cuerpo-->

<!--inicio de cuerpo-->

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-plus-square"></i></button>    
            <a href="fpdf/index2.php" id="btnpdf"  target="_blank" type="button" class="btn btn-warning" data-toggle="modal"><i class="material-icons fas fa-file-pdf"></i></a>    
            <button id="actualizar" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons fas fa-sync-alt"></i>  Actualizar las Cuentas</button>    

            </div>    
        </div>    
    </div>    
    <br>  

    <?php

    $cuenta= "SELECT * FROM t_cuentas c inner join t_boletas b on c.id = b.id inner join t_clientes cl on c.DNI = cl.DNI";
    $resultado=mysqli_query($mysqli,$cuenta);
    

    ?>
 




<script language="javascript" type="text/javascript">  
        $(document).ready(function() 
            {    
           
              $('#txthotelname').keypress(function(e){   
               if(e.which == 13){ 
                x = $("#txthotelname").val();
                if (x == 15) {
                    alert("es 15");
                }
                $('input[name=checkListItem').val('');
               }   
              });    
              
           });  
    </script>
<script type="text/javascript" src="main_prueba.js"></script>
<!--fin de cuerpo-->
<!--llamado parte inferioir-->
<?php require_once "vistas/parte_inferior.php" ?>