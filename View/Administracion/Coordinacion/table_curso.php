<<?php
session_start();
$listaCurso=$_SESSION['listaCurso'];

$opcion=$_SESSION['op'];
  foreach ($listaCurso as $IndiceC => $valC){}

?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<table class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
										
													
									<thead>
										   <tr>
                                                                                       <th>Codigo</th>
                                                                                       <th>Curso</th>
                                                                                       <th>Grado</th>
                                                                                       <th>Nivel</th>
                                                                                     
                                                                                       <th>Estado</th>
                                                                                       <?php if($opcion!=5) { ?>   
										      
                                                                                         <?php if($opcion==1){ ?>
                                                                                     
                                                                                           <th></th>
                                                                                        
                                                                                            <?php } ?> 
                                                                                              <th></th>
                                                                                      <?php } ?> 
                                                                                                <th>Area</th>
                                                                                    </tr>
										</thead>
										<tbody>
										
										<?php foreach ($valC as $val2){
                                                                                    $cod_CUR=$val2['COD_CURSO'];
                                                                                    $cod=$val2['CODIGO'];
                                                                                      $estado=$val2['ESTADO'];
                                                                                    if($estado=="A"){
                                                                                      $estado="Activo";
                                                                                    }else{
                                                                                      $estado="Inactivo";
                                                                                    }
                                                                                    ?>
                                                                                    <tr id="<?php echo $cod?>">
											
											<td><?php echo $cod_CUR;?></td>
                                                                                        <td><?php echo $val2['CURSO'];?></td>
                                                                                        <td><?php echo $val2['GRADO'];?></td>
                                                                                        <td><?php echo $val2['NIVEL'];?></td>
                                                                                        
                                                                                      <?php if($opcion==5){echo '<td>'.$estado.'</td>';}?>
                                                                                        <?php if($opcion!=5) { ?> 
                                         
                                                                                       <td><input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","curso")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="Activo") echo "checked" ?> />On
                                                                                        <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","curso")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="Inactivo") echo "checked" ?>/>Off
                                                                                       </td>
                                                                 
                                                                                         <?php   if($opcion==1) { 
                                                                                           ?>
                                                                                       <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","CursoControlador.php",3,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                                                                                       <?php } ?>
                                                                                       <td width="40"><a href='javascript:accionSimple("../../Controlador","CursoControlador.php",3,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                                                                      
                                                                                           <?php } ?> 
                                                                                       <td><?php echo $val2['AREA'];?></td>
                                                                                     
                                                                             </tr>
										<?php } ?>
                               
                             
										</tbody>
                                                                                
                                                                                <tfoot>
                                                                                    <tr>
                                                                                    <th>Codigo</th>
                                                                                       <th>Curso</th>
                                                                                       <th>Grado</th>
                                                                                       <th>Nivel</th>
                                                                                       
                                                                                      <th>Estado</th>
                                   
                                                                                       <?php if($opcion!=5) { ?> 
                                                                                       <?php if($opcion==1) { ?>
                                                                                        <td></td>
                                                                                       <?php  } ?>
                                                                                        <td></td>
                                                                                       <?php  } ?>
                                                                                        <th>Area</th>
                                                                                    </tr>
                                                                                </tfoot>
									</table>