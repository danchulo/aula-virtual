<?php

require_once "../Util/ConexionBD.php";
require_once "../Util/Querys.php";
require_once '../Modelo/Bean/ClaseBean.php';

class ClaseDao {

//     public  function ListarClases()
//   {  try {
//      
//           $sql="select * from clase order by clase_id;";
//           $rs=ejecutarConsulta($sql);
//           $LISTA['AULAS']= array();
//           while ($fila=  mysqli_fetch_assoc($rs))
//           {
//             array_push($LISTA['AULAS'], 
//             array('CODIGO'=>$fila['clase_id']));   
//           }           
//       } catch (Exception $e) {                 
//       }     
//     return  $LISTA;       
// 
//   }
//   
    public function ListarClaseMatricula() {
        try {

            $sql = "select * from lista_clase order by clase;";
            $rs = ejecutarConsulta($sql);
            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('CODIGO' => $fila['clase_id'], 'CLASE' => $fila['clase']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function ListarClaseContrato() {
        try {

            $sql = "select * from lista_clase order by clase;";
            $rs = ejecutarConsulta($sql);
            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('CODIGO' => $fila['clase_id'], 'CLASE' => $fila['clase']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function filtrarClase($id) {
        try {

            $sql = "SELECT clase,lc.clase_id FROM profesor_clase pc inner join lista_clase lc on pc.clase_id=lc.clase_id where pc.profesor_id!='$id' ;";
            $rs = ejecutarConsulta($sql);
            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('CODIGO' => $fila['clase_id'], 'CLASE' => $fila['clase']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function ListarClaseDistinta($clase_id) {
        try {
            $o = "select grado,nivel_nombre from lista_clase where clase_id='$clase_id';";
            $ob = ejecutarConsulta($o);
            $objetc = $ob->fetch_object();
            $grado = $objetc->grado;
            $nivel = $objetc->nivel_nombre;
            $sql = "select * from lista_clase where clase_id!='$clase_id' and  grado='$grado' and nivel_nombre='$nivel';";
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();
            $rs = mysqli_query($cn, $sql);
            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('CODIGO' => $fila['clase_id'], 'SECCION' => $fila['seccion_nombre']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function GuardarClases($id_profe, $aula_id, $anioescolar) {
        $rsptaV = 0;
        try {
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();

            mysql_query("insert into profesor_aula (profesor_id,aula_id,imagen,anio) values('$id_profe','$aula_id','thumbnails.jpg','$anioescolar')", $cn);

            $nueva_clase_profe = mysql_query("select * from profesor_aula order by profesor_aula_id DESC", $cn)or die(mysql_error());

            $profesor_row = mysql_fetch_array($nueva_clase_profe);
            $profesor_id = $profesor_row['profesor_aula_id'];

            $insert_query = mysql_query("select * from estudiante where aula_id = '$aula_id'", $cn)or die(mysql_error());
            if ($insert_query != 1) {
                $rsptaV = 2;
            }
            while ($row = mysql_fetch_array($insert_query)) {
                $id = $row['estudiante_id'];
                $rsptaV = mysql_query("insert into profesor_aula_estudiante (profesor_id,estudiante_id,profesor_aula_id) values('$id_profe','$id','$profesor_id')", $cn)or die(mysql_error());
            }
        } catch (Exception $exc) {
            $rsptaV = 0;
        }
        return $rsptaV;
    }

    public function ListarMisEstudiantes($id) {
        try {

            $sql = "SELECT * FROM profesor_aula_estudiante pa
		 LEFT JOIN estudiante e ON e.estudiante_id = pa.estudiante_id 
		 INNER JOIN aula a ON a.aula_id = e.aula_id where 
                 profesor_aula_id = '$id' order by apellidos;";

            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();
            $rs = mysql_query($sql, $cn);
            $LISTA['MI_AULA_ESTUS'] = array();
            while ($fila = mysql_fetch_assoc($rs)) {
                array_push($LISTA['MI_AULA_ESTUS'], array('CODIGO_A_E' => $fila['profesor_aula_estudiante_id'], 'NOMBRESESTU' => $fila['nombres'], 'APELLIDOSESTU' => $fila['apellidos'], 'FOTO' => $fila['foto']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function cantidadClase($añoid) {
        try {
            $sql = "select count(*) as cantidad from clase where estado='A' and anio_escolar_id='$añoid';";
            $rs = ejecutarConsulta($sql);
            $fila = mysqli_fetch_assoc($rs);
            $cantidad = $fila['cantidad'];
        } catch (Exception $e) {
            $cantidad = null;
        }
        return $cantidad;
    }

    public function listarClases() {
        try {

            $sql = "select * from lista_clase_completa order by clase_id desc;";
            $rs = ejecutarConsulta($sql);
            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('NIVEL' => $fila['nivel_nombre'], 'CODIGO' => $fila['clase_id'], 'SALON' => $fila['salon_nombre'], 'TURNO' => $fila['turno_nombre'],
                    'SECCION' => $fila['seccion_nombre'], 'CAPACIDAD' => $fila['capacidad'], 'INICIO' => $fila['hora_inicio'],
                    'FIN' => $fila['hora_fin'], 'ESTADO' => $fila['estado'], 'GRADO' => $fila['grado']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function guardarClase(ClaseBean $objBean) {

        try {

            $query = "select * from clase where grado_id='$objBean->grado_id' and seccion_id='$objBean->seccion_id' and nivel_id='$objBean->nivel_id' and turno_id='$objBean->turno_id' and anio_escolar_id='$objBean->anio_escolar_id';";
            $rspta = existencia($query);


            if ($rspta == 0) {
                $query2 = "select count(*) as can from clase where salon_id='$objBean->salon_id' and anio_escolar_id='$objBean->anio_escolar_id';";
                $rs = ejecutarConsulta($query2);
                $objeto = $rs->fetch_object();
                $cant = $objeto->can;

                if ($cant <= 2) {
                    $sql = "insert into clase values(null,'$objBean->grado_id','$objBean->seccion_id','$objBean->nivel_id','$objBean->salon_id',"
                            . "'$objBean->turno_id','$objBean->hora_inicio','$objBean->hora_fin','$objBean->capacidad','$objBean->anio_escolar_id','A');";
                    $rspta = ejecutarConsulta($sql);
                } else {
                    $rspta = "Un salón solo puede pertenecer a 2 clases";
                }
            }
            if ($rspta == 2) {
                $rspta = 2;
            }
        } catch (Exception $e) {
            $rspta = "aua";
        }
        return $rspta;
    }

    public function editarClase(ClaseBean $objBean, $anio_id) {

        try {
            $rspta = 0;
            $id = $objBean->clase_id;
            $grado_id = $objBean->grado_id;
            $sec_id = $objBean->seccion_id;
            $niv_id = $objBean->nivel_id;
            $turno_id = $objBean->turno_id;
            $salon_id = $objBean->salon_id;
            $query = "select * from clase where clase_id!='$id';";
            $rst = ejecutarConsulta($query);
            while ($fila = mysqli_fetch_assoc($rst)) {
                if ($fila['grado_id'] == $grado_id && $fila['seccion_id'] == $sec_id && $fila['nivel_id'] == $niv_id && $fila['turno_id'] == $turno_id) {
                    $rspta = 2;
                }
            }
            if ($rspta != 2) {
                $query2 = "select count(*) as can from clase where salon_id='$salon_id' and clase_id!='$id' and anio_escolar_id='$anio_id' ;";
                $rs = ejecutarConsulta($query2);
                $objeto = $rs->fetch_object();
                $cant = $objeto->can;

                if ($cant < 2) {
                    $sql = "update clase set grado_id='$grado_id', seccion_id='$sec_id', nivel_id='$niv_id', "
                            . "turno_id='$turno_id', hora_inicio='$objBean->hora_inicio',hora_fin='$objBean->hora_fin', "
                            . "capacidad='$objBean->capacidad',salon_id='$salon_id' where clase_id='$id';";
                    $rspta = ejecutarConsulta($sql);
                } else {
                    $rspta = "Un ambiente solo puede tener 2 aulas";
                }
            }
        } catch (Exception $e) {
            $rspta = 0;
        }
        return $rspta;
    }

    public function listarHorario($clase_id) {
        try {

            $sql = "call SP_horario_clase('$clase_id');";
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();
            $rs = mysqli_query($cn, $sql);

            $LISTA['HORACLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['HORACLASE'], array('DIA' => $fila['dia'], 'DE' => $fila['hora_de'], 'A' => $fila['hora_a'], 'CLASE' => $fila['clase']));
            }
        } catch (Exception $e) {
            $LISTA = null;
        }
        return $LISTA;
    }

    public function buscarClase($clase_id) {
        try {

            $sql = "select clase_id,clase2,turno_nombre from lista_clase where clase_id='$clase_id';";
            $rs = mysqli_query($GLOBALS["conection"], $sql);

            $LISTA['CLASE'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['CLASE'], array('COD_CLASE' => $fila['clase_id'], 'T' => $fila['turno_nombre'], 'CLASE' => $fila['clase2']));
            }
        } catch (Exception $e) {
            $LISTA = null;
        }
        return $LISTA;
    }

    public function accion($tipo, $id, $anio_id) {
        try {


            if ($tipo == "e") {
                $sql = "delete from clase where clase_id='$id';";
                ejecutarConsulta($sql);
            } else if ($tipo == "b") {
                $sql = "select * from lista_clase_completa where clase_id='$id' and anio_escolar_id='$anio_id';";
                $rsP = ejecutarConsulta($sql);
                $LISTA['LISTA'] = array();
                while ($fila = mysqli_fetch_assoc($rsP)) {
                    array_push($LISTA['LISTA'], array('CODIGO' => $fila['clase_id'], 'COD_TURNO' => $fila['turno_id'], 'COD_AMBIENTE' => $fila['salon_id'],
                        'COD_SECCION' => $fila['seccion_id'], 'COD_NIVEL' => $fila['nivel_id'], 'COD_GRADO' => $fila['grado_id'],
                        'CAPACIDAD' => $fila['capacidad'], 'INICIO' => $fila['hora_inicio'], 'FIN' => $fila['hora_fin'],
                        'TURNO' => $fila['turno_nombre'], 'AMBIENTE' => $fila['salon_nombre'], 'SECCION' => $fila['seccion_nombre'],
                        'NIVEL' => $fila['nivel_nombre'], 'GRADO' => $fila['grado']));
                }
                $rs = ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

}
