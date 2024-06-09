<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DEstadoCivil {
    private $id;
    private $nombre;
    private $db;
    // Constructor
    public function __construct($id=null, $nombre=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        
        $db = new Pgsql();
        $context = new ContextBd($db);
        $this->db = $context->conectar();
    }
    
    // Métodos getter y setter
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Otros métodos relacionados con la gestión de datos de estadoCivils

    public function lista()
    {
        $query = "SELECT * FROM estado_civil";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id){
        $query = "SELECT * FROM estado_civil WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DEstadoCivil $dec)
    {
        $query = "INSERT INTO estado_civil (nombre) VALUES (:nombre)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $dec->getNombre());
        $stmt->bindParam(':id', $dec->getId());
        $stmt->execute();
    }
    
    public function actualizar($id, DEstadoCivil $dec)
    {
        $query = "UPDATE estado_civil SET nombre = :nombre WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $dec->getNombre());
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    
    public function eliminar($id)
    {
        $query = "DELETE FROM estado_civil WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>