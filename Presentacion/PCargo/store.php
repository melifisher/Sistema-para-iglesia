<?php
require_once('../../Negocio/NCargo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    
    $nCargo = new NCargo();
    $nCargo->agregar($id, $nombre, $descripcion);
    
    // Redirige a alguna página de éxito o muestra un mensaje de éxito
    header("Location: list.php");
    exit();
}
?>