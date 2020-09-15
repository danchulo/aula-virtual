<?php

session_start();
 require_once '../Modelo/Dao/DistritoDao.php';

  
  $objDao=new CursoDao();
  $objBean=new CursoBean();
  
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
       
           $lista=$objDao->listarCursos();
           $_SESSION['listaCurso']=$lista;
           $objNDao=new NivelDao();
           $listaNivel=$objNDao->cargaNivel();       
           $_SESSION['listaNivel']=$listaNivel;
           $objADao=new AreaDao();
           $listaA=$objADao->cargaArea();       
           $_SESSION['listaArea']=$listaA;
           $objGDao=new GradoDao();
           $listaG=$objGDao->cargaGrado();       
           $_SESSION['listaGrado']=$listaG;
           
           header("Location:../View/Administracion/Coordinacion/registro_curso.php");
       
 break;} 
 
 
   }