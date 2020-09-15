<?php

class PersonaBean {

    public $nombres;
    public $apellido_paterno;
    public $dni;
    public $direccion;
    public $numero_cel;
    public $numero_tel;
    public $fecha_nac;
    public $email;
    public $apellido_materno;
    public $sexo;
    public $distrito_id;
    function getNombres() {
        return $this->nombres;
    }

    function getApellido_paterno() {
        return $this->apellido_paterno;
    }

    function getDni() {
        return $this->dni;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getNumero_cel() {
        return $this->numero_cel;
    }

    function getNumero_tel() {
        return $this->numero_tel;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getEmail() {
        return $this->email;
    }

    function getApellido_materno() {
        return $this->apellido_materno;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDistrito_id() {
        return $this->distrito_id;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setNumero_cel($numero_cel) {
        $this->numero_cel = $numero_cel;
    }

    function setNumero_tel($numero_tel) {
        $this->numero_tel = $numero_tel;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setDistrito_id($distrito_id) {
        $this->distrito_id = $distrito_id;
    }



    
}