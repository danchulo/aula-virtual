<?php

session_start();

require_once '../Modelo/Bean/EstudianteBean.php';
require_once '../Modelo/Dao/EstudianteDao.php';
require_once '../Modelo/Dao/TrimestreDao.php';
require_once '../Modelo/Dao/ClaseDao.php';
require_once '../Modelo/Dao/SeccionDao.php';
require_once '../Modelo/Dao/GradoDao.php';
require_once '../Modelo/Dao/NivelDao.php';
require_once '../Modelo/Dao/AnioDao.php';
require_once '../Modelo/Dao/DistritoDao.php';

$objDao = new EstudianteDao();
$objBean = new EstudianteBean();
$op = $_REQUEST['op'];
$id = $_SESSION['id'];
$year_id = $_SESSION['anio_id'];
switch ($op) {

    case 1: {


            $listaAño = $objDao->listarClaseAño($id);
            $año_id = $listaAño['AÑO'][0]['CODIGO']; //Seleccionamos el id del año en donde esta cursando el estudiante

            $lista1 = $objDao->ListarMiClase($id, $año_id);

            $_SESSION['listaMiClase'] = $lista1;
            $_SESSION['listaAño'] = $listaAño;

            header('Location:../View/Estudiante/mi_clase.php');


            break;
        }

    case 2: {
            $año = $_REQUEST['anio'];
            $lista1 = $objDao->ListarMiClase($id, $año);
            $_SESSION['listaMiClase'] = $lista1;


            header('Location:../View/Estudiante/clase_filtro.php');


            break;
        }



    case 3: {

            $curso_id = $_REQUEST['cod'];
            $lista1 = $objDao->ListarInfoCurso($id, $curso_id);
            $listaT = $objDao->infoTemas($curso_id);
            $_SESSION['listaMiCurso'] = $lista1;
            $_SESSION['listaTema'] = $listaT;
            header('Location:../View/Estudiante/mi_curso.php');

            break;
        }



    case 4: {

            $curso_id = $_REQUEST['cod'];

            $lista1 = $objDao->AsistenciaCurso($id, $curso_id);

            $_SESSION['AisistenciaCurso'] = $lista1;


            header('Location:../View/Estudiante/asistencia_curso.php');


            break;
        }



    case 5: {

            $curso_id = $_REQUEST['cod'];
            $tri_id = $_REQUEST['codtri'];
            $objTrimestreDao = new TrimestreDao();
            $listat = $objTrimestreDao->selectTri();
            $lista1 = $objDao->verMisNotas($id, $curso_id, $tri_id);

            $_SESSION['MisNotas'] = $lista1;
            $_SESSION['trimestre'] = $listat;

            if ($tri_id == "") {
                header('Location:../View/Estudiante/mis_notas.php');
            } else {
                header('Location:../View/Estudiante/nota_filtro.php');
            }

            break;
        }




    case 7: {

            $listaEstu = $objDao->listarEstu();
            $objDistriDao = new DistritoDao();
            $listadIS = $objDistriDao->cargarDistrito();
            $_SESSION['listaDistrito'] = $listadIS;
            $_SESSION['listaEstu'] = $listaEstu;
            header('Location:../View/Administracion/Mantenimiento/mantenimiento_estu.php');
            break;
        }

    case 8: {

            $nom = $_POST['nom'];
            $apa = $_POST['apa'];
            $ama = $_POST['ama'];
            $dni = $_POST['dni'];
            $dir = $_POST['dir'];
            $cel = $_POST['cel'];
            $distrito_id = $_POST['distrito_id'];
            $valid_cel = substr($cel, 0, 1);
            $tel = $_POST['tel'];
            $valid_tel = substr($tel, 0, 1);
            $fec_nac = $_POST['fec_nac'];
            $sexo = $_POST['sexo'];

            $fecha_actual = date("Y-m-d");
            $fecha_requerida = date("Y-m-d", strtotime($fecha_actual . "- 5 year"));
            $fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 25 year"));

            if (!isset($nom) || strlen(trim($nom)) == 0) {
                echo $rspta = "Tiene que ingresar un Nombre";
                return;
            } else if (strlen($nom) < 3) {
                ECHO $rspta = "El nombre debe tener mas de 2 letras";
                return;
            } else if (!isset($apa) || strlen(trim($apa)) == 0) {
                ECHO $rspta = "Tiene que ingresar un Apellido Paterno";
                return;
            } else if (strlen($apa) < 3) {
                ECHO $rspta = "El apellido paterno debe tener mas de 2 letras";
                return;
            } else if (!isset($ama) || strlen(trim($ama)) == 0) {
                ECHO $rspta = "Tiene que ingresar un Apellido Materno";
                return;
            } else if (strlen($ama) < 3) {
                ECHO $rspta = "El apellido materno debe tener mas de 2 letras";
                return;
            } else if (!isset($dni) || strlen(trim($dni)) == 0) {
                ECHO $rspta = "Tiene que ingresar un DNI";
                return;
            } else if (strlen($dni) != 8) {
                echo $rspta = "Ingrese un DNI válido";
                return;
            } else if ($sexo == "") {
                ECHO $rspta = "Tiene que selecionar el sexo del estudiante";
                return;
            } else if (!isset($fec_nac) || strlen(trim($fec_nac)) == 0) {
                ECHO $rspta = "Tiene que ingresar la Fecha de Nacimiento";
                return;
            } else if ($fec_nac > $fecha_requerida) {
                echo 'El estudiante tiene que ser mayor de 4 años';
                return;
            } else if ($fec_nac < $fecha_limite) {
                echo 'La edad límite para el estudiante es de 25 años';
                return;
            } else if (!isset($distrito_id) || strlen(trim($distrito_id)) == 0) {
                ECHO $rspta = "Tiene que selecionar un distrito";
                return;
            } else if (!isset($dir) || strlen(trim($dir)) == 0) {
                ECHO $rspta = "Tiene que ingresar una Dirección";
                return;
            } else if (strlen($dir) < 10) {
                ECHO $rspta = "Pocos digitos para una dirección";
                return;
            } else if (strlen($cel) != 0 and ( strlen($cel) != 9 || $valid_cel != 9)) {
                echo $rspta = "Ingrese un número celular válido";
                return;
            } else if (strlen($tel) != 0 && strlen($tel) != 7) {
                echo $rspta = "Ingrese un número de telefono válido";
                return;
            } else {
                $especiales = array("á", "é", "í", "í", "ú", "Á", "É", "Í", "Í", "Í", "Ñ", "ñ", "¿", "¡", "'", "´", "`");
                $foto = $_FILES['foto']['name'];
                $ext = explode(".", $foto);
                $extension = end($ext);
                $fotoReemplazo = str_replace($especiales, "", $foto);
                $foto1 = $fotoReemplazo . $dni . '.' . $extension;
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $limite_kb = 1000;
                if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024) {

                    $fototmpname = $_FILES['foto']['tmp_name'];

                    $foto2 = str_replace($especiales, "", $fototmpname);
                    $ruta = "../View/subidas/" . $foto1;
                    move_uploaded_file($foto2, $ruta);
                }

                if ($foto == "") {
                    ECHO $rspta = "Tiene que subir una Foto";
                    return;
                }
                $objBean->setNombres($nom);
                $objBean->setApellido_paterno($apa);
                $objBean->setApellido_materno($ama);
                $objBean->setDni($dni);
                $objBean->setDistrito_id($distrito_id);
                $objBean->setDireccion($dir);
                $objBean->setNumero_cel($cel);
                $objBean->setNumero_tel($tel);
                $objBean->setFecha_nac($fec_nac);
                $objBean->setFoto($foto1);
                $objBean->setSexo($sexo);
                $rspta = $objDao->guardarEstu($objBean);
                echo $rspta;
            }
            break;
        }

    case 9: {

            $listaEstu = $objDao->listarEstudiantes();
            $_SESSION['listaEstuCom'] = $listaEstu;
            header('Location:../View/Director/estudiantes.php');
            break;
        }

    case 10: {

            $tri_id = $_REQUEST['trimestre_id'];
            $objTrimestreDao = new TrimestreDao();
            $listat = $objTrimestreDao->selectTri();
            $lista1 = $objDao->notasCursos($id, $tri_id);

            $_SESSION['NotasCursos'] = $lista1;
            $_SESSION['trimestre'] = $listat;

            if ($tri_id == "") {

                header('Location:../View/Estudiante/mis_notas_cursos.php');
            } else {
                header('Location:../View/Estudiante/notas_cursos_filtro.php');
            }

            break;
        }

    case 11: {
            $listaAño = $objDao->listarClaseAño($id);
            $año_id = $listaAño['AÑO'][0]['CODIGO']; //Seleccionamos el id del año en donde esta cursando el estudiante

            $lista1 = $objDao->cantAsistencias($id, $año_id);

            $_SESSION['listaCantidadA'] = $lista1;
            header('Location:../View/Estudiante/asistencia_cantidades.php');

            break;
        }

    case 12: {

//   $turno=$_REQUEST['t'];

            $listaHora = $objDao->listarHorario($id, $year_id);
            $turno = $listaHora['HORARIO'][0]['T'];
            $_SESSION['listaHora'] = $listaHora;

            if ($turno == "Mañana") {
                header("Location:../View/Estudiante/mi_horario_maniana.php");
            } else if ($turno == "tarde") {
                header("Location:../View/Estudiante/mi_horario_tarde.php");
            }

            break;
        }

    case 13: {

            //buscar, eliminar
            $tipo = $_REQUEST['tipo'];
            $id = $_REQUEST['id'];
            @$id2 = $_REQUEST['id2'];
            $lista = $objDao->accion($tipo, $id, @$id2);
            $distri_id = $lista['LISTA'][0]['DISTRI_ID'];
            $distriDao = new DistritoDao();
            $listaDistrito = $distriDao->ListarDistriDistinta($distri_id);
            $_SESSION['listaDistrito'] = $listaDistrito;
            $_SESSION['listaEstu'] = $lista;
            header('Location:../View/Administracion/Mantenimiento/editar_estudiante.php');
            break;
        }

    case 14: {
            $cod = $_POST['cod'];
            $nom = $_POST['nom'];
            $apa = $_POST['apa'];
            $ama = $_POST['ama'];
            $dni = $_POST['dni'];
            $dir = $_POST['dir'];
            $cel = $_POST['cel'];
            $valid_cel = substr($cel, 0, 1);
            $tel = $_POST['tel'];
            $fec_nac = $_POST['fec_nac'];
            $distrito_id = $_POST['distrito_id'];
            $sexo = $_POST['sexo'];
            $usu = $_POST['usu'];
            $foto_actual = $_POST['now_foto'];
            $fecha_actual = date("Y-m-d");
            $fecha_requerida = date("Y-m-d", strtotime($fecha_actual . "- 5 year"));
            $fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 25 year"));
            if (!isset($nom) || strlen(trim($nom)) == 0) {
                echo $rspta = "Tiene que ingresar un Nombre";
                return;
            } else if (strlen($nom) < 3) {
                echo $rspta = "El nombre debe tener mas de 2 letras";
                return;
            } else if (!isset($apa) || strlen(trim($apa)) == 0) {
                ECHO $rspta = "Tiene que ingresar un Apellido Paterno";
                return;
            } else if (strlen($apa) < 3) {
                ECHO $rspta = "El apellido paterno debe tener mas de 2 letras";
                return;
            } else if (!isset($ama) || strlen(trim($ama)) == 0) {
                ECHO $rspta = "Tiene que ingresar un Apellido Materno";
                return;
            } else if (strlen($ama) < 3) {
                ECHO $rspta = "El apellido materno debe tener mas de 2 letras";
                return;
            } else if (!isset($dni) || strlen(trim($dni)) == 0) {
                echo $rspta = "Tiene que ingresar un DNI";
                return;
            } else if (strlen($dni) != 8) {
                echo $rspta = "Ingrese un DNI válido";
                return;
            } else if ($sexo == "") {
                ECHO $rspta = "Tiene que selecionar el sexo del estudiante";
                return;
            } else if (!isset($fec_nac) || strlen(trim($fec_nac)) == 0) {
                ECHO $rspta = "Tiene que ingresar la Fecha de Nacimiento";
                return;
            } else if ($fec_nac > $fecha_requerida) {
                echo 'El estudiante tiene que ser mayor de 4 años';
                return;
            } else if ($fec_nac < $fecha_limite) {
                echo 'La edad límite para el estudiante es de 25 años';
                return;
            } else if (!isset($distrito_id) || strlen(trim($distrito_id)) == 0) {
                ECHO $rspta = "Tiene que selecionar un distrito";
                return;
            } else if (!isset($dir) || strlen(trim($dir)) == 0) {
                ECHO $rspta = "Tiene que ingresar una Dirección";
                return;
            } else if (strlen($dir) < 10) {
                ECHO $rspta = "Pocos digitos para una dirección";
                return;
            } else if (strlen($cel) != 0 and ( strlen($cel) != 9 || $valid_cel != 9)) {
                echo $rspta = "Ingrese un número celular válido";
                return;
            } else if (strlen($tel) != 0 && strlen($tel) != 7) {
                echo $rspta = "Ingrese un número de telefono válido";
                return;
            } else if (strlen($usu) < 5) {
                ECHO $rspta = "El usuario debe contener de 5 a más caracteres";
                return;
            } else {
                $especiales = array("á", "é", "í", "í", "ú", "Á", "É", "Í", "Í", "Í", "Ñ", "ñ", "¿", "¡", "'", "´", "`");
                $foto = $_FILES['foto']['name'];
                $ext = explode(".", $foto);
                $extension = end($ext);
                $fotoReemplazo = str_replace($especiales, "", $foto);
                $foto1 = $fotoReemplazo . $cod . '.' . $extension;
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $limite_kb = 1000;
                if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024) {

                    $fototmpname = $_FILES['foto']['tmp_name'];

                    $foto2 = str_replace($especiales, "", $fototmpname);
                    $ruta = "../View/subidas/" . $foto1;
                    move_uploaded_file($foto2, $ruta);
                }

                $objBean->setEstudiante_id($cod);
                $objBean->setNombres($nom);
                $objBean->setApellido_paterno($apa);
                $objBean->setApellido_materno($ama);
                $objBean->setDni($dni);
                $objBean->setDistrito_id($distrito_id);
                $objBean->setDireccion($dir);
                $objBean->setNumero_cel($cel);
                $objBean->setNumero_tel($tel);
                $objBean->setFecha_nac($fec_nac);
                if ($foto == "") {
                    $objBean->setFoto($foto_actual);
                } else {
                    $objBean->setFoto($foto1);
                }
                $objBean->setSexo($sexo);
                $objBean->setUsuario($usu);
                $rspta = $objDao->editarEstu($objBean);
                echo $rspta;
            }
            break;
        }
    case 15: {
            $estu_id = $_REQUEST['estu_id'];
            $nombre_estu = $_REQUEST['nombre_estu'];
            $listaAño = $objDao->listarClaseAño($estu_id);
            $año_id = $listaAño['AÑO'][0]['CODIGO']; //Seleccionamos el id del año en donde esta cursando el estudiante
            $lista_clase = $objDao->ListarMiClase($estu_id, $año_id);

            $objTrimestreDao = new TrimestreDao();
            $listat = $objTrimestreDao->selectTri();
            $lista_curso = $objDao->verNotasEstu($estu_id, '', $año_id);
            $nombre_año = $listaAño['AÑO'][0]['NOMBRE_AÑO'];
            $_SESSION['anio_selec'] = $nombre_año;
            $_SESSION['año_id_estu'] = $año_id;
            $_SESSION['listaMiClase'] = $lista_clase;
            $_SESSION['listaAño'] = $listaAño;
            $_SESSION['estu_id'] = $estu_id;
            $_SESSION['nombre_estu'] = $nombre_estu;
            $_SESSION['NotasCursos'] = $lista_curso;
            $_SESSION['trimestre'] = $listat;

            header('Location:../View/Director/notas_estudiante.php');

            break;
        }
    case 16: {//para selector anio_id
            $año_id = $_REQUEST['anio'];

            $objTrimestreDao = new TrimestreDao();
            $listat = $objTrimestreDao->selectTriAnio($año_id);
            $_SESSION['trimestre'] = $listat;
            header('Location:../View/Director/select_tri.php');
            break;
        }
    case 17: {//para selector anio
            $año_id = $_REQUEST['anio'];
            $estu_id = $_SESSION['estu_id'];
            $listaAño = $objDao->listarClaseAño($estu_id);
            $nombre_año = $listaAño['AÑO'][0]['NOMBRE_AÑO'];
            $lista_curso = $objDao->verNotasEstu($estu_id, '', $año_id);
            $_SESSION['anio_selec'] = $nombre_año;
            $_SESSION['NotasCursos'] = $lista_curso;
            header('Location:../View/Director/notas_estudiante_anio.php');

            break;
        }

    case 18: {//para selector trimestre
            $tri_id = $_REQUEST['codtri'];
            $estu_id = $_SESSION['estu_id'];
            $anio_id = $_REQUEST['anio'];
            $listaAño = $objDao->listarClaseAño($estu_id);
            if ($anio_id == "") {
                $anio_id = $listaAño['AÑO'][0]['CODIGO'];
            }
            $lista_curso = $objDao->verNotasEstu($estu_id, $tri_id, $anio_id);

            $_SESSION['NotasCursos'] = $lista_curso;

            header('Location:../View/Director/notas_estudiante_tri.php');

            break;
        }
    case 19: {//para selector trimestre
            header('Location:../View/Director/nav_reporte_asistencia.php');

            break;
        }
    case 20: {//para selector trimestre
            $estu_id = $_SESSION['estu_id'];
            $anio_id = $_SESSION['año_id_estu'];

            $lista1 = $objDao->cantAsistencias($estu_id, $anio_id);

            $_SESSION['listaCantidadA'] = $lista1;

            header('Location:../View/Director/asistencia_estudiante.php');

            break;
        }

    case 21: {

            header('Location:../View/Director/notas_estudiante_recarga.php');

            break;
        }

    case 22: {

            header('Location:../View/Director/nav_reporte_notas.php');

            break;
        }
    case 23: {
            $estu_id = $_SESSION['estu_id'];
            $anio_id = $_REQUEST['anio'];

            $lista1 = $objDao->cantAsistencias($estu_id, $anio_id);

            $_SESSION['listaCantidadA'] = $lista1;

            header('Location:../View/Director/asistencias_estudiante_anio.php');

            break;
        }
    case 24: {
            $listaEstu = $objDao->listarEstudiantesMatricula();
            $objAnioDao = new AnioDao();
            $listaAnio = $objAnioDao->CargarAnio();
            $_SESSION['listaAnio'] = $listaAnio;
            $objNivDao = new NivelDao();
            $listaNivel = $objNivDao->cargaNivel();
            $_SESSION['listaNivel'] = $listaNivel;
            $objSecDao = new SeccionDao();
            $listaSeccion = $objSecDao->cargaSeccion();
            $_SESSION['listaSeccion'] = $listaSeccion;
            $objGradoDao = new GradoDao();
            $listaGrado = $objGradoDao->cargaGrado();
            $_SESSION['listaGrado'] = $listaGrado;
            $_SESSION['listaEstuMatricula'] = $listaEstu;
// $claseDao=new ClaseDao();
//       $listaClase=$claseDao->ListarClaseMatricula();
//
//       
//       $_SESSION['listaClase']=$listaClase;

            header('Location:../View/Administracion/Matricula/matriculados_estudiante.php');

            break;
        }

    case 25: {

            $nivel_id = $_REQUEST['nivel_id'];

            $grado_id = $_REQUEST['grado_id'];

            $seccion_id = $_REQUEST['seccion_id'];
            $anio_id = $_REQUEST['anio_id'];


            $listaEstu = $objDao->listarMatriNivelGradoSec($nivel_id, $grado_id, $seccion_id, $anio_id, $year_id);

            $_SESSION['listaEstuMatricula'] = $listaEstu;
            header('Location:../View/Administracion/Matricula/filtro_matriculados_estudiante.php');

            break;
        }

    case 26: {
            //buscar, eliminar, editar
            $matri_id = $_REQUEST['id'];
            $estu_id = $_REQUEST['id2'];
            $tipo = $_REQUEST['tipo'];
            $lista = $objDao->accionMatri($tipo, $matri_id, $estu_id);
            $_SESSION['estudiante_id'] = $estu_id;
            $_SESSION['matricula_id'] = $matri_id;

            if ($tipo == "b") {
                $clase_id = $lista['LISTA'][0]['COD_CLASE'];
                $claseDao = new ClaseDao();
                $listaSeccion = $claseDao->ListarClaseDistinta($clase_id);
                $_SESSION['listaSeccion'] = $listaSeccion;
                $_SESSION['estuEncontrado'] = $lista;
                header('Location:../View/Administracion/Matricula/cambiar_seccion.php');
            }
            break;
        }

    case 27: {
            $estu_id = $_SESSION['estudiante_id'];
            $matri_id = $_SESSION['matricula_id'];
            $clase_id = $_POST['clase_id'];

            $rspta = $objDao->cambiarSeccion($clase_id, $estu_id, $matri_id);

            echo $rspta;

            break;
        }
    case 28: {

            header("Location:../View/Administracion/Matricula/asignar_clase_estu.php");
            break;
        }

    case 29: {
            $entrada = $_REQUEST['entrada'];
            $listaEstu = $objDao->buscarEstudiante($entrada);
            $claseDao = new ClaseDao();

            $listaClase = $claseDao->ListarClaseMatricula();

            $_SESSION['listaClase'] = $listaClase;
            $_SESSION['listaEstu'] = $listaEstu;
            header("Location:../View/Administracion/Matricula/asignar_estu_encontrado.php");
            break;
        }

    case 30: {

            $estu_id = $_POST['estu_id'];
            $clase_id = $_POST['clase_id'];
            if ($clase_id == "0") {
                $rspta = "Seleccione una salón de clases, por favor!!!";
            } else {
                $rspta = $objDao->guardarAsignacion($estu_id, $year_id, $clase_id);
            }
            echo $rspta;
            break;
        }
}
