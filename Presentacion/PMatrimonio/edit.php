<?php
require_once('../../Negocio/NMatrimonio.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro = $_POST['nro'];
    $lugar = $_POST['lugar'];
    $fecha_celebracion = $_POST['fecha_celebracion'];
    $fecha_registro = $_POST['fecha_registro'];
    $id_parroco = $_POST['id_parroco'];
    //$padres = $_POST['padres'];
    $testigos = $_POST['testigos'];
    $id_esposo = $_POST['id_esposo'];
    $id_esposa = $_POST['id_esposa'];

    $nMatrimonio = new NMatrimonio();
    $nMatrimonio->actualizar($nro, $lugar, $fecha_celebracion, $fecha_registro, 'B', $id_parroco, $testigos, $id_esposo, $id_esposa);

    header("Location: list.php");
    exit();
} 
?>