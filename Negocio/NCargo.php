<?php
require_once('../../Dato/DCargo.php');

class NCargo{
    private DCargo $dc;

    public function __construct(){
        $this->dc = new DCargo();
    }

    public function lista(){
        return $this->dc->lista();
    }

    public function obtenerPorId($id){
        return $this->dc->obtenerPorId($id);
    }

    public function agregar($id, $nombre, $descripcion){
        $this->dc->agregar(new DCargo($id, $nombre, $descripcion));
    }

    public function actualizar($id, $nombre, $descripcion){
        $this->dc->actualizar($id, new DCargo($id, $nombre, $descripcion));
    }

    public function eliminar($id){
        $this->dc->eliminar($id);
    }
}
?>