<?php
 session_start();
require_once '../Modelo/Bean/AnioBean.php';
require_once '../Modelo/Dao/AnioDao.php';

     
$objDao=new AnioDao();
$objBean=new AnioBean();

$op=$_REQUEST['op'];

 switch ($op)
 {
   case  1: { 
      
   $listaAnio= $objDao->ListarAnio();
   $_SESSION['listaAnio']=$listaAnio;
   
        header('Location:../View/Administracion/Coordinacion/anio_escolar.php');
        break;
   }  
   
   case  2: { 
   
         $tipo=$_POST['tipo'];
         $f1=$_POST['fecha_ini'];
         $f2=$_POST['fecha_fin'];
         
         $objBean->setFecha_inicio($f1);
         $objBean->setFecha_fin($f2);
         if($tipo=="g"){
      $rspta=$objDao->guardarAnio($objBean);
         } else if($tipo=="a"){
             
        $estado=$_POST['estado'];
        $anio_id=$_POST['anio_id'];
        $objBean->setAnio_escolar_id($anio_id);
        $objBean->setEstado($estado);
        $rspta=$objDao->editarAnio($objBean);
       
         }
        echo $rspta;
       
        break;
    
   } 
   
   case  3: { 
   $anio_id=$_REQUEST['id'];
   $lista= $objDao->ListarAnioyTrime($anio_id);
   $_SESSION['listaAnioTrimestre']=$lista;
   
        header('Location:../View/Administracion/Coordinacion/agregar_trimestres.php');
        break;
   }  
   
   case  4: { 
   $anio_id=$_POST['anio_id'];
   $fecha_iniT1=$_POST['fecha_iniT1'];
   $fecha_finT1=$_POST['fecha_finT1'];
   $fecha_iniT2=$_POST['fecha_iniT2'];
   $fecha_finT2=$_POST['fecha_finT2'];
   $fecha_ini3=$_POST['fecha_ini3'];
   $fecha_fin3=$_POST['fecha_fin3'];
   
   
   
   if(!isset($fecha_iniT1) || strlen(trim($fecha_iniT1)) == 0){
            $rspta="Tiene que ingresar la fecha inicio del primer trimestre";
      
   }else if(!isset($fecha_finT1) || strlen(trim($fecha_finT1)) == 0){
            $rspta="Tiene que ingresar la fecha fin del primer trimestre";
      
   }else if(!isset($fecha_iniT2) || strlen(trim($fecha_iniT2)) == 0){
            $rspta="Tiene que ingresar la fecha inicio del segundo trimestre";
        
   }else if(!isset($fecha_finT2) || strlen(trim($fecha_finT2)) == 0){
            $rspta="Tiene que ingresar la fecha fin del segundo trimestre";

   }else if(!isset($fecha_ini3) || strlen(trim($fecha_ini3)) == 0){
            $rspta="Tiene que ingresar la fecha inicio del tercer trimestre";
    
   }else if(!isset($fecha_fin3) || strlen(trim($fecha_fin3)) == 0){
     $rspta="Tiene que ingresar la fecha fin del tercer trimestre";
        
   }else if($fecha_iniT1>$fecha_finT1 || $fecha_iniT1>$fecha_iniT2  || $fecha_iniT1>$fecha_finT2 ||
           $fecha_iniT1>$fecha_ini3  ||  $fecha_iniT1>$fecha_fin3 || 
           
           $fecha_iniT2>$fecha_finT2 || $fecha_iniT2<$fecha_finT1 || $fecha_iniT2>$fecha_ini3
           || $fecha_iniT2>$fecha_fin3 || 
           
           $fecha_ini3>$fecha_fin3 || $fecha_ini3<$fecha_finT2 || $fecha_ini3<$fecha_iniT2
           || $fecha_ini3<$fecha_finT1 || $fecha_ini3<$fecha_iniT1){
    
       
       $rspta="Verifique las fechas, deben estar en el orden correcto";
      
   }
   else{
   
   $rspta= $objDao->editarTrimestres($anio_id,$fecha_iniT1,$fecha_finT1,$fecha_iniT2,$fecha_finT2,$fecha_ini3,$fecha_fin3);
   }
      echo $rspta;
        break;
   } 
   
   case  5: { 
   $anio_id=$_REQUEST['id'];
   $lista= $objDao->buscarAnio($anio_id);
   $_SESSION['Anio']=$lista;
   
        header('Location:../View/Administracion/Coordinacion/editar_anio_escolar.php');
        break;
   }  

 }