<?php

class TurnoBean {
   
    public $turno_id,$turno_nombre,$estado;
    
    function getTurno_id() {
        return $this->turno_id;
    }

    function getTurno_nombre() {
        return $this->turno_nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setTurno_id($turno_id) {
        $this->turno_id = $turno_id;
    }

    function setTurno_nombre($turno_nombre) {
        $this->turno_nombre = $turno_nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
