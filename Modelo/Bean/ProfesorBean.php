<?php

require_once '../Modelo/Bean/UsuarioBean.php';

class ProfesorBean extends UsuarioBean{

    public $profesor_id;
    public $area_id;
    public $nivel;
    
    function getProfesor_id() {
        return $this->profesor_id;
    }

    function getArea_id() {
        return $this->area_id;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setProfesor_id($profesor_id) {
        $this->profesor_id = $profesor_id;
    }

    function setArea_id($area_id) {
        $this->area_id = $area_id;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }


}
