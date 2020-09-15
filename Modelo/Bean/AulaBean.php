<?php

class AulaBean {
    public $salon_id,$salon_nombre,$estado;
    
    function getSalon_id() {
        return $this->salon_id;
    }

    function getSalon_nombre() {
        return $this->salon_nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setSalon_id($salon_id) {
        $this->salon_id = $salon_id;
    }

    function setSalon_nombre($salon_nombre) {
        $this->salon_nombre = $salon_nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
