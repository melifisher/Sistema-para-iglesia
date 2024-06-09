<?php
require_once('../../Negocio/NPersona.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $fecha_bautizo = $_POST['fecha_bautizo']; if($fecha_nacimiento=="") $fecha_nacimiento=null;
    $fecha_bautizo = $_POST['fecha_bautizo']; if($fecha_bautizo=="") $fecha_bautizo=null;
    $id_cargo =  $_POST['id_cargo'];
    if($id_cargo==0) $id_cargo=null;
    
    $nPersona = new NPersona();
    $nPersona->agregar($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo);
    
    // Redirige a alguna página de éxito o muestra un mensaje de éxito
    header("Location: list.php");
    exit();
}
?>