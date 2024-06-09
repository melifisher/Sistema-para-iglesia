<?php
class Concubino implements EstadoCivil{
    private ContextPersona $context;
    
    public function setContext($context){
        $this->context = $context;
    }
    public function getContext(){
        return $this->context;
    }
    public function solterar(){
        $this->context->setEstado(new Soltero());
    }
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function divorciar(){
        $this->context->setMensaje("El concubino no puede divorciarse");
    }
    public function concubinar(){}
    public function enviudar(){
        $this->context->setMensaje("El concubino no puede enviudar");
    }
}
?>