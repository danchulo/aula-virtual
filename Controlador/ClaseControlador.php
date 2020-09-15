<?php
 session_start();
   require_once '../Modelo/Dao/ClaseDao.php';
   require_once '../Modelo/Dao/AmbienteDao.php';
   require_once '../Modelo/Dao/NivelDao.php';
   require_once '../Modelo/Dao/SeccionDao.php';
   require_once '../Modelo/Dao/GradoDao.php';
   require_once '../Modelo/Dao/TurnoDao.php';
   require_once '../Modelo/Bean/ClaseBean.php';
$objDao=new ClaseDao();
$objBean=new ClaseBean();
$op=$_REQUEST['op'];
$anio_id=$_SESSION['anio_id'];
 switch ($op)
 {

        case 1:{

       $grado_id=$_POST['grado_id'];
       $seccion_id=$_POST['seccion_id'];
       $nivel_id=$_POST['nivel_id'];
       $aula_id=$_POST['aula_id'];
       $turno_id=$_POST['turno_id'];
       $hora_ini=$_POST['hora_ini'];
       $hora_fin=$_POST['hora_fin'];
       $capacidad=$_POST['capacidad'];
      
       if($grado_id==""){
          echo $rspta="Debe seleccionar un grado";
          return;
       }else if($seccion_id==""){
           echo $rspta="Debe seleccionar una Sección";
           return;
       }else if($nivel_id==""){
           echo $rspta="Debe seleccionar un Nivel";
           return;
       }else if($aula_id==""){
           echo $rspta="Debe seleccionar un Ambiente";
           return;
       }else if($turno_id==""){
           echo $rspta="Debe seleccionar un Turno";
           return;
       }else if(!isset($hora_ini) || strlen(trim($hora_ini)) == 0){
           echo $rspta="Debe ingresar la hora de inicio";
           return;
       }else if(!isset($hora_fin) || strlen(trim($hora_fin)) == 0){
           echo $rspta="Debe ingresar la hora final";
           return;
       }/*else if(getdate($hora_ini) > getdate($hora_fin)){
           echo $rspta="La hora inicio no puede ser mayor que la hora fin";
           return;
       }*/
       else if(!isset($capacidad) || strlen(trim($capacidad)==0)){
           echo $rspta="Debe ingresar la Capacidad";
           return;
       }
       else{
       $objBean->setGrado_id($grado_id);
       $objBean->setSeccion_id($seccion_id);
       $objBean->setNivel_id($nivel_id);
       $objBean->setSalon_id($aula_id);
       $objBean->setTurno_id($turno_id);
       $objBean->setHora_inicio($hora_ini);
       $objBean->setHora_fin($hora_fin);
       $objBean->setCapacidad($capacidad);     
       $objBean->setAnio_escolar_id($anio_id);
       $rspta=$objDao->guardarClase($objBean);
       echo $rspta;
   
       }
           break;
      
   }
        
    case 2:{
      
       $listaClase=$objDao->listarClases();       
       $_SESSION['listaClase']=$listaClase;
    
       $objADao=new AmbienteDao();
       $listaAula=$objADao->cargaAula();       
       $_SESSION['listaAula']=$listaAula;
       $objNDao=new NivelDao();
       $listaNivel=$objNDao->cargaNivel();       
       $_SESSION['listaNivel']=$listaNivel;
       $objSDao=new SeccionDao();
       $listaSeccion=$objSDao->cargaSeccion();       
       $_SESSION['listaSeccion']=$listaSeccion;
       $objGDao=new GradoDao();
       $listaGrado=$objGDao->cargaGrado();       
       $_SESSION['listaGrado']=$listaGrado;
       $objTDao=new TurnoDao();
       $listaTurno=$objTDao->cargaTurno();       
       $_SESSION['listaTurno']=$listaTurno;
       
       
       header('Location:../View/Administracion/Coordinacion/crear_clase.php');
       
       break;
   }
   
      
     case 3: { 
         
       $clase_id=$_REQUEST['clase_id'];
       $lista=$objDao->listarHorario($clase_id);
       $_SESSION['listaHoraClase']=$lista;
       header("Location:../View/Administracion/Coordinacion/modal_clase_horario.php");
       break;
    }

    case 4:{
      
       
   //buscar, eliminar
         $tipo=$_REQUEST['tipo'];
         $id=$_REQUEST['id'];         
         $lista=$objDao->accion($tipo,$id,$anio_id);
          $cod_grado=$lista['LISTA'][0]['COD_GRADO'];
          $cod_sec=$lista['LISTA'][0]['COD_SECCION'];
          $cod_niv=$lista['LISTA'][0]['COD_NIVEL'];
          $cod_am=$lista['LISTA'][0]['COD_AMBIENTE'];
          $cod_tur=$lista['LISTA'][0]['COD_TURNO'];
         $objADao=new AmbienteDao();
       $listaAmbiente=$objADao->filtrarAmbiente($cod_am);       
       $_SESSION['listaAmbiente']=$listaAmbiente;
       $objNDao=new NivelDao();
       $listaNivel=$objNDao->filtrarNivel($cod_niv);       
       $_SESSION['listaNivel']=$listaNivel;
       $objSDao=new SeccionDao();
       $listaSeccion=$objSDao->filtrarSeccion($cod_sec);       
       $_SESSION['listaSeccion']=$listaSeccion;
       $objGDao=new GradoDao();
       $listaGrado=$objGDao->filtrarGrado($cod_grado);       
       $_SESSION['listaGrado']=$listaGrado;
       $objTDao=new TurnoDao();
       $listaTurno=$objTDao->filtrarTurno($cod_tur);       
       $_SESSION['listaTurno']=$listaTurno;
       
         $_SESSION['listClase']=$lista;
         header('Location:../View/Administracion/Coordinacion/editar_clase.php');  
         break;
   
   }   
      
        case 5:{
       $id=$_POST['cod'];
       $grado_id=$_POST['grado_id'];
       $seccion_id=$_POST['seccion_id'];
       $nivel_id=$_POST['nivel_id'];
       $aula_id=$_POST['aula_id'];
       $turno_id=$_POST['turno_id'];
       $hora_ini=$_POST['hora_ini'];
       $hora_fin=$_POST['hora_fin'];
       $capacidad=$_POST['capacidad'];
       
       if(!isset($hora_ini) || strlen(trim($hora_ini)) == 0){
           echo $rspta="Debe ingresar la hora de inicio";
           return;
       }else if(!isset($hora_fin) || strlen(trim($hora_fin)) == 0){
           echo $rspta="Debe ingresar a hora final";
           return;
       }else if(!isset($capacidad) || strlen(trim($capacidad)==0)){
           echo $rspta="Debe ingresar una Capacidad";
           return;
       }else if($capacidad>40){
           echo $rspta="La capacidad máxima es 40";
           return;
       }
       else{
       $objBean->setGrado_id($grado_id);
       $objBean->setSeccion_id($seccion_id);
       $objBean->setNivel_id($nivel_id);
       $objBean->setSalon_id($aula_id);
       $objBean->setTurno_id($turno_id);
       $objBean->setHora_inicio($hora_ini);
       $objBean->setHora_fin($hora_fin);
       $objBean->setCapacidad($capacidad);   
       $objBean->setClase_id($id);
       $objBean->setAnio_escolar_id($anio_id);
       $rspta=$objDao->editarClase($objBean,$anio_id);
       echo $rspta;

        }
               break;
      
       }
       
       case 6:{
      
       $listaClase=$objDao->listarClases();       
       $_SESSION['listaClase']=$listaClase;

       header('Location:../View/Administracion/Coordinacion/tabla_clase.php');
       
       break;
   }
 }
 
   