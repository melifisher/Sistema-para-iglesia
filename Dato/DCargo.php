<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DCargo {
    private $id;
    private $nombre;
    private $descripcion;
    private $db;
    
    public function __construct($id=null, $nombre=null, $descripcion=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

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

    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function lista()
    {
        $query = "SELECT * FROM cargo";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id){
        $query = "SELECT * FROM cargo WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DCargo $dc)
    {
        $query = "INSERT INTO cargo (id, nombre, descripcion) VALUES (:id, :nombre, :descripcion)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $dc->getId());
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->bindParam(':descripcion', $dc->getDescripcion());
        $stmt->execute();
    }
    
    public function actualizar($id, DCargo $dc)
    {
        $query = "UPDATE cargo SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->bindParam(':descripcion', $dc->getDescripcion());
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    
    public function eliminar($id)
    {
        $query = "DELETE FROM cargo WHERE id = :id";
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