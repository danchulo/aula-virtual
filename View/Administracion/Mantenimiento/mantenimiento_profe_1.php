<?php
session_start();
  $listaProfe=$_SESSION['listaProfe'];
  $listaArea=$_SESSION['listaArea'];
  $opcion=$_SESSION['op'];
  foreach ($listaProfe as $IndiceP => $valProfe){}
  foreach ($listaArea as $IndiceA => $valArea){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 
<div class="span3" id="adduser">
<div class="row-fluid">
                        <!-- block -->
                        <div  id="form" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Registrar Profesor</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
								
					<div class="control-group">
                                            <span><b>Ingrese Nombres:</b></b></span>
                                          <div class="controls">
                                            <input name="nom" minlength="3" onkeypress="return validarLetra(event)" class="input focused" id="focusedInput" type="text" placeholder = "Nombres" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                            <span><b>Ingrese Apellido Paterno:</b></span>
                                          <div class="controls">
                                            <input name="apa" minlength="3" onkeypress="return validarLetra(event)" class="input focused" id="focusedInput" type="text" placeholder = "Apellido Paterno" required>
                                          </div>
                                        </div>
                                                                    
                                          <div class="control-group">
                                            <span><b>Ingrese Apellido Materno:</b></span>
                                          <div class="controls">
                                              <input name="ama" minlength="3" onkeypress="return validarLetra(event)" class="input focused" id="focusedInput" type="text" placeholder = "Apellido Materno" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                             <span><b>Ingrese DNI válido:</b></span>
                                          <div class="controls">
                                              <input  name="dni" onkeypress="return onlynumber(event)" maxlength="8" minlength="8" title="Ingrese 8 números" class="input focused" id="focusedInput" type="text" placeholder = "DNI" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="sexo" class="" required>
                                                <option selected="" value="">Seleccione Sexo</option>
										
						<option value="M">Masculino</option>
                                                <option value="F">Femenino</option>                                      
                                            </select>
                                        </div>
                                        </div>            
                                        <div class="control-group">
                                            <span><b>Ingrese Dirección:</b></span>
                                          <div class="controls">
                                              <textarea name="dir" autocomplete="country-name" minlength="20" class="input focused" id="focusedInput"  placeholder = "Dirección" required></textarea>
                                          </div>
                                        </div>
				
					<div class="control-group">
                                             <span><b>Ingrese número celular:</b></span>
                                          <div class="controls">
                                              <input name="cel" maxlength="9" minlength="9" onkeypress="return onlynumber(event)" class="input focused" id="focusedInput" type="tel" placeholder = "Numero Celular" required>
                                          </div>
                                        </div>
										
					<div class="control-group">
                                            <span><b>Ingrese número telefónico:</b></span>
                                          <div class="controls">
                                              <input  name="tel" maxlength="7" minlength="7" onkeypress="return onlynumber(event)" class="input focused" id="focusedInput" type="tel" placeholder = "Numero Telefono" required>
                                          </div>
                                        </div>
                                                                    
                                        <div class="control-group">
                                            <span><b>Ingrese fecha de nacimiento:</b></span>
                                          <div class="controls">
                                            <input  name="fec_nac" type="date" class="input focused"  required>
                                          </div>
                                        </div>
					<div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="area" class="" required>
                                             	<option selected="" value="">Seleccione Area</option>
											<?php
											foreach($valArea as $area){
											
											?>
											<option value="<?php echo $area['CODIGO']; ?>"><?php echo $area['AREA']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                         
                                                                    <div class="control-group">
                                                                        <span><b>Cargue una foto</b></span>
								<div class="controls">
									<input name="foto" class="input-file uniform_on" id="fileInput" type="file" required>
								</div>
								</div>
											<div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','ProfeControlador.php','15','14')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
</div>
		
 <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Grados</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					
				     
					<th>Profesor</th>
                                          <th>DNI</th>
                                            <th>Usuario</th>
                                      <th>Estado</th>
                                  <?php if($opcion==1){?>
					<th></th>
                                  <?php } ?>
                                        <th></th>
                                          <th></th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Dirección</th>
                                    <th>N° Cel.</th>
                                     <th>N° Tel.</th>
                                    
					<th>Area</th>
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valProfe as $pro) { 
            $cod=$pro['CODIGO'];
              $foto=$pro['FOTO'];
              $estado=$pro['ESTADO'];
            ?>
		<tr>
                  
		<td><?php echo $pro['PROFESOR'] ?></td>
                  <td><?php echo $pro['DNI'] ?></td>   
                <td><?php echo $pro['USUARIO'] ?></td> 
                
                   <td><input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","profesor")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="A") echo "checked" ?> />Hab.
                    <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","profesor")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="I") echo "checked" ?>/>Inah.
                </td>
                
                <?php if($opcion==1){ ?>
                <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","ProfeControlador.php",23,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                   <?php } ?>
                <td width="40"><a href='javascript:accionSimple("../../Controlador","ProfeControlador.php",23,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                  <?php if($foto!=""){?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto?>"></td> 
                   <?php }else{?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/nodisponible.png"></td> 
                    <?php } ?> 
                <td><?php echo $pro['EDAD'] ?></td> 
                  <td><?php echo $pro['SEXO'] ?></td> 
                <td><?php echo $pro['DIRECCION'] ?></td> 
                <td><?php echo $pro['CEL'] ?></td> 
                <td><?php echo $pro['TEL'] ?></td> 
                <td><?php echo $pro['AREA'] ?></td> 
            
		</tr>
        <?php } ?>
	
		</tbody>
                
                <tfoot>
		<tr>
					
				   
					<th>Profesor</th>
                                          <th>DNI</th>
                                            <th>Usuario</th>
                                      <th>Estado</th>
                                  <?php if($opcion==1){?>
					<th></th>
                                  <?php } ?>
                                        <th></th>
                                            <th></th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Dirección</th>
                                    <th>N° Cel.</th>
                                     <th>N° Tel.</th>
                                    
					<th>Area</th>
		</tr>
		</tfoot>
	</table>
	</form>	
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
