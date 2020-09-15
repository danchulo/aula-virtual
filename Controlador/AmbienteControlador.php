<?php

session_start();
require_once '../Modelo/Bean/AmbienteBean.php';
require_once '../Modelo/Dao/AmbienteDao.php';


$objDao = new AmbienteDao();
$objBean = new AmbienteBean();
$op = $_REQUEST['op'];
switch ($op) {
    case 1: {

            $lista = $objDao->listarAula();
            $_SESSION['listaAmbiente'] = $lista;
            header('Location:../View/Administracion/Mantenimiento/salon_mant.php');
            break;
        }

    case 2: {

            $tipo = $_POST['tipo'];
            @$nom = $_POST['nom'];
            @$estado = $_POST['estado'];
            @$id = $_POST['id'];
            $objBean->setSalon_nombre(@$nom);
            $objBean->setSalon_id(@$id);
            $objBean->setEstado(@$estado);
            $rspta = $objDao->accion($objBean, $tipo);

            echo $rspta;
            break;
        }
}