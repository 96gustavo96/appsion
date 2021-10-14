<?php
function getPlantilla(){
    //Se define el timezone que sea necesario
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');

    $montoi=0;
    $montot=0;
    $montoe=0;
    $montoex=0;
    $hoy = date("Y-m-d"); 
    $hora = date("H:i:s"); 



    if ($hora >= '07:00:00' && $hora <= '23:00:00' ) {
        $query = "SELECT * FROM t_caja c WHERE c.Tipo = 'ingreso' and c.fecha >= '$hoy 07:00:00' and c.fecha <= '$hoy 23:00:00' ";//or c.fecha BETWEEN '$hoy 11:26:00' AND '$hoy 22:00:00'
        $result = mysqli_query($mysqli, $query);
        $query1 = "SELECT * FROM t_caja c WHERE c.Tipo = 'egreso' and c.fecha >= '$hoy 07:00:00' and c.fecha <= '$hoy 23:00:00' ";//or c.fecha BETWEEN '$hoy 11:26:00' AND '$hoy 22:00:00'
        $result1 = mysqli_query($mysqli, $query1);
        $turno='MAÑANA';
    }

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
                            <div class="n-cuenta"><h1>CAJA DIARIA </h1></div>
                            <div class="socio"><h2>TURNO: '.$turno.'</h2></div>
                            <div class="direccion"><h3>FECHA: '.$fecha.'</h3></div>

                        </div>
                    </div>
                    <br>
                    <h4 style="text-align: center ;">INGRESOS EN EFECTIVO</h4>
                    <div class="cont-tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>DESCRIPCION</th>
                                    <th>TIPO</th>
                                    <th>MONTO</th>
                                </tr>
                            </thead>
                            
                            ';
                            //if de ingresos
                            if (mysqli_num_rows($result) > 0) { 
                                    
                                while ($row = mysqli_fetch_assoc($result)) { 
                                    if ($row['pago']=='Efectivo') {
                                        
                                        $plantilla.='
                                        
                                        <tr class="th"> 
                                            <td  >'.$row['descripcion'].'</td>
                                            <td  style="text-align: right;">'.$row['pago'].'</td>
                                            <td  style="text-align: right;">'.$row['monto'].'</td>
                                        </tr>
                                        ';
                                        $montoe=$montoe+$row['monto'];
                                    }   
                                    if ($row['pago']=='Transferencias') {
                                        
                                        $plantilla.='
                                        
                                        <tr>
                                            <td  >'.$row['descripcion'].'</td>
                                            <td  style="text-align: right;">'.$row['pago'].'</td>
                                            <td  style="text-align: right;">'.$row['monto'].'</td>
                                            </tr>
                                        ';
                                        $montot=$montot+$row['monto'];
                                    }           
                                    if ($row['pago']=='Externo') {
                                        
                                        $plantilla.='
                                        <tr>
                                            
                                            <td  >'.$row['descripcion'].'</td>
                                            <td  style="text-align: right;">'.$row['pago'].'</td>
                                            <td  style="text-align: right;">'.$row['monto'].'</td>
                                            </tr>
                                        ';
                                        $montoex=$montoex+$row['monto'];
                                    }         
                                };
                            };
                            
                            $ing=$montoe+$montot+$montoex;
                            $plantilla.='
                            
                            <tr class="th">
                                <th></th>
                                <th  style="text-align: right;">TOTAL EN EFECTIVO</th>
                                <th  style="text-align: right;">$'.$montoe.'</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th  style="text-align: right;">TOTAL</th>
                                <th  style="text-align: right;">$'.$ing.'</th>
                            </tr>
                        
                        </table>
                    </div>
                    <br>
                    <br>
                    <h4 style="text-align: center ;">EGRESOS</h4>
                    <div class="cont-tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>DESCRIPCION</th>
                                    <th>MONTO</th>
                                </tr>
                            </thead>';
                            //if de ingresos
                            if (mysqli_num_rows($result1) > 0) { 

                                    
                                while ($row1 = mysqli_fetch_assoc($result1)) {                
                                    $plantilla.='
                            <tr>
                                
                                <td  >'.$row1['descripcion'].'</td>
                                <td  style="text-align: right;">'.$row1['monto'].'</td>
                            </tr>
                            ';
                            $montoi=$montoi+$row1['monto'];
                                };
                            };
                            $in= $montoe + $montot+ $montoex;
                            $ti=$montoex+$montot;
                            $totalg=$in-$montoi;
                            $total= $montoe - $montoi;

                            
                            $buscar ="SELECT * FROM t_caja_mensual WHERE fecha >'$hoy 00:00:00' and fecha < '$hoy 23:59:59'";
                            $buscar=mysqli_query($mysqli,$buscar);
                            if ($row3 = mysqli_fetch_assoc($buscar)) {
                                $enviar ="UPDATE  t_caja_mensual SET efectivo ='$montoe', transferencias='$montot' ,extras ='$montoex',egreso ='$montoi',total_neto ='$totalg',total='$ing' ,tipo='Ingreso' WHERE id=$row3[id]";
                                $enviar=mysqli_query($mysqli,$enviar);
                            }else {                                
                                $enviar ="INSERT INTO t_caja_mensual (efectivo, transferencias ,extras,egreso ,total, total_neto ,tipo)VALUES ('$montoe','$montot' ,'$montoex','$montoi', '$ing','$totalg','Ingreso')";
                                $enviar=mysqli_query($mysqli,$enviar);
                            }

                            $plantilla.='
                            <tr>
                                
                                <th  style="text-align: right;">TOTAL</th>
                                <th  style="text-align: right;">$'.$montoi.'</th>
                            </tr>
                        
                        </table>
                    </div>
                    <br>
                    <br>
                    <h4 style="text-align: center ;">RESUMEN FINAL</h4>
                    <div class="cont-tabla">
                        <table>
                            <thead>
                                <tr>
                                    <th>DESCRIPCION</th>
                                    <th>MONTO</th>
                                </tr>
                            </thead>
                            <tr class="th">
                                
                                <td  >INGRESOS EN EFECTIVO DEL DIA</td>
                                <td  style="text-align: right;">$'.$montoe.'</td>
                                
                            </tr>
                            <tr>
                                
                                <td  >INGRESOS EN TRANSFERENCIAS Y PAGOS EXTERNOS DEL DIA</td>
                                <td  style="text-align: right;">$'.$ti.'</td>
                                
                            </tr>
                            <tr>
                                
                                <td  >EGRESOS DEL DIA</td>
                                <td  style="text-align: right;">$'.$montoi.'</td>
                            </tr>
                            <tr class="th">
                                
                                <th  style="text-align: right;">TOTAL NETO EN CAJA</th>
                                <th  style="text-align: right;">$'.$total.'</th>
                            </tr>
                            <tr>
                                
                                <th  style="text-align: right;">TOTAL GLOBAL</th>
                                <th  style="text-align: right;">$'.$totalg.'</th>
                            </tr>
                        
                        </table>
                    </div>
                    <br>
                    <br>
                    <div class="container">
                    <div class="nota1">
                        <h6>NOTA:</h6>
                    </div>
                    <div class="firma">
                    <h5 style="text-align: center ;">Firma de Administracion</h5>
                    <br><br><br><br>
                    <div class="span">---------------------</div>
                    <div class="span">---------------------</div>
                    <div class="span">---------------------</div>
                    <div class="span">FIRMA</div>
                    <div class="span">FIRMA</div>
                    <div class="span">FIRMA</div>
                    </div>
                    </div>
                    
                </div>			

                    '; 
	
		$plantilla.='
	</div>
	</body>';

return $plantilla;
}