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

//$area=$Profe['PROFE'][0]['AREA'];

$dni=$Profe['PROFE'][0]['DNI'];
//
//$_SESSION['area_id']=$area_id;
$_SESSION['profe_id']=$profe_id;
$_SESSION['clase_id']=$clase_id;
$_SESSION['profe_clase_id']=$profe_clase_id;

foreach($Profe as $indi => $valP){}
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
                                        <th>Area(s)</th>
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
                                  
                      <a  href='../reportes/rpt_horario_aula_maniana_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_maniana_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
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
                                                
                                              if(  $de=="08:00" && $a="08:45"){
                                              $hora_1=$hora['CLASE'];
                                                $objHBean->setH1($hora_1);
                                                  }  
  
                                           if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_2=$hora['CLASE'];
                                            $objHBean->setH2($hora_2);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_3=$hora['CLASE'];
                                            $objHBean->setH3($hora_3);
                                        }
                                                                              
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_4=$hora['CLASE'];
                                             $objHBean->setH4($hora_4);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_5=$hora['CLASE'];
                                             $objHBean->setH5($hora_5);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_6=$hora['CLASE'];
                                             $objHBean->setH6($hora_6);
                                        }
                                    }
                                         
                                         else if($dia=="martes"){
                                             
                                            if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_13=$hora['CLASE'];
                                              $objHBean->setH13($hora_13);
                                            }   
                                            
                                            if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_14=$hora['CLASE'];
                                             $objHBean->setH14($hora_14);
                                            
                                            } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_15=$hora['CLASE'];
                                             $objHBean->setH15($hora_15);
                                        }
                                        
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_16=$hora['CLASE'];
                                             $objHBean->setH16($hora_16);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_17=$hora['CLASE'];
                                             $objHBean->setH17($hora_17);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_18=$hora['CLASE'];
                                             $objHBean->setH18($hora_18);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                               if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_25=$hora['CLASE'];
                                            $objHBean->setH25($hora_25);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_26=$hora['CLASE'];
                                            $objHBean->setH26($hora_26);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_27=$hora['CLASE'];
                                             $objHBean->setH27($hora_27);
                                        }
                                                                                
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_28=$hora['CLASE'];
                                             $objHBean->setH28($hora_28);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_29=$hora['CLASE'];
                                             $objHBean->setH29($hora_29);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_30=$hora['CLASE'];
                                             $objHBean->setH30($hora_30);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                 if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_37=$hora['CLASE'];
                                            $objHBean->setH37($hora_37);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_38=$hora['CLASE'];
                                            $objHBean->setH38($hora_38);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_39=$hora['CLASE'];
                                             $objHBean->setH39($hora_39);
                                        }
                                        
                                                                             
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_40=$hora['CLASE'];
                                             $objHBean->setH40($hora_40);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_41=$hora['CLASE'];
                                             $objHBean->setH41($hora_41);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_42=$hora['CLASE'];
                                             $objHBean->setH42($hora_42);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                              if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_49=$hora['CLASE'];
                                              $objHBean->setH49($hora_49);
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_50=$hora['CLASE'];
                                             $objHBean->setH50($hora_50);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_51=$hora['CLASE'];
                                             $objHBean->setH51($hora_51);
                                        }
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_52=$hora['CLASE'];
                                             $objHBean->setH52($hora_52);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_53=$hora['CLASE'];
                                             $objHBean->setH53($hora_53);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_54=$hora['CLASE'];
                                             $objHBean->setH54($hora_54);
                                        }
                                         } 
                                         
                                        }
                                            ?>
                                      
                                       
                                        <tr>
                                               <th>8:00 - 8:45</th>
                                               <?php echo $objHBean->getH1()?>
                                               <?php echo $objHBean->getH13()?>
                                               <?php echo $objHBean->getH25()?>
                                               <?php echo $objHBean->getH37()?>
                                               <?php echo $objHBean->getH49()?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>8:45 - 9:30</th>
                                               <?php echo $objHBean->getH2() ?>
                                               <?php echo $objHBean->getH14() ?>
                                               <?php echo $objHBean->getH26() ?>
                                               <?php echo $objHBean->getH38() ?>
                                               <?php echo $objHBean->getH50() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>9:30 - 10:15</th>
                                              <?php echo $objHBean->getH3() ?>
                                              <?php echo $objHBean->getH15() ?>
                                              <?php echo $objHBean->getH27() ?>
                                              <?php echo $objHBean->getH39() ?>
                                              <?php echo $objHBean->getH51() ?>
                                          
                                        </tr>
                                         <tr>
                                              <th>10:15 - 10:45</th>
                                              <td>R       E</td>
                                             <td>C</td>
                                             <td>R</td>
                                             <td>E</td>
                                             <td>O</td>
                                        </tr>
                                        <tr>
                                              <th>10:45 - 11:30</th>
                                              <?php echo $objHBean->getH4() ?>
                                              <?php echo $objHBean->getH16() ?>
                                              <?php echo $objHBean->getH28() ?>
                                              <?php echo $objHBean->getH40() ?>
                                              <?php echo $objHBean->getH52() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                           <th>11:30- 12:15</th>
                                           <?php echo $objHBean->getH5() ?>
                                           <?php echo $objHBean->getH17() ?>
                                           <?php echo $objHBean->getH29() ?>
                                           <?php echo $objHBean->getH41() ?>
                                           <?php echo $objHBean->getH53() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                             <th>12:15- 01:00</th>
                                             <?php echo $objHBean->getH6() ?>
                                             <?php echo $objHBean->getH18() ?>
                                             <?php echo $objHBean->getH30() ?>
                                             <?php echo $objHBean->getH42() ?>
                                             <?php echo $objHBean->getH54() ?>
                                          
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
                                  
                       <a  href='../reportes/rpt_horario_aula_maniana_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_maniana_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
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
                                                
                                                  if(  $de=="08:00" && $a="08:45"){
                                              $hora_1=$hora['CLASE'];
                                                $objHBean->setH1($hora_1);
                                                  }  
  
                                           if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_2=$hora['CLASE'];
                                            $objHBean->setH2($hora_2);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_3=$hora['CLASE'];
                                            $objHBean->setH3($hora_3);
                                        }
                                                                              
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_4=$hora['CLASE'];
                                             $objHBean->setH4($hora_4);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_5=$hora['CLASE'];
                                             $objHBean->setH5($hora_5);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_6=$hora['CLASE'];
                                             $objHBean->setH6($hora_6);
                                        }
                                    }
                                         
                                         else if($dia=="martes"){
                                             
                                            if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_13=$hora['CLASE'];
                                              $objHBean->setH13($hora_13);
                                            }   
                                            
                                            if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_14=$hora['CLASE'];
                                             $objHBean->setH14($hora_14);
                                            
                                            } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_15=$hora['CLASE'];
                                             $objHBean->setH15($hora_15);
                                        }
                                        
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_16=$hora['CLASE'];
                                             $objHBean->setH16($hora_16);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_17=$hora['CLASE'];
                                             $objHBean->setH17($hora_17);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_18=$hora['CLASE'];
                                             $objHBean->setH18($hora_18);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                               if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_25=$hora['CLASE'];
                                            $objHBean->setH25($hora_25);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_26=$hora['CLASE'];
                                            $objHBean->setH26($hora_26);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_27=$hora['CLASE'];
                                             $objHBean->setH27($hora_27);
                                        }
                                                                                
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_28=$hora['CLASE'];
                                             $objHBean->setH28($hora_28);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_29=$hora['CLASE'];
                                             $objHBean->setH29($hora_29);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_30=$hora['CLASE'];
                                             $objHBean->setH30($hora_30);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                 if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_37=$hora['CLASE'];
                                            $objHBean->setH37($hora_37);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_38=$hora['CLASE'];
                                            $objHBean->setH38($hora_38);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_39=$hora['CLASE'];
                                             $objHBean->setH39($hora_39);
                                        }
                                        
                                                                             
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_40=$hora['CLASE'];
                                             $objHBean->setH40($hora_40);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_41=$hora['CLASE'];
                                             $objHBean->setH41($hora_41);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_42=$hora['CLASE'];
                                             $objHBean->setH42($hora_42);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                              if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_49=$hora['CLASE'];
                                              $objHBean->setH49($hora_49);
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_50=$hora['CLASE'];
                                             $objHBean->setH50($hora_50);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_51=$hora['CLASE'];
                                             $objHBean->setH51($hora_51);
                                        }
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_52=$hora['CLASE'];
                                             $objHBean->setH52($hora_52);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_53=$hora['CLASE'];
                                             $objHBean->setH53($hora_53);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_54=$hora['CLASE'];
                                             $objHBean->setH54($hora_54);
                                        }
                                         } 
                                         
                                        }
                                            ?>
                                      
                                        <tr>
                                               <th>8:00 - 8:45</th>
                                               <?php echo  $objHBean->getH1()?>
                                               <?php echo $objHBean->getH13() ?>
                                               <?php ECHO $objHBean->getH25() ?>
                                               <?php echo $objHBean->getH37()?>
                                               <?php echo $objHBean->getH49() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>8:45 - 9:30</th>
                                               <?php echo $objHBean->getH2() ?>
                                               <?php echo $objHBean->getH14() ?>
                                               <?php echo $objHBean->getH26() ?>
                                               <?php echo $objHBean->getH38() ?>
                                               <?php echo $objHBean->getH50() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>9:30 - 10:15</th>
                                              <?php echo $objHBean->getH3() ?>
                                              <?php echo $objHBean->getH15() ?>
                                              <?php echo $objHBean->getH27() ?>
                                              <?php echo $objHBean->getH39() ?>
                                              <?php echo $objHBean->getH51() ?>
                                          
                                        </tr>
                                         <tr>
                                              <th>10:15 - 10:45</th>
                                              <td>R       E</td>
                                             <td>C</td>
                                             <td>R</td>
                                             <td>E</td>
                                             <td>O</td>
                                        </tr>
                                        <tr>
                                              <th>10:45 - 11:30</th>
                                              <?php echo $objHBean->getH4() ?>
                                              <?php echo $objHBean->getH16() ?>
                                              <?php echo $objHBean->getH28() ?>
                                              <?php echo $objHBean->getH40() ?>
                                              <?php echo $objHBean->getH52() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                           <th>11:30- 12:15</th>
                                           <?php echo $objHBean->getH5() ?>
                                           <?php echo $objHBean->getH17() ?>
                                           <?php echo $objHBean->getH29() ?>
                                           <?php echo $objHBean->getH41() ?>
                                           <?php echo $objHBean->getH53() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                             <th>12:15- 01:00</th>
                                             <?php echo $objHBean->getH6() ?>
                                             <?php echo $objHBean->getH18() ?>
                                             <?php echo $objHBean->getH30() ?>
                                             <?php echo $objHBean->getH42() ?>
                                             <?php echo $objHBean->getH54() ?>
                                          
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
<!--     modal horario profesor        -->
<!--<div  class="modal hide fade" id="modalHora"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Horario del Profesor</h4>
        </div>
        <div class="modal-body">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>-->
<!--     modal horario profesor        -->

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