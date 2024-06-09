<?php
class Divorciado extends EstadoCivil{
    public function solterar(){
        $this->context->setMensaje("De divorciado no puede volver a soltero");
    }
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function concubinar(){
        $this->context->setMensaje("De divorciado no puede concubinar");
    }
    public function enviudar(){
        $this->context->setMensaje("De divorciado no puede enviudar");
    }
}
?>