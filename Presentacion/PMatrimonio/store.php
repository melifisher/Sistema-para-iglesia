<?php
require_once('../../Negocio/NMatrimonio.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro = $_POST['nro'];
    $lugar = $_POST['lugar'];
    $fecha_celebracion = $_POST['fecha_celebracion'];
    $id_parroco = $_POST['id_parroco'];
    $testigos = $_POST['testigos'];
    $id_esposo = $_POST['id_esposo'];
    $id_esposa = $_POST['id_esposa'];

    $nMatrimonio = new NMatrimonio();
    $nMatrimonio->agregar($nro, $lugar, $fecha_celebracion, 'B', $id_parroco, $testigos, $id_esposo, $id_esposa);

    header("Location: list.php");
    exit();
}

?>