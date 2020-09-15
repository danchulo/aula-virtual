<?php
session_start();
$lista=$_SESSION['listProfe'];
$listaArea=$_SESSION['listaArea'];
$listaDistri=$_SESSION['listaDistrito'];
$areaa=$lista['LISTA'][0]['AREA'];
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
foreach ($listaArea as $IndiceA => $valArea){}

?>

                        <!-- block -->
                        <div  id="form" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Profesor</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="FormMante">
                                                                    <input name="cod" id="cod" value="<?php echo $cod?>"  type="hidden">		
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
                                            <input name="apa" onkeypress="return validarLetra(event)" value="<?php echo $apa?>" class="input focused" id="focusedInput" type="text" placeholder = "Apellido Paterno" required>
                                          </div>
                                        </div>
                                                                    
                                        <div class="control-group">
                                           <span><b>Ingrese apellido materno:</b></span>
                                            <div class="controls">
                                            <input name="ama" onkeypress="return validarLetra(event)" value="<?php echo $ama?>" class="input focused" id="focusedInput" type="text" placeholder = "Apellido Materno" required>
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
                                    <span><b>Seleccione Area:</b></span>
                                             <a data-toggle="modal" href="#modalArea">           
                                       <button class="btn btn-success btn-mini icon icon-plus"></button>
                                  </a>
                                    <div id="AjaxArea">
                                          <?php 
            
                for ($i=0;$i<count($areaa);$i++){
                $cod= $areaa[$i]['area_id'];
                      ?>
                                        <div id='cajaArea' class="controls">
            <div style="border:solid 2px green" id="caja<?php echo $cod?>">
             <button type="button" class="btn btn-danger btn-mini icon icon-remove" onclick='accionArea("../../Controlador","ProfeControlador.php","31","<?php echo $cod?>","","delete")'></button>
             <b><i><?php echo $areaa[$i]['area_nombre']?></b></i></div>
                                          
                                        </div>
                <?php } ?>
                                      <input type="hidden" id="cantidadArea" value="<?php echo $i ?>"/>
                                    </div>
                                            
                                        </div>
                                        <div title="Usuario" class="control-group">
                                            <span><b>Ingrese usuario:</b></span>
                                          <div class="controls">
                                            <input  name="usu" value="<?php echo $usu?>" minlength="5" class="input focused" id="focusedInput" type="text" placeholder = "Usuario" required>
                                          </div>
                                        </div>
				
                                                                    <div class="control-group">
								<div class="controls">
                                                                   
								</div>
								</div>
											<div class="control-group">
                                          <div class="controls">
						       <input  type="button" onclick="grabar('../../Controlador','ProfeControlador.php','24','14','MiAjax')" class="btn btn-info" value="Guardar">
	                                               <input  type="button" onclick="consultaSimple('../../Controlador','ProfeControlador.php','14','MiAjax')" class="btn btn-success" value="Cancelar">

                                          </div>
												
                                        </div>
                                </form>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                        
<div  class="modal hide fade" id="modalArea"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Area(s)</h4>
        </div>
        <div class="modal-body">
            <table  class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
            <thead>
             
                <tr>
               
                   <th>Areas</th>
                </tr>
                
            </thead>
            <tbody>
                
              
               <?php 
               									
		  foreach($valArea as $area){  
                  $codi=$area['CODIGO'];
                ?>
                     
		
               <tr onclick='accionArea("../../Controlador","ProfeControlador.php","31","<?php echo $codi?>","<?php echo $area['AREA'];?>","insert")' id='area<?php echo $codi;?>'>
               
                   <th><?php echo $area['AREA'];?></th>
               </tr>
        <?php } ?>
                   
           </tbody>
            <tfoot>
                <tr>
                   <th>Areas</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  