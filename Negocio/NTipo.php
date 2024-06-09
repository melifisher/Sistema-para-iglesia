<?php
require_once('../../Dato/DTipo.php');

class NTipo{
    private DTipo $dc;

    public function __construct(){
        $this->dc = new DTipo();
    }

    public function lista(){
        return $this->dc->lista();
    }

    public function obtenerPorId($id){
        return $this->dc->obtenerPorId($id);
    }

    public function agregar($id, $nombre){
        $this->dc->agregar(new DTipo($id, $nombre));
    }

    public function actualizar($id, $nombre){
        $this->dc->actualizar($id, new DTipo($id, $nombre));
    }

    public function eliminar($id){
        $this->dc->eliminar($id);
    }
}
?>