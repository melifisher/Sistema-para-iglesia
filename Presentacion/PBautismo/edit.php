<?php
require_once('../../Negocio/NBautismo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro = $_POST['nro'];
    $lugar = $_POST['lugar'];
    $fecha_celebracion = $_POST['fecha_celebracion'];
    $fecha_registro = $_POST['fecha_registro'];
    $id_parroco = $_POST['id_parroco'];
    //$padres = $_POST['padres'];
    $padrinos = $_POST['padrinos'];
    $id_bautizado = $_POST['id_bautizado'];

    $nBautismo = new NBautismo();
    $nBautismo->actualizar($nro, $lugar, $fecha_celebracion, $fecha_registro, 'B', $id_parroco, $padrinos, $id_bautizado);

    header("Location: list.php");
    exit();
} 
?>