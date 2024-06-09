<?php
class Soltero implements EstadoCivil{
    private ContextPersona $context;
    
    public function setContext($context){
        $this->context = $context;
    }
    public function getContext(){
        return $this->context;
    }
    public function solterar(){}
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