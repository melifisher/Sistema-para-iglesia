<?php
require_once('../../Dato/DRelacion.php');
class NRelacion{
    private DRelacion $dc;

    public function __construct(){
        $this->dc = new DRelacion();
    }

    public function lista(){
        return $this->dc->lista();
    }

    public function obtenerPorId($id_1, $id_2){
        return $this->dc->obtenerPorId($id_1, $id_2);
    }

    public function agregar($id_persona1, $id_persona2, $id_tipo){
        $this->dc->agregar(new DRelacion($id_persona1, $id_persona2, $id_tipo));
    }

    public function actualizar($id_persona1, $id_persona2, $id_tipo){
        $this->dc->actualizar($id_persona1, $id_persona2, new DRelacion($id_persona1, $id_persona2, $id_tipo));
    }

    public function eliminar($id_persona1, $id_persona2){
        $this->dc->eliminar($id_persona1, $id_persona2);
    }

    /* public function buscarPadres($id_persona){
        $id_padres = $this->dc->buscarPadres($id_persona);
        $nPersona = new NPersona();
        $padre = $nPersona->obtenerPorId($id_padres[0]);
        $madre = $nPersona->obtenerPorId($id_padres[1]);
        $padres = $padre->nombre." ".$padre->apellidos." ".$madre->nombre." ".$madre->apellidos;
        return $padres;
    } */
}
?>