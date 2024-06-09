<?php
require_once('../../Negocio/NTipo.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nTipo = new NTipo();
    $nTipo->actualizar($id, $nombre);

    header("Location: list.php");
    exit();
} 
?>