<?php
session_start();
$lista=$_SESSION['listaSimple'];

 $cod=$lista['LISTA'][0]['CODIGO'];
$nom=$lista['LISTA'][0]['NOMBRE'];
$esta=$lista['LISTA'][0]['ESTADO'];
?>


				 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Seccion</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
			<form id="FormMante">
                             <input name="id" type="hidden" value="<?php echo $cod?>"/>
                                <input name="tipo" type="hidden" value="a"/>
					<div class="control-group">
                                          <div class="controls">
                                              <input maxlength="2" onkeypress="return validarLetra(event)"  onKeyUp="this.value=this.value.toUpperCase();" name="nom" class="input focused" id="focusedInput" value="<?php echo $nom?>" type="text" placeholder = "Nombre" required>
                                          </div>
                                        </div>
					
                                                                    
					<div class="control-group">
                                          <div class="controls">
											
                                             <input  type="button" onclick="grabar('../../Controlador','SeccionControlador.php','2','1','MiAjax')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div> 