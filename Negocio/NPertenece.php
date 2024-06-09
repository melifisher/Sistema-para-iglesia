<?php
require_once('../../Dato/DPertenece.php');

class NPertenece{
    private DPertenece $dc;

    public function __construct(){
        $this->dc = new DPertenece();
    }

    public function lista(){
        return $this->dc->lista();
    }

    public function obtenerPorId($id_1, $id_2){
        return $this->dc->obtenerPorId($id_1, $id_2);
    }

    public function agregar($id_persona, $id_ministerio, $detalle){
        $this->dc->agregar(new DPertenece($id_persona, $id_ministerio, $detalle));
    }

    public function actualizar($id_persona, $id_ministerio, $detalle){
        $this->dc->actualizar(new DPertenece($id_persona, $id_ministerio, $detalle));
    }

    public function eliminar($id_persona, $id_ministerio){
        $this->dc->eliminar($id_persona, $id_ministerio);
    }
}
?>