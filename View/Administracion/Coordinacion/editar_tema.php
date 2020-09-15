<?php
session_start();
$lista=$_SESSION['listTema'];
$tema=$lista['LISTA'][0]['TEMA'];
$cod=$lista['LISTA'][0]['CODIGO'];
$curso=$lista['LISTA'][0]['CURSO'];
$cod_curso=$lista['LISTA'][0]['COD_CURSO'];
$uni=$lista['LISTA'][0]['UNIDAD'];
$cod_uni=$lista['LISTA'][0]['COD_UNIDAD'];

$listaCurso=$_SESSION['listaCurso'];
$listaU=$_SESSION['listaUnidad'];
  foreach ($listaCurso as $IndiceC => $valC){}
  foreach ($listaU as $IndiceU => $valU){}
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
                                            <select  name="unidad_id" class="" required>
                                                <option selected="" value="<?php echo $cod_uni?>"><?php echo $uni?></option>
											<?php
											foreach($valU as $uni){
											
											?>
											<option value="<?php echo $uni['CODIGO']; ?>"><?php echo $uni['UNIDAD']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="curso_id" class="" required>
                                                <option selected="" value="<?php echo $cod_curso?>"><?php echo $curso?></option>
											<?php
											foreach($valC as $curso){
											
											?>
											<option value="<?php echo $curso['CODIGO']; ?>"><?php echo $curso['CURSO']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea name="nom_tema" class="input focused" id="focusedInput" placeholder = "Nombre Tema"><?php echo $tema?></textarea>
                                        </div>
                                    </div>
                                    
                                   <div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','TemaControlador.php','4','5','tablaAjax')" class="btn btn-info" value="Guardar">
	                                       <input  type="button" onclick="consultaSimple('../../Controlador','TemaControlador.php','1','MiAjax')" class="btn btn-success" value="Cancelar">

                                          </div>
												
                                    </div>
                                </form>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
