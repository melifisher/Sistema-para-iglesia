<?php
require_once '../../BaseDeDatos/Db.php';

class ContextBd{
    private Db $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function setDb($db){
        $this->db = $db;
    }
    public function getDb(){
        return $this->db;
    }

    public function conectar(){
        return $this->db->conectar();
    }
}
?>