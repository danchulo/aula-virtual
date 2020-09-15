<?php

class TemaBean {
    public $tema_id;
    public $nombre_tema;
    public $estado;
    public $unidad_tematica_id;
    public $curso_id;
    function getTema_id() {
        return $this->tema_id;
    }

    function getNombre_tema() {
        return $this->nombre_tema;
    }

    function getEstado() {
        return $this->estado;
    }

    function getUnidad_tematica_id() {
        return $this->unidad_tematica_id;
    }

    function getCurso_id() {
        return $this->curso_id;
    }

    function setTema_id($tema_id) {
        $this->tema_id = $tema_id;
    }

    function setNombre_tema($nombre_tema) {
        $this->nombre_tema = $nombre_tema;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setUnidad_tematica_id($unidad_tematica_id) {
        $this->unidad_tematica_id = $unidad_tematica_id;
    }

    function setCurso_id($curso_id) {
        $this->curso_id = $curso_id;
    }


}
