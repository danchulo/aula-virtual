<?php
session_start();
$listaTema=$_SESSION['listaTema'];
$opcion=$_SESSION['op'];

  foreach ($listaTema as $IndiceT => $valT){}

?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>

<table class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
										
													
									<thead>
										   <tr>
                                                                                       <th>Curso</th>
                                                                                        <th>Unidad</th>
                                                                                         <th></th>
                                                                                          <th></th>
                                                                                           <th></th>
                                                                                       <th>Temas:</th>
                                        
                                                                                    </tr>
										</thead>
										<tbody>
                                                                       
										<?php foreach ($valT as $val2){
                                                                              
                                                                                    $temas=$val2['TEMA'];
 
                                                                                    ?>
                                                                                    <tr>
											
                                                                                        <td><?php echo $val2['CURSO'];?></td>
                                                                                        <td><b><?php echo $val2['UNIDAD'];?></b></td>
                                                                                   <td><a style="display:none"class="icon-pencil icon-large"> </a></td>
                                                                                        <td><a style="display:none"class="icon-pencil icon-large"> </a></td>
                                                                                        <td> <a style="display:none"class="icon-pencil icon-large"> </a></td>
                                                                                   
                                                                                        <td> 
                                                                                   
                                                                                          <?php for ($i=0;$i<count($temas);$i++){ 
                                                                                              $cod=$temas[$i]['tema_id'];
                                                                                              $estado=$temas[$i]['estado'];
                                                                                               if($estado=="A"){
                                                                                      $estado="Activo";
                                                                                    }else{
                                                                                      $estado="Inactivo";
                                                                                    }
                                                                                    
                                                                                              ?>
                                                                                            <label id="tem<?php echo $cod?>">
                                                                                            <div >
                                                                                                <?php echo ($i+1).'.- '.$temas[$i]['nombre_tema'].'<br>';
                                                                                                        if($opcion!=5){
                                                                                                        ?>
                                                                                                
                                                                                                <input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","tema")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="Activo") echo "checked" ?> />On
                                                                                                <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","tema")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="Inactivo") echo "checked" ?>/>Off
                                                                                               <?php   if($opcion==1){ ?>
                                                                                                <a class="btn btn-danger btn-mini" href='javascript:accionSubject("../../Controlador","TemaControlador.php",3,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a>
                                                                                                <?php   } ?>
                                                                                                <a href='javascript:accionSimple("../../Controlador","TemaControlador.php",3,"<?php echo $cod?>","adduser","b","")' class="btn btn-success btn-mini"><i class="icon-pencil icon-large"></i> </a>
                                                                                      <?php   } ?>
                                                                                            </div>
                                                                                            </label>
                                                                                          <?php   } ?>
                                                                                        </td>
                               
                                                                             </tr>
										<?php } ?>
                                                                              
										</tbody>
                                                                                
                                                                                <tfoot>
                                                                                   <tr>
                                                                                       <th>Curso</th>
                                                                                           <th>Unidad</th>
                                                                                              <th></th>
                                                                                          <th></th>
                                                                                           <th></th>
                                                                                       <th>Temas</th>
                                                     
                                                                                    </tr>
                                                                                </tfoot>

									</table>