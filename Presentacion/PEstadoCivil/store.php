<?php
require_once('../../Negocio/NEstadoCivil.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    // Otros campos del formulario
    
    // Llama a la función de agregar en la capa de negocio
    $nEstadoCivil = new NEstadoCivil();
    $nEstadoCivil->agregar($id, $nombre);
    
    // Redirige a alguna página de éxito o muestra un mensaje de éxito
    header("Location: list.php");
    exit();
}
?>