<?php

include_once '../Modelo/Bean/UsuarioBean.php';

class EstudianteBean extends UsuarioBean{
    
    public $estudiante_id;
    public $codigo_estu;
    public $grado_id;
    public $nivel_id;
    
    function getEstudiante_id() {
        return $this->estudiante_id;
    }

    function getCodigo_estu() {
        return $this->codigo_estu;
    }

    function getGrado_id() {
        return $this->grado_id;
    }

    function getNivel_id() {
        return $this->nivel_id;
    }

    function setEstudiante_id($estudiante_id) {
        $this->estudiante_id = $estudiante_id;
    }

    function setCodigo_estu($codigo_estu) {
        $this->codigo_estu = $codigo_estu;
    }

    function setGrado_id($grado_id) {
        $this->grado_id = $grado_id;
    }

    function setNivel_id($nivel_id) {
        $this->nivel_id = $nivel_id;
    }


}
