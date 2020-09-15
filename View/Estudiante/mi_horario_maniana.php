<?php 
session_start();
require_once '../../Modelo/Bean/HorarioEstuBean.php';
$objBean=new HorarioEstuBean();
$listaHorario= $_SESSION['listaHora'];

foreach($listaHorario as $indiceH => $valH){
    $count=count($valH);
}

?> 
<div class="alert curso-titulo">
       <div class="pull-left">
                                  
           <a  href='../reportes/rpt_horario_maniana_estu_pdf.php' class="btn btn-primary"><i class="icon-print"></i> Imprimir Horario</a>
						</div>
    <p> MI HORARIO ACTUAL</p> 
  
    
 </div>

<div id='AjaxNavegacion' class="block-content1 collapse in">
    
  <?php if($count>0){ ?>                    
    <div>
        <table class="table table-bordered">
          
                                          <thead>
                                     <tr>
                                              <th></th>   
                                              <th>lunes</th>   
                                              <th>martes</th> 
                                              <th>miércoles</th> 
                                              <th>jueves</th> 
                                              <th>viernes</th>    
                                     </tr>
                                         
          
                                        <?php foreach($valH as $hora){
                                            $de=$hora['DE'];
                                            $a=$hora['A'];
                                            $dia=$hora['DIA'];
                                       
                                             if($dia=="lunes"){
                                                
                                                  if(  $de=="08:00" && $a="08:45"){
                                              $hora_1=$hora['CURSO'];
                                                $objBean->setH1($hora_1);
                                                  }  
  
                                           if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_2=$hora['CURSO'];
                                            $objBean->setH2($hora_2);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_3=$hora['CURSO'];
                                            $objBean->setH3($hora_3);
                                        }
                                                                              
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_4=$hora['CURSO'];
                                             $objBean->setH4($hora_4);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_5=$hora['CURSO'];
                                             $objBean->setH5($hora_5);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_6=$hora['CURSO'];
                                             $objBean->setH6($hora_6);
                                        }
                                    }
                                         
                                         else if($dia=="martes"){
                                             
                                            if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_13=$hora['CURSO'];
                                              $objBean->setH13($hora_13);
                                            }   
                                            
                                            if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_14=$hora['CURSO'];
                                             $objBean->setH14($hora_14);
                                            
                                            } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_15=$hora['CURSO'];
                                             $objBean->setH15($hora_15);
                                        }
                                        
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_16=$hora['CURSO'];
                                             $objBean->setH16($hora_16);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_17=$hora['CURSO'];
                                             $objBean->setH17($hora_17);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_18=$hora['CURSO'];
                                             $objBean->setH18($hora_18);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                               if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_25=$hora['CURSO'];
                                            $objBean->setH25($hora_25);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_26=$hora['CURSO'];
                                            $objBean->setH26($hora_26);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_27=$hora['CURSO'];
                                             $objBean->setH27($hora_27);
                                        }
                                                                                
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_28=$hora['CURSO'];
                                             $objBean->setH28($hora_28);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_29=$hora['CURSO'];
                                             $objBean->setH29($hora_29);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_30=$hora['CURSO'];
                                             $objBean->setH30($hora_30);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                 if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_37=$hora['CURSO'];
                                            $objBean->setH37($hora_37);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_38=$hora['CURSO'];
                                            $objBean->setH38($hora_38);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_39=$hora['CURSO'];
                                             $objBean->setH39($hora_39);
                                        }
                                        
                                                                             
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_40=$hora['CURSO'];
                                             $objBean->setH40($hora_40);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_41=$hora['CURSO'];
                                             $objBean->setH41($hora_41);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_42=$hora['CURSO'];
                                             $objBean->setH42($hora_42);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                              if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_49=$hora['CURSO'];
                                              $objBean->setH49($hora_49);
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_50=$hora['CURSO'];
                                             $objBean->setH50($hora_50);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_51=$hora['CURSO'];
                                             $objBean->setH51($hora_51);
                                        }
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_52=$hora['CURSO'];
                                             $objBean->setH52($hora_52);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_53=$hora['CURSO'];
                                             $objBean->setH53($hora_53);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_54=$hora['CURSO'];
                                             $objBean->setH54($hora_54);
                                        }
                                         } 
                                         
                                        }
                                            ?>
                                      
                                        <tr>
                                               <th>8:00 - 8:45</th>
                                               <?php echo  $objBean->getH1()?>
                                               <?php echo $objBean->getH13() ?>
                                               <?php ECHO $objBean->getH25() ?>
                                               <?php echo $objBean->getH37()?>
                                               <?php echo $objBean->getH49() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>8:45 - 9:30</th>
                                               <?php echo $objBean->getH2() ?>
                                               <?php echo $objBean->getH14() ?>
                                               <?php echo $objBean->getH26() ?>
                                               <?php echo $objBean->getH38() ?>
                                               <?php echo $objBean->getH50() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>9:30 - 10:15</th>
                                              <?php echo $objBean->getH3() ?>
                                              <?php echo $objBean->getH15() ?>
                                              <?php echo $objBean->getH27() ?>
                                              <?php echo $objBean->getH39() ?>
                                              <?php echo $objBean->getH51() ?>
                                          
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
                                              <?php echo $objBean->getH4() ?>
                                              <?php echo $objBean->getH16() ?>
                                              <?php echo $objBean->getH28() ?>
                                              <?php echo $objBean->getH40() ?>
                                              <?php echo $objBean->getH52() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>11:30- 12:15</th>
                                           <?php echo $objBean->getH5() ?>
                                           <?php echo $objBean->getH17() ?>
                                           <?php echo $objBean->getH29() ?>
                                           <?php echo $objBean->getH41() ?>
                                           <?php echo $objBean->getH53() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>12:15- 01:00</th>
                                             <?php echo $objBean->getH6() ?>
                                             <?php echo $objBean->getH18() ?>
                                             <?php echo $objBean->getH30() ?>
                                             <?php echo $objBean->getH42() ?>
                                             <?php echo $objBean->getH54() ?>
                                          
                                            </tr>
                                         <tr>
                                          
                                        </thead>
                                        
                                        
                                        
                                        
                                    </table>
  </div>
  <?php } else {?>
    <div class="alert alert-danger">Usted no tiene un horario el presente año</div>
      <?php }?>
</div>
