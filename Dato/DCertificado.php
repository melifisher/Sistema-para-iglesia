<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DCertificado {
    private $nro;
    private $lugar;
    private $fecha_celebracion;
    private $fecha_registro;
    private $tipoCertificado;
    private $id_parroco;
    private $db;
    
    public function __construct($nro=null, $lugar=null, $fecha_celebracion=null, $fecha_registro=null,$tipoCertificado=null, $id_parroco=null) {
        $this->nro = $nro;
        $this->lugar = $lugar;
        $this->fecha_celebracion = $fecha_celebracion;
        $this->fecha_registro = $fecha_registro;
        $this->tipoCertificado = $tipoCertificado;
        $this->id_parroco = $id_parroco;
        
        $db = new Pgsql();
        $context = new ContextBd($db);
        $this->db = $context->conectar();
    }
    
    // Métodos getter y setter
    public function getNro() {
        return $this->nro;
    }
    public function setNro($nro) {
        $this->nro = $nro;
    }

    public function getLugar() {
        return $this->lugar;
    }
    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    public function getFechaCelebracion() {
        return $this->fecha_celebracion;
    }
    public function setFechaCelebracion($fecha_celebracion) {
        $this->fecha_celebracion = $fecha_celebracion;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }
    public function setFechaRegistro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function getTipo() {
        return $this->tipoCertificado;
    }
    public function setTipo($tipo) {
        $this->tipoCertificado = $tipo;
    }

    public function getIdParroco() {
        return $this->id_parroco;
    }
    public function setIdParroco($id_parroco) {
        $this->id_parroco = $id_parroco;
    }
    
    public function lista()
    {
        $query = "SELECT * FROM certificado";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function listaPorTipo($tipo){
        $query = "SELECT * FROM certificado WHERE tipo = :tipo";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorNro($nro){
        $query = "SELECT * FROM certificado WHERE nro = :nro";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro', $nro);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DCertificado $dc)
    {
        $query = "INSERT INTO certificado (nro, lugar, fecha_celebracion, fecha_registro, tipo, id_parroco) VALUES (:nro, :lugar, :fecha_celebracion, :fecha_registro, :tipo, :id_parroco)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro', $dc->getNro());
        $stmt->bindParam(':lugar', $dc->getLugar());
        $stmt->bindParam(':fecha_celebracion', $dc->getFechaCelebracion());
        $stmt->bindParam(':fecha_registro', $dc->getFechaRegistro());
        $stmt->bindParam(':tipo', $dc->getTipo());
        $stmt->bindParam(':id_parroco', $dc->getIdParroco());
        $stmt->execute();
    }
    
    public function actualizar($nro, DCertificado $dc)
    {
        $query = "UPDATE certificado SET lugar = :lugar, fecha_celebracion = :fecha_celebracion, fecha_registro = :fecha_registro, tipo = :tipo, id_parroco = :id_parroco WHERE nro = :nro";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':lugar', $dc->getLugar());
        $stmt->bindParam(':fecha_celebracion', $dc->getFechaCelebracion());
        $stmt->bindParam(':fecha_registro', $dc->getFechaRegistro());
        $stmt->bindParam(':tipo', $dc->getTipo());
        $stmt->bindParam(':id_parroco', $dc->getIdParroco());
        $stmt->bindParam(':nro', $nro);

        $stmt->execute();
    }

    
    public function eliminar($nro)
    {
        $query = "DELETE FROM certificado WHERE nro = :nro";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro', $nro);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>