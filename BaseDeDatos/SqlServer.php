<?php
require_once 'Db.php';
class SqlServer implements Db {
    public function conectar()
    {
        $serverName = "LAPTOP-62L575OK"; 
        $database = "iglesia_sqlserver";
        $dsn = "sqlsrv:server=$serverName;Database=$database";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        $conn = new PDO($dsn, null, null, $options);

        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            return $conn;
        }


        //return new PDO('sqlsrv:Server=localhost;Database=iglesia', 'LAPTOP-62L575OK', '');
    }
}

?>