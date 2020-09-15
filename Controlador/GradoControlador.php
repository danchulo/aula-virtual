<?php

 session_start();
 require_once '../Modelo/Dao/GradoDao.php';
  require_once '../Modelo/Bean/GradoBean.php';
  
  $objDao=new GradoDao();
  $objBean=new GradoBean();
  
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
       
           $listaGrado=$objDao->listarGrado();
           $_SESSION['listaGrado']=$listaGrado;
           header("Location:../View/Administracion/Mantenimiento/mantenimiento_grado.php");
       
        break;} 
       
   case  2: { 
   
           $tipo=$_POST['tipo'];
           @$grado=$_POST['nom'];
           $grado_int=intval(@$grado);
           if($grado_int>6){
               echo 'Solo se permite hasta 6 grado';
               return;
           }
          
           @$sufijo=$_POST['suf_grado'];
           @$id=$_POST['id'];
           $objBean->setGrado($grado);
           $objBean->setSufijo($sufijo);
           $objBean->setGrado_id(@$id);
           $objBean->setEstado(@$grado);
            $rspta=$objDao->accion($objBean,$tipo);
           echo $rspta;

        break;} 
        
  case  3: { 
        
       //buscar, eliminar
         $tipo=$_REQUEST['tipo'];
         $id=$_REQUEST['id'];         
       
         $rspta=$objDao->accion2($tipo,$id);
         $_SESSION['listaGrado']=$rspta;
         header('Location:../View/Administracion/Mantenimiento/editar_grado.php');  
         break;
   } 
 
   
   } 