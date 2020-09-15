<?php

 session_start();
 require_once '../Modelo/Dao/CursoDao.php';
  require_once '../Modelo/Bean/CursoBean.php';
  require_once '../Modelo/Dao/NivelDao.php';
  require_once '../Modelo/Dao/AreaDao.php';
  require_once '../Modelo/Dao/GradoDao.php';
  
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
       
   case  2: { 
   
           $cod_curso=$_POST['codigo'];
           $nom_curso=$_POST['curso'];
           $grado_id=$_POST['grado'];
           $nivel_id=$_POST['nivel'];
           $area_id=$_POST['area'];
           $valid_cur=substr($cod_curso,0,1); 
           $valid_cur2=substr($cod_curso,-3);
       if(!isset($cod_curso) || strlen(trim($cod_curso)) == 0){
           echo $rspta="Debe ingresar el Código del curso";
           return;   
       }else if(strlen($cod_curso)!=4){
           echo $rspta="El código debe contener 4 caracteres: 'C001'";
           return;
       }else if($valid_cur != "C"){
           echo $rspta="La primera letra del código tiene que ser 'C'";
           return;
       }else if(!is_numeric($valid_cur2)){
           echo $rspta="El código tiene que contener 3 números luego de la letra";
           return;
       }
       else if(!isset($nom_curso) || strlen(trim($nom_curso)) == 0){
           echo $rspta="Debe ingresar Nombre";
           return;
       }else if(strlen($nom_curso)<4){
           echo $rspta="El nombre debe contener de 4 a más caracteres";
           return;
       }else   if($grado_id==""){
          echo $rspta="Debe seleccionar un grado";
          return;
       }else if($nivel_id==""){
           echo $rspta="Debe seleccionar un Nivel";
           return;
       }else if($area_id==""){
           echo $rspta="Debe seleccionar un Área";
           return;
       }
           else{
           $objBean->setCurso_codigo($cod_curso);
           $objBean->setCurso_nombre($nom_curso);
           $objBean->setGrado_id($grado_id);
           $objBean->setNivel_id($nivel_id);
           $objBean->setArea_id($area_id);
           $rspta=$objDao->guardarCurso($objBean);
       }   
        echo $rspta;
        break;
        }
        
  case 3:{
      
       
   //buscar, eliminar
         $tipo=$_REQUEST['tipo'];
         $id=$_REQUEST['id'];         
         $lista=$objDao->accion($tipo,$id);
          $cod_grado=$lista['LISTA'][0]['COD_GRADO'];
          $cod_niv=$lista['LISTA'][0]['COD_NIVEL'];
          $cod_area=$lista['LISTA'][0]['COD_AREA'];

           $_SESSION['listCurso']=$lista;
           $objNDao=new NivelDao();
           $listaNivel=$objNDao->filtrarNivel($cod_niv);       
           $_SESSION['listaNivel']=$listaNivel;
           $objADao=new AreaDao();
           $listaA=$objADao->filtrarArea($cod_area);       
           $_SESSION['listaArea']=$listaA;
           $objGDao=new GradoDao();
           $listaG=$objGDao->filtrarGrado($cod_grado);       
           $_SESSION['listaGrado']=$listaG;

         header('Location:../View/Administracion/Coordinacion/editar_curso.php');  
         break;
   
   }   
      
        case 4:{
       $id=$_POST['cod'];
       $cod_curso=$_POST['cod_curso'];
       $nom_curso=$_POST['nom_curso'];
       $grado_id=$_POST['grado_id'];
       $nivel_id=$_POST['nivel_id'];
       $area_id=$_POST['area_id'];
        if(!isset($nom_curso) || strlen(trim($nom_curso)) == 0){
           echo $rspta="Debe ingresar un Nombre";
           return;
       }else if(!isset($cod_curso) || strlen(trim($cod_curso)) == 0){
           echo $rspta="Debe ingresar un Código";
           return;
       }
       
       else{
           $objBean->setCurso_id($id);
         $objBean->setCurso_codigo($cod_curso);
           $objBean->setCurso_nombre($nom_curso);
           $objBean->setGrado_id($grado_id);
           $objBean->setNivel_id($nivel_id);
           $objBean->setArea_id($area_id);
           $rspta=$objDao->editarCurso($objBean);
           echo $rspta;
  
        }
             break;
    }
    
    case  5: { 
       
           $lista=$objDao->listarCursos();
           $_SESSION['listaCurso']=$lista;

           header("Location:../View/Administracion/Coordinacion/table_curso.php");
       
        break;} 
 }