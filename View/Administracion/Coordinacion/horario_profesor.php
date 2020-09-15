
<div class="horarioProfe">
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_11=$hora['CURSO'];
                                             $objBean->setH11($hora_11);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_12=$hora['CURSO'];
                                             $objBean->setH12($hora_12);
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_23=$hora['CURSO'];
                                             $objBean->setH23($hora_23);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_24=$hora['CURSO'];
                                             $objBean->setH24($hora_24);
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
                                        }if($de=="13:00" && $a="13:45"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_35=$hora['CURSO'];
                                             $objBean->setH35($hora_35);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_36=$hora['CURSO'];
                                             $objBean->setH36($hora_36);
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
                                        }if($de=="13:00" && $a="13:45"){
                                             
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
                                        if($de=="14:30" && $a="17:15"){
                                             
                                            $hora_47=$hora['CURSO'];
                                             $objBean->setH47($hora_47);
                                        }
                                        if($de=="17:15" && $a="18:00"){
                                             
                                            $hora_48=$hora['CURSO'];
                                             $objBean->setH48($hora_48);
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
                                        }if($de=="13:00" && $a="13:45"){
                                             
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
                                              <th>3:45 - 4:30</th>
                                              <?php echo $objBean->getH9() ?>
                                              <?php echo $objBean->getH22() ?>
                                              <?php echo $objBean->getH34() ?>
                                              <?php echo $objBean->getH46() ?>
                                              <?php echo $objBean->getH58() ?>
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>4:30- 5:15</th>
                                           <?php echo $objBean->getH10() ?>
                                           <?php echo $objBean->getH23() ?>
                                           <?php echo $objBean->getH35() ?>
                                           <?php echo $objBean->getH47() ?>
                                           <?php echo $objBean->getH59() ?>
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>5:15- 6:00</th>
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