<?php
session_start();
$opcion=$_SESSION['op'];
  $listaEstu=$_SESSION['listaEstu'];
  $listaDistri=$_SESSION['listaDistrito'];
  foreach ($listaEstu as $IndiceE => $valEstu){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 
<div class="span3" id="adduser">
<div class="row-fluid">
                        <!-- block -->
                        <div id="form" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar estudiante</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form id="FormMante">
				    <div class="control-group">
                                            <span><b>Ingrese Nombres:</b></span>
                                          <div class="controls">
                                            <input name="nom"  onkeypress="return validarLetra(event)" class="input focused" id="focusedInput" type="text" placeholder = "Nombres" required>
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
                                              <input name="ama" onkeypress="return validarLetra(event)" minlength="3" class="input focused" id="focusedInput" type="text" placeholder = "Apellido Materno" required>
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
                                                                 
                                        <div class="control-group">
                                            <span><b>Ingrese fecha de nacimiento:</b></span>
                                          <div class="controls">
                                            <input  name="fec_nac"  maxlength="10" minlength="10" class="input focused"  type="date"  placeholder = "Fecha de Nacimiento" required>
                                          </div>
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
                                                                        <span><b>Guarde una foto</b></span>
								<div class="controls">
                                                                    <input name="foto" class="input-file uniform_on" id="fileInput" type="file">
								</div>
								</div>
											<div class="control-group">
                                          <div class="controls">
												<input  type="button" onclick="grabar('../../Controlador','EstuControlador.php','8','7','MiAjax')" class="btn btn-success" value="Guardar">

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
                                <div class="muted pull-left">Lista de Estudiantes</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
                      <th>Estudiante</th>
                                     <th>DNI</th>
				     <th>Usuario</th>
                                         <?php if($opcion==1){ ?>
                                          <th></th>
                                         <?php } ?>
                                              <th></th>
                                 <th>Foto</th>
                                <th>Estado</th>
                                     <th>Sexo</th>
                                     <th>Edad</th>
                                     <th>Distrito</th>
                                      <th>Dirección</th>
                                      <th>Número Cel.</th>
                                       <th>Número Tel.</th>
                                       <th>Email</th>
                                    
                                        
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valEstu as $estu) { 
            $cod=$estu['CODIGO'];
            $foto=$estu['FOTO'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$estu['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else {
                  $esta='Inactivo';
              }
              $sexo=$estu['SEXO'];
              if($sexo=="F"){
                  $sexo='Femenino';
              }else if($sexo=="M") {
                  $sexo='Masculino';
              }
            
            ?>
                <tr id="<?php echo $cod?>">
                    
		<td><?php echo $estu['ESTUDIANTE'] ?></td> 
                <td><?php echo $estu['DNI'] ?></td>
                <td><?php echo $estu['USUARIO'] ?></td> 
                
                   <?php if($opcion==1){ ?>
                <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","EstuControlador.php",13,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                   <?php } ?>
                <td width="40"><a href='javascript:accionSimple("../../Controlador","EstuControlador.php",13,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                 <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td> 
                <td><input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","estudiante")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="A") echo "checked" ?> />Habilitado.
                <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","estudiante")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="I") echo "checked" ?>/>Inhabilitado.
                </td>
            
                <td><?php echo $sexo ?></td> 
                <td><?php echo $estu['EDAD'] ?></td> 
                 <td><?php echo $estu['DISTRITO'] ?></td>
               <td><?php echo $estu['DIRECCION'] ?></td>
                <td><?php echo $estu['CEL'] ?></td> 
                <td><?php echo $estu['TEL'] ?></td> 
	       
                 <td><?php echo $estu['EMAIL'] ?></td> 
             
                </tr>
                
                
                
        <?php } ?>
	
		</tbody>
                <tfoot>
                    <tr>
                       <th>Estudiante</th>
                                     <th>DNI</th>
				     <th>Usuario</th>
                                         <?php if($opcion==1){ ?>
                                          <th></th>
                                         <?php } ?>
                                           <th></th>
                                        <th>Estado</th>
                                   <th></th>
                                     <th>Sexo</th>
                                     <th>Edad</th>
                                     <th>Distrito</th>
                                      <th>Dirección</th>
                                      <th>Número Cel.</th>
                                       <th>Número Tel.</th>
                                       <th>Email</th>
                                    
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
