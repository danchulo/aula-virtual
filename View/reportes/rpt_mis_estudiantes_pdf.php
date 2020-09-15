 <?php 
   require_once '../../Public/dompdf/dompdf_config.inc.php';
session_start();
$Estudiantes=$_SESSION['Mis_Estu']; 
foreach ($Estudiantes as $IndiceE => $valE){
    
    $cantidad=count($valE);
}
$clase=$_GET['clase']; 
$html='
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   
    </head>
    <body>
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
<span>Aula: '.$clase.'</span>
                      <table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                <tr>
                       <th colspan="2">LISTA DE ESTUDIANTES</th>
                 </tr>
		<tr>
						<th>Nº</th>
                                        <th >Estudiante</th>
					
		</tr>
		</thead>
		<tbody>';
	     

	for($i=0;$i<$cantidad;$i++){
		$html.='<tr>
                    <td><center>'.($i+1).'</center></td>
                    <td> '.$Estudiantes['ESTUDIANTES'][$i]['APELLIDOS'];  ', ';  $Estudiantes['ESTUDIANTES'][$i]['NOMBRES'].' </td>           
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
$dompdf->stream("reporte_de_mis_estudiantes.pdf");
