<?php
require_once('../../Negocio/NPersona.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento']; if($fecha_nacimiento=="") $fecha_nacimiento=null;
    $fecha_bautizo = $_POST['fecha_bautizo']; if($fecha_bautizo=="") $fecha_bautizo=null;
    $id_estado_civil =  $_POST['id_estado_civil'];
    $id_cargo =  $_POST['id_cargo'];
    if($id_cargo==0) $id_cargo=null;
    
    $nPersona = new NPersona();
    $mensaje = $nPersona->actualizar($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo);
    if($mensaje=="success"){
        header("Location: list.php");
    }else{
        header('Location: update.php?id='.$id.'&mensaje='.$mensaje);
    }
    exit;
} 
?>