<?php
class Divorciado implements EstadoCivil{
    private ContextPersona $context;
    
    public function setContext($context){
        $this->context = $context;
    }
    public function getContext(){
        return $this->context;
    }
    public function solterar(){
        $this->context->setMensaje("De divorciado no puede volver a soltero");
    }
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function divorciar(){}
    public function concubinar(){
        $this->context->setMensaje("De divorciado no puede concubinar");
    }
    public function enviudar(){
        $this->context->setMensaje("De divorciado no puede enviudar");
    }
}
?>