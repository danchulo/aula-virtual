<?php

class ClaseBean {

    public  $clase_id;
    public  $grado_id;
    public  $seccion_id;
    public  $nivel_id;
    public  $salon_id;
    public  $turno_id;
    public  $hora_inicio;
    public  $hora_fin;
    public  $capacidad;
    public  $anio_escolar_id;
    public $profesor_id;
    public  $estado;
    
    
    function getProfesor_id() {
        return $this->profesor_id;
    }

    function setProfesor_id($profesor_id) {
        $this->profesor_id = $profesor_id;
    }

        function getClase_id() {
        return $this->clase_id;
    }

    function getGrado_id() {
        return $this->grado_id;
    }

    function getSeccion_id() {
        return $this->seccion_id;
    }

    function getNivel_id() {
        return $this->nivel_id;
    }

    function getSalon_id() {
        return $this->salon_id;
    }

    function getTurno_id() {
        return $this->turno_id;
    }

    function getHora_inicio() {
        return $this->hora_inicio;
    }

    function getHora_fin() {
        return $this->hora_fin;
    }

    function getCapacidad() {
        return $this->capacidad;
    }

    function getAnio_escolar_id() {
        return $this->anio_escolar_id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setClase_id($clase_id) {
        $this->clase_id = $clase_id;
    }

    function setGrado_id($grado_id) {
        $this->grado_id = $grado_id;
    }

    function setSeccion_id($seccion_id) {
        $this->seccion_id = $seccion_id;
    }

    function setNivel_id($nivel_id) {
        $this->nivel_id = $nivel_id;
    }

    function setSalon_id($salon_id) {
        $this->salon_id = $salon_id;
    }

    function setTurno_id($turno_id) {
        $this->turno_id = $turno_id;
    }

    function setHora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    function setHora_fin($hora_fin) {
        $this->hora_fin = $hora_fin;
    }

    function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    function setAnio_escolar_id($anio_escolar_id) {
        $this->anio_escolar_id = $anio_escolar_id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}