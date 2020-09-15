<?php

require_once '../Util/Querys.php';
require_once "../Modelo/Bean/AmbienteBean.php";

class AmbienteDao {
    
    public function listarAula(){
        try {
            $sql="select * from salon order by salon_id desc";
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
            $sql="select salon_id,salon_nombre from salon where estado='A' order by salon_nombre;";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['SALON']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['SALON'], 
             array('CODIGO'=>$fila['salon_id'],'AULA'=>$fila['salon_nombre']));      
           }   
            
        } catch (Exception $exc) {
            $LISTA->$exc->getMessage();
        }
        return $LISTA;
    }
    
//    public function filtrarAmbiente($id){
//        try {
//            $sql="select salon_id,salon_nombre from salon where estado='A' and salon_id!='$id' order by salon_nombre;";
//            $rs=ejecutarConsulta($sql);
//            
//            $LISTA= array();
//           while ($fila=  mysqli_fetch_assoc($rs))
//           {
//             $LISTA[]=$fila;     
//           }   
//            
//        } catch (Exception $exc) {
//            $LISTA->$exc->getMessage();
//        }
//        return $LISTA;
//    }
//    
    
    public  function accion(AmbienteBean $objbean,$tipo)
   {  
         try 
         {
             $query="select * from salon where salon_nombre='$objbean->salon_nombre';";
             $rspta=existencia($query);
             if($rspta==0){
                  if($tipo=="g"){
             $sql="insert into salon values(null,'$objbean->salon_nombre','A');";
             }else if($tipo=="a"){
               $sql="update salon set salon_nombre='$objbean->salon_nombre' WHERE salon_id='$objbean->salon_id';";
             }
             $rspta=ejecutarConsulta($sql);
              
             }
             
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }

    
}