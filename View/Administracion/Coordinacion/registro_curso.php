<<?php
session_start();
$listaCurso=$_SESSION['listaCurso'];
$listaGrado=$_SESSION['listaGrado'];
$listaNivel=$_SESSION['listaNivel'];
$listaArea=$_SESSION['listaArea'];
$opcion=$_SESSION['op'];
  foreach ($listaCurso as $IndiceC => $valC){}
  foreach ($listaGrado as $IndiceG => $valG){}
  foreach ($listaNivel as $IndiceN => $valN){}
  foreach ($listaArea as $IndiceA => $valA){}

?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<?php if($opcion==1 || $opcion==4) {?>
<div class="span3" id="adduser">
				 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Curso</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
                                    
				    <div class="control-group">
                                        <span><b>Ingrese Código:</b></span>
                                        <div class="controls">
                                            <input maxlength="4" onKeyUp="this.value=this.value.toUpperCase();" name="cod_curso" class="input focused" id="focusedInput" type="text" placeholder = "C001" required>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="grado_id" class="" required>
                                             	<option selected="" value="">Seleccione Grado</option>
											<?php
											foreach($valG as $grado){
											
											?>
											<option value="<?php echo $grado['CODIGO']; ?>"><?php echo $grado['GRADO']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="nivel_id" class="" required>
                                             	<option selected="" value="">Seleccione Nivel</option>
											<?php
											foreach($valN as $nivel){
											
											?>
											<option value="<?php echo $nivel['CODIGO']; ?>"><?php echo $nivel['NIVEL']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="area_id" class="" required>
                                             	<option selected="" value="">Seleccione Area</option>
											<?php
											foreach($valA as $area){
											
											?>
											<option value="<?php echo $area['CODIGO']; ?>"><?php echo $area['AREA']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <span><b>Ingrese Nombre:</b></span>
                                        <div class="controls">
                                            <input name="nom_curso" onkeypress="return validarLetra(event)" class="input focused" id="focusedInput" type="text" placeholder = "Nombre" required>
                                        </div>
                                    </div>
                                    
			
					<div class="control-group">
                                          <div class="controls">
											
                                               <input  type="button" onclick="grabar('../../Controlador','CursoControlador.php','2','5','tablaAjax')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>   			
				</div>
<?php }?>

                <div class="span6" id="listaTabla">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                             <div class="pull-right">
                                  
                                  <a  href='../reportes/rpt_cursos_xls.php' class="btn btn-success"><i class="icon-print"></i>Reporte Excel</a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Cursos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								 <div id="tablaAjax" >
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
									</div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
