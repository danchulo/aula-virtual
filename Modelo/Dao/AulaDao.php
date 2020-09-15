<?php

require_once '../Util/Querys.php';
require_once "../Modelo/Bean/ClaseBean.php";

class AulaDao {
    
    public function listarAula(){
        try {
            $sql="select * from salon where order by salon_id desc";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['SALON']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['SALON'], 
             array('CODIGO'=>$fila['salon_id'],'AULA'=>$fila['salon_nombre'],'ESTADO'=>$fila['estado']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
     public function cargaAula(){
        try {
            $sql="select salon_id,salon_nombre from salon where estado='A'";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['SALON']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['SALON'], 
             array('CODIGO'=>$fila['salon_id'],'AULA'=>$fila['salon_nombre']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
    
    public  function guardarAula(AulaBean $objbean)
   {  
         try 
         {
             $query="select * from salon where salon_nombre='$objbean->salon_nombre';";
             $cant=existencia($query);
             if($cant){
                 $rspta=2;
             }
             else {
             $sql="insert into salon values(null,'$objbean->salon_nombre','A');";
             $rspta=ejecutarConsulta($sql);
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
    
}