<?php
session_start();
require_once '../../../Modelo/Bean/HorarioProfeBean.php';
require_once '../../../Modelo/Bean/AsignarHorarioBean.php';
$objHBean=new AsignarHorarioBean();
$objBean=new HorarioProfeBean();

$Clase=$_SESSION['Clase'];
$Profe=$_SESSION['Profe'];
$foto=$Profe['PROFE'][0]['FOTO'];
$profe_clase_id=$_GET['profe_clase_id'];
$horario_profe=$_SESSION['listaHoraProfe'];
$cursos_asignados=$_SESSION['listaProfeCursos'];
$horario_clase= $_SESSION['listaHoraClase'];
$cursos=$_SESSION['cursosEncontrados'];
$clase_nombre=$Clase['CLASE'][0]['CLASE'];
$clase_id=$Clase['CLASE'][0]['COD_CLASE'];
$turno=$Clase['CLASE'][0]['T'];
$profe_id=$Profe['PROFE'][0]['PROFE_ID'];
$profe_nom=$Profe['PROFE'][0]['PROFESOR'];

$area=$Profe['PROFE'][0]['AREA'];
//$area_id=$Profe['PROFE'][0]['AREA_ID'];
$dni=$Profe['PROFE'][0]['DNI'];
//
//$_SESSION['area_id']=$area_id;
$_SESSION['profe_id']=$profe_id;
$_SESSION['clase_id']=$clase_id;
$_SESSION['profe_clase_id']=$profe_clase_id;


foreach($cursos as $indic => $valC){}
foreach($cursos_asignados as $indi => $valA){}
foreach($horario_clase as $indiceC => $valHC){}
foreach($horario_profe as $indiceH => $valH){}
?>	

<input type="hidden" id="class_id" value="<?php echo $clase_id?>"/>     
<input type="hidden" id="area_id" value="<?php echo $area_id?>"/>  
<input type="hidden" id="teacher_id" value="<?php echo $profe_id?>"/>     
<input type="hidden" id="teacher_class_id" value="<?php echo $profe_clase_id?>"/>  
<input type="hidden" id="turno" value="<?php echo $turno?>"/>    
<div class="block-content collapse in">
    <div class="span12">
        
        <div class="alert alert-success alert_profe_hora">
                 
    <p> <?php echo $clase_nombre?></p> 
  
    
 </div>
        <div class="tbDatosProfe">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					<th>Foto</th>
					<th>Profesor</th>
                                        <th>DNI</th>
                                        <th>Area</th>
		</tr>
		</thead>
		<tbody>

		<tr>
                <?php 
                if($foto!=null){?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto?>"></td> 
                   <?php }else{?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/nodisponible.png"></td> 
                    <?php } ?>
	        <td><?php echo $profe_nom ?></td> 
                <td><?php echo $dni ?></td> 
                   <td><?php foreach ($valP as $area){
                    $ar=$area['AREA'];
                    foreach ($ar as $a){
                     echo '° '.$a['area_nombre'].'<br>'; 
                     
                    }
                }?></td> 
                   
		</tr>
	
		</tbody>
	</table>
        </div>
            
        
          <div class="btnAsig">
              <a data-toggle="modal" href="#modalCurso">           
                                      <button id="" type="button" class="btn btn-default"> <span class="icon icon-plus"></span> Agregar Curso</button>
                                  </a>
          </div>
        <div id="AjaxHora">
             <div class="tbAsig">
  <?php foreach ($valA as $curso ){
                                     $id=$curso['COD_CURSO']
                                     ?>        

 <form id="formAsig<?php echo $id?>">
 
    <div class="modal-dialog">
          
<div  class="modal hide fade" style="display: none" id="modalHora<?php echo $id?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
      <div class="modal-content">
       
        <div class="modal-header">
        
                      <div class="pull-right">
                                  
                      <a  href='../reportes/rpt_horario_aula_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
          <h4 class="modal-title">Asignación de Horario</h4>
          
        </div>
   
        <div class="modal-body">
           
             <table  class="table table-bordered">
          
                                        <thead>
                                         <tr>
                                             <th></th>   
                                              <th>lunes</th>   
                                              <th>martes</th> 
                                              <th>miércoles</th> 
                                              <th>jueves</th> 
                                              <th>viernes</th> 
                                        </tr>
                                         
          
                                        <?php foreach($valHC as $hora){
                                            $de=$hora['DE'];
                                            $a=$hora['A'];
                                            $dia=$hora['DIA'];
                                       
                                            if($dia=="lunes"){
                                                
                                              if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_7=$hora['CLASE'];
                                             $objHBean->setH7($hora_7);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_8=$hora['CLASE'];
                                             $objHBean->setH8($hora_8);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_9=$hora['CLASE'];
                                             $objHBean->setH9($hora_9);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_10=$hora['CLASE'];
                                             $objHBean->setH10($hora_10);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_11=$hora['CLASE'];
                                             $objHBean->setH11($hora_11);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_12=$hora['CLASE'];
                                             $objHBean->setH12($hora_12);
                                        }
                                         } 
                                         
                                         else if($dia=="martes"){
                                             
                                           if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_19=$hora['CLASE'];
                                             $objHBean->setH19($hora_19);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_20=$hora['CLASE'];
                                             $objHBean->setH20($hora_20);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_21=$hora['CLASE'];
                                             $objHBean->setH21($hora_21);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_22=$hora['CLASE'];
                                             $objHBean->setH22($hora_22);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_23=$hora['CLASE'];
                                             $objHBean->setH23($hora_23);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_24=$hora['CLASE'];
                                             $objHBean->setH24($hora_24);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                              if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_31=$hora['CLASE'];
                                             $objHBean->setH31($hora_31);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_32=$hora['CLASE'];
                                             $objHBean->setH32($hora_32);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_33=$hora['CLASE'];
                                             $objHBean->setH33($hora_33);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_34=$hora['CLASE'];
                                             $objHBean->setH34($hora_34);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_35=$hora['CLASE'];
                                             $objHBean->setH35($hora_35);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_36=$hora['CLASE'];
                                             $objHBean->setH36($hora_36);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                                  if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_43=$hora['CLASE'];
                                             $objHBean->setH43($hora_43);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_44=$hora['CLASE'];
                                             $objHBean->setH44($hora_44);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_45=$hora['CLASE'];
                                             $objHBean->setH45($hora_45);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_46=$hora['CLASE'];
                                             $objHBean->setH46($hora_46);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_47=$hora['CLASE'];
                                             $objHBean->setH47($hora_47);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_48=$hora['CLASE'];
                                             $objHBean->setH48($hora_48);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                          if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_55=$hora['CLASE'];
                                             $objHBean->setH55($hora_55);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_56=$hora['CLASE'];
                                             $objHBean->setH56($hora_56);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_57=$hora['CLASE'];
                                             $objHBean->setH57($hora_57);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_58=$hora['CLASE'];
                                             $objHBean->setH58($hora_58);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_59=$hora['CLASE'];
                                             $objHBean->setH59($hora_59);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_60=$hora['CLASE'];
                                             $objHBean->setH60($hora_60);
                                        }
                                         
                                         } 
                                        }
                                            
                                            ?>
                                      
                                        <tr>
                                               <th>1:00 - 1:45</th>
                                               <?php echo  $objBean->getH7()?>
                                               <?php echo $objBean->getH19() ?>
                                               <?php ECHO $objBean->getH31() ?>
                                               <?php echo $objBean->getH43()?>
                                               <?php echo $objBean->getH55() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>1:45 - 2:30</th>
                                               <?php echo $objBean->getH8() ?>
                                               <?php echo $objBean->getH20() ?>
                                               <?php echo $objBean->getH32() ?>
                                               <?php echo $objBean->getH44() ?>
                                               <?php echo $objBean->getH56() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>2:30 - 3:15</th>
                                              <?php echo $objBean->getH9() ?>
                                              <?php echo $objBean->getH21() ?>
                                              <?php echo $objBean->getH33() ?>
                                              <?php echo $objBean->getH45() ?>
                                              <?php echo $objBean->getH57() ?>
                                          
                                        </tr>
                                         <tr>
                                              <th>3:15 - 3:45</th>
                                              <td>R       E</td>
                                             <td>C</td>
                                             <td>R</td>
                                             <td>E</td>
                                             <td>O</td>
                                        </tr>
                                        <tr>
                                              <th>03:45 - 04:30</th>
                                              <?php echo $objBean->getH10() ?>
                                              <?php echo $objBean->getH22() ?>
                                              <?php echo $objBean->getH34() ?>
                                              <?php echo $objBean->getH46() ?>
                                              <?php echo $objBean->getH58() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>4:30- 5:15</th>
                                           <?php echo $objBean->getH11() ?>
                                           <?php echo $objBean->getH23() ?>
                                           <?php echo $objBean->getH35() ?>
                                           <?php echo $objBean->getH47() ?>
                                           <?php echo $objBean->getH59() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>5:15- 6:00</th>
                                             <?php echo $objBean->getH12() ?>
                                             <?php echo $objBean->getH24() ?>
                                             <?php echo $objBean->getH36() ?>
                                             <?php echo $objBean->getH48() ?>
                                             <?php echo $objBean->getH60() ?>
                                          </tr>
<!--                                       fin dia lunes-->
                                        </thead>
                                        
                                        
                                        
                                        
                                    </table>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
              </form>   
                 
    
                 <?php } ?>     
                 
                              
<form id="formAsig0">
<div  class="modal hide fade" style="display: none" id="modalHora0"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         
                      <div class="pull-right">
                                  
                      <a  href='../reportes/rpt_horario_aula_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
          <h4 class="modal-title">Asignación de Horario</h4>
        </div>
        <div class="modal-body">
           
             <table  class="table table-bordered">
          
                                        <thead>
                                         <tr>
                                             <th></th>   
                                              <th>lunes</th>   
                                              <th>martes</th> 
                                              <th>miércoles</th> 
                                              <th>jueves</th> 
                                              <th>viernes</th> 
                                        </tr>
                                         
                                           
          
                                        <?php foreach($valHC as $hora){
                                            $de=$hora['DE'];
                                            $a=$hora['A'];
                                            $dia=$hora['DIA'];
                                       
                                            if($dia=="lunes"){
                                                
                                              if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_7=$hora['CLASE'];
                                             $objHBean->setH7($hora_7);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_8=$hora['CLASE'];
                                             $objHBean->setH8($hora_8);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_9=$hora['CLASE'];
                                             $objHBean->setH9($hora_9);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_10=$hora['CLASE'];
                                             $objHBean->setH10($hora_10);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_11=$hora['CLASE'];
                                             $objHBean->setH11($hora_11);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_12=$hora['CLASE'];
                                             $objHBean->setH12($hora_12);
                                        }
                                         } 
                                         
                                         else if($dia=="martes"){
                                             
                                           if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_19=$hora['CLASE'];
                                             $objHBean->setH19($hora_19);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_20=$hora['CLASE'];
                                             $objHBean->setH20($hora_20);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_21=$hora['CLASE'];
                                             $objHBean->setH21($hora_21);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_22=$hora['CLASE'];
                                             $objHBean->setH22($hora_22);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_23=$hora['CLASE'];
                                             $objHBean->setH23($hora_23);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_24=$hora['CLASE'];
                                             $objHBean->setH24($hora_24);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                              if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_31=$hora['CLASE'];
                                             $objHBean->setH31($hora_31);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_32=$hora['CLASE'];
                                             $objHBean->setH32($hora_32);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_33=$hora['CLASE'];
                                             $objHBean->setH33($hora_33);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_34=$hora['CLASE'];
                                             $objHBean->setH34($hora_34);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_35=$hora['CLASE'];
                                             $objHBean->setH35($hora_35);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_36=$hora['CLASE'];
                                             $objHBean->setH36($hora_36);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                                  if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_43=$hora['CLASE'];
                                             $objHBean->setH43($hora_43);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_44=$hora['CLASE'];
                                             $objHBean->setH44($hora_44);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_45=$hora['CLASE'];
                                             $objHBean->setH45($hora_45);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_46=$hora['CLASE'];
                                             $objHBean->setH46($hora_46);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_47=$hora['CLASE'];
                                             $objHBean->setH47($hora_47);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_48=$hora['CLASE'];
                                             $objHBean->setH48($hora_48);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                          if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_55=$hora['CLASE'];
                                             $objHBean->setH55($hora_55);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_56=$hora['CLASE'];
                                             $objHBean->setH56($hora_56);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_57=$hora['CLASE'];
                                             $objHBean->setH57($hora_57);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_58=$hora['CLASE'];
                                             $objHBean->setH58($hora_58);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_59=$hora['CLASE'];
                                             $objHBean->setH59($hora_59);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_60=$hora['CLASE'];
                                             $objHBean->setH60($hora_60);
                                        }
                                         
                                         } 
                                        }
                                            
                                            ?>
                                      
                                          <tr>
                                               <th>1:00 - 1:45</th>
                                               <?php echo  $objBean->getH7()?>
                                               <?php echo $objBean->getH19() ?>
                                               <?php ECHO $objBean->getH31() ?>
                                               <?php echo $objBean->getH43()?>
                                               <?php echo $objBean->getH55() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>1:45 - 2:30</th>
                                               <?php echo $objBean->getH8() ?>
                                               <?php echo $objBean->getH20() ?>
                                               <?php echo $objBean->getH32() ?>
                                               <?php echo $objBean->getH44() ?>
                                               <?php echo $objBean->getH56() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>2:30 - 3:15</th>
                                              <?php echo $objBean->getH9() ?>
                                              <?php echo $objBean->getH21() ?>
                                              <?php echo $objBean->getH33() ?>
                                              <?php echo $objBean->getH45() ?>
                                              <?php echo $objBean->getH57() ?>
                                          
                                        </tr>
                                         <tr>
                                              <th>3:15 - 3:45</th>
                                              <td>R       E</td>
                                             <td>C</td>
                                             <td>R</td>
                                             <td>E</td>
                                             <td>O</td>
                                        </tr>
                                        <tr>
                                              <th>03:45 - 04:30</th>
                                              <?php echo $objBean->getH10() ?>
                                              <?php echo $objBean->getH22() ?>
                                              <?php echo $objBean->getH34() ?>
                                              <?php echo $objBean->getH46() ?>
                                              <?php echo $objBean->getH58() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>4:30- 5:15</th>
                                           <?php echo $objBean->getH11() ?>
                                           <?php echo $objBean->getH23() ?>
                                           <?php echo $objBean->getH35() ?>
                                           <?php echo $objBean->getH47() ?>
                                           <?php echo $objBean->getH59() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>5:15- 6:00</th>
                                             <?php echo $objBean->getH12() ?>
                                             <?php echo $objBean->getH24() ?>
                                             <?php echo $objBean->getH36() ?>
                                             <?php echo $objBean->getH48() ?>
                                             <?php echo $objBean->getH60() ?>
                                          </tr>
                                         
                                         
<!--                                       fin dia lunes-->
                                        </thead>
                                        
                                    </table>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
              </form>  
                 
                 
                 
          <table id="subjects" class="table table-striped table-bordered table-condensed table-hover">
                              
                            <thead style="background-color:#A9D0F5">
                              
                                 <th>Eliminar</th>
                                 <th>Curso</th>  
                                 <th>Horario</th> 
                                 <th></th> 
                             </thead>
                      
                             <tbody>
                                 
                             <div id="tbAjaxCursos">
                                 <?php foreach ($valA as $curso ){
                                     $id=$curso['COD_CURSO'];
                                      $profe_clase_curso_id=$curso['COD_PROFE_CURSO']
                                             
                                     ?>
                                 <input id="profe_clase_curso_id<?php echo $profe_clase_curso_id?>" type="hidden" value="<?php echo $profe_clase_curso_id?>"/>
                                     <input id="subject_id" type="hidden" value="<?php echo $id?>"/>
                                 <form id="formAsig<?php echo $id?>">
                                 
                                     <tr id="fil<?php echo $profe_clase_curso_id?>" class="filas">
                                         <td><button type="button" class="btn btn-danger" onclick='accionCursos("../../Controlador","ProfeControlador.php",28,"<?php echo $profe_clase_curso_id ?>","<?php echo $profe_id ?>","<?php echo $clase_id ?>","<?php echo $profe_clase_id ?>","","AsignaAjax")'><span class="icon icon-remove"></span></button></td>
                                     <td><?php echo $curso['CURSO']?></td>
                                     <td> <a data-toggle="modal" href="#modalHora<?php echo $id?>">           
                                      <button id="" type="button" class="btn btn-success"> <span class="icon icon-plus"></span></button>
                                  </a> </td>
                                  <td><button id="btnGuardar" type="button"  onclick='guardarAsignacion("../../Controlador","ProfeControlador.php",20,"<?php echo $profe_id ?>","<?php echo $profe_clase_curso_id?>","<?php echo $id ?>","<?php echo $clase_id ?>","<?php echo $profe_clase_id ?>","","AsignaAjax")'  class="btn btn-info"><i class="icon icon-save"></i></button></td>
                                  </tr>
                             </div>

                             </form>
                                     
                             <?php } ?>
                              </tbody>
                                
                            </table>  
             </div>
        
<div class="pull-right">
                                  
                      <a  href='../reportes/rpt_horario_profe_by_user_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_profe_by_user_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
        <div class="alert alert-dismissable alert_profe_hora">
            
            <p> Horario del Profesor </p>
        </div>    
<?php include 'horario_profesor.php';?>
            
<div  class="modal hide fade" id="modalCurso"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Curso(s)</h4>
        </div>
        <div class="modal-body">
            <table  class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
            <thead>
             
                <tr>
                   <th>Añadir</th>
                   <th>Curso</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               <?php 
                  
                     foreach ($valC as $curso){ ?>
             
               <tr id='curso<?php echo $curso['CURSO_ID'];?>'>
                   <th><button class="btn btn-warning" onclick="agregarCurso('<?php echo $curso['CURSO_ID'];?>','<?php echo $curso['CURSO'];?>')"><span><i class="icon icon-plus"></i></span></button></th>
                   <th><?php echo $curso['CURSO'];?></th>
               </tr>
        <?php } ?>
                   
           </tbody>
            <tfoot>
                <tr>
                   <th>Añadir</th>
                   <th>Curso</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  


</div>    
</div>

</div>