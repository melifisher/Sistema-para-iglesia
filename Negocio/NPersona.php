<?php
require_once '../../Dato/DPersona.php';
require_once 'modelo/ContextPersona.php';

class NPersona{
    private DPersona $dc;
    private ContextPersona $context;

    public function __construct($id=null, $nombre=null, $apellidos=null, $fecha_nacimiento=null, $fecha_bautizo=null, $id_estado_civil=null, $id_cargo=null){
        $this->dc = new DPersona($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo);
    }

    public function lista(){
        return $this->dc->lista();
    }

    public function obtenerPorId($id){
        return $this->dc->obtenerPorId($id);
    }

    public function agregar($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo=null){
        $this->dc->agregar(new DPersona($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo));
    }

    public function crearContext($id){
        $estado = $this->obtenerEstadoActual($this->dc->obtenerEstado($id));
        $this->context = new ContextPersona($estado);
        
    }

    public function obtenerEstadoActual($id_estado_civil){
        switch ($id_estado_civil) {
            case 1:
              $estado = new Soltero();
              break;
            case 2:
                $estado = new Casado();
              break;
            case 3:
                $estado = new Divorciado();
              break;
            case 4:
                $estado = new Concubino();
                break;
            case 5:
                $estado = new Viudo();
             break;
          }
          return $estado;
    }

    public function cambiarEstado($id_estado_civil){
        switch ($id_estado_civil) {
            case 1:
                $this->context->solterar();
              break;
            case 2:
                $this->context->casarse();
              break;
            case 3:
                $this->context->divorciar();
              break;
            case 4:
                $this->context->concubinar();
                break;
            case 5:
                $this->context->enviudar();
            break;
            default:
          }
    }

    public function actualizar($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo = null)
    {
        $this->crearContext($id);

        $this->cambiarEstado($id_estado_civil);

        $mensaje = $this->context->getMensaje();
        if ($mensaje==""){
            $this->dc->actualizar($id, new DPersona($id, $nombre, $apellidos, $fecha_nacimiento, $fecha_bautizo, $id_estado_civil, $id_cargo));
            return "success";
        }else{
            return $mensaje;
        }
    }

    public function eliminar($id){
        $this->dc->eliminar($id);
    }
}
?>