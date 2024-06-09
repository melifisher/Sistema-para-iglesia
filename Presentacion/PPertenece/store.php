<?php
require_once('../../Negocio/NPertenece.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_persona = $_POST['id_persona'];
    $id_ministerio = $_POST['id_ministerio'];
    $detalle = $_POST['detalle'];
    
    $nPertenece = new NPertenece();
    $nPertenece->agregar($id_persona, $id_ministerio, $detalle);
    
    header("Location: list.php");
    exit();
}
?>