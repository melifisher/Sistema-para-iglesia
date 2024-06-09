<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DTipo {
    private $id;
    private $nombre;
    private $db;
    
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

    public function lista()
    {
        $query = "SELECT * FROM tipo";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id){
        $query = "SELECT * FROM tipo WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DTipo $dc)
    {
        $query = "INSERT INTO tipo (id, nombre) VALUES (:id, :nombre)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $dc->getId());
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->execute();
    }
    
    public function actualizar($id, DTipo $dc)
    {
        $query = "UPDATE tipo SET nombre = :nombre WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    
    public function eliminar($id)
    {
        $query = "DELETE FROM tipo WHERE id = :id";
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