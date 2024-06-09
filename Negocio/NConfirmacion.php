<?php
require_once('../../Dato/DConfirmacion.php');
require_once '../../Negocio/NCertificado.php';

class NConfirmacion extends NCertificado{
    private DConfirmacion $db;

    public function __construct(){
        $this->db = new DConfirmacion();
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
        
        $padrinos = $params[0];
        $id_confirmado = $params[1];

        $this->db->agregar(new DConfirmacion($nro, $padrinos, $id_confirmado));
    } */
    protected function agregarEspecifico($nro_certificado, ...$params){
        $padrinos = $params[0];
        $id_confirmado = $params[1];

        $this->db->agregar(new DConfirmacion($nro_certificado, $padrinos, $id_confirmado));
    }
    protected function actualizarEspecifico($nro_certificado, ...$params){
        $padrinos = $params[0];
        $id_confirmado = $params[1];
        $this->db->actualizar($nro_certificado, new DConfirmacion($nro_certificado, $padrinos, $id_confirmado));
    }
    protected function eliminarEspecifico($nro_certificado){
        $this->db->eliminar($nro_certificado);
    }
}
?>