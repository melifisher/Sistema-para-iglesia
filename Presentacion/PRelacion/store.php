<?php
require_once('../../Negocio/NRelacion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_persona1 = $_POST['id_persona1'];
    $id_persona2 = $_POST['id_persona2'];
    $id_tipo = $_POST['id_tipo'];
    if($id_persona1 != $id_persona2){
        $nRelacion = new NRelacion();
        $nRelacion->agregar($id_persona1, $id_persona2, $id_tipo);
        
        header("Location: list.php");
    }
    else{
        header("Location: new.php");
    }
    exit();
}
?>