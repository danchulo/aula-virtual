<?php


class AreaBean {
    public $area_id;
    public $area_nombre;
    public $estado;
    function getArea_id() {
        return $this->area_id;
    }

    function setArea_id($area_id) {
        $this->area_id = $area_id;
    }

        function getArea_nombre() {
        return $this->area_nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setArea_nombre($area_nombre) {
        $this->area_nombre = $area_nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


    
    
    
}
