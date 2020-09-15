<?php
session_start();
$opcion=$_SESSION['op'];

$listaClase=$_SESSION['listaClase'];
if($opcion==4 || $opcion==1){
    $listaNivel =$_SESSION['listaNivel'];
$listaAula=$_SESSION['listaAula'];
$listaSeccion=$_SESSION['listaSeccion'];
$listaGrado=$_SESSION['listaGrado'];
    $listaTurno=$_SESSION['listaTurno'];
  foreach ($listaGrado as $IndiceG => $valG){}
  foreach ($listaSeccion as $IndiceSe => $valSe){}
  foreach ($listaAula as $IndiceA => $valA){}
  foreach ($listaTurno as $IndiceT => $valT){}
}
  foreach ($listaClase as $IndiceC => $valClase ){}

?>

<iframe style="display: none" onload="picker(),cargaTablaJQUERY()"></iframe>

<?php if($opcion==1 || $opcion==4) {?>
<div class="span3" id="adduser">
				 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Agregar Aula</div>
                             
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
             
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="grado_id" class="" required>
                                                <option selected="" value="">Seleccione Grado</option>
											<?php
											foreach($valG as $grado){
											
											?>
											<option value="<?php echo $grado['CODIGO']; ?>"><?php echo $grado['GRADO']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                     <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="seccion_id" class="" required>
                                             	<option selected="" value="">Seleccione Sección</option>
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
                                             	<option selected="" value="">Seleccione Nivel</option>
											<?php
											foreach($listaNivel as $valN ){
											
											?>
											<option value="<?php echo $valN['nivel_id']; ?>"><?php echo $valN['nivel_nombre']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="aula_id" class="" required>
                                             	<option selected="" value="">Seleccione Ambiente</option>
											<?php
											foreach($valA as $aula){
											
											?>
											<option value="<?php echo $aula['CODIGO']; ?>"><?php echo $aula['AULA']; ?></option>
                                                                                        
                                                                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                            <select  name="turno_id" class="" required>
                                             	<option selected="" value="">Seleccione Turno</option>
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
                                            <input name="hora_ini" id="hora_ini" readonly="readonly" type="text" class="input focused" id="focusedInput"  placeholder = "Hora Inicio" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                   
                                        <div class="controls">
                                             <input name="hora_fin" id="hora_fin" readonly="readonly" class="input focused" id="focusedInput" type="text" placeholder = "Hora Fin" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <input name="capacidad" maxlength="2" onkeypress="return onlynumber(event)" class="input focused" id="focusedInput" type="text" placeholder = "Capacidad" required>
                                        </div>
                                    </div>
			
					<div class="control-group">
                                          <div class="controls">
											
                                               <input  type="button" onclick="grabar('../../Controlador','ClaseControlador.php','1','6','tablaAjax')" class="btn btn-success" value="Guardar">

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>   			
				</div>
<?php }?>
             <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                                <div class="pull-right">
                                  
                                <a  href='../reportes/rpt_clases_xls.php' class="btn btn-success"><i class="icon-print"></i>Reporte Excel</a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Aulas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="tablaAjax">
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					
				
					  <th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                        <th>Estado</th>
                                      
                                         <?php if($opcion!=5) { ?>
                                     
                                         <?php if($opcion==1) { ?>
                                        
                                        <td ></td>
                                        <?php  } ?>
                                          <td></td>
                                         
                                         <?php  } ?>
                                        <th>Ambiente:</th>
                                        <th>Capacidad Actual:  </th>
                                        <th>Hora Inicio:</th>
                                        <th>Hora Fin:</th>
					
		</tr>
		</thead>
		<tbody>
	<?php 
      
        
        ?>
	                         <?php foreach ($valClase as $clase) { 
                              
                                     $cod=$clase['CODIGO'];
                                     
            
                                       $estado=$clase['ESTADO'];
                                       if($estado=="A"){
                                           $esta='Activo';
                                       }else if($estado=="I"){
                                           $esta='Inactivo';
                                       }
                                     ?>
	                         <tr id="<?php echo $cod ?>">      
	                         	 <td><?php echo $clase['GRADO'] ?></td> 
	                                 <td><?php echo $clase['SECCION'] ?></td> 
                                         <td><?php echo $clase['NIVEL'] ?></td> 
                                         <td><?php echo $clase['TURNO'] ?></td> 
                                         <?php if($opcion==5){ ?>
	                                 <td><?php echo $esta ?></td> 
                                          <?php } ?>
                                         
                                         <?php if($opcion!=5) { ?> 
                                         
                                         <td><input onclick='estado("../../Controlador","AdminControlador.php",2,"A","i","<?php echo $cod ?>","clase")' type="radio" name="<?php echo $cod ?>"  <?php if($estado=="A") echo "checked" ?> />On
                                          <input onclick='estado("../../Controlador","AdminControlador.php",2,"I","i","<?php echo $cod ?>","clase")' type="radio" name="<?php echo $cod ?>" <?php if($estado=="I") echo "checked" ?>/>Off
                                         </td>
                                         
<!--                                          <td width="40"><a data-toggle="modal" href="#modalHora"> <button onclick='cargarModalHorario("../../Controlador","ClaseControlador.php",3,"<php echo $cod;?>","cargaModalHoraClase")' id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="icon icon-eye-open"></span></button></a></td>     
                                         -->
                                           <?php   if($opcion==1) { 
                                             ?>
                                         <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","ClaseControlador.php",4,"<?php echo $cod?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                                         <?php } ?>
                                         <td width="40"><a href='javascript:accionSimple("../../Controlador","ClaseControlador.php",4,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                        
                                             <?php } ?>  
                                          
                                         <td><?php echo $clase['SALON'] ?></td> 
                                             <td><?php echo $clase['CAPACIDAD'] ?></td> 
                                         <td><?php echo $clase['INICIO'] ?></td> 
                                         <td><?php echo $clase['FIN'] ?></td>
                                         
              
                                 
                                 
                                 </tr>
                                 
   
                                 
                                 <?php } ?>
	                           
		</tbody>
                
                <tfoot>
                    <tr>
                                       
                                        <th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Nivel</th>
                                        <th>Turno</th>
                                       <th>Estado</th>
                                   
                                         <?php if($opcion!=5) { ?> 
               
                                         <?php if($opcion==1) { ?>
                                          <td></td>
                                         <?php  } ?>
                                          <td></td>
                                         <?php  } ?>
                                        <th>Ambiente</th>
                                        <th>Capacidad Actual</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        
                    </tr>
                </tfoot>
	</table>
	        </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>

<!--<div id="cargaModalHoraClase">
    
</div>-->