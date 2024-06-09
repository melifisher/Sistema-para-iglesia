<?php
require_once('../../Negocio/NEstadoCivil.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nEstadoCivil = new NEstadoCivil();
    $nEstadoCivil->actualizar($id, $nombre);

    header("Location: list.php");
    exit();
} 
?>