<?php
class Casado extends EstadoCivil{
    public function solterar(){
        $this->context->setMensaje("De casado no puede volver a soltero");
    }
    public function divorciar(){
        $this->context->setEstado(new Divorciado());
    }
    public function concubinar(){
        $this->context->setMensaje("De casado no puede concubinar");
    }
    public function enviudar(){
        $this->context->setEstado(new Viudo());
    }
}
?>