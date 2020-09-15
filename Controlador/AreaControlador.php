<?php
 session_start();
require_once '../Modelo/Bean/AreaBean.php';
require_once '../Modelo/Dao/AreaDao.php';

     
$objDao=new AreaDao();
$objBean=new AreaBean();
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 

       $listaArea=$objDao->listarArea();
       $_SESSION['listaAreas']=$listaArea;
       header('Location:../View/Administracion/Mantenimiento/area_mant.php');
       break;
   }  
   
     case  2: { 
   
         
         $tipo=$_POST['tipo'];

              @$nom=$_POST['nom'];

         @$estado= $_POST['estado'];
         @$id= $_POST['id'];
         $objBean->setArea_id(@$id);
         $objBean->setEstado(@$estado);
         $objBean->setArea_nombre(@$nom);
         $rspta=$objDao->accion($objBean,$tipo);
 
        echo $rspta;
       
        break;
    
   } 
   
 }