<?php
class Casado implements EstadoCivil{
    private ContextPersona $context;
    
    public function setContext($context){
        $this->context = $context;
    }
    public function getContext(){
        return $this->context;
    }
    public function solterar(){
        $this->context->setMensaje("De casado no puede volver a soltero");
    }
    public function casarse(){}
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