<?php 
session_start();
require_once '../../Modelo/Bean/HorarioProfeBean.php';
$objBean=new HorarioProfeBean();
$listaHorario= $_SESSION['listaHora'];

foreach($listaHorario as $indiceH => $valH){}
 $count=count($valH);
?> 
<div class="alert curso-titulo">
                  <div class="pull-left">
                                  
                      <a  href='../reportes/rpt_horario_profe_pdf.php' class="btn btn-primary"><i class="icon-print"></i> Imprimir Horario</a>
						</div>
    <p> MI HORARIO ACTUAL</p> 
  
    
 </div>

<div id='AjaxNavegacion' class="block-content1 collapse in">
    
  <?php if($count>0){?>   
    
  <?php include"../Administracion/Coordinacion/horario_profesor.php" ?>
    
     <?php } else {?>
    
    <div class="alert alert-danger">Usted no tiene un horario el presente año</div>
      <?php }?>
</div>
