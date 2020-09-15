<?php

require_once '../Util/Querys.php';
require_once "../Modelo/Bean/AreaBean.php";



class AreaDao {
    
    public function listarArea(){
        try {
            $sql="select * from area order by area_id desc;";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['AREA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['AREA'], 
             array('CODIGO'=>$fila['area_id'],'AREA'=>$fila['area_nombre'],'ESTADO'=>$fila['estado']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
     public function cargaArea(){
        try {
            $sql="select area_id,area_nombre from Area where estado='A'";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['AREA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['AREA'], 
             array('CODIGO'=>$fila['area_id'],'AREA'=>$fila['area_nombre']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
    public function filtrarArea($listaAreas){
        try {
            $objc = new ConexionBD();
      $cn=$objc->getConexionBD();   
      $conver= implode(",",$listaAreas);
            $LISTA['AREA']= array();
           
                $sql="select area_id,area_nombre from area  where estado='A' and area_id not in ($conver);";
               $rs= mysqli_query($cn,$sql);
            
           while ($fila= mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['AREA'], 
             array('CODIGO'=>$fila['area_id'],'AREA'=>$fila['area_nombre']));      
           }   

        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
     
    public  function accion(AreaBean $objbean,$tipo)
   {  
         try 
         {
              $query="select * from area where area_nombre='$objbean->area_nombre';";
             $rspta=existencia($query);
             
             if($rspta==0){
             if($tipo=="g"){
             $sql="insert into area values(null,'$objbean->area_nombre','A');";
             }else if($tipo=="a"){
              $sql="update area set area_nombre='$objbean->area_nombre' WHERE area_id='$objbean->area_id';";    
             }
             $rspta=ejecutarConsulta($sql);
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
    
   
}
