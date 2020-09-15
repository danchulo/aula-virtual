<?php
session_start();
$lista=$_SESSION['listaGrado'];
 $cod=$lista['LISTA'][0]['CODIGO'];
$nom=$lista['LISTA'][0]['NOMBRE'];
$su=$lista['LISTA'][0]['SUFIJO'];
?>


				 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Grado</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
			<form id="FormMante">
                             <input name="id" type="hidden" value="<?php echo $cod?>"/>
                                <input name="tipo" type="hidden" value="a"/>
					<div class="control-group">
                                          <div class="controls">
                                              <input maxlength="1" name="nom" onkeypress="return onlynumber(event)" class="input focused" id="focusedInput" value="<?php echo $nom?>" type="text" placeholder = "Nombre" required>
                                                <input maxlength="2" onKeyUp="this.value=this.value.toUpperCase();" value="<?php echo $su?>" name="suf_grado" class="input focused" id="focusedInput" type="text" placeholder = "Sufijo" required>
                                          </div>
                                        </div>
					
                                                                    
					<div class="control-group">
                                          <div class="controls">
											
                                             <input  type="button" onclick="grabar('../../Controlador','GradoControlador.php','2','1','MiAjax')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div> 