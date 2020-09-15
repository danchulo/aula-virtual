<?php
require_once "../Util/Querys.php";  
require_once "../Modelo/Bean/GradoBean.php";
class    GradoDao
{     
  
      public  function listarGrado()
   {  
          try {
      
           $sql="select * from grado order by grado_id desc;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['GRADO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['GRADO'], 
             array('CODIGO'=>$fila['grado_id'],'GRADO'=>$fila['grado'],'SUFIJO'=>$fila['sufijo'],'ESTADO'=>$fila['estado']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
    public  function cargaGrado()
   {  
          try {
      
           $sql="select * from grado where estado='A' order by grado;";
           $rs=ejecutarConsulta($sql);
             
           $LISTA['GRADO']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['GRADO'], 
             array('CODIGO'=>$fila['grado_id'],'GRADO'=>$fila['grado'],'SUFIJO'=>$fila['sufijo']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }

     public function filtrarGrado($id){
        try {
            $sql="select * from grado where estado='A' and grado_id!='$id' order by grado";
            $rs=ejecutarConsulta($sql);
            
            $LISTA['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['LISTA'], 
             array('CODIGO'=>$fila['grado_id'],'GRADO'=>$fila['grado']));      
           }   
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $LISTA;
    }
   
     public  function accion(GradoBean $objbean,$tipo)
   { 
         try 
         {
            
             $query="select * from grado where grado='$objbean->grado';";
             $rspta=existencia($query);
             if($rspta==0){
                if($tipo=="g"){
                    $sql="insert into grado values(null,'$objbean->grado','$objbean->sufijo','A');";
                }else if($tipo=="a"){
                    $sql="update grado set grado='$objbean->grado',sufijo='$objbean->sufijo' WHERE grado_id='$objbean->grado_id';";
                }
                $rspta=ejecutarConsulta($sql);
              
             }

       } catch (Exception $e) {  
           $rspta=0;
       }     
     return  $rspta;        
   }
   
    public  function accion2($tipo,$id)
   {  
      
         try 
         {
             if($tipo=="e"){
                $sql="delete from grado where grado_id='$id';";
             ejecutarConsulta($sql);
             }
             
             else if($tipo=="b"){
             $sql="select * from grado where grado_id='$id';";
             $rs= ejecutarConsulta($sql);
             $rspta['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($rspta['LISTA'], 
             array('CODIGO'=>$fila['grado_id'],'NOMBRE'=>$fila['grado'],'SUFIJO'=>$fila['sufijo'],'ESTADO'=>$fila['estado']));      
           }   
             }
          
       } catch (Exception $e) {  
           $rspta=null;
       }
       return $rspta;
   }
}
