<?php
require_once "../Util/Querys.php";

class    AdministradorDao
{     
  //Mantenimiento de tablas simples
    
     public  function accion($tipo,$tabla,$id,$esta)
   {  
      
         try 
         {
            
             if($tipo=="e"){
                $sql="delete from $tabla where ".$tabla."_id='$id';";
             ejecutarConsulta($sql);
             }else if($tipo=="i"){
                 
                $sql="update $tabla set estado='$esta' where ".$tabla."_id='$id';";
             $con=ejecutarConsulta($sql);
             
             if($con==1){
                 if($esta=="A"){
                     $rspta="Se habilitó correctamente!!!";
                     
                 }else if ($esta=="I"){
                      $rspta="Se inhabilitó correctamente!!!";
                 }
             }
             
             }
             else if($tipo=="b"){
             $sql="select * from $tabla where ".$tabla."_id='$id';";
             $rs= ejecutarConsulta($sql);
             $rspta['LISTA']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($rspta['LISTA'], 
             array('CODIGO'=>$fila[''.$tabla.'_id'],'NOMBRE'=>$fila[''.$tabla.'_nombre'],'ESTADO'=>$fila['estado']));      
           }   
             }
          
       } catch (Exception $e) {  
           $rspta=null;
       }     
   
     return  $rspta;       

 }

}
