<?php 
session_start();
 require_once '../../Public/dompdf/dompdf_config.inc.php';
require_once '../../Modelo/Bean/HorarioEstuBean.php';
$objHBean=new HorarioEstuBean();
$fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
$listaHorario= $_SESSION['listaHora'];

foreach($listaHorario as $indiceH => $valH){}
$html='<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
    <center><p> MI HORARIO ACTUAL '.$año.'</b></center> 
              
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
                                                $objHBean->setH1($hora_1);
                                                  }  
  
                                           if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_2=$hora['CURSO'];
                                            $objHBean->setH2($hora_2);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_3=$hora['CURSO'];
                                            $objHBean->setH3($hora_3);
                                        }
                                                                              
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_4=$hora['CURSO'];
                                             $objHBean->setH4($hora_4);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_5=$hora['CURSO'];
                                             $objHBean->setH5($hora_5);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_6=$hora['CURSO'];
                                             $objHBean->setH6($hora_6);
                                        }
                                    }
                                         
                                         else if($dia=="martes"){
                                             
                                            if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_13=$hora['CURSO'];
                                              $objHBean->setH13($hora_13);
                                            }   
                                            
                                            if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_14=$hora['CURSO'];
                                             $objHBean->setH14($hora_14);
                                            
                                            } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_15=$hora['CURSO'];
                                             $objHBean->setH15($hora_15);
                                        }
                                        
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_16=$hora['CURSO'];
                                             $objHBean->setH16($hora_16);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_17=$hora['CURSO'];
                                             $objHBean->setH17($hora_17);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_18=$hora['CURSO'];
                                             $objHBean->setH18($hora_18);
                                        }
                                         } 
                                         
                                         else if($dia=="miercoles"){
                                               if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_25=$hora['CURSO'];
                                            $objHBean->setH25($hora_25);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_26=$hora['CURSO'];
                                            $objHBean->setH26($hora_26);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_27=$hora['CURSO'];
                                             $objHBean->setH27($hora_27);
                                        }
                                                                                
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_28=$hora['CURSO'];
                                             $objHBean->setH28($hora_28);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_29=$hora['CURSO'];
                                             $objHBean->setH29($hora_29);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_30=$hora['CURSO'];
                                             $objHBean->setH30($hora_30);
                                        }
                                         }
                                        else if($dia=="jueves"){
                                 if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_37=$hora['CURSO'];
                                            $objHBean->setH37($hora_37);
                                             
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_38=$hora['CURSO'];
                                            $objHBean->setH38($hora_38);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_39=$hora['CURSO'];
                                             $objHBean->setH39($hora_39);
                                        }
                                        
                                                                             
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_40=$hora['CURSO'];
                                             $objHBean->setH40($hora_40);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_41=$hora['CURSO'];
                                             $objHBean->setH41($hora_41);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_42=$hora['CURSO'];
                                             $objHBean->setH42($hora_42);
                                        }
                                         
                                         } 
                                          
                                         else if($dia=="viernes"){
                                              if(  $de=="08:00" && $a="08:45"){
                                            
                                            $hora_49=$hora['CURSO'];
                                              $objHBean->setH49($hora_49);
                                            }     if($de=="08:45" && $a="09:30"){
                                             
                                            $hora_50=$hora['CURSO'];
                                             $objHBean->setH50($hora_50);
                                        } 
                                        
                                         if($de=="09:30" && $a="10:15"){
                                             
                                            $hora_51=$hora['CURSO'];
                                             $objHBean->setH51($hora_51);
                                        }
                                        
                                         if($de=="10:45" && $a="11:30"){
                                             
                                            $hora_52=$hora['CURSO'];
                                             $objHBean->setH52($hora_52);
                                        }
                                        
                                         if($de=="11:30" && $a="12:15"){
                                             
                                            $hora_53=$hora['CURSO'];
                                             $objHBean->setH53($hora_53);
                                        }
                                        
                                         if($de=="12:15" && $a="13:00"){
                                             
                                            $hora_54=$hora['CURSO'];
                                             $objHBean->setH54($hora_54);
                                        }
                                         } 
                                         
                                        }
                                            
                                            $html.='<tr>
                                               <th>08:00 - 08:45</th>
                                              '.$objHBean->getH1().'
                                             '.$objHBean->getH13().'
                                             '.$objHBean->getH25().'
                                             '.$objHBean->getH37().'
                                             '.$objHBean->getH49().'
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>08:45 - 09:30</th>
                                           '.$objHBean->getH2().'
                                           '.$objHBean->getH14().'
                                           '.$objHBean->getH26().'
                                           '.$objHBean->getH38().'
                                           '.$objHBean->getH50().'
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>09:30 - 10:15</th>
                                              '.$objHBean->getH3().'
                                              '.$objHBean->getH15().'
                                              '.$objHBean->getH27().'
                                              '.$objHBean->getH39().'
                                              '.$objHBean->getH51().'
                                          
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
                                              '.$objHBean->getH4().'
                                              '.$objHBean->getH16().'
                                              '.$objHBean->getH28().'
                                              '.$objHBean->getH40().'
                                              '.$objHBean->getH52().'
                                             
                                        </tr>
                                         <tr>
                                              
                                           <th>11:30- 12:15</th>
                                           '.$objHBean->getH5().'
                                           '.$objHBean->getH17().'
                                           '.$objHBean->getH29().'
                                           '.$objHBean->getH41().'
                                           '.$objHBean->getH53().'
                                         
                                       </tr>
                                        
                                         <tr>
                                             <th>12:15- 01:00</th>
                                             '.$objHBean->getH6().'
                                             '.$objHBean->getH18().'
                                             '.$objHBean->getH30().'
                                             '.$objHBean->getH42().'
                                             '.$objHBean->getH54().'
                                          </tr>
                                         
                                        </thead>
                                        
                                        
                                        
                                        
                                    </table>
  </div>



    </body>
</html>';

$dompdf=new DOMPDF();
$dompdf->load_html($html);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("reporte_de_horario.pdf");


