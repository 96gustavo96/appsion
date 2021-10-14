<?php
function getPlantilla(){
    //Se define el timezone que sea necesario
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');

    $montoi=0;
    $montoe=0;
    $montoex=0;
    $montot=0;
    $hoy = date('m'); 
    $personal = $_GET['id'];

    $query = "SELECT * FROM t_clientes cl inner join t_cuentas c on c.DNI= cl.DNI WHERE cl.Fecha_de_Ingreso>= '2021-09-01' and c.Vendedor like '%$personal%'";
    $result = mysqli_query($mysqli, $query);

    //Dia-Mes-Año Hora:Minutos:Segundos
    $fecha = date('d-m-Y H:i:s');

    
    

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
                    <div class="n-cuenta"><h1>CATEGORIZACION DEL MES ANTERIOR</h1></div>
                    <div class="direccion"><h3>FECHA: '.$fecha.'</h3></div>
                    <div class="direccion"><h3>FECHA: '.$personal.'</h3></div>

                </div>
            </div>
            <br>
            <div class="cont-tabla">
                <table>
                    <thead>
                        <tr>
                            <th>AFILIADO</th>
                            <th>NOMBRE Y APELLIDO</th>
                            <th>UNIDAD</th>
                            <th>TEL.</th>
                            <th>TEL.</th>
                            <th>MONTO</th>
                            <th>LOCALIDAD</th>
                            <th>DETALLES</th>
                        </tr>
                    </thead>
                    
                    ';
                    //if de ingresos
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $plantilla.='
                                <tr>
                                    
                                    <td  >'.($row['id']).'</td>
                                    <td  >'.$row['Nombre_y_Apellido'].'</td>
                                    <td  >'.$row['Plan'].'</td>
                                    <td  >'.$row['Telefono_1'].'</td>
                                    <td  >'.$row['Telefono_2'].'</td>
                                    <td  >'.$row['P_Cuota'].'</td>
                                    <td  >'.$row['Provincia_y_Localidad'].'</td>
                                    <td  ></td>
                                    </tr>
                                ';
                    }
                    
                    $plantilla.='
                </table>
            </div>
        </div>            
	</div>
	</body>';

return $plantilla;
}