<?php
require_once 'Db.php';
class SqlServer implements Db {
    public function conectar(){
        return new PDO('sqlsrv:Server=localhost;Database=iglesia', 'LAPTOP-62L575OK', '');
    }
}

?>