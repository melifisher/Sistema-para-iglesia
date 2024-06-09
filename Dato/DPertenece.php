<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DPertenece {
    private $id_persona;
    private $id_ministerio;
    private $detalle;
    private $db;
    
    public function __construct($id_persona=null, $id_ministerio=null, $detalle=null) {
        $this->id_persona = $id_persona;
        $this->id_ministerio = $id_ministerio;
        $this->detalle = $detalle;

        $db = new Pgsql();
        $context = new ContextBd($db);
        $this->db = $context->conectar();
    }
    
    // Métodos getter y setter
    public function getIdPersona() {
        return $this->id_persona;
    }
    public function setIdPersona($id_persona) {
        $this->id_persona1 = $id_persona;
    }

    public function getIdMinisterio() {
        return $this->id_ministerio;
    }
    public function setIdMinisterio($id_ministerio) {
        $this->id_ministerio = $id_ministerio;
    }

    public function getDetalle() {
        return $this->detalle;
    }
    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    public function lista()
    {
        $query = "SELECT * FROM pertenece";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id_1, $id_2){
        $query = "SELECT * FROM pertenece WHERE id_persona = :id_1 AND id_ministerio = :id_2";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_1', $id_1);
        $stmt->bindParam(':id_2', $id_2);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DPertenece $dc)
    {
        $query = "INSERT INTO pertenece (id_persona, id_ministerio, detalle) VALUES (:id_persona, :id_ministerio, :detalle)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_persona', $dc->getIdPersona());
        $stmt->bindParam(':id_ministerio', $dc->getIdMinisterio());
        $stmt->bindParam(':detalle', $dc->getDetalle());
        $stmt->execute();
    }
    
    public function actualizar(DPertenece $dc)
    {
        $query = "UPDATE pertenece SET detalle = :detalle WHERE id_persona = :id_persona AND id_ministerio = :id_ministerio";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_persona', $dc->getIdPersona());
        $stmt->bindParam(':id_ministerio', $dc->getIdMinisterio());
        $stmt->bindParam(':detalle', $dc->getDetalle());

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function eliminar($id_persona, $id_ministerio)
    {
        $query = "DELETE FROM pertenece WHERE id_persona = :id_persona AND id_ministerio = :id_ministerio";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_persona', $id_persona);
        $stmt->bindParam(':id_ministerio', $id_ministerio);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>