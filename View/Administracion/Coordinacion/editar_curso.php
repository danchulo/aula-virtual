<?php
session_start();
$lista=$_SESSION['listCurso'];
$cod=$lista['LISTA'][0]['CODIGO'];
$cod_cur=$lista['LISTA'][0]['COD_CURSO'];
$curso=$lista['LISTA'][0]['CURSO'];
$NIVEL=$lista['LISTA'][0]['NIVEL'];
$cod_NIVEL=$lista['LISTA'][0]['COD_NIVEL'];
$GRADO=$lista['LISTA'][0]['GRADO'];
$cod_GRADO=$lista['LISTA'][0]['COD_GRADO'];
$area=$lista['LISTA'][0]['AREA'];
$cod_area=$lista['LISTA'][0]['COD_AREA'];

$listaNivel=$_SESSION['listaNivel'];
$listaArea=$_SESSION['listaArea'];
$listaGrado=$_SESSION['listaGrado'];
  foreach ($listaGrado as $IndiceG => $valG){}
  foreach ($listaNivel as $IndiceN => $valN){}
  foreach ($listaArea as $IndiceA => $valA){}
?>

<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Curso</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="FormMante">
					<input name="cod" value="<?php echo $cod?>"  type="hidden">		
						
                                         <div class="control-group">
                                        <div class="controls">
                                            <input value="<?php echo $cod_cur?>" name="cod_curso" class="input focused" id="focusedInput" type="text" placeholder = "Codigo" required>
                                        </div>
                                    </div>
                                  
					 <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="grado_id" class="" required>
                                             	     <option selected="" value="<?php echo $cod_GRADO ?>"> <?php echo $GRADO ?> </option>
						   <?php foreach($valG as $grado){?>
							<option value="<?php echo $grado['CODIGO']; ?>"><?php echo $grado['GRADO']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="nivel_id" class="" required>
                                             		<option selected="" value="<?php echo $cod_NIVEL ?>"> <?php echo $NIVEL ?> </option>
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
                                             		<option selected="" value="<?php echo $cod_area ?>"> <?php echo $area ?> </option>
											<?php
											foreach($valA as $area){
											
											?>
											<option value="<?php echo $area['CODIGO']; ?>"><?php echo $area['AREA']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                          
                                    <div class="control-group">
                                        <div class="controls">
                                            <input value="<?php echo $curso?>" name="nom_curso" class="input focused" id="focusedInput" type="text" placeholder = "Nombre" required>
                                        </div>
                                    </div>  
                                        
                                    
                                   <div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','CursoControlador.php','4','5','tablaAjax')" class="btn btn-info" value="Guardar">
	                                       <input  type="button" onclick="consultaSimple('../../Controlador','CursoControlador.php','1','MiAjax')" class="btn btn-success" value="Cancelar">

                                          </div>
												
                                    </div>
                                </form>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
