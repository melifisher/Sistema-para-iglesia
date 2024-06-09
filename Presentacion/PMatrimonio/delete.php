<?php
require_once('../../Negocio/NMatrimonio.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nro = $_POST['nro'];
    
    
    $nMatrimonio = new NMatrimonio();
    $nMatrimonio->eliminar($nro);
    
    header("Location: list.php");
    exit();
}
?>