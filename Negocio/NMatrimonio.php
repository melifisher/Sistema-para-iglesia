<?php
require_once('../../Dato/DMatrimonio.php');
require_once '../../Negocio/NCertificado.php';

class NMatrimonio extends NCertificado{
    private DMatrimonio $db;

    public function __construct(){
        $this->db = new DMatrimonio();
        parent::__construct();
    }

    public function lista(){
        return $this->db->lista();
    }

    public function obtenerPorNro($nro_certificado){
        return $this->db->obtenerPorNro($nro_certificado);
    }

    /* public function agregar($nro, $lugar, $fecha_celebracion, $tipo, $id_parroco, ...$params)
    {
        parent::agregar($nro, $lugar, $fecha_celebracion, $tipo, $id_parroco, ...$params);
        
        $testigos = $params[0];
        $id_esposo = $params[1];
        $id_esposa = $params[2];

        $this->db->agregar(new DMatrimonio($nro, $testigos, $id_esposo, $id_esposa));
    } */

    protected function agregarEspecifico($nro_certificado, ...$params){
        $testigos = $params[0];
        $id_esposo = $params[1];
        $id_esposa = $params[2];

        $this->db->agregar(new DMatrimonio($nro_certificado, $testigos, $id_esposo, $id_esposa));
    }
    protected function actualizarEspecifico($nro_certificado, ...$params){
        $testigos = $params[0];
        $id_esposo = $params[1];
        $id_esposa = $params[2];

        $this->db->actualizar($nro_certificado, new DMatrimonio($nro_certificado, $testigos, $id_esposo, $id_esposa));
    }
    protected function eliminarEspecifico($nro_certificado){
        $this->db->eliminar($nro_certificado);
    }
}
?>