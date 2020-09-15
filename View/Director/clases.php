<?php
session_start();
  $listaClase=$_SESSION['listaClase'];
 
  foreach ($listaClase as $IndiceC => $valClase){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

 <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Aulas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					
				
					<th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Aula</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Capacidad Actual</th>
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
                                         <td><?php echo $clase['INICIO'] ?></td> 
                                         <td><?php echo $clase['FIN'] ?></td> 
                                         <td><?php echo $clase['CAPACIDAD'] ?></td> 
	                                 <td><?php echo $esta ?></td>      
	                         </tr>
                                 <?php } ?>
	                           
		</tbody>
                
                <tfoot>
                    <tr>
                        <th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Aula</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Capacidad Actual</th>
                                        <th>Estado</th>
                        
                    </tr>
                </tfoot>
	</table>
	</form>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
