<?php
require_once('../../Negocio/NConfirmacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nro = $_POST['nro'];
    
    
    $nConfirmacion = new NConfirmacion();
    $nConfirmacion->eliminar($nro);
    
    header("Location: list.php");
    exit();
}
?>