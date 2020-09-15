<?php 
session_start();
require_once '../../Public/dompdf/dompdf_config.inc.php';
require_once '../../Modelo/Bean/HorarioProfeBean.php';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_mi_horario.xls");

$objBean=new HorarioProfeBean();
$fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
$listaHorario= $_SESSION['listaHora'];

foreach($listaHorario as $indiceH => $valH){}
$html='
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div class="alert curso-titulo">
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
    <p> MI HORARIO ACTUAL '.$año.'</p> 
  
 </div>

                          
    <div>
        <table border="1" cellspacing="0"  cellspandding="0"  width="100%">
          
                                        <thead>
                                         <tr>
                                             <th></th>   
                                              <th>lunes</th>   
                                              <th>martes</th> 
                                              <th>miércoles</th> 
                                              <th>jueves</th> 
                                              <th>viernes</th> 
                                            
                                        </tr>';
                                         
                                       foreach($valH as $hora){
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
                                            
                                           $html.='<tr>
                                               <th>08:00 - 08:45</th>
                                              '.$objBean->getH1().'
                                             '.$objBean->getH13().'
                                             '.$objBean->getH25().'
                                             '.$objBean->getH37().'
                                             '.$objBean->getH49().'
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>08:45 - 09:30</th>
                                           '.$objBean->getH2().'
                                           '.$objBean->getH14().'
                                           '.$objBean->getH26().'
                                           '.$objBean->getH38().'
                                           '.$objBean->getH50().'
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>09:30 - 10:15</th>
                                              '.$objBean->getH3().'
                                              '.$objBean->getH15().'
                                              '.$objBean->getH27().'
                                              '.$objBean->getH39().'
                                              '.$objBean->getH51().'
                                          
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
                                              '.$objBean->getH4().'
                                              '.$objBean->getH16().'
                                              '.$objBean->getH28().'
                                              '.$objBean->getH40().'
                                              '.$objBean->getH52().'
                                             
                                        </tr>
                                         <tr>
                                              
                                           <th>11:30- 12:15</th>
                                           '.$objBean->getH5().'
                                           '.$objBean->getH17().'
                                           '.$objBean->getH29().'
                                           '.$objBean->getH41().'
                                           '.$objBean->getH53().'
                                         
                                       </tr>
                                        
                                         <tr>
                                             <th>12:15- 01:00</th>
                                             '.$objBean->getH6().'
                                             '.$objBean->getH18().'
                                             '.$objBean->getH30().'
                                             '.$objBean->getH42().'
                                             '.$objBean->getH54().'
                                          
                                            </tr>
                                            <tr>
                                               <th>01:00 - 01:45</th>
                                              '.$objBean->getH7().'
                                              '.$objBean->getH19().'
                                              '.$objBean->getH31().'
                                              '.$objBean->getH43().'
                                              '.$objBean->getH55().'
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>01:45 - 02:30</th>
                                               '.$objBean->getH8().'
                                               '.$objBean->getH20().'
                                               '.$objBean->getH32().'
                                               '.$objBean->getH44().'
                                               '.$objBean->getH56().'
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>02:30 - 03:15</th>
                                             '.$objBean->getH9().'
                                             '.$objBean->getH21().'
                                             '.$objBean->getH33().'
                                             '.$objBean->getH45().'
                                             '.$objBean->getH57().'
                                          
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
                                              '.$objBean->getH9().'
                                              '.$objBean->getH22().'
                                              '.$objBean->getH34().'
                                              '.$objBean->getH46().'
                                              '.$objBean->getH58().'
                                             
                                        </tr>
                                         <tr>
                                              
                                            <th>04:30- 05:15</th>
                                           '.$objBean->getH10().'
                                           '.$objBean->getH23().'
                                           '.$objBean->getH35().'
                                           '.$objBean->getH47().'
                                           '.$objBean->getH59().'
                                         
                                       </tr>
                                        
                                         <tr>
                                           <th>05:15- 06:00</th>
                                            '.$objBean->getH11().'
                                            '.$objBean->getH24().'
                                            '.$objBean->getH36().'
                                            '.$objBean->getH48().'
                                            '.$objBean->getH60().'
                                          </tr>
                                         
                                         
                                         
                                        </thead>
                                        
                                        
                                        
                                        
                                    </table>
  </div>



    </body>
</html>';



                                           echo $html;