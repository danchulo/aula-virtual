<?php

 session_start();
 require_once '../Modelo/Dao/TemaDao.php';
  require_once '../Modelo/Bean/TemaBean.php';
   require_once '../Modelo/Dao/UnidadDao.php';
    require_once '../Modelo/Dao/CursoDao.php';
  $objDao=new TemaDao();
  $objBean=new TemaBean();
  
$op=$_REQUEST['op'];
 switch ($op)
 {
   case  1: { 
       
            $lista=$objDao->ListarTemaUnidad();
           $_SESSION['listaTema']=$lista;
           $objNDao=new UnidadDao();
           $listaU=$objNDao->cargaUnidad();       
           $_SESSION['listaUnidad']=$listaU;
           $objCDao=new CursoDao();
           $listaC=$objCDao->cargaCurso();       
           $_SESSION['listaCurso']=$listaC;

           header("Location:../View/Administracion/Coordinacion/registro_tema.php");
       
        break;} 
       
   case  2: { 

           $nom_tema=$_POST['nom_tema'];
           $unidad_id=$_POST['unidad_id'];
           $curso_id=$_POST['curso_id'];
           if($unidad_id==""){
          echo $rspta="Debe seleccionar una unidad";
          return;
       }else if(!isset($nom_tema) || strlen(trim($nom_tema)) == 0){
           echo $rspta="Debe ingresar el nombre del tema";
           return;
       }else if($curso_id==""){
           echo $rspta="Debe seleccionar un curso";
           return;
       }
           else{
           $objBean->setNombre_tema($nom_tema);
           $objBean->setUnidad_tematica_id($unidad_id);
           $objBean->setCurso_id($curso_id);
           $rspta=$objDao->guardarTema($objBean);
           echo $rspta;
       
     }      break;
        }
        
  case 3:{
      
       
   //buscar, eliminar
         $tipo=$_REQUEST['tipo'];
         $id=$_REQUEST['id'];         
         $lista=$objDao->accion($tipo,$id);
          $cod_uni=$lista['LISTA'][0]['COD_UNIDAD'];
          $cod_cur=$lista['LISTA'][0]['COD_CURSO'];

           $_SESSION['listTema']=$lista;
           $objUDao=new UnidadDao();
           $listaU=$objUDao->filtrarUnidad($cod_uni);       
           $_SESSION['listaUnidad']=$listaU;
           $objCDao=new CursoDao();
           $listaC=$objCDao->filtrarCurso($cod_cur);       
           $_SESSION['listaCurso']=$listaC;

         header('Location:../View/Administracion/Coordinacion/editar_tema.php');  
         break;
   
   }   
      
        case 4:{
       $id=$_POST['cod'];
       $nom_tema=$_POST['nom_tema'];
       $unidad_id=$_POST['unidad_id'];
       $curso_id=$_POST['curso_id'];
       if(!isset($nom_tema) || strlen(trim($nom_tema)) == 0){
           echo $rspta="Debe ingresar el nombre del tema";
           return;
       }
       
       else{
           $objBean->setTema_id($id);
          $objBean->setNombre_tema($nom_tema);
           $objBean->setUnidad_tematica_id($unidad_id);
           $objBean->setCurso_id($curso_id);
           $rspta=$objDao->editarTema($objBean);
           echo $rspta;
       break;
      
        }
    }
    
    case  5: { 
       
           $lista=$objDao->ListarTemaUnidad();
           $_SESSION['listaTema']=$lista;
           header("Location:../View/Administracion/Coordinacion/tabla_tema.php");
       
        break;} 
 }