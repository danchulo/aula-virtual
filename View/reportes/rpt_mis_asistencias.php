 <?php 
   require_once '../../Public/dompdf/dompdf_config.inc.php';
session_start();
$lista=$_SESSION['listaCantidadA']; 
$listaA=$_SESSION['lista'];
foreach ($lista as $Indice => $val){}
$html='
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
<span>Estudiante: '.$listaA[3][0]['APE'].", ".$listaA[3][0]['NOMB'].'</span>
                      <table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                <tr>
                       <th colspan="4">RESUMEN GENERAL DE ASISTENCIAS</th>
                 </tr>
		<tr>
					<th>Curso</th>
                                        <th >Asistencias</th>
					<th >Faltas</th>
                                        <th >Tardanzas</th>
					
		</tr>
		</thead>
		<tbody>';
	     

	foreach($val as $val2){
		$html.='<tr>
                    <td>'.$val2['CURSO'].'</td>           
		    <td>'.$val2['A'].'</td>
                    <td>'.$val2['F'].'</td> 
	            <td>'.$val2['T'].'</td> 
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
$dompdf->stream("reporte_de_asistencias.pdf");

?>
