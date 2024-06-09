<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DMinisterio {
    private $id;
    private $nombre;
    private $descripcion;
    private $conexion;
    private ContextBd $context;
    
    public function __construct($id=null, $nombre=null, $descripcion=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function setDatabase($id){
        switch ($id) {
            case 1:
                $str = new PgSql();
              break;
            case 2:
                $str = new MySql();
              break;
            case 3:
                $str = new SqlServer();
            break;
            default:
          }
          
        $this->context = new ContextBd($str);

        $this->conexion = $this->context->conectar();
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
        $query = "SELECT * FROM ministerio";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id){
        $query = "SELECT * FROM ministerio WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar(DMinisterio $dc)
    {
        $query = "INSERT INTO ministerio (id, nombre, descripcion) VALUES (:id, :nombre, :descripcion)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $dc->getId());
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->bindParam(':descripcion', $dc->getDescripcion());
        $stmt->execute();
    }
    
    public function actualizar($id, DMinisterio $dc)
    {
        $query = "UPDATE ministerio SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $dc->getNombre());
        $stmt->bindParam(':descripcion', $dc->getDescripcion());
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    
    public function eliminar($id)
    {
        $query = "DELETE FROM ministerio WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>