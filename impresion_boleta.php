<?php

require_once __DIR__ . '/vendor/autoload.php';


$html = '
<!DOCTYPE html>
<html lang="en">


<body>
	<label for="">hola<input type="number" name="" id="valor1" step="0.001"></label>
	<select name="" id="valor2" oninput="calcular()">
		<option value="" >10%</option>
		<option value="0.3" selected >30%</option>
		<option value="0.5">50%</option>
		<option value="0.6">60%</option>
	</select>
	<label for="">hola<input type="number" name="" id="total" step="0.001"></label>
</body>


</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();