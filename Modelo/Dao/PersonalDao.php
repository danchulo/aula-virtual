<?php
require_once '../Util/Querys.php';

class PersonalDao {
    
public  function cantidadPersonal()
   {  try {
     
       $sql="select count(*) as cantidad from personal where estado='A';";
       $rs=ejecutarConsulta($sql);
      $fila=  mysqli_fetch_assoc($rs);
       $cantidad=$fila['cantidad'];
       
       } catch (Exception $e) {  
         $cantidad=null;
       }     
     return   $cantidad;        
   }    
    
   public  function listarPersonal()
   {  try {
     
       $sql="select * from lista_personal_completa;";
       $rs=ejecutarConsulta($sql);
       $LISTA['PERSONAL']= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             array_push($LISTA['PERSONAL'], 
             array('PERSONAL'=>$fila['personal'],'FOTO'=>$fila['foto'],
                   'SEXO'=>$fila['sexo'], 'EMAIL'=>$fila['email'],'DNI'=>$fila['dni'],'DIRECCION'=>$fila['direccion'],
                   'CEL'=>$fila['numero_cel'],'TEL'=>$fila['numero_tel'],'EDAD'=>$fila['edad'],
                   'DIRECCION'=>$fila['direccion'],'CARGO'=>$fila['nombre'],'ESTADO'=>$fila['estado']));      
           }   
       
       } catch (Exception $e) {  
         $LISTA=null;
       }     
     return   $LISTA;        
   }    
}
