<?php
require_once '../../Dato/DCertificado.php';

abstract class NCertificado{
    private DCertificado $dc;

    public function __construct(){
        $this->dc = new DCertificado();
    }

    public function lista(){}

    public function listaPorTipo($tipo){
        return $this->dc->listaPorTipo($tipo);
    }

    /* public function obtenerPorNroC1($nro){
        $certificado1 = $this->dc->obtenerPorNro($nro);
        $certificado2 = $this->obtenerPorNro($nro);

        $certificadoConcatenado = new stdClass();
        foreach ($certificado1 as $key => $value) {
            $certificadoConcatenado->$key = $value;
        }
        foreach ($certificado2 as $key => $value) {
            $certificadoConcatenado->$key = $value;
        }

        return $certificadoConcatenado;
    } */
    public function obtenerPorNro($nro_certificado){}

    public function agregar($nro, $lugar, $fecha_celebracion, $tipo, $id_parroco, ...$params)
    {
        $this->dc->agregar(new DCertificado($nro, $lugar, $fecha_celebracion, date('Y-m-d'), 'B', $id_parroco));
        $this->agregarEspecifico($nro, ...$params);
    }
    abstract protected function agregarEspecifico($nro_certificado, ...$params);

    public function actualizar($nro, $lugar, $fecha_celebracion, $fecha_registro, $tipo, $id_parroco, ...$params){
        $this->dc->actualizar($nro, new DCertificado($nro, $lugar, $fecha_celebracion, $fecha_registro, $tipo, $id_parroco));  
        $this->actualizarEspecifico($nro, ...$params);
    }
    abstract protected function actualizarEspecifico($nro_certificado, ...$params);

    public function eliminar($nro){
        $this->eliminarEspecifico($nro);
        $this->dc->eliminar($nro);
    }

    abstract protected function eliminarEspecifico($nro_certificado);
}
?>