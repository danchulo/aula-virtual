<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_horario_aula.xls");
require_once '../../Modelo/Bean/HorarioClaseBean.php';
session_start();
$objHBean=new HorarioClaseBean();
$listaHoraClase=$_SESSION['listaHoraClase'];
$Clase=$_SESSION['Clase'];
$clase_nombre=$Clase['CLASE'][0]['CLASE'];
 $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
foreach($listaHoraClase as $indiceH => $valH){}


$html='<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <body>
    <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
      <div>Año escolar: '.$año.'</div>
      <div class="alert curso-titulo">

    <p> Horario Actual - Aula: '.$clase_nombre.'</p> 
  
 </div>

                          
    <div>
        <table border="1" cellspacing="0"  cellspandding="0"  width="100%">
          
                                        <thead>
                                         <tr>
                                             <th></th>   
                                              <th>lunes</th>   
                                              <th>martes</th> 
                                              <th>miercoles</th> 
                                              <th>jueves</th> 
                                              <th>viernes</th> 
                                           
                                        </tr>';
               
                                 foreach($valH as $hora){
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


echo $html;