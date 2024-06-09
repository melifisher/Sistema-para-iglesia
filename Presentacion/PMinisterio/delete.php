<?php
require_once('../../Negocio/NMinisterio.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $db = $_POST['db'];
    
    $nMinisterio = new NMinisterio();
	$nMinisterio->setDatabase($db);
    $nMinisterio->eliminar($id);
    
    header("Location: list.php?db=$db");
    exit();
}
?>