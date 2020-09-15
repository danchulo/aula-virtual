<?php
session_start();
$lista=$_SESSION['listaAnio'];
$opcion=$_SESSION['op'];
  foreach ($lista as $Indice => $val){}

?>
<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 
<?php if($opcion==1) {?>
<div class="span3" id="adduser">
				 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> Año Escolar</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
				<form id="FormMante">
                                    
                                     <input name="tipo" type="hidden" value="g"/>
					<div class="control-group">
                                               <span><b>Ingrese Fecha de Inicio:</b></span>
                                          <div class="controls">
                                            <input name="fecha_ini" class="input focused" id="focusedInput" type="date" placeholder = "Fecha Inicio" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                               <span><b>Ingrese Fecha de Fin:</b></span>
                                          <div class="controls">
                                            <input name="fecha_fin" class="input focused" id="focusedInput" type="date" placeholder = "Fecha Fin" required>
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
				</div>

                        <!-- /block -->
                    			
				
<?php }?>
<?php if($opcion==1 || $opcion==5) {?>
                <div class="span6" id="listaTabla">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                              <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Año Escolar</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					<th>Año Escolar</th>
                                       <th>Estado</th>
                                          <?php if($opcion==1) { ?>    
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                          <?php } ?>   
	
		</tr>
		</thead>
		<tbody>
	
	                         <?php foreach ($val as $val2) { 
                                       $estado=$val2['ESTADO'];
                                       if($estado=="A"){
                                           $esta='Activo';
                                       }else if($estado=="I"){
                                           $esta='Inactivo';
                                       }
                                     ?>
	                         <tr>      
	                         	 <td><?php echo $val2['ANIO'] ?></td> 
                                         <td><?php echo $esta ?></td>  
                                        <?php if($opcion==1) { 
                                              if($estado!='I'){  
                                            ?>   
                                          
                                         <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","CursoControlador.php",11,"<?php echo $val2['CODIGO'];?>","e")'><i class="icon-trash icon-large"></i></a></td>
                                         
                                         <td width="40"><a href='javascript:accion("../../Controlador","AnioControlador.php",3,"<?php echo $val2['CODIGO'];?>","","MiAjax","")' title="Trimestres" class="btn btn-success"><i class="icon-plus icon-large"></i> </a></td>
                                         
                                         <td width="40"><a href='javascript:accion("../../Controlador","AnioControlador.php",5,"<?php echo $val2['CODIGO'];?>","","adduser","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                        <?php }else { ?>  
                                          <td width="40"></td>
                                         
                                         <td width="40"></td>
                                         
                                         <td width="40"></td>
                                        <?php } } ?>
	                         </tr>
                                 <?php } ?>
	                           
		</tbody>
                
                <tfoot>
                    <tr>
                                        <th>Año Escolar</th>
                                      
                                        <th>Estado</th>
                                         <?php if($opcion==1) { ?>  
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                         <?php } ?> 
                        
                    </tr>
                </tfoot>
	</table>
				
                            </div>
                        </div>
                         
                        <!-- /block -->
                    </div>


                     </div></div>
<?php } ?>