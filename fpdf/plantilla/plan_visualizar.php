<?php
function getPlantilla(){

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');
	
	$iduser = $_GET['id'];
	$query = "SELECT * FROM t_cuentas c   INNER JOIN t_clientes cl  ON cl.DNI = c.DNI INNER JOIN t_boletas b ON c.id = b.id  WHERE b.Codigo = $iduser limit 1 ";

	$result = mysqli_query($mysqli, $query);

	
	$plantilla ='
	<body>
	<div class="">
		';
        
		if (mysqli_num_rows($result) > 0) { 
				
		while ($row = mysqli_fetch_assoc($result)) {
		$query1 = "SELECT * FROM t_boletas where id=$row[id] order by id_boletas DESC limit 1";
		$result1 = mysqli_query($mysqli, $query1);
		$row1 = mysqli_fetch_assoc($result1);
		$plantilla.='
		<div class="contenedor">	
			<div class="">
				<div class="Clogo">
					<img src="plantilla/logoB1.jpg" alt="" style="height: 60px; width: 60px;">
					<h3 style="color:white;">SION</h3><h6 style="color:white;">INVERSIONES</h6>
				</div>
				<div class="info">
					<div class="n-cuenta"><h6>Numero de Cuenta: '. $row['id'] .'</h6></div>
					<div class="socio"><h6>Socio: '. $row['Nombre_y_Apellido'] .' </h6></div>
					<div class="direccion"><h6>Direccion: '. $row['Direccion'] .' </h6></div>
					<div class="provincia"><h6>Provincia: '. $row['Provincia_y_Localidad'] .' </h6></div>
				</div>
			</div>
			<div class="cont-tabla">
				<table>
					<thead>
						<tr>
							<th>Vto.</th>
							<th>Plan</th>
							<th>$$</th>
							<th>Cuota</th>
						</tr>
					</thead>
					<tr>
						
						<td><h6>'. $row['Vencimiento'] .'</h6></td>
						<td><h6>'. $row['Plan'] .'</h6> </td>
						<td><h6>'. $row['P_Cuota'] .'</h6> </td>
						<td><h6>'. $row['N_Cuota'].'</h6></td>
					</tr>
				
				</table>
				<div  class="nota">
					<h5 style= "text-align:center;font-size:16px;">Telefono</h5><br>
					<h6 style= "font-size:12px;text-align:center;">'.$row['Telefono_1'].'</h6>
					<h6 style= "font-size:12px;text-align:center;">'.$row['Telefono_2'].'</h6>
					
				</div>

				<div class="premios">
					<table>
						<thead>
							<tr>
								<th>Nº 1</th>
								<th>Nº 2</th>
								<th>Nº 3</th>
								<th>Nº 4</th>
							</tr>
						</thead>
						<tr>
							
							<td><h6>'. $row['N_Sorteo'] .'</h6></td>
							<td><h6>'. $row['N_Sorteo2'] .'</h6> </td>
							<td><h6>'. $row['N_Sorteo3'] .'</h6> </td>
							<td><h6>'. $row['N_Sorteo4'] .'</h6></td>
						</tr>

						
					
					</table>
					<div class="nota1">
						
						<img  src="https://barcode.tec-it.com/barcode.ashx?data='.$row1['Codigo'].'&code=&multiplebarcodes=true&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0"><br>
						
					</div>
				</div>
			</div>
		</div>	
		<div class="contenedor">	

			<div class="">
				<div class="Clogo">
					<img src="plantilla/logoB1.jpg" alt="" style="height: 60px; width: 60px;">
					<h3 style="color:white;">SION</h3><h6 style="color:white;">INVERSIONES</h6>
				</div>
				<div class="info">
					<div class="n-cuenta"><h6>Numero de Cuenta: '. $row['id'] .'</h6></div>
					<div class="socio"><h6>Socio: '. $row['Nombre_y_Apellido'] .' </h6></div>
					<div class="direccion"><h6>Direccion: '. $row['Direccion'] .' </h6></div>
					<div class="provincia"><h6>Provincia: '. $row['Provincia_y_Localidad'] .' </h6></div>

				</div>
			</div>
			<div class="cont-tabla">
				<table>
					<thead>
						<tr>
							<th>Vto.</th>
							<th>Plan</th>
							<th>$$</th>
							<th>Cuota</th>
						</tr>
					</thead>
					<tr>
						
						<td><h6>'. $row['Vencimiento'] .'</h6></td>
						<td><h6>'. $row['Plan'] .'</h6> </td>
						<td><h6>'. $row['P_Cuota'] .'</h6> </td>
						<td><h6>'. $row['N_Cuotas'].'</h6></td>
					</tr>
				
				</table>
				<div  class="nota">
					<h5 style= "text-align:center;font-size:6px;">NOTA</h5>
					<h6 style= "font-size:6px;text-align:center;">ABONO MENSUAL: El titular asume la obligacion de abonar las cuotas comerciales mensualmente hasta el 10 del mes en curso, correspondiente al vencimiento de la MISMA.
					SORTEOS MENSUALES: El titular debera encontrarse al dia en el pago de las cuotas. La cual dara derecho a participar en el sorteo que tendra lugar en el mes, al que corresponda a la misma.
					CADUCIDAD: La falta de pago de dos cuotas mensuales consecutivas, determinara la caducidad del PLAN.</h6>
					<h5 style= "text-align:center;font-size:6px;">PREMIO</h5>
					<h6 style= "font-size:6px;text-align:center;">Estimado '.$row['Nombre_y_Apellido'].', Abonando este cupon correspodiente al mes en curso, participa del sorteo final por el plan suscripto por Ud. Y que tiene como finalidad hacer cumplir el sueño de llegar a un bien 0KM.
					MUCHA SUERTE</h6>
					
				</div>

				<div class="premios">
					<table>
						<thead>
							<tr>
								<th>Nº 1</th>
								<th>Nº 2</th>
								<th>Nº 3</th>
								<th>Nº 4</th>
							</tr>
						</thead>
						<tr>
							
							<td><h6>'. $row['N_Sorteo'] .'</h6></td>
							<td><h6>'. $row['N_Sorteo2'] .'</h6> </td>
							<td><h6>'. $row['N_Sorteo3'] .'</h6> </td>
							<td><h6>'. $row['N_Sorteo4'] .'</h6></td>
						</tr>											
					</table>
				</div>
			</div>
		</div>			

			';
            }
        }else{
            $plantilla = "No record found";
        } 
	
		$plantilla.='
	</div>
	</body>';

return $plantilla;
}