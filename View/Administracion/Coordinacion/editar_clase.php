<?php
session_start();
$lista=$_SESSION['listClase'];
$cod=$lista['LISTA'][0]['CODIGO'];
$turno=$lista['LISTA'][0]['TURNO'];
$cod_turno=$lista['LISTA'][0]['COD_TURNO'];
$sec=$lista['LISTA'][0]['SECCION'];
$cod_sec=$lista['LISTA'][0]['COD_SECCION'];
$NIVEL=$lista['LISTA'][0]['NIVEL'];
$cod_NIVEL=$lista['LISTA'][0]['COD_NIVEL'];
$GRADO=$lista['LISTA'][0]['GRADO'];
$cod_GRADO=$lista['LISTA'][0]['COD_GRADO'];
$AMBIENTE=$lista['LISTA'][0]['AMBIENTE'];
$cod_AMBIENTE=$lista['LISTA'][0]['COD_AMBIENTE'];
$capacidad=$lista['LISTA'][0]['CAPACIDAD'];
$ini=$lista['LISTA'][0]['INICIO'];
$fin=$lista['LISTA'][0]['FIN'];

$listaNivel=$_SESSION['listaNivel'];
$listaAula=$_SESSION['listaAmbiente'];
$listaSeccion=$_SESSION['listaSeccion'];
$listaGrado=$_SESSION['listaGrado'];
$listaTurno=$_SESSION['listaTurno'];
  foreach ($listaGrado as $IndiceG => $valG){}
  foreach ($listaNivel as $IndiceN => $valN){}
  foreach ($listaSeccion as $IndiceSe => $valSe){}
  foreach ($listaAula as $IndiceA => $valA){}
  foreach ($listaTurno as $IndiceT => $valT){}
?>

<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Clase</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="FormMante">
					<input name="cod" value="<?php echo $cod?>"  type="hidden">		
							
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
                                            <select  name="seccion_id" class="" required>
                                             	<option selected="" value="<?php echo $cod_sec ?>"> <?php echo $sec ?> </option>
											<?php
											foreach($valSe as $sec){
											
											?>
											<option value="<?php echo $sec['CODIGO']; ?>"><?php echo $sec['SECCION']; ?></option>
                                                                                        
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
                                            <select  name="aula_id" class="" required>
                                             		<option selected="" value="<?php echo $cod_AMBIENTE ?>"> <?php echo $AMBIENTE ?> </option>
											<?php
											foreach($valA as $aula){
											
											?>
											<option value="<?php echo $aula['CODIGO']; ?>"><?php echo $aula['AMBIENTE']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                       <div class="controls">
                                            <select  name="turno_id" class="" required>
                                             		<option selected="" value="<?php echo $cod_turno ?>"> <?php echo $turno ?> </option>
											<?php
											foreach($valT as $turno){
											
											?>
											<option value="<?php echo $turno['CODIGO']; ?>"><?php echo $turno['TURNO']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <input name="hora_ini" readonly="readonly" value="<?php echo $ini ?>" id="hora_ini"  type="text" class="input focused" id="focusedInput"  placeholder = "Hora Inicio" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                             <input name="hora_fin" readonly="readonly" id="hora_fin" value="<?php echo $fin ?>" class="input focused" id="focusedInput" type="text" placeholder = "Hora Fin" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <input name="capacidad" max="40" maxlength="2" onkeypress="return onlynumber(event)" value="<?php echo $capacidad ?>" class="input focused" id="focusedInput" type="text" placeholder = "Capacidad" required>
                                        </div>
                                    </div>
														<div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','ClaseControlador.php','5','6','tablaAjax')" class="btn btn-info" value="Guardar">
	<input  type="button" onclick="consultaSimple('../../Controlador','ClaseControlador.php','2','MiAjax')" class="btn btn-success" value="Cancelar">

                                          </div>
												
                                        </div>
                                </form>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
