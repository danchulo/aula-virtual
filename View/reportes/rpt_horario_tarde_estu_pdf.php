<?php 
session_start();
 require_once '../../Public/dompdf/dompdf_config.inc.php';
require_once '../../Modelo/Bean/HorarioEstuBean.php';
$objBean=new HorarioEstuBean();
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
      <div class="alert curso-titulo">

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
                                            
                                            $html.='<tr>
                                               <th>01:00 - 01:45</th>
                                              '. $objBean->getH7().'
                                              '.$objBean->getH19().'
                                              '.$objBean->getH31().'
                                              '.$objBean->getH43().'
                                              '.$objBean->getH55().'
                                             
                                        </tr> 
                                        
                                        
                                        <tr>
                                               <th>01:45 - 02:30</th>
                                               '.$objBean->getH8() .'
                                               '.$objBean->getH20().'
                                               '.$objBean->getH32().'
                                               '.$objBean->getH44().'
                                               '.$objBean->getH56().'
                                              
                                        </tr> 
                                        
                                        <tr>
                                             <th>02:30 - 03:15</th>
                                             '.$objBean->getH9() .'
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
                                              '.$objBean->getH9() .'
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
           
$dompdf=new DOMPDF();
$dompdf->load_html($html);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("reporte_de_horario.pdf");


