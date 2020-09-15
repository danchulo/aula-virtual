<?php
include_once '../Modelo/Bean/PersonaBean.php';

class UsuarioBean extends PersonaBean{
    public $usuario_id;
    public $usuario;
    public $password;
    public $foto;
    public $tipo_usuario_id;
    public $estado;
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function getUsuario_id() {
        return $this->usuario_id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getFoto() {
        return $this->foto;
    }

    function getTipo_usuario_id() {
        return $this->tipo_usuario_id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setTipo_usuario_id($tipo_usuario_id) {
        $this->tipo_usuario_id = $tipo_usuario_id;
    }


}
