<?php
require_once '../../vendor/autoload.php';

ob_start();
include 'pdf.php';
$html_content = ob_get_clean();

$dompdf = new Dompdf\Dompdf();

$dompdf->loadHtml($html_content);

$dompdf->render();

$dompdf->stream('confirmacion'.$_GET['nro'].'.pdf');
?>
