 <?php
 session_start();
require_once '../../../Modelo/Bean/HorarioClaseBean.php';
require_once '../../../Modelo/Bean/HorarioProfeBean.php';

$objHBean=new HorarioClaseBean();
$objBean=new HorarioProfeBean();
$Clase=$_SESSION['Clase'];
$Profe=$_SESSION['Profe'];
$horario_clase= $_SESSION['listaHoraClase'];
$horario_profe=$_SESSION['listaHoraProfe'];


$clase_nombre=$Clase['CLASE'][0]['CLASE'];
$profe_nom=$Profe['PROFE'][0]['PROFESOR'];
$foto=$Profe['PROFE'][0]['FOTO'];
$area=$Profe['PROFE'][0]['AREA'];

foreach($horario_clase as $indiceC => $valHC){}
foreach($horario_profe as $indiceH => $valH){}
 
 ?>
              <div class="pull-right">
              
                      <a  href='../reportes/rpt_horario_aula_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
  <div class="alert alert-succes alert_profe_hora"><span>Horario del Salón <?php echo $clase_nombre?></span></div>

        
           
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
                                        if($de=="14:30" && $a="17:15"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_35=$hora['CLASE'];
                                             $objHBean->setH35($hora_35);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_36=$hora['CLASE'];
                                             $objHBean->setH36($hora_36);
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
                                        }if($de=="13:00" && $a="13:45"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_47=$hora['CLASE'];
                                             $objHBean->setH47($hora_47);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_48=$hora['CLASE'];
                                             $objBean->setH48($hora_48);
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
                                        }if($de=="13:00" && $a="13:45"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
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
                                               <th>01:00 - 01:45</th>
                                               <?php echo $objHBean->getH7()?>
                                               <?php echo $objHBean->getH19() ?>
                                               <?php ECHO $objHBean->getH31() ?>
                                               <?php echo $objHBean->getH43()?>
                                               <?php echo $objHBean->getH55() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>01:45 - 02:30</th>
                                               <?php echo $objHBean->getH8() ?>
                                               <?php echo $objHBean->getH20() ?>
                                               <?php echo $objHBean->getH32() ?>
                                               <?php echo $objHBean->getH44() ?>
                                               <?php echo $objHBean->getH56() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>02:30 - 03:15</th>
                                              <?php echo $objHBean->getH9() ?>
                                              <?php echo $objHBean->getH21() ?>
                                              <?php echo $objHBean->getH33() ?>
                                              <?php echo $objHBean->getH45() ?>
                                              <?php echo $objHBean->getH57() ?>
                                          
                                        </tr>
                                         <tr>
                                              <th>03:15 - 03:45</th>
                                              <td>R       E</td>
                                             <td>C</td>
                                             <td>R</td>
                                             <td>E</td>
                                             <td>O</td>
                                        </tr>
                                        <tr>
                                              <th>03:45 - 04:30</th>
                                              <?php echo $objHBean->getH9() ?>
                                              <?php echo $objHBean->getH22() ?>
                                              <?php echo $objHBean->getH34() ?>
                                              <?php echo $objHBean->getH46() ?>
                                              <?php echo $objHBean->getH58() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>04:30- 05:15</th>
                                           <?php echo $objHBean->getH10() ?>
                                           <?php echo $objHBean->getH23() ?>
                                           <?php echo $objHBean->getH35() ?>
                                           <?php echo $objHBean->getH47() ?>
                                           <?php echo $objHBean->getH59() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>05:15- 06:00</th>
                                             <?php echo $objHBean->getH11() ?>
                                             <?php echo $objHBean->getH24() ?>
                                             <?php echo $objHBean->getH36() ?>
                                             <?php echo $objHBean->getH48() ?>
                                             <?php echo $objHBean->getH60() ?>
                                          
                                            </tr>
                                         
<!--                                       fin dia lunes-->
                                        </thead>
                                        
                                        
                                        
                                    </table>
  
<div class="pull-right">
                                  
                      <a  href='../reportes/rpt_horario_profe_by_user_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_profe_by_user_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
        <div class="alert alert-dismissable alert_profe_hora">
            
            <p> Horario del Profesor </p>
            
        </div>
 <?php include '../Administracion/Coordinacion/horario_profesor.php';
