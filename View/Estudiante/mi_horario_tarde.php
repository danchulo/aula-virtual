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
                                  
           <a  href='../reportes/rpt_horario_tarde_estu.php' class="btn btn-primary"><i class="icon-print"></i> Imprimir Horario</a>
						</div>
    <p> MI HORARIO ACTUAL</p> 
  
    
 </div>

<div id='AjaxNavegacion' class="block-content1 collapse in">
    
  <?php if($count>0){?>                    
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
                                         
                                        if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_7=$hora['CURSO'];
                                             $objBean->setH7($hora_7);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_8=$hora['CURSO'];
                                             $objBean->setH8($hora_8);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_9=$hora['CURSO'];
                                             $objBean->setH9($hora_9);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_10=$hora['CURSO'];
                                             $objBean->setH10($hora_10);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_11=$hora['CURSO'];
                                             $objBean->setH11($hora_11);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_12=$hora['CURSO'];
                                             $objBean->setH12($hora_12);
                                        }
                                    }
                                         
                                         else if($dia=="martes"){
                                           
                                        if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_19=$hora['CURSO'];
                                             $objBean->setH19($hora_19);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_20=$hora['CURSO'];
                                             $objBean->setH20($hora_20);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_21=$hora['CURSO'];
                                             $objBean->setH21($hora_21);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_22=$hora['CURSO'];
                                             $objBean->setH22($hora_22);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_23=$hora['CURSO'];
                                             $objBean->setH23($hora_23);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_24=$hora['CURSO'];
                                             $objBean->setH24($hora_24);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                     if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_31=$hora['CURSO'];
                                             $objBean->setH31($hora_31);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_32=$hora['CURSO'];
                                             $objBean->setH32($hora_32);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_33=$hora['CURSO'];
                                             $objBean->setH33($hora_33);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_34=$hora['CURSO'];
                                             $objBean->setH34($hora_34);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_35=$hora['CURSO'];
                                             $objBean->setH35($hora_35);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_36=$hora['CURSO'];
                                             $objBean->setH36($hora_36);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_43=$hora['CURSO'];
                                             $objBean->setH43($hora_43);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_44=$hora['CURSO'];
                                             $objBean->setH44($hora_44);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_45=$hora['CURSO'];
                                             $objBean->setH45($hora_45);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_46=$hora['CURSO'];
                                             $objBean->setH46($hora_46);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_47=$hora['CURSO'];
                                             $objBean->setH47($hora_47);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_48=$hora['CURSO'];
                                             $objBean->setH48($hora_48);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                           if($de=="13:00" && $a="13:45"){
                                             
                                            $hora_55=$hora['CURSO'];
                                             $objBean->setH55($hora_55);
                                        }
                                        if($de=="13:45" && $a="14:30"){
                                             
                                            $hora_56=$hora['CURSO'];
                                             $objBean->setH56($hora_56);
                                        }
                                        if($de=="14:30" && $a="15:15"){
                                             
                                            $hora_57=$hora['CURSO'];
                                             $objBean->setH57($hora_57);
                                        }
                                        if($de=="15:45" && $a="16:30"){
                                             
                                            $hora_58=$hora['CURSO'];
                                             $objBean->setH58($hora_58);
                                        }
                                        if($de=="16:30" && $a="17:15"){
                                             
                                            $hora_59=$hora['CURSO'];
                                             $objBean->setH59($hora_59);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_60=$hora['CURSO'];
                                             $objBean->setH60($hora_60);
                                        }
                                         } 
                                         
                                        }
                                            ?>
                                         <tr>
                                               <th>01:00 - 01:45</th>
                                               <?php echo  $objBean->getH7()?>
                                               <?php echo $objBean->getH19() ?>
                                               <?php ECHO $objBean->getH31() ?>
                                               <?php echo $objBean->getH43()?>
                                               <?php echo $objBean->getH55() ?>
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>01:45 - 02:30</th>
                                               <?php echo $objBean->getH8() ?>
                                               <?php echo $objBean->getH20() ?>
                                               <?php echo $objBean->getH32() ?>
                                               <?php echo $objBean->getH44() ?>
                                               <?php echo $objBean->getH56() ?>
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>02:30 - 03:15</th>
                                              <?php echo $objBean->getH9() ?>
                                              <?php echo $objBean->getH21() ?>
                                              <?php echo $objBean->getH33() ?>
                                              <?php echo $objBean->getH45() ?>
                                              <?php echo $objBean->getH57() ?>
                                          
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
                                              <?php echo $objBean->getH10() ?>
                                              <?php echo $objBean->getH22() ?>
                                              <?php echo $objBean->getH34() ?>
                                              <?php echo $objBean->getH46() ?>
                                              <?php echo $objBean->getH58() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>04:30- 05:15</th>
                                           <?php echo $objBean->getH11() ?>
                                           <?php echo $objBean->getH23() ?>
                                           <?php echo $objBean->getH35() ?>
                                           <?php echo $objBean->getH47() ?>
                                           <?php echo $objBean->getH59() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>05:15- 06:00</th>
                                             <?php echo $objBean->getH11() ?>
                                             <?php echo $objBean->getH24() ?>
                                             <?php echo $objBean->getH36() ?>
                                             <?php echo $objBean->getH48() ?>
                                             <?php echo $objBean->getH60() ?>
                                          </tr>
<!--                                       fin dia lunes-->
                                        </thead>
                                        
                                        
                                        
                                        
                                    </table>
  </div>
  <?php } else {?>
    <div class="alert alert-danger">Usted no tiene un horario el presente año</div>
      <?php }?>
</div>
