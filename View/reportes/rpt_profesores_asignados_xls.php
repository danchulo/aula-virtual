 <?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_profesores_asignados.xls");
session_start();
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
$listaAsigna=$_SESSION['listaAsigna'];

foreach($listaAsigna as $IndiceA => $valAsigna){}
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
                       <th colspan="2">LISTADO DE PROFESORES</th>
                 </tr>
		<tr>
					
				   
					<th>Profesor</th>
                                        <th>Clase</th>
                                       
                                       
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valAsigna as $asigna) { ?>
		<tr>
              
	        <td><?php echo $asigna['PROFESOR'] ?></td> 
                <td><?php echo $asigna['CLASE'] ?></td> 
		
		                
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
