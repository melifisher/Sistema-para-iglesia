<?php
require_once('../../Dato/DBautismo.php');
require_once '../../Negocio/NCertificado.php';

class NBautismo extends NCertificado{
    private DBautismo $db;

    public function __construct(){
        $this->db = new DBautismo();
        parent::__construct();
    }

    public function lista(){
        return $this->db->lista();
    }

    public function obtenerPorNro($nro_certificado){
        return $this->db->obtenerPorNro($nro_certificado);
    }
    protected function agregarEspecifico($nro_certificado, ...$params){
        $padrinos = $params[0];
        $id_bautizado = $params[1];
        $this->db->agregar(new DBautismo($nro_certificado, $padrinos, $id_bautizado));
    }
    protected function actualizarEspecifico($nro_certificado, ...$params){
        $padrinos = $params[0];
        $id_bautizado = $params[1];
        $this->db->actualizar($nro_certificado, new DBautismo($nro_certificado, $padrinos, $id_bautizado));
    }
    protected function eliminarEspecifico($nro_certificado){
        $this->db->eliminar($nro_certificado);
    }
}
?>