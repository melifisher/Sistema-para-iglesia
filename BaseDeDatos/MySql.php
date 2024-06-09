<?php
require_once 'Db.php';
class MySql implements Db {
    public function conectar(){
        return new PDO('mysql:host=localhost; dbname=iglesia_mysql', 'root', 'Hola-mundo1');
    }
}

?>