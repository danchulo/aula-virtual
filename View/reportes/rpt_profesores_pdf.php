<?php
session_start();
 require_once '../../Public/dompdf/dompdf_config.inc.php';
 
$listaProfe=$_SESSION['listaProfe'];
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
  foreach ($listaProfe as $IndiceP => $valProfe){}

$html='<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: '.$año.'</H2>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
               
		<tr>
					
				   
					<th>Profesor</th>
                                        <th>Sexo</th>
                                        <th>Dni</th>
                                        <th>Edad</th>
                                        <th>Area(s)</th>
                                        <th>Estado</th>
                                       
		</tr>
		</thead>
		<tbody>';
	
	foreach ($valProfe as $pro) { 
            $estado=$pro['ESTADO'];
            if($estado=="A"){
                $estado="Activo";
            }else if($estado=="I"){
                 $estado="Inactivo";
            }
              $sex=$pro['SEXO'];
              
		$html.='<tr>
                   <td>'.$pro['PROFESOR'].'</td>
                   <td>'.$sex.'</td> 
	           <td>'.$pro['DNI'].'</td> 
                   <td>'.$pro['EDAD'].'</td> 
                   <td>';
                    $are=$pro['AREA'];
                   foreach ($are as $area){
                   
                   $html.= '-'.$area['area_nombre'].'<br>'; 
                    
                   }
                    
                 $html.='</td>
                       
                   <td>'.$estado.'</td>
                       
                   </tr>';
        }
$html.='</tbody>
                
	</table>


    </body>
</html>';

$dompdf=new DOMPDF();
$dompdf->load_html($html);
ini_set("memory_limit", "128M");
$dompdf->render();
$dompdf->stream("reporte_de_profesores_el_nazareno.pdf");