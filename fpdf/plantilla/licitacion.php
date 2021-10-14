<?php
function getPlantilla(){
    //Se define el timezone que sea necesario
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');

    $hoy = date("d-m-Y"); 
    $hora = date("H:i:s");

    $sql="SELECT * FROM t_licitaciones l inner join t_cuentas c on l.id_cuenta = c.id inner join t_clientes cl on c.DNI = cl.DNI order by l.id desc limit 1";
    $resultado=mysqli_query($mysqli,$sql);
    $fila = $resultado ->fetch_assoc();

    
	$plantilla ='
	<body>
	<div class="">		
        <div class="contenedor">
            <div class="">
                <div class="Clogo">
                    <img src="plantilla/logoB.gif" alt="" style="height: 60px; width: 60px;">
                    <h3 style="color:white;">SION</h3><h6 style="color:white;">INVERSIONES</h6>
                </div>
                <div class="info">
                    <div class="n-cuenta"><h1>OFERTA DE LICITACION </h1></div>                            
                    <div class="direccion"><h3>ESPAÑA 506 - LA BANDA SANTIAGO DEL ESTERO</h3></div>
                    <div class="direccion"><h3>TELEFONO: 3856190474</h3></div>

                </div>
            </div>
                <br>
                <h4 style="text-align: right ;padding-right: 10px;">FECHA ACTO DE OFERTA DE LICITACION</h4>
                <h4 style="text-align: right ;padding-right: 10px;">'.$hoy.''." ".''.$hora.'</h4>
            
            <br><br>
            <div class="container">      
                                
                <div class="form-control " width="50%" for="inputEmail3"><h5>Nombre y Apellido </h5>'.$fila['Nombre_y_Apellido'].'</div>                        
                <div class="form-control " width="20%" for="inputEmail3"><h5>DNI </h5>'.$fila['DNI'].'</div>                        
                <div class="form-control " width="10%" for="inputEmail3"><h5>Grupo </h5>'.$fila['Grupo'].'</div>
                <div class="form-control " width="17% " for="inputEmail3"><h5>Solicitud </h5>'.$fila['id_cuenta'].'</div><br>
                <div class="form-control " width="59%" for="inputEmail3"><h5>Domicilio </h5>'.$fila['Direccion'].'</div>
                
                <div class="form-control " width="38%" for="inputEmail3"><h5>Localidad y Provincia</h5>'.$fila['Provincia_y_Localidad'].' </div>                        
                                        
            </div>
                <br><hr><br>
                <div class="container">
                    <div class="form-control " width="59%" for="inputEmail3"><h5>UNIDAD A LICITAR</h5>'.$fila['Plan'].'</div>
                    <div class="form-control " width="40%" for="inputEmail3"><h5>SUMA LICITADA </h5>$ '.$fila['monto'].'.00</div>
                </div>
                <br>
                <div class="nota1">
                    <h6>NOTA:</h6>
                    <span>Por la presente me comprometo (en caso de ser ganador) a depositar el dinero en efectivo correspondiente segun 
                    lo manifestado por mi en el presente comprobante en un plazo de dos dias posteriores al acto de adjudicacion, en el lugar 
                    que se me indique, habilitando a la empresa SION INVERSIONES a dejar sin efecto adjudicamiento (en caso de incumplimiento)
                    sin tener nada qeu reclamar por ningun concepto a SION INVERSIONES. La unidad es entregada en el lapso de 60 dias para realizar
                    los tramites pertinentes.</span><br><br>
                    <em>LA PRESENTE OFERTA DE LICITACION DE CONFORMIDAD A LO ESTIPULADO EN LOS ARTICULOS DE LAS CONDICIONES GENERALES DE LA SOLICITUD
                    DE ADHESION SUSCRIPTA OPORTUNAMENTE.</em>
                </div>
        </div>  
        <div class="container">
            <div class="form-control" style="margin-left:5%; float: left;" width="30%" for="inputEmail3"></div>
            <div class="form-control" style="margin-right:5%; float: right;" width="30%" for="inputEmail3"></div><br>
            <h5 style="margin-left:5%; float: left;" width="30%" >FIRMA SION INVERSIONES</h5>
            <h5 style="margin-right:5%; float: right;" width="30%" >FIRMA DE LOS LICITANTES</h5>
        </div>                  
    </div>			

                    '; 
	
		$plantilla.='
	</div>
	</body>';

return $plantilla;
}