<?php 
   require_once '../../Public/dompdf/dompdf_config.inc.php';
session_start();
$notas=$_SESSION['Lista_Notas_Estu'];
foreach ($notas as $IndiceNot => $valNot){}
$cantidad=count($valNot);
                  $clase=$_SESSION['nombre_clase']; 
                   $curso=$_SESSION['curso_nombre']; 
$html='<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>

<b>Aula: '.$clase.'</span></b><br>
    <b>Curso: '.$curso.'</span></b><br>


                                      <table  border="1" cellspacing="0"  cellspandding="0"  width="100%" >
                           
                                 <thead>
                               <tr>
                       <th colspan="9">NOTAS DEL '.$notas['LISTA_NOTAS_E'][0]['TRIMESTRE'].'</th>
                 </tr>
                                     <tr>
                                     
                                         <td>Nº</td> 
                                         <td>Estudiantes</td> 
                                         <td>E. mensual 1</td> 
                                         <td>E. mensual 2</td> 
                                         <td>E. Trimestral</td> 
                                         <td>N. Cuaderno</td> 
                                         <td>N. Libro</td> 
                                         <td>N. Actitud</td> 
                                         <td>P.</td> 
                                     </tr>
                                 </thead>
                                 <tbody>';
                                         for($i=0;$i<$cantidad;$i++){
                                     $html.='<tr>
                                         <td><center>'.($i+1).'</center></td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['N_COMPLETO'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_1'].'</td>
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_2'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_T'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_C'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_L'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['NOTA_A'].'</td> 
                                         <td>'.$notas['LISTA_NOTAS_E'][$i]['PONDERADO'].'</td>
                                         </tr>';
                                         }
 $html.='
                                 </tbody>
                                 </table>
                        
    </body>
</html>';
 
$dompdf=new DOMPDF();
$dompdf->load_html($html);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("reporte_de_notas.pdf");

          
