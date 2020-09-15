<?php
 session_start();
require_once '../Modelo/Bean/AulaBean.php';
require_once '../Modelo/Dao/AulaDao.php';

     
$objDao=new AulaDao();
$objBean=new AulaBean();
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
      
        $lista=$objDao->listarAula();
        $_SESSION['listaAula']=$lista; 
        header('Location:../View/Administracion/Mantenimiento/aula_mant.php');
        break;
   }  
   
   case  2: { 
   
         $aula=$_POST['nom_aula'];
         $objBean->setSalon_nombre($aula);
         $rspta=$objDao->guardarAula($objBean);
         echo $rspta;
       
        break;
    
   } 
 }