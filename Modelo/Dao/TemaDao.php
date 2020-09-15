<?php

require_once "../Util/Querys.php";
require_once '../Modelo/Bean/TemaBean.php';

class TemaDao {

    public function ListarTemas() {
        try {

            $sql = "select * from lista_temas order by tema_id desc ;";
            $rs = ejecutarConsulta($sql);
            $LISTA['TEMAS'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($LISTA['TEMAS'], array('CODIGO' => $fila['tema_id'], 'TEMA' => $fila['nombre_tema'], 'UNIDAD' => $fila['nombre_unidad_tema']
                    , 'CURSO' => $fila['curso'], 'ESTADO' => $fila['estado']));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function ListarTemaUnida() {
        try {
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();



            $sql = "select DISTINCT ut.unidad_tematica_id,t.curso_id,curso,nombre_unidad_tema from tema t inner join unidad_tematica ut "
                    . "on t.unidad_tematica_id=ut.unidad_tematica_id inner join lista_cursos c on t.curso_id=c.curso_id;";

            $rs = mysqli_query($cn, $sql);
            $LISTA['TEMAS'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $id = $fila['curso_id'];
                $uni_id = $fila['unidad_tematica_id'];
                $tema = array();
                $sql1 = "select nombre_unidad_tema,tema_id,curso_nombre,nombre_tema,t.estado from tema t inner join unidad_tematica ut on t.unidad_tematica_id=ut.unidad_tematica_id inner join curso c on t.curso_id=c.curso_id where t.curso_id='$id' and t.unidad_tematica_id='$uni_id';";
                $rs1 = mysqli_query($cn, $sql1);
                while ($row = mysqli_fetch_assoc($rs1)) {

                    $tema[] = $row;
                }

                array_push($LISTA['TEMAS'], array('CURSO' => $fila['curso']
                    , 'UNIDAD' => $fila['nombre_unidad_tema']
                    , 'TEMA' => $tema));
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function ListarTemaUnidad() {
        try {
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();


            $sql = "select DISTINCT ut.unidad_tematica_id,t.curso_id,curso,nombre_unidad_tema from tema t inner join unidad_tematica ut "
                    . "on t.unidad_tematica_id=ut.unidad_tematica_id inner join lista_cursos c on t.curso_id=c.curso_id;";
            $rs = mysqli_query($cn, $sql);
            $LISTA['TEMAS'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $uni_id = $fila['unidad_tematica_id'];
                $curso_id = $fila['curso_id'];
                $tema = array();
                $sql1 = "select nombre_tema, tema_id, estado from tema where curso_id='$curso_id' and unidad_tematica_id='$uni_id';";
                $rs1 = mysqli_query($cn, $sql1);
                while ($row = mysqli_fetch_assoc($rs1)) {

                    $tema[] = $row;
                }

                array_push($LISTA['TEMAS'], array('UNIDAD' => $fila['nombre_unidad_tema'],
                    'CURSO' => $fila['curso']
                    , 'TEMA' => $tema));
            }
        } catch (Exception $e) {
            
        }

        return $LISTA;
    }

    public function guardarTema(TemaBean $objbean) {
        try {

            $rspta = 0;
            $curso_id = $objbean->curso_id;
            $uni_id = $objbean->unidad_tematica_id;
            $tema = $objbean->nombre_tema;
            $query = "select * from tema;";
            $rst = ejecutarConsulta($query);
            while ($fila = mysqli_fetch_assoc($rst)) {
                if ($fila['curso_id'] == $curso_id && $fila['unidad_tematica_id'] == $uni_id && $fila['nombre_tema'] == $tema) {
                    $rspta = "El registro ya existe!!!";
                    @$x = 2;
                } else if ($fila['nombre_tema'] == $tema) {
                    $rspta = "El nombre del tema ya existe!!!";
                    @$x = 2;
                }
            }

            if (@$x != 2) {
                $sql = "insert into tema  values(null,'$tema','A' ,'$uni_id','$curso_id');";
                $rspta = ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            $rspta = 0;
        }
        return $rspta;
    }

    public function accion($tipo, $id) {
        try {


            if ($tipo == "e") {
                $sql = "delete from tema where tema_id='$id';";
                ejecutarConsulta($sql);
            } else if ($tipo == "b") {
                $sql = "select * from lista_temas where tema_id='$id';";
                $rsP = ejecutarConsulta($sql);
                $LISTA['LISTA'] = array();
                while ($fila = mysqli_fetch_assoc($rsP)) {
                    array_push($LISTA['LISTA'], array('CODIGO' => $fila['tema_id'], 'COD_CURSO' => $fila['curso_id'], 'UNIDAD' => $fila['nombre_unidad_tema'],
                        'COD_UNIDAD' => $fila['unidad_tematica_id'], 'TEMA' => $fila['nombre_tema'], 'CURSO' => $fila['curso']));
                }
                $rs = ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            
        }
        return $LISTA;
    }

    public function editarTema(TemaBean $objBean) {

        try {
            $rspta = 0;
            $tema_id = $objBean->tema_id;
            $tema = $objBean->nombre_tema;
            $cod_cur = $objBean->curso_id;
            $uni_id = $objBean->unidad_tematica_id;

            $query = "select * from tema where tema_id!='$tema_id';";
            $rst = ejecutarConsulta($query);
            while ($fila = mysqli_fetch_assoc($rst)) {
                if ($fila['curso_id'] == $cod_cur && $fila['unidad_tematica_id'] == $uni_id && $fila['nombre_tema'] == $tema) {
                    $rspta = "El registro ya existe!!!";
                    @$x = 2;
                } else if ($fila['nombre_tema'] == $tema) {
                    $rspta = "El nombre del tema ya existe!!!";
                    @$x = 2;
                }
            }

            if (@$x != 2) {
                $sql = "update tema set nombre_tema='$tema', unidad_tematica_id='$uni_id', "
                        . "curso_id='$cod_cur' where tema_id='$tema_id';";
                $rspta = ejecutarConsulta($sql);
            }
        } catch (Exception $e) {
            $rspta = 0;
        }
        return $rspta;
    }

}
