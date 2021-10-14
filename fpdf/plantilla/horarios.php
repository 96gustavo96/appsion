<?php
function getPlantilla(){

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');
	
	$iduser = $_GET['id'];;
	$query = "SELECT * FROM t_asistencia a INNER JOIN vendedor v on a.DNI = v.DNI WHERE $iduser = a.DNI ";
	$result = mysqli_query($mysqli, $query);
	$libros = mysqli_fetch_assoc($result);

	
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
                    <div class="n-cuenta"><h1>HORARIOS</h1></div>                            
                    <div class="direccion"><h3>PERSONAL: '.$libros['Nombre_y_Apellido'].'</h3></div>
                    <div class="direccion"><h3>DNI: '.$libros['DNI'].'</h3></div>

                </div>
            </div>
            
            <br><br>
			<div class="col-lg-6">
				<div class="table-responsive">  
					<h3>MAÑANA</h3>      
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
						
						$sql_query = "SELECT * FROM t_asistencia WHERE DNI = $iduser and H_Ingreso > '06:00:00' and H_Ingreso < '15:00:00' and MONTH(fecha) = 8 order by id DESC";
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
		<br>
		<br>
		<br>
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
					
					$sql_query = "SELECT * FROM t_asistencia WHERE DNI = $iduser and H_Ingreso > '16:00:00' and H_Ingreso < '21:00:00' and MONTH(fecha) = 8 order by id DESC";
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
	</div>
	</div>
	</body>';

return $plantilla;
}