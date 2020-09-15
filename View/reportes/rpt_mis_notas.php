    <?php
           session_start();
       require_once '../../Public/dompdf/dompdf_config.inc.php';
$notas=$_SESSION['NotasCursos']; 
$lista=$_SESSION['lista'];

foreach ($notas as $Indice => $val){}
$html='
<html>
    <head>
  
        <meta charset="UTF-8">
        <title></title>
   
    </head>
    <body>
<center><h1>Institución Educativa Particular Carl Palmer</h1></center>
    
<h2>Estudiante: '.$lista[3][0]['APE'].", ".$lista[3][0]['NOMB'].'</h2><br><br>

                      <table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                <tr>
                       <th colspan="8">NOTAS DEL '.$notas['MISNOTAS'][0]['TRIMESTRE'].'</th>
                 </tr>
		<tr>
					<th></th>
                                        <th>Examen Mensual 1</th>
					<th>Examen Mensual 2</th>
                                        <th >Examen Trimestral</th>
                                        <th>Nota Libro</th>
                                        <th >Nota Cuaderno</th>
                                         <th >Nota Actitudinal</th>
                                        <th>P.</th>
					
		</tr>
		</thead>
		<tbody>';
	     

	foreach($val as $val2){
		$html.='<tr>
                    <td>'.$val2['CURSO'].'</td>           
		    <td>'.$val2['E1'].'</td>
                    <td>'.$val2['E2'].'</td> 
	            <td>'.$val2['ET'].'</td> 
                    <td>'.$val2['NL'].'</td> 
                    <td>'.$val2['NC'].'</td> 
                    <td>'. $val2['NA'].'</td> 
                    <td>'. $val2['P'].'</td> 
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


