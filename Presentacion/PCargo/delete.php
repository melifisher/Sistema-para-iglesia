<?php
require_once('../../Negocio/NCargo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    // Otros campos del formulario
    
    // Llama a la función de agregar en la capa de negocio
    $nCargo = new NCargo();
    $nCargo->eliminar($id);
    
    header("Location: list.php");
    exit();
}
?>