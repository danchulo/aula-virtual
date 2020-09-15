<?php
 session_start();
require_once '../Modelo/Bean/NivelBean.php';
require_once '../Modelo/Dao/NivelDao.php';

     
$objDao=new NivelDao();
$objBean=new NivelBean();
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
      
        $lista=$objDao->listarNivel();
        $_SESSION['listaNivel']=$lista; 
        header('Location:../View/Administracion/Mantenimiento/nivel_mant.php');
        break;
   }  
   
   case  2: { 
        $tipo=$_POST['tipo'];
        @$nom=$_POST['nom'];
        @$estado=$_POST['estado'];
        @$id=$_POST['id'];
        $objBean->setNivel_nombre(@$nom);
        $objBean->setNivel_id(@$id);
        $objBean->setEstado(@$estado);
        $rspta=$objDao->accion($objBean,$tipo);

         echo $rspta;
       
        break;
    
   } 
 }