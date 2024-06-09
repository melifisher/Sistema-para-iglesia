<?php
class Concubino extends EstadoCivil{
    public function solterar(){
        $this->context->setEstado(new Soltero());
    }
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function divorciar(){
        $this->context->setMensaje("El concubino no puede divorciarse");
    }
    public function enviudar(){
        $this->context->setMensaje("El concubino no puede enviudar");
    }
}
?>