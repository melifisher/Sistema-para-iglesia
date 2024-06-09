<?php
require_once 'Db.php';
class PgSql implements Db {
    public function conectar(){
        return new PDO('pgsql:host=localhost;port=5432; dbname=iglesia', 'postgres', 'password');
    }
}

?>