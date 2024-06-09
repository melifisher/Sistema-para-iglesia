<?php
require_once('../../Dato/DEstadoCivil.php');

class NEstadoCivil{
    private DEstadoCivil $dec;

    public function __construct(){
        $this->dec = new DEstadoCivil();
    }

    public function lista(){
        return $this->dec->lista();
    }

    public function obtenerPorId($id){
        return $this->dec->obtenerPorId($id);
    }

    public function agregar($id, $nombre){
        $this->dec->agregar(new DEstadoCivil($id, $nombre));
    }

    public function actualizar($id, $nombre){
        $this->dec->actualizar($id, new DEstadoCivil($id, $nombre));
    }

    public function eliminar($id){
        $this->dec->eliminar($id);
    }
}
?>