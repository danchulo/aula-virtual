<?php

class UnidadBean {
    public $unidad_tematica_id,$nombre_unidad_tema,$estado;
    
    function getUnidad_tematica_id() {
        return $this->unidad_tematica_id;
    }

    function getNombre_unidad_tema() {
        return $this->nombre_unidad_tema;
    }

    function getEstado() {
        return $this->estado;
    }

    function setUnidad_tematica_id($unidad_tematica_id) {
        $this->unidad_tematica_id = $unidad_tematica_id;
    }

    function setNombre_unidad_tema($nombre_unidad_tema) {
        $this->nombre_unidad_tema = $nombre_unidad_tema;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
