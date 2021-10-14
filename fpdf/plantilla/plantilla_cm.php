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



    $query = "SELECT * FROM t_caja_mensual c WHERE MONTH(fecha) ='$hoy' ";
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
                    <div class="n-cuenta"><h1>CAJA MENSUAL</h1></div>
                    <div class="direccion"><h3>FECHA: '.$fecha.'</h3></div>

                </div>
            </div>
            <br>
            <h4 style="text-align: center ;">INGRESOS Y EGRESOS DEL MES '.$hoy.'</h4>
            <div class="cont-tabla">
                <table>
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>EFECTIVO</th>
                            <th>TRANS.</th>
                            <th>EXTERNOS</th>
                            <th>EGRESOS</th>
                            <th>TOTAL</th>
                            <th>NETO</th>
                        </tr>
                    </thead>
                    
                    ';
                    //if de ingresos
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $plantilla.='
                                <tr>
                                    
                                    <td  >'.($row['fecha']).'</td>
                                    <td  >'.$row['efectivo'].'</td>
                                    <td  >'.$row['transferencias'].'</td>
                                    <td  >'.$row['extras'].'</td>
                                    <td  >'.$row['egreso'].'</td>
                                    <td  >'.$row['total'].'</td>
                                    <td  >'.$row['total_neto'].'</td>
                                    </tr>
                                ';

                                $te=$te +$row['efectivo'];
                                $tt=$tt +$row['transferencias'];
                                $tex=$tex +$row['extras'];
                                $teg=$teg +$row['egreso'];
                                $t=$t +$row['total'];
                                $tn=$tn + $row['total_neto'];
                    }
                    
                    $plantilla.='
                    <tr class="th">                                            
                        <th  >TOTAL</th>
                        <th  >'.$te.'</th>
                        <th  >'.$tt.'</th>
                        <th  >'.$tex.'</th>
                        <th  >'.$teg.'</th>
                        <th  >'.$t.'</th>
                        <th  >'.$tn.'</th>
                    </tr>
                </table>
            </div>
        </div>            
	</div>
	</body>';

return $plantilla;
}