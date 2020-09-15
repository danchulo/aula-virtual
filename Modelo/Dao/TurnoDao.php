<?php
require_once "../Util/Querys.php";  
require_once "../Modelo/Bean/TurnoBean.php";
class TurnoDao {
    public  function listarTurno()
   {  try {
      
           $sql="select * from turno order by turno_id desc ;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['TURNO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['TURNO'], 
             array('CODIGO'=>$fila['turno_id'],'TURNO'=>$fila['turno_nombre'],'ESTADO'=>$fila['estado']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
   public  function cargaTurno()
   {  try {
      
           $sql="select * from turno where estado='A' order by turno_nombre;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['TURNO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['TURNO'], 
             array('CODIGO'=>$fila['turno_id'],'TURNO'=>$fila['turno_nombre']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   public function filtrarTurno($id){
        try {
            $sql="select * from turno where estado='A' and turno_id!='$id' order by turno_nombre";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['turno_id'],'TURNO'=>$fila['turno_nombre']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
   public  function accion(TurnoBean $objbean,$tipo)
   {  
         try 
         {
            $query="select * from turno where turno_nombre='$objbean->turno_nombre';";
             $rspta=existencia($query);
             if($rspta==0){
                if($tipo=="g"){
                    $sql="insert into turno  values(null,'$objbean->turno_nombre','A');";
                }else if($tipo=="a"){
                    $sql="update turno set turno_nombre='$objbean->turno_nombre' WHERE turno_id='$objbean->turno_id';";
                }
                $rspta=ejecutarConsulta($sql);
             }
  
       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
}
