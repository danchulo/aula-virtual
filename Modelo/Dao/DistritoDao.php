<?php
require_once "../Util/Querys.php";  
require_once "../Util/ConexionBD.php";

class DistritoDao {
    public  function cargarDistrito()
   {  
        try {
           $objc = new ConexionBD();
           $cn=$objc->getConexionBD();
           $sql="select * from distrito order by distrito_id ;";
           $rs= mysqli_query($cn, $sql);
           $LISTA= array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             $LISTA[]=$fila; 
           }           
       }catch (Exception $e) {
           $LISTA=$e->errorMessage();
       }     
     return  $LISTA;              
   }

   
     public  function ListarDistriDistinta($dis_id)
   {  try 
       
       {
           
           $sql="select * from distrito where distrito_id!='$dis_id' ;";
           $objc = new ConexionBD();
           $cn=$objc->getConexionBD();   
       $rs= mysqli_query($cn,$sql);
           $LISTA=array();
           while ($fila=  mysqli_fetch_assoc($rs))
           {
             $LISTA[]=$fila;  
           }           
       } catch (Exception $e) {                 
       }     
     return  $LISTA;       
   }

       }