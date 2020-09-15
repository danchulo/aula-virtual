<?php

class CursoBean {

    public $curso_id;
    public $curso_codigo;
    public $curso_nombre;
    public $grado_id;
    public $nivel_id;
    public $area_id;
    public $estado;

    function getCurso_id() {
        return $this->curso_id;
    }

    function getCurso_codigo() {
        return $this->curso_codigo;
    }

    function getCurso_nombre() {
        return $this->curso_nombre;
    }

    function getGrado_id() {
        return $this->grado_id;
    }

    function getNivel_id() {
        return $this->nivel_id;
    }

    function getArea_id() {
        return $this->area_id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setCurso_id($curso_id) {
        $this->curso_id = $curso_id;
    }

    function setCurso_codigo($curso_codigo) {
        $this->curso_codigo = $curso_codigo;
    }

    function setCurso_nombre($curso_nombre) {
        $this->curso_nombre = $curso_nombre;
    }

    function setGrado_id($grado_id) {
        $this->grado_id = $grado_id;
    }

    function setNivel_id($nivel_id) {
        $this->nivel_id = $nivel_id;
    }

    function setArea_id($area_id) {
        $this->area_id = $area_id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }




}