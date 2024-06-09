<?php
require_once('../../Negocio/NMinisterio.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $db = $_POST['db'];
    
    $nMinisterio = new NMinisterio();
	$nMinisterio->setDatabase($db);
    $nMinisterio->agregar($id, $nombre, $descripcion);
    
    // Redirige a alguna página de éxito o muestra un mensaje de éxito
    header("Location: list.php?db=$db");
    exit();
}
?>