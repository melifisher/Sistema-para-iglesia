<?php
require_once '../../BaseDeDatos/PgSql.php';
require_once '../../BaseDeDatos/MySql.php';
require_once '../../BaseDeDatos/SqlServer.php';
require_once 'ContextBd.php';

class DPersona {
    private $id;
    private $nombre;
    private $apellidos;
    private $fecha_nacimiento;
    private $fecha_bautizo;
    private $id_estado_civil;
    private $id_cargo;
    private $db;
    
    public function __construct($id=null, $nombre=null, $apellidos=null, $fecha_nacimiento=null, $fecha_bautizo=null, $id_estado_civil=null, $id_cargo=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->fecha_bautizo = $fecha_bautizo;
        $this->id_estado_civil = $id_estado_civil;
        $this->id_cargo = $id_cargo;
        
        $pgsql = new Pgsql();
        $this->db = $pgsql->conectar();
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

    public function getApellidos() {
        return $this->apellidos;
    }
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }
    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getFechaBautizo() {
        return $this->fecha_bautizo;
    }
    public function setFechaBautizo($fecha_bautizo) {
        $this->fecha_bautizo = $fecha_bautizo;
    }

    public function getIdEstadoCivil() {
        return $this->id_estado_civil;
    }
    public function setIdEstadoCivil($id_estado_civil) {
        $this->id_estado_civil = $id_estado_civil;
    }

    public function getIdCargo() {
        return $this->id_cargo;
    }
    public function setIdCargo($id_cargo) {
        $this->id_cargo = $id_cargo;
    }

    public function lista()
    {
        try{
            $query = "SELECT * FROM persona";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }

    public function obtenerPorId($id){
        try{
            $query = "SELECT * FROM persona WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }

    public function obtenerEstado($id){
        try{
            $query = "SELECT id_estado_civil FROM persona WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->id_estado_civil;
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }

    public function agregar(DPersona $dc)
    {
        try{
            $query = "INSERT INTO persona (id, nombre, apellidos, fecha_nacimiento, fecha_bautizo, id_estado_civil, id_cargo) VALUES (:id, :nombre, :apellidos, :fecha_nacimiento, :fecha_bautizo, :id_estado_civil, :id_cargo)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $dc->getId());
            $stmt->bindParam(':nombre', $dc->getNombre());
            $stmt->bindParam(':apellidos', $dc->getApellidos());
            $stmt->bindParam(':fecha_nacimiento', $dc->getFechaNacimiento());
            $stmt->bindParam(':fecha_bautizo', $dc->getFechaBautizo());
            $stmt->bindParam(':id_estado_civil', $dc->getIdEstadoCivil());
            $stmt->bindParam(':id_cargo', $dc->getIdCargo());
            $stmt->execute();
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }
    
    public function actualizar($id, DPersona $dc)
    {
        try{
            $query = "UPDATE persona SET nombre = :nombre, apellidos = :apellidos, fecha_nacimiento = :fecha_nacimiento, fecha_bautizo = :fecha_bautizo, id_estado_civil = :id_estado_civil, id_cargo = :id_cargo WHERE id = :id";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nombre', $dc->getNombre());
            $stmt->bindParam(':apellidos', $dc->getApellidos());
            $stmt->bindParam(':fecha_nacimiento', $dc->getFechaNacimiento());
            $stmt->bindParam(':fecha_bautizo', $dc->getFechaBautizo());
            $stmt->bindParam(':id_estado_civil', $dc->getIdEstadoCivil());
            $stmt->bindParam(':id_cargo', $dc->getIdCargo());
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }

    
    public function eliminar($id)
    {
        try{
            $query = "DELETE FROM persona WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            print($e->getMessage());
        } 
    }

}

?>