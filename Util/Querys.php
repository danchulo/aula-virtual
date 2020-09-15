<?php 
require_once "ConexionBD.php";
 
 $objc = new ConexionBD();
 $cn=$objc->getConexionBD();  
           
   if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
                global $cn;
		$query = $cn->query($sql);
		return $query;
              
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		  global $cn;
		$rs = $cn->query($sql);			
		$row = $rs->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
                global $cn;
		$query = $cn->query($sql);		
		return $cn->insert_id;
	}
        
        function existencia($sql)
	{ $existe=0;
		global $cn;
		$rs = $cn->query($sql);	
                $cant=mysqli_num_rows($rs);
                if($cant==1){
                    $existe=2;
                }
		return $existe;			
	}

	function limpiarCadena($str)
	{
		global $cn;
		$str = mysqli_real_escape_string($cn,trim($str));
		return htmlspecialchars($str);
	}
}