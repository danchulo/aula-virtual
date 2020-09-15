      <?php
session_start();
  header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_estudiantes_matriculados.xls");
  $listaEstu=$_SESSION['listaEstuMatricula'];


  foreach ($listaEstu as $IndiceE => $valEstu){}
$cant= count($valEstu);
 
$html='
<!DOCTYPE html>
<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>';
 if($cant>0){
       
 $clase=$listaEstu['ESTUC'][0]['CLASE'];
 
 $año=$listaEstu['ESTUC'][0]['ANIO'];
$html.='
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: '.$año.'</H2>
     <h3>'.$clase.'</h3>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                    <tr>
                       <th colspan="5">LISTADO DE ESTUDIANTES</th>
                 </tr>
		<tr>
					
				   
					 <th>Dni</th>
					<th>Estudiante</th>
                                        <th>Sexo</th>
                                        <th>Fecha <br>
                                         Asignacion
                                        </th>
                                        <th>Estado</th>
                                        
                                       
		</tr>
		</thead>
		<tbody>';
	
	 foreach ($valEstu as $estu) { 

                
              $estado=$estu['ESTADO'];
              if($estado=="A"){
                  $esta='Validado';
              }else {
                  $esta='Anulado';
              }
           
              $etu_nom=$estu['ESTUDIANTE'];
         
		$html.='<tr>
              <td>'.$estu['DNI'].'</td> 
		<td>'.$estu['ESTUDIANTE'].'</td>
                <td>'.$estu['SEXO'].'</td> 
	       
                <td>'.$estu['FECHA'].'</td> 
	        <td>'.$esta.'</td>
                 
               
                        
		</tr>';
        }
	
       $html.='         
	</table>';
	}
else{
    echo '<h1>SIN REGISTROS</h1>';
}
     $html.=' </body>
</html>';

echo $html;