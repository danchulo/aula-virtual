<?php
session_start();
  $lista=$_SESSION['listaUsu'];
  $listaDistri=$_SESSION['listaDistrito'];
$listaT=$_SESSION['listaTUsu'];
  foreach ($lista as $Indice => $val){}
    foreach ($listaT as $IndiceT => $valT){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 
<div class="span3" id="adduser">
<div class="row-fluid">
                        <!-- block -->
                        <div  id="form" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Uusuario</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
								
				   <div class="control-group">
                                            <span><b>Ingrese Nombres:</b></span>
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
                                            <span><b>Ingrese fecha de nacimiento:</b></span>
                                          <div class="controls">
                                            <input  name="fec_nac"  class="input focused"  type="date" required>
                                          </div>
                                        </div>
				
                                     <div class="control-group">
                                        <div class="controls">
                                            <select  name="distrito_id" class="" required>
                                             	<option selected="" value="">Seleccione Distrito</option>
                                                <?php foreach ($listaDistri  as $distri){
                                                $id=$distri['distrito_id'];
                                                $distrito=$distri['distrito_nombre'];
                                                    echo '<option value="'.$id.'">'.$id.' - '.$distrito.'</option>';
                                                }
                                                    
                                                    ?>
                                             
                                            </select>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <span><b>Ingrese Dirección:</b></span>
                                          <div class="controls">
                                              <textarea name="dir" minlength="20" class="input focused" id="focusedInput"  placeholder = "Dirección" required></textarea>
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
                                       <div class="controls">
                                            <select  name="tipo_id" class="" required>
                                             	
                                                <option selected="" value="">Tipo de Usuario</option>
						<?php foreach ($valT as $tipo){?>				
						<option value="<?php echo $tipo['CODIGO']?>"><?php echo $tipo['TIPO']?></option>
                                                <?php } ?>	
                                            </select>
                                        </div>   
                                    </div>		
				    
                                    <div class="control-group">
					    <div class="controls">
						<input name="foto" class="input-file uniform_on" id="fileInput" type="file" required>
					    </div>
			            </div>
                                        <div class="control-group">
                                             <span><b>Cargue una foto:</b></span>
                                          <div class="controls">
						<input  type="button" onclick="grabar('../../Controlador','UsuarioControlador.php','3','2','MiAjax')" class="btn btn-success" value="Guardar">
                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
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
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
                        <th>Foto</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                        
			<th>Nombre</th>
                        <th>DNI</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Cel.</th>
                        <th>Tel.</th>
                        <th>Email</th>
                        <th>Direcciòn</th>
					
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($val as $val2) { 
            $foto=$val2['FOTO'];
               if($foto==null){
               $foto="nodisponible.png";
                }
            $cod=$val2['CODIGO'];
            $tipo=$val2['TIPO'];
            $estado=$val2['ESTADO'];
           
            ?>
		<tr id="<?php echo $cod?>">
                   <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td>           
		  
                    <td><?php echo $val2['USUARIO'] ?></td>
           
	            <td><?php echo $tipo?></td> 
                    <td><input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","usuario")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="A") echo "checked" ?> />Hab.
                        <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","usuario")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="I") echo "checked" ?>/>Inha.
                    </td>
                    <?php if($tipo=="Director" || $tipo=="Secretaria" || $tipo=="Administrador"){?>
                    <td> <a class="btn btn-danger" href='javascript:accion("../../Controlador","UsuarioControlador.php",5,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                     <td ><a href='javascript:accionSimple("../../Controlador","UsuarioControlador.php",5,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                    
                     
                   
                    <?php } else{?>
                     <td> <a style="display: none" href='javascript:accionSimple("../../Controlador","GradoControlador.php",3,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-eye-open"></i> </a></td>
                     <td ><a style="display: none" href='javascript:accionSimple("../../Controlador","GradoControlador.php",3,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-eye-open"></i> </a></td>
                    <?php } ?>
                   
                     <td><?php echo $val2['NOMBRE']?></td>   
                    <td><?php echo $val2['DNI'] ?></td>   
                    <td><?php echo $val2['SEXO']; ?></td>                       
                    <td><?php echo $val2['EDAD'] ?></td> 
                    <td><?php echo $val2['CEL'] ?></td> 
                    <td><?php echo $val2['TEL'] ?></td> 
                    <td><?php echo $val2['EMAIL'] ?></td> 
                    <td><?php echo $val2['DIRECCION'] ?></td>            
		</tr>
        <?php } ?>
	
		</tbody>
                <tfoot>
                    <tr>
                             <th> Foto</th>
                        <th>Usuario</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    
			<th>Nombre</th>
                        <th>DNI</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Cel.</th>
                        <th>Tel.</th>
                        <th>Email</th>
                        <th>Direcciòn</th>
			
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
