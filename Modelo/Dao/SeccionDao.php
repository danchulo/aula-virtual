<?php
require_once "../Util/Querys.php";  
class SeccionDao {
       public  function listarSeccion()
   {  try {
      
           $sql="select * from seccion order by seccion_id desc;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['GRADO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['GRADO'], 
             array('CODIGO'=>$fila['seccion_id'],'SECCION'=>$fila['seccion_nombre'],'ESTADO'=>$fila['estado']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
     public  function cargaSeccion()
   {  try {
      
           $sql="select * from seccion WHERE ESTADO='A' order by seccion_nombre;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['GRADO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['GRADO'], 
             array('CODIGO'=>$fila['seccion_id'],'SECCION'=>$fila['seccion_nombre']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
    public function filtrarSeccion($id){
        try {
            $sql="select * from seccion where estado='A' and seccion_id!='$id' order by seccion_nombre";
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
   
   public  function accion(SeccionBean $objbean,$tipo)
   {  
  
         try 
         {
             $query="select * from seccion where seccion_nombre='$objbean->seccion_nombre';";
             $rspta=existencia($query);
             if($rspta==0){
                if($tipo=="g"){
                    $sql="insert into seccion  values(null,'$objbean->seccion_nombre','A');";
                }else if($tipo=="a"){
                    $sql="update seccion set seccion_nombre='$objbean->seccion_nombre' WHERE seccion_id='$objbean->seccion_id';";
                }
                $rspta=ejecutarConsulta($sql);
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
}
