<?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_cursos.xls");
session_start();
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
$listaCurso=$_SESSION['listaCurso'];

    foreach ($listaCurso as $IndiceC => $valC){}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
 <center><h1>Institución Educativa Particular Carl Palmer</h1></center>
 <H2> Año escolar: <?php echo $año?></H2>
	<table border="1" cellspacing="0"  cellspandding="0"  width="100%" >

		<thead>
                    <tr>
                       <th colspan="2">LISTADO DE CURSOS</th>
                 </tr>
		<tr>
					
				   
					<th>Codigo</th>
                                                                                                        <th>Curso</th>
                                                                                                        <th>Grado</th>
                                                                                                        <th>Nivel</th>
                                                                                                        <th>Area</th>
                                                                                                        <th>Estado</th>
                                       
                                       
		</tr>
		</thead>
		<tbody>
	<?php foreach ($valC as $val2){
                                                                                      $estado=$val2['ESTADO'];
                                                                                    if($estado=="A"){
                                                                                      $estado="Activo";
                                                                                    }else{
                                                                                      $estado="Inactivo";
                                                                                    }
                                                                                    ?>
                                                                                <tr>
											
											<td><?php echo $val2['CODIGO'];?></td>
                                                                                        <td><?php echo $val2['CURSO'];?></td>
                                                                                        <td><?php echo $val2['GRADO'];?></td>
                                                                                        <td><?php echo $val2['NIVEL'];?></td>
                                                                                        <td><?php echo $val2['AREA'];?></td>
                                                                                      <td><?php echo $estado;?></td>

										</tr>
										<?php } ?>
	
		</tbody>
                
	</table>
	</form>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>

    </body>
</html>
