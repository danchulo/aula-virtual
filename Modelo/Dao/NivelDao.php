<?php

require_once "../Util/Querys.php";  
require_once "../Modelo/Bean/NivelBean.php";

class NivelDao {
    
      public  function listarNivel()
   {  try {
      
           $sql="select * from nivel order by nivel_id desc;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
              $LISTA[]=$fila;     
           } 
       }catch (Exception $e) {    
           $LISTA=$e->getMessage();
       } 
        return $LISTA;
   }
   
    public  function cargaNivel()
   {  try {
      
           $sql="select * from nivel where estado='A' order by nivel_nombre;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             $LISTA[]=$fila;     
           } 
  
       } catch (Exception $e) {    
           $LISTA=$e->getMessage();
       }     
     return  $LISTA;        
   }
   
   public function filtrarNivel($id){
        try {
            $sql="select * from nivel where estado='A' and nivel_id!='$id' order by nivel_nombre";
            $rs=ejecutarConsulta($sql);
            
            $LISTA= array();
            while ($fila=  mysqli_fetch_assoc($rs))
            {
               $LISTA[]=$fila;     
            } 
       }catch (Exception $e) {    
           $LISTA=$e->getMessage();
       } 
        return $LISTA;
    }
    
   public  function accion(NivelBean $objbean,$tipo)
   {  
  
         try 
         {
             $query="select * from nivel where nivel_nombre='$objbean->nivel_nombre';";
             $rspta=existencia($query);
             if($rspta==0){
                if($tipo=="g"){
                    $sql="insert into nivel (nivel_nombre,estado) values('$objbean->nivel_nombre','A');";
                }else if($tipo=="a"){
                    $sql="update nivel set nivel_nombre='$objbean->nivel_nombre' WHERE nivel_id='$objbean->nivel_id';";
                }
                $rspta=ejecutarConsulta($sql);
             }
             
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
}
