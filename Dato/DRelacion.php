<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DRelacion {
    private $id_persona1;
    private $id_persona2;
    private $id_tipo;
    private $db;
    
    public function __construct($id_persona1=null, $id_persona2=null, $id_tipo=null) {
        $this->id_persona1 = $id_persona1;
        $this->id_persona2 = $id_persona2;
        $this->id_tipo = $id_tipo;

        $db = new Pgsql();
        $context = new ContextBd($db);
        $this->db = $context->conectar();
    }
    
    // Métodos getter y setter
    public function getIdPersona1() {
        return $this->id_persona1;
    }
    public function setIdPersona1($id_persona1) {
        $this->id_persona1 = $id_persona1;
    }

    public function getIdPersona2() {
        return $this->id_persona2;
    }
    public function setIdPersona2($id_persona2) {
        $this->id_persona2 = $id_persona2;
    }

    public function getTipo() {
        return $this->id_tipo;
    }
    public function setTipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function lista()
    {
        $query = "SELECT * FROM relacion";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id_1, $id_2){
        $query = "SELECT * FROM relacion WHERE id_persona1 = :id_1 AND id_persona2 = :id_2";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_1', $id_1);
        $stmt->bindParam(':id_2', $id_2);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DRelacion $dc)
    {
        $query = "INSERT INTO relacion (id_persona1, id_persona2, id_tipo) VALUES (:id_persona1, :id_persona2, :id_tipo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_persona1', $dc->getIdPersona1());
        $stmt->bindParam(':id_persona2', $dc->getIdPersona2());
        $stmt->bindParam(':id_tipo', $dc->getTipo());
        $stmt->execute();
    }
    
    public function actualizar($id_1, $id_2, DRelacion $dc)
    {
        $query = "UPDATE relacion SET id_tipo = :id_tipo WHERE id_persona1 = :id_1 AND id_persona2 = :id_2";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_tipo', $dc->getTipo());
        $stmt->bindParam(':id_1', $id_1);
        $stmt->bindParam(':id_2', $id_2);

        $stmt->execute();
    }

    
    public function eliminar($id_persona1, $id_persona2)
    {
        $query = "DELETE FROM relacion WHERE id_persona1 = :id_1 AND id_persona2 = :id_2";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_1', $id_persona1);
        $stmt->bindParam(':id_2', $id_persona2);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarPadres($id_persona){
        $query = "SELECT * FROM relacion WHERE id_persona1 = :id_persona AND (id_tipo = 2 OR id_tipo = 3)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_persona', $id_persona);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}

?>