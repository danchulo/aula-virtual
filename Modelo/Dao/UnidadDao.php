<?php

class UnidadDao {
    public  function listarUni()
   {  try {
      
           $sql="select * from unidad_tematica order by unidad_tematica_id desc ;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['UNI']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['UNI'], 
             array('CODIGO'=>$fila['unidad_tematica_id'],'UNIDAD'=>$fila['nombre_unidad_tema'],'ESTADO'=>$fila['estado']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function cargaUnidad()
   {  try {
      
           $sql="select * from unidad_tematica where estado='A' ;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['UNI']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['UNI'], 
             array('CODIGO'=>$fila['unidad_tematica_id'],'UNIDAD'=>$fila['nombre_unidad_tema']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   public function filtrarUnidad($id){
        try {
            $sql="select * from unidad_tematica where estado='A' and unidad_tematica_id!='$id'";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['unidad_tematica_id'],'UNIDAD'=>$fila['nombre_unidad_tema']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
    
    public  function accion(UnidadBean $objbean,$tipo)
   {  
         try 
         {
            $query="select * from unidad where nombre_unidad_tema='$objbean->nombre_unidad_tema';";
             $rspta=existencia($query);
             if($rspta==0){
                if($tipo=="g"){
                    $sql="insert into unidad_tematica  values(null,'$objbean->nombre_unidad_tema','A');";
                }else if($tipo=="a"){
                    $sql="update unidad_tematica set nombre_unidad_tema='$objbean->nombre_unidad_tema' "
                            . "WHERE unidad_tematica_id='$objbean->unidad_tematica_id';";
                }
                $rspta=ejecutarConsulta($sql);
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
}
