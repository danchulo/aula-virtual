<?php
 session_start();
   require_once '../Modelo/Bean/UsuarioBean.php';
   require_once '../Modelo/Dao/AnioDao.php';
   require_once '../Modelo/Dao/ClaseDao.php';
   require_once '../Modelo/Dao/ProfesorDao.php';
   require_once '../Modelo/Dao/EstudianteDao.php';
   require_once '../Modelo/Dao/CursoDao.php';
   require_once '../Modelo/Dao/PersonalDao.php';
   require_once '../Modelo/Dao/UsuarioDao.php';
   require_once '../Modelo/Dao/DistritoDao.php';
  
   @$id=$_SESSION['id'];
   
if(isset($_REQUEST['op'])){
    $op=$_REQUEST['op'];
}
else if(isset($_POST['op'])){
   $op=$_POST['op'];
}

$objBean=new UsuarioBean();
$objDao=new UsuarioDao();
       
 switch ($op)
 {
   case  1: { 
      
       $usuario=$_POST['usuario'];
       $clave=$_POST['password'];

       $objBean->setUsuario($usuario);
       $objBean->setPassword($clave);
         
       $lista1= $objDao->validarUsu($objBean);
       
        if($lista1!=0){
            
         $_SESSION['lista']=$lista1;
         $objAnioDao=new AnioDao();
         $anio=$objAnioDao->ListarAnioActual();
         $añoid=$anio[0];
         $_SESSION['anio']=$anio;
         
               if($lista1['USU'][0]['TIPO']=="1" || $lista1['USU'][0]['TIPO']=="4" || $lista1['USU'][0]['TIPO']=="5"){
       
         $objADao=new ClaseDao();
         $cantClase=$objADao->cantidadClase($añoid);
         $objPDao=new ProfesorDao();
         $cantProfe=$objPDao->cantidadProfesor();
         $cantProfeAsigna=$objPDao->cantidadProfeAsignado($añoid);
         $objEDao=new EstudianteDao();
         $cantEstu=$objEDao->cantidadEstudiante();
         $cantEstuAsigna=$objEDao->cantidadEstuAsignado($añoid);
         $objLDao=new UsuarioDao();
         $cantUsu=$objLDao->cantidadUsuarios();
         $objSDao=new PersonalDao();
         $cantPersonal=$objSDao->cantidadPersonal();
         $objCDao=new CursoDao();
         $cantCurso=$objCDao->cantCurso();
       
         $_SESSION['cantClase']=$cantClase;
         $_SESSION['cantProfe']=$cantProfe;
         $_SESSION['cantProfeAsigna']=$cantProfeAsigna;
           $_SESSION['cantEstuAsigna']=$cantEstuAsigna;
         $_SESSION['cantEstu']=$cantEstu;
         $_SESSION['cantUsu']=$cantUsu;
         $_SESSION['cantPersonal']=$cantPersonal;
         $_SESSION['cantCurso']=$cantCurso;
               }
     
            $_SESSION['id']= $lista1['USU'][0]['COD'];
           $_SESSION['op']=$lista1['USU'][0]['TIPO'];
       
           
           echo 'ok';
          }
          
        else if($lista1==="Inactivo"){
                echo 'invalid';
         
        }
      
        break; }     
 
        case  2: { 
      
       $listaUsu=$objDao->listarUsuarios(@$id);
       $listaTipoUsu=$objDao->cargarTipoUsuarios();
         $objDistriDao=new DistritoDao();
      $listadIS=$objDistriDao->cargarDistrito();
      $_SESSION['listaDistrito']=$listadIS;
       $_SESSION['listaUsu']=$listaUsu;
         $_SESSION['listaTUsu']=$listaTipoUsu;
       header('Location:../View/Administracion/Mantenimiento/usuario_privilegio.php'); 
       
        break;} 
        
         case  3: { 
    
       $nom=$_POST['nom'];
       $apa=$_POST['apa'];
       $ama=$_POST['ama'];
       $dni=$_POST['dni'];
       $sexo=$_POST['sexo'];
       $distrito_id=$_POST['distrito_id'];
       $dir=$_POST['dir'];
       $cel=$_POST['cel'];
      $valid_cel=substr($cel,0,1); 
       $tel=$_POST['tel'];
       $fec_nac=$_POST['fec_nac'];
       $tipo_id=$_POST['tipo_id'];
  $fecha_actual = date("Y-m-d");
       $fecha_requerida=date("Y-m-d",strtotime($fecha_actual."- 18 year"));
       $fecha_limite=date("Y-m-d",strtotime($fecha_actual."- 75 year"));
       if(!isset($nom) || strlen(trim($nom)) == 0){
          $rspta="Tiene que ingresar un Nombre";
       }else if(strlen($nom) <3){
            $rspta="El nombre debe tener mas de 2 letras";        
       }else if(!isset($apa) || strlen(trim($apa)) == 0){
            $rspta="Tiene que ingresar un Apellido Paterno";          
       }else if(strlen($apa) <3){
            $rspta="El apellido paterno debe tener mas de 2 letras";         
       }else if(!isset($ama) || strlen(trim($ama)) == 0){
            $rspta="Tiene que ingresar un Apellido Materno";     
       }else if(strlen($ama) <3){
            $rspta="El apellido materno debe tener mas de 2 letras";
       }else if(!isset($dni) || strlen(trim($dni)) == 0){
            $rspta="Tiene que ingresar un DNI";
       }else if(strlen($dni)!=8){
            $rspta="Ingrese un DNI válido";
        }else if($sexo==""){
            $rspta="Tiene que eligir el Sexo";
       }else if(!isset($fec_nac) || strlen(trim($fec_nac)) == 0){
            $rspta="Tiene que ingresar la Fecha de Nacimiento";
       }else if($fec_nac>$fecha_requerida){
            $rspta= 'El usuario tiene que ser mayor de edad';
       }else if($fec_nac<$fecha_limite){
             $rspta='La edad límite para el usuario es de 75 años';
       }else if($distrito_id == ""){
            $rspta="Tiene que selecionar un distrito";
       }else if(!isset($dir) || strlen(trim($dir)) == 0){
            $rspta="Tiene que ingresar una Dirección";
       }else if(strlen($dir)<10){
            $rspta="la dirección debe contener más de 10 digitos";   
       }else if(strlen ($cel)!=0 and (strlen ($cel)!=9 || $valid_cel!=9)){     
            $rspta="Ingrese un número celular válido";    
       }else if(strlen ($tel)!=0 && strlen ($tel)!=7){     
            $rspta="Ingrese un número de telefono válido";      
       }else if($tipo_id==""){
            $rspta="Tiene que seleccionar el tipo de usuario";
       }
       else{
           $especiales = array("á", "é", "í", "í", "ú", "Á", "É", "Í", "Í", "Í","Ñ","ñ","¿","¡","'", "´", "`");
     $foto=$_FILES['foto']['name'];
     $ext=explode(".",$foto);
     $extension=end($ext);
     $fotoReemplazo= str_replace($especiales,"",$foto);
    $foto1=$fotoReemplazo.$dni.'.'.$extension;
			$permitidos= array("image/jpg","image/jpeg","image/gif","image/png");
			$limite_kb= 1000;
			if(in_array($_FILES['foto']['type'],$permitidos) && $_FILES['foto']['size'] <= $limite_kb *1024){
			
                        $fototmpname=$_FILES['foto']['tmp_name'];
                      
                        $foto2= str_replace($especiales,"",$fototmpname);
			$ruta= "../View/subidas/".$foto1;
			move_uploaded_file($foto2,$ruta);
			
	}
        
     
        if($foto==""){
       ECHO $rspta="Tiene que subir una Foto";
           return;
        }
       $objBean->setNombres($nom);
       $objBean->setApellido_paterno($apa);
       $objBean->setApellido_materno($ama);
       $objBean->setDni($dni);
       $objBean->setSexo($sexo);
       $objBean->setDistrito_id($distrito_id);
       $objBean->setDireccion($dir);
       $objBean->setNumero_cel($cel);
       $objBean->setNumero_tel($tel);
       $objBean->setFecha_nac($fec_nac);
       $objBean->setTipo_usuario_id($tipo_id);
       $objBean->setFoto($foto1); 
        
       $rspta=$objDao->guardarUsu($objBean);

       }
              echo $rspta;
     
         break;
       
    }
         case 5:{
      
       
   //buscar, eliminar
         $tipo=$_REQUEST['tipo'];
         $id=$_REQUEST['id'];         
         $lista=$objDao->accion($tipo,$id);
          $tipo_id=$lista['LISTA'][0]['COD_TIPO'];
          $usuDao=new UsuarioDao();
       $listaTipo=$usuDao->filtrarTipo($tipo_id);
$distri_id=$lista['LISTA'][0]['DISTRI_ID'];
         $distriDao=new DistritoDao();
         $listaDistrito=$distriDao->ListarDistriDistinta($distri_id);
         $_SESSION['listaDistrito']=$listaDistrito;
       $_SESSION['listTipo']=$listaTipo;
         $_SESSION['listUsu']=$lista;
         header('Location:../View/Administracion/Mantenimiento/editar_usuario.php');  
         break;
   
   }
     case  6: { 
       $cod=$_POST['cod'];
       $foto_actual=$_POST['now_foto'];
       $nom=$_POST['nom'];
      $apa=$_POST['apa'];
       $ama=$_POST['ama'];
       $dni=$_POST['dni'];
       $distrito_id=$_POST['distrito_id'];
       $sexo=$_POST['sexo'];
       $dir=$_POST['dir'];
       $cel=$_POST['cel'];
       $tel=$_POST['tel'];
      $valid_cel=substr($cel,0,1); 
       $fec_nac=$_POST['fec_nac'];
       $tipo_id=$_POST['tipo_id'];
       $usu=$_POST['usu'];
         $foto_actual=$_POST['now_foto'];
          $fecha_actual = date("Y-m-d");
       $fecha_requerida=date("Y-m-d",strtotime($fecha_actual."- 18 year"));
       $fecha_limite=date("Y-m-d",strtotime($fecha_actual."- 75 year"));
       if(!isset($nom) || strlen(trim($nom)) == 0){
          $rspta="Tiene que ingresar un Nombre";
       }else if(strlen($nom) <3){
            $rspta="El nombre debe tener mas de 2 letras";        
       }else if(!isset($apa) || strlen(trim($apa)) == 0){
            $rspta="Tiene que ingresar un Apellido Paterno";          
       }else if(strlen($apa) <3){
            $rspta="El apellido paterno debe tener mas de 2 letras";         
       }else if(!isset($ama) || strlen(trim($ama)) == 0){
            $rspta="Tiene que ingresar un Apellido Materno";     
       }else if(strlen($ama) <3){
            $rspta="El apellido materno debe tener mas de 2 letras";
       }else if(!isset($dni) || strlen(trim($dni)) == 0){
            $rspta="Tiene que ingresar un DNI";
       }else if(strlen($dni)!=8){
            $rspta="Ingrese un DNI válido";
        }else if($sexo==""){
            $rspta="Tiene que eligir el Sexo";
       }else if(!isset($fec_nac) || strlen(trim($fec_nac)) == 0){
            $rspta="Tiene que ingresar la Fecha de Nacimiento";
       }else if($fec_nac>$fecha_requerida){
            $rspta= 'El usuario tiene que ser mayor de edad';
       }else if($fec_nac<$fecha_limite){
             $rspta='La edad límite para el usuario es de 75 años';
       }else if($distrito_id == ""){
            $rspta="Tiene que selecionar un distrito";
       }else if(!isset($dir) || strlen(trim($dir)) == 0){
            $rspta="Tiene que ingresar una Dirección";
       }else if(strlen($dir)<10){
            $rspta="la dirección debe contener más de 10 digitos";   
       }else if(strlen ($cel)!=0 and (strlen ($cel)!=9 || $valid_cel!=9)){     
            $rspta="Ingrese un número celular válido";    
       }else if(strlen ($tel)!=0 && strlen ($tel)!=7){     
            $rspta="Ingrese un número de telefono válido";      
       }else if(strlen($usu)<5){
           $rspta="El usuario debe contener de 5 a más caracteres";
       }

       else{
          $especiales = array("á", "é", "í", "í", "ú", "Á", "É", "Í", "Í", "Í","Ñ","ñ","¿","¡","'", "´", "`");
     $foto=$_FILES['foto']['name'];
     $ext=explode(".",$foto);
     $extension=end($ext);
     $fotoReemplazo= str_replace($especiales,"",$foto);
    $foto1=$fotoReemplazo.$cod.'.'.$extension;
    
			$permitidos= array("image/jpg","image/jpeg","image/gif","image/png");
			$limite_kb= 1000;
			if(in_array($_FILES['foto']['type'],$permitidos) && $_FILES['foto']['size'] <= $limite_kb *1024){
			
                        $fototmpname=$_FILES['foto']['tmp_name'];
                      
                        $foto2= str_replace($especiales,"",$fototmpname);
			$ruta= "../View/subidas/".$foto1;
			move_uploaded_file($foto2,$ruta);
			
	}
        
     

       $objBean->setNombres($nom);
       $objBean->setUsuario($usu);
       $objBean->setUsuario_id($cod);
       $objBean->setApellido_paterno($apa);
       $objBean->setApellido_materno($ama);
       $objBean->setDni($dni);
       $objBean->setDistrito_id($distrito_id);
       $objBean->setSexo($sexo);
       $objBean->setDireccion($dir);
       $objBean->setNumero_cel($cel);
       $objBean->setNumero_tel($tel);
       $objBean->setFecha_nac($fec_nac);
       $objBean->setTipo_usuario_id($tipo_id);
       if($foto==""){
       $objBean->setFoto($foto_actual); 
       }else{
       $objBean->setFoto($foto1); 
       }
       $rspta=$objDao->editarUsu($objBean);
     
  
       }
         echo $rspta;
            break;
       
    }
  case 7:{
   
         header('Location:../View/Seguridad/cambiar_password.php');  
         break;
   }
    case 8:{
        $lista=$objDao->accion("b",@$id);
          $actual_pass=$lista['LISTA'][0]['PASS'];
          $entrada_pass=$_POST['entrada_pass'];
           $nuevo_pass=$_POST['nuevo_pass'];
            $repite_pass=$_POST['repite_pass'];
      
       if(!isset($entrada_pass) || strlen(trim($entrada_pass)) == 0){
           $rspta= "Tiene que ingresar la contraseña actual";
       } else if($entrada_pass!=$actual_pass){
             $rspta='2';
         }else  if(!isset($nuevo_pass) || strlen(trim($nuevo_pass)) == 0){
          $rspta="Tiene que ingresar la nueva contraseña";
       }  else if(strlen($nuevo_pass)<8){
           ECHO $rspta="La nueva contraseña debe tener de 8 a más caracteres";
           return;
       }else  if(!isset($repite_pass) || strlen(trim($repite_pass)) == 0){
          $rspta="Tiene que repetir la nueva contraseña";
       }
        else if($nuevo_pass!=$repite_pass){
            $rspta='3';
         }else if(($actual_pass==$entrada_pass) && ($nuevo_pass==$repite_pass)){
             $rspta=$objDao->cambiarContra($nuevo_pass, @$id);
         }
         
         echo $rspta;
         
         break;
   } 
   } 















