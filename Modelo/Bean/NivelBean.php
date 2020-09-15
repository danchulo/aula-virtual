<?php

class NivelBean {
   
    public $nivel_id,$nivel_nombre,$estado;
    
    function getNivel_id() {
        return $this->nivel_id;
    }

    function getNivel_nombre() {
        return $this->nivel_nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNivel_id($nivel_id) {
        $this->nivel_id = $nivel_id;
    }

    function setNivel_nombre($nivel_nombre) {
        $this->nivel_nombre = $nivel_nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
