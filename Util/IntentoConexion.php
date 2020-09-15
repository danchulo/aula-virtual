<?php
class IntentoConexion {
    
    const SERVER ="localhost";
    const USER="root";
    const PASSWORD="";
    const DATABASE="tiendaonline";
    private $cn=null;
    
    public function getConexion(){
        try {
            $conexion= mysqli_connect(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
            $this->cn=$conexion;
            
        } catch (mysqli_sql_exception $ex) {
            $msg=$ex->getMessage();
        }
        
        
    }
    
    
}
