<?php


class GradoBean {
    public $grado_id;
    public $estado;
    public $grado;
    public $sufijo;
    function getGrado_id() {
        return $this->grado_id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setGrado_id($grado_id) {
        $this->grado_id = $grado_id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function getGrado() {
        return $this->grado;
    }

    function getSufijo() {
        return $this->sufijo;
    }

    function setGrado($grado) {
        $this->grado = $grado;
    }

    function setSufijo($sufijo) {
        $this->sufijo = $sufijo;
    }
    
}
