<?php

session_start();
require_once '../Modelo/Bean/PersonalBean.php';
require_once '../Modelo/Dao/PersonalDao.php';

     
$objDao=new PersonalDao();
$objBean=new PersonalBean();
$id=$_SESSION['id'];
$op=$_REQUEST['op'];


 switch ($op)
 {
   case  1: { 
      
        $listaP=$objDao->listarPersonal();

        $_SESSION['listaPersonal']=$listaP; 

        header('Location:../View/Director/personal.php');

   break;
    
   }    
 }