<?php
require_once('../../Negocio/NRelacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id_persona1 = $_POST['id_persona1'];
    $id_persona2 = $_POST['id_persona2'];
    // Otros campos del formulario
    
    // Llama a la función de agregar en la capa de negocio
    $nRelacion = new NRelacion();
    $nRelacion->eliminar($id_persona1, $id_persona2);
    
    header("Location: list.php");
    exit();
}
?>