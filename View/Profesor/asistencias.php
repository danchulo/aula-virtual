<?php 

session_start();
$asistencias=$_SESSION['AsistenciaEstu']; 
$mostrar=$_SESSION['mostrar']; 
if($asistencias!=null){
foreach ($asistencias as $IndiceA => $valAsis){
    $cantidad=count($valAsis);
}

$clase=$_GET['nombre_clase']; 
$clase_id=$_GET['clase_id']; 
 ?>
<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<div class="filtroOver">

                            <div class="asistencia" id="AjaxAsistencia">
                                
                           <?php 
                            foreach ($mostrar as $val){
                               $m= $val['mostrar'];

                           if($m=="si") {?>
                                <div class="btnAsis">
                             <a href='javascript:click("../../Controlador","ProfeControlador.php",7,"","AjaxAsistencia")' class="btn btn-info">Nueva Asistencia</a>
                                </div>
                           <?php } }  ?>
                         
                                <div class="tbAsis">   
                                <table id="datos">
                          
						 <thead>
		
                                <tr>
                               
                                    <th>Fecha</th>
                                    <th> </th>
           
                                </tr>
                            </thead>
                            <tbody>
					
                                         <?php
							
					foreach ($valAsis as $asistencia){
					?>
								
					<tr id="<?php echo $asistencia['ASISTENCIA_ID']; ?>">
										
                                       
                                        <td><?php echo ucfirst($asistencia['FECHA']); ?></td> 
									
								
										<td width="80">

									         <a class="btn btn-info" href='javascript:click("../../Controlador","ProfeControlador.php",7,"<?php echo $asistencia['ASISTENCIA_ID'];?>","AjaxAsistencia")'>Ver</a>
                                                
                                                                                </td>
                                                                                
                                                                                	
                                                                                
											
                                </tr>				
                                   <?php } ?>    
				
                         
                            </tbody>
                        </table>
                                </div>
                   <?php } else {?>
                          <div class="filtroOver">

                            <div class="asistencia" id="AjaxAsistencia">
                           
                                <div class="alert alert-danger error">   Estimado profesor, su clase aún no cuenta con alumnos matriculados.</div>
                             
                            <?php } ?>
                                </div>
                            
                            </div>
                          

