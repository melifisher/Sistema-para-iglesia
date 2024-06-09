<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DBautismo {
    private $nro_certificado;
    private $padrinos;
    private $id_bautizado;
    private $db;
    
    public function __construct($nro_certificado=null, $padrinos=null, $id_bautizado=null) {
        $this->nro_certificado = $nro_certificado;
        $this->padrinos = $padrinos;
        $this->id_bautizado = $id_bautizado;
        
        $db = new Pgsql();
        $context = new ContextBd($db);
        $this->db = $context->conectar();
    }
    
    // Métodos getter y setter
    public function getNroCertificado() {
        return $this->nro_certificado;
    }
    public function setNroCertificado($nro_certificado) {
        $this->nro_certificado = $nro_certificado;
    }

    public function getPadrinos() {
        return $this->padrinos;
    }
    public function setPadrinos($padrinos) {
        $this->padrinos = $padrinos;
    }

    public function getIdBautizado() {
        return $this->id_bautizado;
    }
    public function setIdBautizado($id_bautizado) {
        $this->id_bautizado = $id_bautizado;
    }

    public function lista()
    {
        $query = "SELECT certificado.*, bautismo.* 
        FROM certificado 
        INNER JOIN bautismo ON certificado.nro = bautismo.nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorNro($nro_certificado){
        $query = "SELECT certificado.*, bautismo.* 
        FROM certificado 
        INNER JOIN bautismo ON certificado.nro = bautismo.nro_certificado
        WHERE nro = :nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DBautismo $dc)
    {
        $query = "INSERT INTO bautismo (nro_certificado, padrinos, id_bautizado) VALUES (:nro_certificado, :padrinos, :id_bautizado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $dc->getNroCertificado());
        $stmt->bindParam(':padrinos', $dc->getPadrinos());
        $stmt->bindParam(':id_bautizado', $dc->getIdBautizado());
        $stmt->execute();
    }
    
    public function actualizar($nro_certificado, DBautismo $dc)
    {
        $query = "UPDATE bautismo SET padrinos = :padrinos, id_bautizado = :id_bautizado WHERE nro_certificado = :nro_certificado";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->bindParam(':padrinos', $dc->getPadrinos());
        $stmt->bindParam(':id_bautizado', $dc->getIdBautizado());
        $stmt->execute();
    }

    
    public function eliminar($nro_certificado)
    {
        $query = "DELETE FROM bautismo WHERE nro_certificado = :nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>