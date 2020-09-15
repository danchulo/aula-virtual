 <?php
 session_start();
 require_once '../../Modelo/Bean/HorarioClaseBean.php';
require_once '../../Modelo/Bean/HorarioProfeBean.php';

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
                                  
                      <a  href='../reportes/rpt_horario_aula_maniana_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_aula_maniana_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
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
                                               <th>08:00 - 08:45</th>
                                               <?php echo  $objHBean->getH1()?>
                                               <?php echo $objHBean->getH13() ?>
                                               <?php ECHO $objHBean->getH25() ?>
                                               <?php echo $objHBean->getH37()?>
                                               <?php echo $objHBean->getH49() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>08:45 - 09:30</th>
                                               <?php echo $objHBean->getH2() ?>
                                               <?php echo $objHBean->getH14() ?>
                                               <?php echo $objHBean->getH26() ?>
                                               <?php echo $objHBean->getH38() ?>
                                               <?php echo $objHBean->getH50() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>09:30 - 10:15</th>
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
                                              <?php echo $objHBean->getH38() ?>
                                              <?php echo $objHBean->getH52() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>11:30- 12:15</th>
                                           <?php echo $objHBean->getH5() ?>
                                           <?php echo $objHBean->getH17() ?>
                                           <?php echo $objHBean->getH29() ?>
                                           <?php echo $objHBean->getH39() ?>
                                           <?php echo $objHBean->getH53() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>12:15- 13:00</th>
                                             <?php echo $objHBean->getH6() ?>
                                             <?php echo $objHBean->getH18() ?>
                                             <?php echo $objHBean->getH30() ?>
                                             <?php echo $objHBean->getH40() ?>
                                             <?php echo $objHBean->getH54() ?>
                                          
                                            </tr>
                                        
<!--                                       fin dia lunes-->
                                        </thead>
   
                                    </table>
        
<div class="pull-right">
                                  
                      <a  href='../reportes/rpt_horario_profe_by_user_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Excel</a>
  <a  href='../reportes/rpt_horario_profe_by_user_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i>PDF</a>						
</div>
        <div class="alert alert-dismissable alert_profe_hora">
            
            <p> Horario del Profesor: <?php echo $profe_nom?></p>
        </div>
 <?php include '../Administracion/Coordinacion/horario_profesor.php';
