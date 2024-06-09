<?php
require_once('../../Negocio/NConfirmacion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nro = $_POST['nro'];
    $lugar = $_POST['lugar'];
    $fecha_celebracion = $_POST['fecha_celebracion'];
    $id_parroco = $_POST['id_parroco'];
    $padrinos = $_POST['padrinos'];
    $id_confirmado = $_POST['id_confirmado'];

    $nConfirmacion = new NConfirmacion();
    $nConfirmacion->agregar($nro, $lugar, $fecha_celebracion, 'C', $id_parroco, $padrinos, $id_confirmado);

    header("Location: list.php");
    exit();
}

?>