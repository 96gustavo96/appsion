<?php
function getPlantilla(){

	$mysqli= new mysqli("localhost","root","","sion");
	$mysqli-> set_charset('utf8');
	
	
	//$query = "SELECT * FROM t_boletas b WHERE b.id_boletas = $iduser limit 1 ";
	$query ="SELECT * FROM t_cuentas c INNER JOIN t_clientes cl ON c.DNI = cl.DNI WHERE c.situacion = 'Pagado'  limit 1";
	$result = mysqli_query($mysqli, $query);

	
	

	$plantilla ='
	<body>
	<div class="">
		';
        
		if (mysqli_num_rows($result) > 0) { 
				
		while ($row = mysqli_fetch_assoc($result)) {
		$Impago = 'Impago';
		$cuotaS = $row['N_Cuotas'] + 1;

		$codigo ="SELECT id_boletas FROM t_boletas b  ORDER BY id_boletas DESC limit 1";
		$codigo =  mysqli_query($mysqli, $codigo);
		$row1 = mysqli_fetch_assoc($codigo);

		$scod = $row1['id_boletas'] +1;
		$scodr = $row['id'];

		$editar= "UPDATE t_cuentas  SET situacion = 'Impago' , N_Cuotas = '$cuotaS' WHERE id = '$row[id]'" ;
		$editar =mysqli_query($mysqli, $editar);

		$editar= "INSERT INTO t_boletas (Codigo,id,Socio,DNI,Provincia,Direccion,Vencimiento,Plan,P_Cuota,C_Cuotas,N_Cuota,situacion,fecha_G) VALUES (CONCAT('$scod' ,'$scodr'),'$row[id]','$row[Nombre_y_Apellido]','$row[DNI]','$row[Provincia_y_Localidad]','$row[Direccion]','$row[Vencimiento]','$row[Plan]','$row[P_Cuota]','$row[C_Cuotas]','$cuotaS','Impago', NOW())" ;
		$editar =mysqli_query($mysqli, $editar);

		

		$plantilla.='
		<div class="contenedor">	
			<div class="">
				<div class="Clogo">
					<img src="plantilla/logoB.png" alt="" style="height: 60px; width: 60px;">
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
						<td><h6>'. $cuotaS .'</h6></td>
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
						<img  src="../bd/barcode.php?text='.$scod.''.$scodr.'"><br>
						<label >'.$scod.''.$scodr.'</label>
					</div>
				</div>
			</div>
		</div>	
		<div class="contenedor">	

			<div class="">
				<div class="Clogo">
					<img src="plantilla/logoB.png" alt="" style="height: 60px; width: 60px;">
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
						<td><h6>'. $cuotaS .'</h6></td>
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
	$plantilla = "HASTA EL MOMENTO SE REGISTRA QUE NINGUN CLIENTE PAGO SU CUOTA ANTERIOR";
} 
// <img src="../bd/barcode.php?text='.$row['DNI'].'">
$plantilla.='
</div>
</body>';

return $plantilla;
}