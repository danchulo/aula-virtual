<?php

require_once '../Modelo/Dao/AdministradorDao.php';
session_start();
$objDao = new AdministradorDao();

$op = $_REQUEST['op'];
switch ($op) {
    case 1: {

            header("Location:../View/Administracion/Mantenimiento/agregar_grado.php");
            break;
        }

    case 2: {

            //buscar, eliminar
            $tipo = $_REQUEST['tipo'];
            @$tabla = $_REQUEST['tabla'];
            @$id = $_REQUEST['id'];
            @$esta = $_REQUEST['estado'];
            $rspta = $objDao->accion($tipo, @$tabla, @$id, @$esta);
            if ($tipo == "b") {
                $_SESSION['listaSimple'] = $rspta;
                header('Location:../View/Administracion/Mantenimiento/editar_' . @$tabla . '.php');
            } else if ($tipo == "i") {
                echo $rspta;
            }

            break;
        }
} 
