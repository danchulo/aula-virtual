<?php
session_start();
$lista=$_SESSION['Anio'];
?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> Año Escolar</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
                                    <input name="anio_id" type="hidden" value="<?php echo $lista['ANIO'][0]['CODIGO']?>"/>
                                     <input name="tipo" type="hidden" value="a"/>
					<div class="control-group">
                                          <div class="controls">
                                              <input name="fecha_ini" value="<?php echo $lista['ANIO'][0]['FI']?>" class="input focused" id="focusedInput" type="date" placeholder = "Fecha Inicio" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="fecha_fin" value="<?php echo $lista['ANIO'][0]['FF']?>" class="input focused" id="focusedInput" type="date" placeholder = "Fecha Fin" required>
                                          </div>
                                        </div>
                                     
                                     <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="estado" class="" required>
                                              <option value="A">Activo</option>
                                             <option value="I">Inactivo</option>
                                                 
                                            </select>
                                        </div>
                                    </div>
            					
					<div class="control-group">
                                          <div class="controls">
											
                                             <input  type="button" onclick="grabar('../../Controlador','AnioControlador.php','2','1')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                                                    
                                </form>
	</div>
                 </div>
                            
                        </div>
                        <!-- /block -->
                  
                        
                    </div>   	