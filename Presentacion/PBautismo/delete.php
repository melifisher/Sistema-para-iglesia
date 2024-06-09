<?php
require_once('../../Negocio/NBautismo.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nro = $_POST['nro'];
    
    
    $nBautismo = new NBautismo();
    $nBautismo->eliminar($nro);
    
    header("Location: list.php");
    exit();
}
?>