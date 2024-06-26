<?php
class Viudo implements EstadoCivil{
    private ContextPersona $context;
    
    public function setContext($context){
        $this->context = $context;
    }
    public function getContext(){
        return $this->context;
    }
    public function solterar(){
        $this->context->setMensaje("De viudo no puede volver a soltero");
    }
    public function casarse(){
        $this->context->setEstado(new Casado());
    }
    public function divorciar(){
        $this->context->setMensaje("De viuda no puede ir a divorciado");
    }
    public function concubinar(){   
        $this->context->setMensaje("De viuda no puede ir a concubino");
    }
    public function enviudar(){}
}
?>