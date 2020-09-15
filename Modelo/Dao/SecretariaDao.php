<?php

class SecretariaDao {
    
public  function cantidadSecretaria()
   {  try {
     
       $sql="select count(*) as cantidad from usuario where estado='A' and tipo_usuario_id='4';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }    
    
}
