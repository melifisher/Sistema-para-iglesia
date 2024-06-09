<?php
require_once 'EstadoCivil.php';
class ContextPersona {
    private EstadoCivil $estado;
    private String $mensaje="";

    public function __construct($estado){
        $this->estado = $estado;
        $this->estado->setContext($this);
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }
    public function getMensaje(){
        return $this->mensaje;
    }

    public function solterar(){
        $this->estado->solterar();
    }

    public function casarse(){
        $this->estado->casarse();
    }
    public function divorciar(){
        $this->estado->divorciar();
    }
    public function concubinar(){
        $this->estado->concubinar();
    }
    public function enviudar(){
        $this->estado->enviudar();
    }
}