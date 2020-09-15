<?php
 session_start();
require_once '../Modelo/Bean/SeccionBean.php';
require_once '../Modelo/Dao/SeccionDao.php';

     
$objDao=new SeccionDao();
$objBean=new SeccionBean();
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
      
        $lista=$objDao->listarSeccion();
        $_SESSION['listaSeccion']=$lista; 
        header('Location:../View/Administracion/Mantenimiento/seccion_mant.php');
        break;
   }  
   
   case  2: { 
          
        $tipo=$_POST['tipo'];
        @$nom=$_POST['nom'];
        @$estado=$_POST['estado'];
        @$id=$_POST['id'];
        $objBean->setSeccion_nombre(@$nom);
        $objBean->setSeccion_id(@$id);
        $objBean->setEstado(@$estado);
        $rspta=$objDao->accion($objBean,$tipo);

         echo $rspta;
       
         
        break;
    
   } 
 }