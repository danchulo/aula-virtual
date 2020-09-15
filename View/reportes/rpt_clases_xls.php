<?php
      header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=reporte_de_aulas.xls");
session_start();
   $fecha=$_SESSION['inicio'];
    $año= substr($fecha,0,4); 
$listaClase=$_SESSION['listaClase'];

  foreach ($listaClase as $IndiceC => $valClase ){}
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
                       <th colspan="2">LISTADO DE AULAS DE CLASE</th>
                 </tr>
		<tr>
					
				   
					<th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Ambiente</th>
                                        <th>Capacidad Actual</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Estado</th>
                                       
                                       
		</tr>
		</thead>
		<tbody>
	
	  <?php foreach ($valClase as $clase) { 
                                       $estado=$clase['ESTADO'];
                                       if($estado=="A"){
                                           $esta='Activo';
                                       }else if($estado="I"){
                                           $esta='Inactivo';
                                       }
                                     ?>
	                         <tr>      
	                         	 <td><?php echo $clase['GRADO'] ?></td> 
	                                 <td><?php echo $clase['SECCION'] ?></td> 
                                         <td><?php echo $clase['NIVEL'] ?></td> 
                                         <td><?php echo $clase['TURNO'] ?></td> 
                                          
                                         <td><?php echo $clase['SALON'] ?></td> 
                                             <td><?php echo $clase['CAPACIDAD'] ?></td> 
                                         <td><?php echo $clase['INICIO'] ?></td> 
                                         <td><?php echo $clase['FIN'] ?></td> 
                                     
	                                 <td><?php echo $esta ?></td> 
                                       
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
