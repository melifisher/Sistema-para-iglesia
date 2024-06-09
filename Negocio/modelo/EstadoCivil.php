<?php
require_once 'ContextPersona.php';
require_once 'Soltero.php';
require_once 'Casado.php';
require_once 'Concubino.php';
require_once 'Divorciado.php';
require_once 'Viudo.php';

interface EstadoCivil {
    public function setContext($context);
    public function getContext();
    public function solterar();
    public function casarse();
    public function divorciar();
    public function concubinar();
    public function enviudar();
}
?>