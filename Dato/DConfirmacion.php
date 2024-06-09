<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DConfirmacion {
    private $nro_certificado;
    private $padrinos;
    private $id_confirmado;
    private $db;
    
    public function __construct($nro_certificado=null, $padrinos=null, $id_confirmado=null) {
        $this->nro_certificado = $nro_certificado;
        $this->padrinos = $padrinos;
        $this->id_confirmado = $id_confirmado;
        
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

    public function getIdConfirmado() {
        return $this->id_confirmado;
    }
    public function setIdConfirmado($id_confirmado) {
        $this->id_confirmado = $id_confirmado;
    }

    public function lista()
    {
        $query = "SELECT certificado.*, confirmacion.* 
        FROM certificado 
        INNER JOIN confirmacion ON certificado.nro = confirmacion.nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorNro($nro_certificado){
        $query = "SELECT certificado.*, confirmacion.* 
        FROM certificado 
        INNER JOIN confirmacion ON certificado.nro = confirmacion.nro_certificado
        WHERE nro = :nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DConfirmacion $dc)
    {
        $query = "INSERT INTO confirmacion (nro_certificado, padrinos, id_confirmado) VALUES (:nro_certificado, :padrinos, :id_confirmado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $dc->getNroCertificado());
        $stmt->bindParam(':padrinos', $dc->getPadrinos());
        $stmt->bindParam(':id_confirmado', $dc->getIdConfirmado());
        $stmt->execute();
    }
    
    public function actualizar($nro_certificado, DConfirmacion $dc)
    {
        $query = "UPDATE confirmacion SET padrinos = :padrinos, id_confirmado = :id_confirmado WHERE nro_certificado = :nro_certificado";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->bindParam(':padrinos', $dc->getPadrinos());
        $stmt->bindParam(':id_confirmado', $dc->getIdConfirmado());
        $stmt->execute();
    }

    
    public function eliminar($nro_certificado)
    {
        $query = "DELETE FROM confirmacion WHERE nro_certificado = :nro_certificado";
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