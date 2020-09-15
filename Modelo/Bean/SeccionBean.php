<?php

class SeccionBean {

    public $seccion_id,$seccion_nombre,$estado;
    
    function getSeccion_id() {
        return $this->seccion_id;
    }

    function setSeccion_id($seccion_id) {
        $this->seccion_id = $seccion_id;
    }

        function getSeccion_nombre() {
        return $this->seccion_nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setSeccion_nombre($seccion_nombre) {
        $this->seccion_nombre = $seccion_nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
