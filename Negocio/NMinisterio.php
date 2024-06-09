<?php
require_once('../../Dato/DMinisterio.php');

class NMinisterio{
    private DMinisterio $dm;

    public function __construct(){
        $this->dm = new DMinisterio();
    }

    public function setDatabase($id_db){
        $this->dm->setDatabase($id_db);
    }

    public function lista(){
        return $this->dm->lista();
    }

    public function obtenerPorId($id){
        return $this->dm->obtenerPorId($id);
    }

    public function agregar($id, $nombre, $descripcion){
        $this->dm->agregar(new DMinisterio($id, $nombre, $descripcion));
    }

    public function actualizar($id, $nombre, $descripcion){
        $this->dm->actualizar($id, new DMinisterio($id, $nombre, $descripcion));
    }

    public function eliminar($id){
        $this->dm->eliminar($id);
    }
}
?>