<?php
class Soltero extends EstadoCivil{
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function divorciar(){
        $this->context->setMensaje("El soltero no puede divorciarse");
    }
    public function concubinar(){
        $this->context->setEstado(new Concubino());
    }
    public function enviudar(){
        $this->context->setMensaje("El soltero no puede enviudar");
    }
}
?>