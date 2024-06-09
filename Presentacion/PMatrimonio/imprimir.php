<?php
require_once '../../vendor/autoload.php';

// Incluir el archivo PHP que contiene el contenido HTML
ob_start();
include 'pdf.php';
$html_content = ob_get_clean();

// Crear una instancia de Dompdf
$dompdf = new Dompdf\Dompdf();

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html_content);

// Renderizar el PDF
$dompdf->render();

// Generar la salida del PDF (descargar o mostrar en el navegador)
$dompdf->stream('matrimonio'.$_GET['nro'].'.pdf');
?>
