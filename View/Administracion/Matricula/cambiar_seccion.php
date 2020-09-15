<?php
session_start();
$listaClase=$_SESSION['listaSeccion'];
$listaEstu=$_SESSION['estuEncontrado'];
  $estu_nom=$listaEstu['LISTA'][0]['ESTUDIANTE'];
  $cod=$_SESSION['estudiante_id'];
foreach($listaClase as $IndiceC => $valClase){}
?>
 <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">

                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Cambiar de Sección</div>
                            </div>
                        
                            <div class="block-content collapse in">
                                 
                                <div class="span12">
                               <div class="alert alert-warning"><i class="icon icon-warning-sign"></i> ¡Importante! Antes de cambiar de sección al estudiante, deberá de realizar los reportes de notas y asistencias,
                               para ser traspasados a la nueva sección
                         <button title="Consultar Estudiante" type="button" onclick="ver_estu('../../Controlador','EstuControlador.php',15,'MiAjax','<?php echo $estu_nom ?>','<?php echo $cod ?>')" class="btn btn-success"><i class="icon icon-eye-open"></i></button>
                               </div>
								
                                    <div class="tbDatosProfe">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					<th>Foto</th>
					<th>Estudiante</th>
                                        <th>DNI</th>
                                        <th>Clase</th>
		</tr>
		</thead>
		<tbody>

		<tr>
                <?php 
              
                $foto=$listaEstu['LISTA'][0]['FOTO'];
                if($foto!=null){?>
                <td><img  class="img-polaroid foto_buscado" src="../../View/subidas/<?php echo $foto?>"></td> 
                   <?php }else{?>
                <td><img  class="img-polaroid foto_buscado" src="../../View/subidas/nodisponible.png"></td> 
                    <?php } ?>
	        <td><?php echo $estu_nom ?></td> 
                <td><?php echo $listaEstu['LISTA'][0]['DNI'] ?></td> 
             
                 <td><?php echo $listaEstu['LISTA'][0]['CLASE'] ?></td> 
	
		</tbody>
	</table>
                                        
                                        <form id="FormMante">

            <input type="hidden" name="estu_id" id="estu_id" value="<?php echo $listaProfe['LISTA'][0]['CODIGO'] ?>"/>
            <div class="controls">
                <select id="class_id" name="clase_id" class="" required>
                    
                    <option value="0">Seleccione Seccion</option>
			<?php foreach($valClase as $clase){?>
		    <option value="<?php echo $clase['CODIGO']; ?>"><?php echo $clase['SECCION']; ?></option>
                        
                        <?php } ?>                              
                </select>
            </div>
            
            <div class="btnBuscar">
         <button id="btnGuardar" type="button"  onclick="grabar('../../Controlador','EstuControlador.php',27,24,'MiAjax')"  class="btn btn-primary">Cambiar</button>       
         <button type="button"  onclick="consultaSimple('../../Controlador','EstuControlador.php','24','MiAjax')"  class="btn btn-success">Volver</button>       
           
            </div>
	</form>	
        </div>
                                   
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>