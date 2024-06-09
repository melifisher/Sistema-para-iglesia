<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DMatrimonio {
    private $nro_certificado;
    private $testigos;
    private $id_esposo;
    private $id_esposa;
    private $db;
    
    public function __construct($nro_certificado=null, $testigos=null, $id_esposo=null, $id_esposa=null) {
        $this->nro_certificado = $nro_certificado;
        $this->testigos = $testigos;
        $this->id_esposo = $id_esposo;
        $this->id_esposa = $id_esposa;
        
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

    public function getTestigos() {
        return $this->testigos;
    }
    public function setTestigos($testigos) {
        $this->testigos = $testigos;
    }

    public function getIdEsposo() {
        return $this->id_esposo;
    }
    public function setIdEsposo($id_esposo) {
        $this->id_esposo = $id_esposo;
    }

    public function getIdEsposa() {
        return $this->id_esposa;
    }
    public function setIdEsposa($id_esposa) {
        $this->id_esposa = $id_esposa;
    }

    public function lista()
    {
        $query = "SELECT certificado.*, matrimonio.* 
        FROM certificado 
        INNER JOIN matrimonio ON certificado.nro = matrimonio.nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorNro($nro_certificado){
        $query = "SELECT certificado.*, matrimonio.* 
        FROM certificado 
        INNER JOIN matrimonio ON certificado.nro = matrimonio.nro_certificado
        WHERE nro = :nro_certificado";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DMatrimonio $dc)
    {
        $query = "INSERT INTO matrimonio (nro_certificado, testigos, id_esposo, id_esposa) VALUES (:nro_certificado, :testigos, :id_esposo, :id_esposa)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $dc->getNroCertificado());
        $stmt->bindParam(':testigos', $dc->getTestigos());
        $stmt->bindParam(':id_esposo', $dc->getIdEsposo());
        $stmt->bindParam(':id_esposa', $dc->getIdEsposa());
        $stmt->execute();
    }
    
    public function actualizar($nro_certificado, DMatrimonio $dc)
    {
        $query = "UPDATE matrimonio SET testigos = :testigos, id_esposo = :id_esposo, id_esposa = :id_esposa WHERE nro_certificado = :nro_certificado";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nro_certificado', $nro_certificado);
        $stmt->bindParam(':testigos', $dc->getTestigos());
        $stmt->bindParam(':id_esposo', $dc->getIdEsposo());
        $stmt->bindParam(':id_esposa', $dc->getIdEsposa());
        $stmt->execute();
    }

    
    public function eliminar($nro_certificado)
    {
        $query = "DELETE FROM matrimonio WHERE nro_certificado = :nro_certificado";
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