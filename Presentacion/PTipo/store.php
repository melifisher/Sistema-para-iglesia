<?php
require_once('../../Negocio/NTipo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    
    $nTipo = new NTipo();
    $nTipo->agregar($id, $nombre);
    
    // Redirige a alguna página de éxito o muestra un mensaje de éxito
    header("Location: list.php");
    exit();
}
?>