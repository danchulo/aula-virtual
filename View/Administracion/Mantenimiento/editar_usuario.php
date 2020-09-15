<?php
session_start();
  $lista=$_SESSION['listUsu'];
  $listaTipo=$_SESSION['listTipo'];
  $listaDistri=$_SESSION['listaDistrito'];
$tipo=$lista['LISTA'][0]['TIPO'];
$cod_tipo=$lista['LISTA'][0]['COD_TIPO'];
$cod=$lista['LISTA'][0]['CODIGO'];
$nom=$lista['LISTA'][0]['NOMBRES'];
$apa=$lista['LISTA'][0]['APA'];
$ama=$lista['LISTA'][0]['AMA'];
$sexo=$lista['LISTA'][0]['SEXO'];
$mail=$lista['LISTA'][0]['EMAIL'];
$dni=$lista['LISTA'][0]['DNI'];
$direc=$lista['LISTA'][0]['DIRECCION'];
$cel=$lista['LISTA'][0]['CEL'];
$tel=$lista['LISTA'][0]['TEL'];
$nac=$lista['LISTA'][0]['FECH_NAC'];
$foto=$lista['LISTA'][0]['FOTO'];
$usu=$lista['LISTA'][0]['USU'];
$distri_id=$lista['LISTA'][0]['DISTRI_ID'];
$distri=$lista['LISTA'][0]['DISTRITO']; 
  foreach ($listaTipo as $Indice => $val){}
?>
                        <!-- block -->
                        <div id="form" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Usuario</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="FormMante">
					<input name="cod" value="<?php echo $cod?>"  type="hidden">		
					<div class="control-group">
                                          <div class="controls">
                                              <input type="hidden" name="now_foto" value="<?php echo $foto?>"/>
                                              <img  src="../subidas/<?php echo $foto?>" class="img-polaroid foto_buscado" >
                                             <span><b>Cambiar foto</b></span> <input  accept="image/jpeg, .jpg, .png" name="foto" class="archivo" class="btn btn-success"  type="file"/>
                                             
                                          </div>
                                        </div>
                                                                    <br> 		
					<div class="control-group">
                                                  <span><b>Ingrese nombres:</b></span>
                                          <div class="controls">
                                              <input name="nom" onkeypress="return validarLetra(event)" value="<?php echo $nom?>" class="input focused" id="focusedInput" type="text" placeholder = "Nombres" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                           <span><b>Ingrese nuevo apellido paterno:</b></span>
                                            <div class="controls">
                                            <input name="apa" onkeypress="return validarLetra(event)" value="<?php echo $apa?>" class="input focused" id="focusedInput" type="text" placeholder = "Apellidos" required>
                                          </div>
                                        </div>
                                                                    
                                        <div class="control-group">
                                           <span><b>Ingrese apellido materno:</b></span>
                                            <div class="controls">
                                            <input name="ama" onkeypress="return validarLetra(event)" value="<?php echo $ama?>" class="input focused" id="focusedInput" type="text" placeholder = "Apellidos" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                        <span><b>Ingrese DNI válido:</b></span>
                                          <div class="controls">
                                              <input  name="dni" onkeypress="return onlynumber(event)" maxlength="8" minlength="8" value="<?php echo $dni?>" class="input focused" id="focusedInput" type="text" placeholder = "DNI" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                        <span><b>Selecione sexo:</b></span>
                                        <div class="controls">
                                            <select  name="sexo" class="" required>
                                             	<?php if($sexo=="M"){?>
                                                <option selected="" value="M">Masculino</option>
                                          <option value="F">Femenino</option>   
                                               <?php } else if($sexo=="F"){ ?>
                                           <option selected="" value="F">Femenino</option>    
                                          <option  value="M">Masculino</option>
                                           
                                               <?php } ?> 
                                            
					      </select>
                                        </div>
                                        </div>        
                                                                 
                                        <div class="control-group">
                                            <span><b>Ingrese fecha de nacimiento:</b></span>
                                          <div class="controls">
                                            <input  name="fec_nac" value="<?php echo $nac?>" class="input focused" type="date" required>
                                          </div>
                                        </div>
							                                      <div class="control-group">
                                        <span><b>Seleccione Distrito:</b></span>
                                        <div class="controls">
                                            <select  name="distrito_id" class="" required>
                                                <option selected="" value="<?php echo $distri_id?>"> <?php echo $distri?> </option>
                                                
											<?php
											foreach($listaDistri as $distri){
											  $id=$distri['distrito_id'];
                                                $distrito=$distri['distrito_nombre'];
                                                    echo '<option value="'.$id.'">'.$id.' - '.$distrito.'</option>';} ?>
                                            </select>
                                        </div>
                                        </div>   
                                        <div class="control-group">
                                             <span><b>Ingrese Dirección:</b></span>
                                          <div class="controls">
                                              <textarea name="dir" class="input focused" id="focusedInput" type="text" placeholder = "Dirección" required><?php echo $direc?> </textarea>
                                          </div>
                                        </div>
				
                                       <div title="Número Celular" class="control-group">
                                           <span><b>Ingrese número celular:</b></span>
                                          <div class="controls">
                                              <input name="cel" onkeypress="return onlynumber(event)" maxlength="9" minlength="9" value="<?php echo $cel?>" class="input focused" id="focusedInput" type="tel" placeholder = "Numero Celular" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                             <span><b>Ingrese número telefónico:</b></span>
                                          <div class="controls">
                                            <input  name="tel" onkeypress="return onlynumber(event)" maxlength="7" minlength="7" value="<?php echo $tel?>" class="input focused" id="focusedInput" type="tel" placeholder = "Numero Telefono" required>
                                          </div>
                                        </div>
                                               	
					<div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="tipo_id" class="" required>
                                                <option selected="" value="<?php echo $cod_tipo ?>"> <?php echo $tipo ?> </option>
                                                
											<?php
											foreach($val as $tipo){
											
											?>
											<option value="<?php echo $tipo['CODIGO']; ?>"><?php echo $tipo['TIPO']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                        <div title="Usuario" class="control-group">
                                            <span><b>Ingrese usuario:</b></span>
                                          <div class="controls">
                                            <input  name="usu" value="<?php echo $usu?>"  minlength="5" class="input focused" id="focusedInput" type="text" placeholder = "Usuario" required>
                                          </div>
                                        </div>
				
				
                                                                    <div class="control-group">
								<div class="controls">
                                                                   
								</div>
								</div>
											<div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','UsuarioControlador.php','6','2','MiAjax')" class="btn btn-info" value="Guardar">
	<input  type="button" onclick="consultaSimple('../../Controlador','UsuarioControlador.php','2','MiAjax')" class="btn btn-success" value="Cancelar">

                                          </div>
												
                                        </div>
                                </form>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
