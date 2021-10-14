<?php

require_once __DIR__ . '/vendor/autoload.php';

//base de datos
require_once 'bd.php';


//plantilla modelo
require_once __DIR__ . '/plantilla/licitacion.php';


//css de plantilla
$css = file_get_contents('plantilla/caja.css');



$mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['margin_left' => '3','margin_right' => '3','margin_top' => '3','margin_bottom' => '3']);

$plantilla = getPlantilla();

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();

