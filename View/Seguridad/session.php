<?php
//Start session
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    
    header("location:../../index.php");
    exit();
}

$id=$_SESSION['id'];
$lista=$_SESSION['lista'];
$año_escolar=$_SESSION['anio'];
$opcion=$_SESSION['op'];
