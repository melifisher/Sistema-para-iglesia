<?php
require_once('../../Negocio/NPertenece.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id_persona = $_POST['id_persona'];
    $id_ministerio = $_POST['id_ministerio'];
    // Otros campos del formulario
    
    // Llama a la función de agregar en la capa de negocio
    $nPertenece = new NPertenece();
    $nPertenece->eliminar($id_persona, $id_ministerio);
    
    header("Location: list.php");
    exit();
}
?>