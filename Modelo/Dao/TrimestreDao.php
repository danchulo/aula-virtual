<?php
require_once "../Util/ConexionBD.php";  
require_once "../Util/Querys.php";  
class    TrimestreDao
{     
  
      public  function selectTri()
   {  try {
          $objc = new ConexionBD();
      $cn=$objc->getConexionBD();  
           $sql="select * from carga_trimestre;";
          $rs= mysqli_query($cn,$sql);
             
           $LISTA['TRIMESTRE']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['TRIMESTRE'], 
             array('TRIMESTRE_CARGA'=>$fila['nombre_trimestre_escolar'],'TRIMESTRE_ID'=>$fila['trimestre_escolar_id']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
   
     public  function selectTriAnio($anio_id)
   {  try {
          $objc = new ConexionBD();
      $cn=$objc->getConexionBD();  
           $sql="select * from carga_trimestre where anio_escolar_id='$anio_id';";
          $rs= mysqli_query($cn,$sql);
             
           $LISTA['TRIMESTRE']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['TRIMESTRE'], 
             array('TRIMESTRE_CARGA'=>$fila['nombre_trimestre_escolar'],'TRIMESTRE_ID'=>$fila['trimestre_escolar_id']));   
           }   
  
       } catch (Exception $e) {                 
       }     
     return  $LISTA;        
   }
}
