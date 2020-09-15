<?php
 session_start();
require_once '../Modelo/Bean/TurnoBean.php';
require_once '../Modelo/Dao/TurnoDao.php';

     
$objDao=new TurnoDao();
$objBean=new TurnoBean();

$op=$_REQUEST['op'];

 switch ($op)
 {
   case  1: { 
      
        $lista=$objDao->listarTurno();
        $_SESSION['listaTurno']=$lista; 
        header('Location:../View/Administracion/Mantenimiento/turno_mant.php');
        break;
   }  
   
   case  2: { 
   
   $tipo=$_POST['tipo'];
        @$nom=$_POST['nom'];
        @$id=$_POST['id'];
        $objBean->setTurno_nombre(@$nom);
        $objBean->setTurno_id(@$id);
        $rspta=$objDao->accion($objBean,$tipo);

         echo $rspta;

       
        break;
    
   } 
 }