<?php

session_start();
require_once '../Modelo/Bean/ProfesorBean.php';
require_once '../Modelo/Dao/ProfesorDao.php';
require_once '../Modelo/Dao/AreaDao.php';
require_once '../Modelo/Dao/ClaseDao.php';
require_once '../Modelo/Dao/TrimestreDao.php';
require_once '../Modelo/Dao/DistritoDao.php';

$objDao = new ProfesorDao();
$objBean = new ProfesorBean();
$year_id = $_SESSION['anio_id'];
$id = $_SESSION['id'];
$op = $_REQUEST['op'];

switch ($op) {
    case 1: {

            $listaAño = $objDao->listarClaseAño($id);
            $año_id = $listaAño['AÑO'][0]['CODIGO'];
            $lista1 = $objDao->ListarMiClase($id, $año_id);

            $_SESSION['listaMiClase'] = $lista1;
            $_SESSION['listaAño'] = $listaAño;

            header('Location:../View/Profesor/mi_clase.php');

            break;
        }

    case 2: {

            $año = $_REQUEST['anio'];
            $lista1 = $objDao->ListarMiClase($id, $año);

            $_SESSION['listaMiClase'] = $lista1;

            header('Location:../View/Profesor/clase_filtro.php');

            break;
        }

    case 3: {

            $clase_id = $_REQUEST['cod'];
            $nombre_clase = $_REQUEST['clase'];
            $listaE = $objDao->ListarMisEstudiantes($clase_id);

            $_SESSION['Mis_Estu'] = $listaE;

            header('Location:../View/Profesor/mis_estudiantes.php?clase=' . $nombre_clase . '&clase_id=' . $clase_id);

            break;
        }

    case 4: {

            $clase_id = $_REQUEST['cod'];
            $nombre_clase = $_REQUEST['clase'];
            $listaC = $objDao->ListarMisCursos($id, $clase_id);

            $_SESSION['Mis_Cursos'] = $listaC;

            header('Location:../View/Profesor/mis_cursos.php?clase_id=' . $clase_id . '&clase=' . $nombre_clase);

            break;
        }

    case 5: {

            $profe_clase_id = $_REQUEST['cod'];
            $clase_id = $_REQUEST['clase_id'];
            $nombre_clase = $_REQUEST['clase'];
            $listaC = $objDao->infoCurso($id, $profe_clase_id);
            $listaT = $objDao->infoTemas($profe_clase_id);
            $_SESSION['infoCurso'] = $listaC;
            $_SESSION['listaTema'] = $listaT;
            header('Location:../View/Profesor/info_curso.php?clase_id=' . $clase_id . '&nombre_clase=' . $nombre_clase);

            break;
        }

    case 6: {

            $mostrar = $_REQUEST['mostrar'];
            if ($mostrar != "no") {
                $profe_clase_id = $_REQUEST['cod'];
                $clase_id = $_REQUEST['clase_id'];
                $nombre_clase = $_REQUEST['clase'];
                $listaC = $objDao->asistencias($profe_clase_id);
                $mostrar = $objDao->mostrar($profe_clase_id);
                $_SESSION['AsistenciaEstu'] = $listaC;
                $_SESSION['mostrar'] = $mostrar;
                header('Location:../View/Profesor/asistencias.php?clase_id=' . $clase_id . '&nombre_clase=' . $nombre_clase);
            } else {
                $_SESSION['AsistenciaEstu'] = null;
                header('Location:../View/Profesor/asistencias.php');
            }

            break;
        }

    case 7: {

            $profe_clase_id = $_REQUEST['cod'];
            $asistencia_id = $_REQUEST['parametro'];

            $listaA = $objDao->nuevaAsistenciaEstu($profe_clase_id);
            $listaAE = $objDao->verAsistenciaEstu($profe_clase_id, $asistencia_id);
            $listaAT = $objDao->verAsistenciaTema($profe_clase_id, $asistencia_id);
            $listaTema = $objDao->listarTema($profe_clase_id);

            $_SESSION['NuevaAsistenciaEstu'] = $listaA;
            $_SESSION['ListaTema'] = $listaTema;
            $_SESSION['VerAsistenciaEstu'] = $listaAE;
            $_SESSION['VerTema'] = $listaAT;


            header('Location:../View/Profesor/registrar_editar_asistencia_estu.php');

            break;
        }

    case 8: {

            $estudiante_id = $_POST['estudiante_id'];

            $getLetra = $_REQUEST['letra'];
            $letra = explode(",", $getLetra);
            $tema_id = $_POST['tema_id'];
            $fecha = $_REQUEST['fecha_hoy'];
            $profe_clase_id = $_REQUEST['profe_clase_id'];

            $estado = $objDao->guardarAsistencia($profe_clase_id, $estudiante_id, $letra, $tema_id, $fecha);

            echo $estado;

            break;
        }

    case 9: {

            $estudiante_id = $_REQUEST['estudiante_id'];
            $letra = $_REQUEST['tipo'];
            $asistencia_id = $_REQUEST['asistencia_id'];
            $objDao->editarAsistencia($asistencia_id, $estudiante_id, $letra);

            break;
        }

    case 10: {

            $profe_clase_id = $_REQUEST['cod'];
            $trimestre_id = $_REQUEST['codtri'];
            $nombre_clase = $_REQUEST['clase'];
            $objTrimestreDao = new TrimestreDao();
            $listat = $objTrimestreDao->selectTri();
            $listaNE = $objDao->listarAlumnosNotas($profe_clase_id, $trimestre_id);

            $_SESSION['Lista_Notas_Estu'] = $listaNE;
            $_SESSION['trimestre'] = $listat;
            $_SESSION['nombre_clase'] = $nombre_clase;
            if ($trimestre_id == "") {
                header('Location:../View/Profesor/registrar_notas_estu.php');
            } else {
                header('Location:../View/Profesor/notas_filtro.php');
            }
            break;
        }

    case 11: {

            $asistencia_id = $_REQUEST['id'];
            $estado = $objDao->eliminarAsistencia($asistencia_id);

            break;
        }

    case 12: {


            $tema_id = $_REQUEST['tema_id'];
            $asistencia_id = $_REQUEST['asistencia_id'];
            $accion = $_REQUEST['accion'];
            $profe_clase_id = $_REQUEST['profe_clase_id'];

            $objDao->accionTema($tema_id, $asistencia_id, $accion);

            $listaTema = $objDao->listarTema($profe_clase_id);
            $_SESSION['Tema'] = $listaTema;
            header('Location:../View/Profesor/modal_tema.php');

            break;
        }

    case 13: {

            $estudiante_id = $_POST['estu_id'];
            $n1 = $_POST['nota1'];
            $n2 = $_POST['nota2'];
            $nt = $_POST['notat'];
            $nc = $_POST['notac'];
            $nl = $_POST['notal'];
            $na = $_POST['notaa'];

            $trimestre_id = $_REQUEST['trimestre_id'];
            $profe_clase_id = $_REQUEST['profe_clase_id'];

            $estado = $objDao->guardarNotas($profe_clase_id, $trimestre_id, $estudiante_id, $n1, $n2, $nt, $nc, $nl, $na);

            if ($estado == 1) {
                echo "Las notas fueron registradas correctamente!!!";
            } else {
                echo $estado;
            }

            break;
        }

    case 14: {

            $listaProfe = $objDao->listarProfesores();
            $areaDao = new AreaDao();
            $listaArea = $areaDao->cargaArea();
            $objDistriDao = new DistritoDao();
            $listadIS = $objDistriDao->cargarDistrito();
            $_SESSION['listaDistrito'] = $listadIS;
            $_SESSION['listaArea'] = $listaArea;
            $_SESSION['listaProfe'] = $listaProfe;
            header('Location:../View/Administracion/Mantenimiento/mantenimiento_profe.php');
            break;
        }

    case 15: {

            $nom = $_POST['nom'];
            $apa = $_POST['apa'];
            $ama = $_POST['ama'];
            $dni = $_POST['dni'];
            $distrito_id = $_POST['distrito_id'];
            $dir = $_POST['dir'];
            $cel = $_POST['cel'];
            $valid_cel = substr($cel, 0, 1);
            $tel = $_POST['tel'];
            $fec_nac = $_POST['fec_nac'];
            @$area = $_POST['area_id'];
            $sexo = $_POST['sexo'];

            $fecha_actual = date("Y-m-d");
            $fecha_requerida = date("Y-m-d", strtotime($fecha_actual . "- 18 year"));
            $fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 65 year"));

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
                ECHO $rspta = "Tiene que selecionar el sexo del profesor";
                return;
            } else if (!isset($fec_nac) || strlen(trim($fec_nac)) == 0) {
                ECHO $rspta = "Tiene que ingresar la Fecha de Nacimiento";
                return;
            } else if ($fec_nac > $fecha_requerida) {
                echo 'El profesor tiene que ser mayor de edad';
                return;
            } else if ($fec_nac < $fecha_limite) {
                echo 'La edad límite para el profesores de 65 años';
                return;
            } else if ($distrito_id == "") {
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
            } else if ($area == "") {
                ECHO $rspta = "Tiene que seleccionar un Área";
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
                $objBean->setSexo($sexo);
                $objBean->setDistrito_id($distrito_id);
                $objBean->setDireccion($dir);
                $objBean->setNumero_cel($cel);
                $objBean->setNumero_tel($tel);
                $objBean->setFecha_nac($fec_nac);
                $objBean->setArea_id($area);
                $objBean->setFoto($foto1);

                $rspta = $objDao->guardarProfe($objBean);
                echo $rspta;
            }
            break;
        }

    case 16: {

            $listaAsigna = $objDao->listarAsignaciones();
            $_SESSION['listaAsigna'] = $listaAsigna;
            header("Location:../View/Administracion/Coordinacion/asignados_profes.php");
            break;
        }
    case 17: {

            header("Location:../View/Administracion/Coordinacion/asignar_clase_profe.php");
            break;
        }


    case 18: {
            $entrada = $_REQUEST['entrada'];
            $listaProfe = $objDao->buscarProfesor($entrada);
            $id = $listaProfe['PROFE'][0]['PROFE_ID'];
            $listaArea = $objDao->profeAreas($id);
            $claseDao = new ClaseDao();

            $listaClase = $claseDao->ListarClaseMatricula();

            $_SESSION['listaClase'] = $listaClase;
            $_SESSION['listaArea'] = $listaArea;
            $_SESSION['listaProfe'] = $listaProfe;
            header("Location:../View/Administracion/Coordinacion/asignar_profe_encontrado.php");
            break;
        }

    case 19: {

            $turno = $_REQUEST['t'];
            $clase_id = $_REQUEST['id'];
            $profe_Clase_id = $_REQUEST['id2'];
            $profe_id = $_REQUEST['id3'];
            $tipo = $_REQUEST['tipo'];

            $profe = $objDao->traerProfesor($profe_id);
            $listaHoraProfe = $objDao->listarHorario($profe_id, $year_id, $tipo);
            $listaProfeCursos = $objDao->listarProfeCursos($profe_Clase_id);

            $listaAreas = $objDao->profeAreas2($profe_id);
            $listaCursos = $objDao->profeCursos($profe_Clase_id);
            $cursosFiltrados = $objDao->filtrarCursos($listaCursos, $listaAreas, $clase_id);
            $claseDao = new ClaseDao();
            $listaHoraClase = $claseDao->listarHorario($clase_id);
            $Clase = $claseDao->buscarClase($clase_id);
            $_SESSION['listaCursos'] = $listaCursos;
            $_SESSION['listaAreas'] = $listaAreas;
            $_SESSION['Clase'] = $Clase;
            $_SESSION['Profe'] = $profe;
            $_SESSION['listaHoraProfe'] = $listaHoraProfe; //Horario del profesor 
            $_SESSION['listaHoraClase'] = $listaHoraClase; //Horario de clase en el modal
            $_SESSION['listaProfeCursos'] = $listaProfeCursos; //lista de Cursos Asignados al profesor en tabla
            $_SESSION['cursosEncontrados'] = $cursosFiltrados; //lista de cursos correspondientes al profesor en un modal

            if ($turno == "Mañana") {
                header("Location:../View/Administracion/Coordinacion/asignar_profe_horario_maniana.php?profe_clase_id=" . $profe_Clase_id);
            } else if ($turno == "Tarde") {
                header("Location:../View/Administracion/Coordinacion/asignar_profe_horario_tarde.php?profe_clase_id=" . $profe_Clase_id);
            }
            break;
        }
        
    case 20: {


            if (!isset($_POST['hora'])) {
                echo $rspta = "Debe seleccionar un horario";
            } else {
                $hora_id = $_POST['hora'];
                $profe_id = $_REQUEST['profe_id'];
                $profesor_clase_curso_id = $_REQUEST['profe_clase_curso_id'];

                $rspta = $objDao->guardarHoraHabido($profe_id, $profesor_clase_curso_id, $hora_id);

                if ($rspta == 1) {
                    echo $rspta;
                } else {
                    foreach (@$rspta as $val) {

                        $muestra = @$val['rs'];
                        echo $muestra;
                    }
                }
            }
            break;
        }

    case 21: {

            $tipo = $_REQUEST['tipo'];
            $listaHora = $objDao->listarHorario($id, $year_id, $tipo);
            $_SESSION['listaHora'] = $listaHora;
            header("Location:../View/Profesor/mi_horario.php");
            break;
        }



    case 22: {

            $listaProfe = $objDao->listarProfesores();
            $_SESSION['listaProfe'] = $listaProfe;
            header("Location:../View/Director/profesores.php");
            break;
        }

    case 23: {


            //buscar, eliminar
            $tipo = $_REQUEST['tipo'];
            $id = $_REQUEST['id'];
            $listaProfe = $objDao->accion($tipo, $id);
            $listaAreas = $objDao->profeAreas2($id);
            $areaDao = new AreaDao();
            $listaAreaFiltrado = $areaDao->filtrarArea($listaAreas);
            $distri_id = $listaProfe['LISTA'][0]['DISTRI_ID'];
            $distriDao = new DistritoDao();
            $listaDistrito = $distriDao->ListarDistriDistinta($distri_id);
            $_SESSION['listaDistrito'] = $listaDistrito;
            $_SESSION['listArea'] = $listaAreaFiltrado;
            $_SESSION['listProfe'] = $listaProfe;
            header('Location:../View/Administracion/Mantenimiento/editar_profesor.php');
            break;
        }

    case 24: {
            $cod = $_POST['cod'];
            $nom = $_POST['nom'];
            $apa = $_POST['apa'];
            $ama = $_POST['ama'];
            $dni = $_POST['dni'];
            $dir = $_POST['dir'];
            $cel = $_POST['cel'];
            $distrito_id = $_POST['distrito_id'];
            $valid_cel = substr($cel, 0, 1);
            $tel = $_POST['tel'];
            $fec_nac = $_POST['fec_nac'];
            $sexo = $_POST['sexo'];
            $usu = $_POST['usu'];
            $foto_actual = $_POST['now_foto'];

            $fecha_actual = date("Y-m-d");
            $fecha_requerida = date("Y-m-d", strtotime($fecha_actual . "- 18 year"));
            $fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 65 year"));

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
            } else if (!isset($dir) || strlen(trim($dir)) == 0) {
                ECHO $rspta = "Tiene que ingresar una Dirección";
                return;
            } else if (strlen($dir) < 10) {
                ECHO $rspta = "la dirección debe contener más de 10 digitos";
                return;
            } else if (strlen($cel) != 0 and ( strlen($cel) != 9 || $valid_cel != 9)) {
                echo $rspta = "Ingrese un número celular válido";
                return;
            } else if (strlen($tel) != 0 && strlen($tel) != 7) {
                echo $rspta = "Ingrese un número de telefono válido";
                return;
            } else if (!isset($fec_nac) || strlen(trim($fec_nac)) == 0) {
                ECHO $rspta = "Tiene que ingresar la Fecha de Nacimiento";
                return;
            } else if ($fec_nac > $fecha_requerida) {
                echo 'El profesor tiene que ser mayor de edad';
                return;
            } else if ($fec_nac < $fecha_limite) {
                echo 'La edad límite para el profesores de 65 años';
                return;
            } else if (!isset($usu) || strlen(trim($usu)) == 0) {
                ECHO $rspta = "Tiene que ingresar un usuario";
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


                $objBean->setProfesor_id($cod);
                $objBean->setNombres($nom);
                $objBean->setApellido_paterno($apa);
                $objBean->setApellido_materno($ama);
                $objBean->setSexo($sexo);
                $objBean->setDistrito_id($distrito_id);
                $objBean->setDni($dni);
                $objBean->setDireccion($dir);
                $objBean->setNumero_cel($cel);
                $objBean->setNumero_tel($tel);
                $objBean->setFecha_nac($fec_nac);
                $objBean->setUsuario($usu);
                if ($foto == "") {
                    $objBean->setFoto($foto_actual);
                } else {
                    $objBean->setFoto($foto1);
                }
                $rspta = $objDao->editarProfe($objBean);
                echo $rspta;
            }
            break;
        }

    case 25: {

            $profe_id = $_POST['profe_id'];
            $clase_id = $_POST['clase_id'];

            $rspta = $objDao->guardarAsignacion($profe_id, $clase_id);
            echo $rspta;
            break;
        }

    case 26: {


            if (!isset($_POST['hora'])) {
                echo $rspta = "Debe seleccionar un horario";
            } else {
                $hora_id = $_POST['hora'];
                $profe_id = $_REQUEST['profe_id'];
                $curso_id = $_REQUEST['curso_id'];
                $clase_id = $_REQUEST['clase_id'];
                $profesor_clase_id = $_REQUEST['profe_clase_id'];

                $rspta = $objDao->guardarHoraNuevo($profe_id, $profesor_clase_id, $curso_id, $hora_id, $clase_id);

                if ($rspta == 1) {
                    echo $rspta;
                } else {
                    foreach (@$rspta as $val) {

                        $muestra = @$val['rs'];
                        echo $muestra;
                    }
                }
            }
            break;
        }

    case 27: {

            $hora_curso_id = $_REQUEST['id'];
            $objDao->eliminarHorario($hora_curso_id);
            break;
        }

    case 28: {
            $profe_curso_id = $_REQUEST['id'];
            $objDao->eliminarCursoProfe($profe_curso_id);
            break;
        }
    case 29: {
            $turno = $_REQUEST['t'];
            $clase_id = $_REQUEST['id'];
            $profe_id = $_REQUEST['id3'];

            $profe = $objDao->traerProfesor($profe_id);
            $listaHoraProfe = $objDao->listarHorario($profe_id, $year_id);

            $claseDao = new ClaseDao();
            $listaHoraClase = $claseDao->listarHorario($clase_id);
            $Clase = $claseDao->buscarClase($clase_id);

            $_SESSION['Clase'] = $Clase;
            $_SESSION['Profe'] = $profe;
            $_SESSION['listaHoraProfe'] = $listaHoraProfe; //Horario del profesor 
            $_SESSION['listaHoraClase'] = $listaHoraClase; //Horario de clase en el modal

            if ($turno == "Mañana") {
                header("Location:../View/Director/ver_profe_horario_maniana.php");
            } else if ($turno == "Tarde") {
                header("Location:../View/Director/ver_profe_horario_tarde.php");
            }


            break;
        }
    case 30: {
            $profe_clase_id = $_REQUEST['id'];
            $objDao->eliminarClaseProfe($profe_clase_id);
            break;
        }

    case 31: {
            $area_id = $_REQUEST['area_id'];
            $profe_id = $_REQUEST['profe_id'];
            $accion = $_REQUEST['accion'];
            $objDao->accionArea($area_id, $profe_id, $accion);
            $listaProfe = $objDao->accion("b", $profe_id);
            $_SESSION['listProfe'] = $listaProfe;
            header('Location:../View/Administracion/Mantenimiento/div_area.php');
            break;
        }
    case 32: {


            $id = $_REQUEST['profe_id'];
            $listaAreas = $objDao->profeAreas2($id);
            $areaDao = new AreaDao();
            $listaAreaFiltrado = $areaDao->filtrarArea($listaAreas);
            $_SESSION['listArea'] = $listaAreaFiltrado;
            header('Location:../View/Administracion/Mantenimiento/modal_area.php');
            break;
        }
}
 