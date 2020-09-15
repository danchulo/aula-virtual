<?php

class ConexionBD {

    const SERVER = "localhost";
    const USER = "root";
    const PASS = "";
    const DATABASE = "el_nazareno_bd";

    private $cn = null;

    public function getConexionBD() {
        try {
            $conexion = new mysqli(self::SERVER, self::USER, self::PASS, self::DATABASE);
            $this->cn = $conexion;
            $conexion->query("SET NAMES 'utf8'");
        } catch (mysqli_sql_exception $e) {
            throw $e;
            
        }
        return $this->cn;
    }

}
