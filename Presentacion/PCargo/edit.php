<?php
require_once('../../Negocio/NCargo.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $nCargo = new NCargo();
    $nCargo->actualizar($id, $nombre, $descripcion);

    header("Location: list.php");
    exit();
} 
?>