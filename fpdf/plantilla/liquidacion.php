<?php
function getPlantilla(){
    //Se define el timezone que sea necesario
    date_default_timezone_set('America/Argentina/Buenos_Aires');

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');


    //Dia-Mes-Año Hora:Minutos:Segundos
    $fecha = date('d-m-Y');
    $personal = $_GET['id'];

    $vendedor="SELECT * FROM vendedor v WHERE v.id = $personal";
    $vendedor = mysqli_query($mysqli, $vendedor);
    $vende = mysqli_fetch_assoc($vendedor);


    $adelantos="SELECT * FROM adelantos a WHERE a.id_vendedor = '$personal' and a.fecha>= '2021-10-01 00:00:00' and a.fecha <= '2021-10-30 00:00:00'";
    $result = mysqli_query($mysqli, $adelantos);

    $premios="SELECT * FROM premios p WHERE p.id_vendedor = '$personal' and p.fecha>= '2021-10-01 00:00:00' and p.fecha <= '2021-10-30 00:00:00'";
    $premio = mysqli_query($mysqli, $premios);

    $horarios="SELECT * FROM t_asistencia a WHERE a.DNI = '$vende[DNI]' and a.fecha>= '2021-08-01' and a.fecha<= '2021-08-30'";
    $resulthorarios = mysqli_query($mysqli, $horarios);

    $ing=0;
    $ing2=0;
	$plantilla ='
	<body>
	<div class="">
		<div class="container">
            <div class="Clogo">
                <img src="plantilla/logoB.gif" alt="" style="height: 60px; width: 60px;">
                <h3 style="color:white;">SION</h3><h6 style="color:white;">INVERSIONES</h6>
            </div>
            <div class="info">
                <div class="n-cuenta"><h1>LIQUIDACION MENSUAL </h1></div>
                <div class="direccion"><h3>FECHA: '.$fecha.'</h3></div>
                <div class="direccion"><h3>Liquidacion del mes Agosto</h3></div>
                <div class="direccion"><h3>PERSONAL : '.$vende['NombreyApellido'].'</h3></div>

            </div>
        </div>
        <h4>SUELDO FIJO</h4>
        <div class="">
            
            <table>
                <thead>
                    <tr>                        
                        <th>MONTO</th>
                    </tr>
                </thead>
                
                <tr>
                    
                    <th  style="text-align: right;">$'.$vende['monto_fijo'].'</th>
                </tr>
            
            </table>
        </div>
        <h4>ADELANTOS</h4>
        <div class="">
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                    </tr>
                </thead>
                
                ';
                //if de ingresos
                
                        
                    while ($row = mysqli_fetch_assoc($result)) { 
                        $plantilla.='
                        <tr>
                            
                            <td  style="text-align: right;">'.$row['id'].'</td>
                            <td  style="text-align: right;">'.$row['fecha'].'</td>
                            <td  style="text-align: right;">'.$row['monto'].'</td>
                            </tr>
                        ';  
                        $ing=$ing+$row['monto'];     
                    };
                
                $plantilla.='
                <tr>
                    <th></th>
                    <th  style="text-align: right;">TOTAL</th>
                    <th  style="text-align: right;">$'.$ing.'</th>
                </tr>
            
            </table>
        </div>
        <h4>PREMIOS</h4>
        <div class="">
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DETALLES</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                    </tr>
                </thead>
                
                ';
                //if de ingresos
                
                        
                    while ($prem = mysqli_fetch_assoc($premio)) { 
                        $plantilla.='
                        <tr>
                            
                            <td  style="text-align: right;">'.$prem['id'].'</td>
                            <td  style="text-align: right;">'.$prem['detalles'].'</td>
                            <td  style="text-align: right;">'.$prem['fecha'].'</td>
                            <td  style="text-align: right;">'.$prem['monto'].'</td>
                            </tr>
                        ';  
                        $ing2=$ing2+$prem['monto'];     
                    };
                
                $plantilla.='
                <tr>
                    <th></th>
                    <th></th>
                    <th  style="text-align: right;">TOTAL</th>
                    <th  style="text-align: right;">$'.$ing2.'</th>
                </tr>
            
            </table>
        </div>
        <div class="col-lg-6">
            <div class="table-responsive">  
                <h3>HORARIOS DE MAÑANA</h3>      
                <table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>            
                            <th >FECHA</th>
                            <th >DIA</th>                            
                            <th >HORARIO</th>                            
                            <th >TIEMPO</th>                            
                            <th>DESCUENTO</th>
                        </tr>
                    </thead>
                    ';
                    
                    $sql_query = "SELECT * FROM t_asistencia WHERE DNI = $vende[DNI] and H_Ingreso > '06:00:00' and H_Ingreso < '15:00:00' and MONTH(fecha) = 9 order by id DESC";
                    $resultado1=mysqli_query($mysqli,$sql_query);
                    #$sql_query2 = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '22:00:00' and MONTH(fecha) = MONTH(CURRENT_DATE()) order by id DESC";
                    #$resultado2=mysqli_query($conexion,$sql_query2);
                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    while ($libros = mysqli_fetch_assoc($resultado1)) {
                    # code...
                    $diae= $libros['fecha'];
                    $diaente= strtotime($diae);
                    $dia = date('N',$diaente);                                                    
                    $plantilla.='
                    <tr>
                    <td>'.$libros['fecha'].'</td>
                    <td>'.$dias[$dia].'</td>
                    <td>'.$libros['H_Ingreso'].'
                    ';
                    if ($dias[$dia]=='Sábado') {
                        if ($libros['H_Ingreso']>='09:15:01' && $libros['H_Ingreso']<='10:00:10') {
                            $tiempo='TARDE';
                            $descuentom=100;
                        }
                        if ($libros['H_Ingreso']>='10:00:11' && $libros['H_Ingreso']<='13:00:00') {
                            $tiempo='MUY TARDE';
                            $descuentom=500;
                        }
                        if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='09:15:00') {
                            $tiempo='EN HORARIOS';
                            $descuentom=0;
                        }
                    }else {
                        
                        if ($libros['H_Ingreso']>='08:15:01' && $libros['H_Ingreso']<='09:00:10') {
                            $tiempo='TARDE';
                            $descuentom=100;
                        }
                        if ($libros['H_Ingreso']>='09:00:11' && $libros['H_Ingreso']<='12:00:00') {
                            $tiempo='MUY TARDE';
                            $descuentom=500;
                        }
                        if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='08:15:00') {
                            $tiempo='EN HORARIOS';
                            $descuentom=0;
                        }
                    }
                    $plantilla.='
                    </td>
                    
                    <td>'.$tiempo.'</td>
                    <td>'.$descuentom.'</td>					
                    </tr>
                    '; 
                    $totalm=$totalm+$descuentom;                                               
                    }
                
                    $plantilla.='                        
                    <tr>            
                        <th ></th>
                        <th ></th>                            
                        <th ></th>                            
                        <th >TOTAL MAÑANA</th>                            
                        <th >'.$totalm.'</th> 
                    </tr>        
                </table>               
            </div>
        </div>
        <div class="col-lg-6">
			<div class="table-responsive">
					<h3>TARDE</h3>
				<table id="tablaBoletas" class="table table-dark table-striped table-bordered table-condensed" style="width:100%" >
					<thead class="text-center">
						<tr>  
							<th >FECHA</th>
							<th >DIA</th>                            
							<th >HORARIO</th>                            
							<th >TIEMPO</th>                            
							<th>DESCUENTO</th>
						</tr>
					</thead>
					';
					
					$sql_query = "SELECT * FROM t_asistencia WHERE DNI = $vende[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '21:00:00' and MONTH(fecha) = 9 order by id DESC";
					$resultado1=mysqli_query($mysqli,$sql_query);
					#$sql_query2 = "SELECT * FROM t_asistencia WHERE DNI = $fila[DNI] and H_Ingreso > '16:00:00' and H_Ingreso < '22:00:00' and MONTH(fecha) = MONTH(CURRENT_DATE()) order by id DESC";
					#$resultado2=mysqli_query($conexion,$sql_query2);
					$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
					while ($libros = mysqli_fetch_assoc($resultado1)) {
					# code...
					$diae= $libros['fecha'];
					$diaente= strtotime($diae);
					$dia = date('N',$diaente);                                                    
					$plantilla.='
					<tr>
					<td>'.$libros['fecha'].'</td>
					<td>'.$dias[$dia].'</td>
					<td>'.$libros['H_Ingreso'].'
					';
					if ($dias[$dia]=='Sábado') {
						if ($libros['H_Ingreso']>='09:15:01' && $libros['H_Ingreso']<='10:00:10') {
							$tiempo='TARDE';
							$descuento=100;
						}
						if ($libros['H_Ingreso']>='10:00:11' && $libros['H_Ingreso']<='13:00:00') {
							$tiempo='MUY TARDE';
							$descuento=500;
						}
						if ($libros['H_Ingreso']>='07:30:00' && $libros['H_Ingreso']<='09:15:00') {
							$tiempo='EN HORARIOS';
							$descuento=0;
						}
					}else {
						if ($libros['H_Ingreso']>='17:30:01' && $libros['H_Ingreso']<='18:30:10') {
							$tiempo='TARDE';
							$descuento=100;
						}
						if ($libros['H_Ingreso']>='18:30:11' && $libros['H_Ingreso']<='21:00:00') {
							$tiempo='MUY TARDE';
							$descuento=500;
						}
						if ($libros['H_Ingreso']>='16:00:00' && $libros['H_Ingreso']<='17:30:00') {
							$tiempo='EN HORARIOS';
							$descuento=0;
						}
					}
					$plantilla.='
					</td>
					
					<td>'.$tiempo.'</td>
					<td>'.$descuento.'</td>					
					</tr>
					'; 
					$total=$total+$descuento;                                               
				}
				$tg= $totalm+$total;
					$plantilla.='                        
				<tr>            
					<th ></th>
					<th ></th>                            
					<th ></th>                            
					<th >TOTAL TARDE</th>                            
					<th >'.$total.'</th> 
				</tr>        
				<tr>            
					<th ></th>
					<th ></th>                            
					<th ></th>                            
					<th >TOTAL GENERAL</th>                            
					<th >'.$tg.'</th> 
				</tr>        
				</table>               
			</div>
		</div> 

        

        '; 
            $suma=$vende['monto_fijo'] + $ing2;
            $suma2= $ing + $tg;
            $resta = $suma-$suma2;
		$plantilla.='
        <h4>TOTAL A COBRAR</h4>
        <div class="">
            
            <table>
                <thead>
                    <tr>                        
                        <th>DETALLES</th>
                        <th>MONTO</th>
                    </tr>
                </thead>
                
                <tr>                    
                    <th >MONTO FIJO</th>
                    <th  style="text-align: right;">$'.$vende['monto_fijo'].'</th>
                </tr>
                <tr>                    
                    <th >PREMIOS</th>
                    <th  style="text-align: right;">$'.$ing2.'</th>
                </tr>
                <tr>                    
                    <th >ADELANTOS</th>
                    <th  style="text-align: right;">$'.$ing.'</th>
                </tr>
                <tr>                    
                    <th >TARDANZAS</th>
                    <th  style="text-align: right;">$'.$tg.'</th>
                </tr>
                
                <tr>                    
                    <th >NETO TOTAL</th>
                    <th  style="text-align: right;">$'.$resta.'</th>
                </tr>
            
            </table>
        </div>
	</div>
	</body>';

return $plantilla;
}