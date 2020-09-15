<?php
session_start();
  $listaEstu=$_SESSION['listaEstuMatricula'];
 
  foreach ($listaEstu as $IndiceE => $valEstu){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

 <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            
                             <div class="pull-right">
                                  
                                 <a  href='../reportes/rpt_estudiantes_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i> Excel</a>
				<a  href='../reportes/rpt_estudiantes_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i> PDF</a>		
                             </div>
                             <div class="selectTri">
                             <select  id="cboGrado" class="selectAnio" onchange='filtroGrado("../../Controlador","EstuControlador.php",16,"estuFiltro")' class="span3 select1">
                                             	
                                              <option value='0'>Seleccione Grado</option>
                                                  <?php foreach ($valG as $grado ) {?>
                                              <option selected value='<?php echo $grado['CODIGO'];?>'><?php echo $grado['NOMBRE_GRADO'];?></option>
                                               
                                                   <?php } ?>
                                            </select>
                                         <input type="hidden" id="anio_id" />
                                     
                                    <select  id="cboSeccion"
                                     onchange="filtroSeccion('../../Controlador','EstuControlador.php',18,'estuFiltro')">
                                        
                                        <option value="0">Seleccione Sección</option>
                                        <?php foreach ($valSec as $sec){?>
                                        <option selected value="<?php echo $sec['CODIGO']?>"><?php echo $sec['NOMBRE_SECCION']?></option>
                                        <?php }?>
                                    </select>
                        </div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Estudiantes Asignados</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="estuFiltro" >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					 <th></th>
				        <th>Dni</th>
					<th>Estudiante</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Estado</th>
                                        
                                          <th>Consultar</th>
					
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valEstu as $estu) { 
           $foto=$estu['FOTO'];
           $cod=$estu['CODIGO'];
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
              if($sexo=="M"){
                  $sex='Masculino';
              }else {
                  $sex='Femenino';
              }
              $etu_nom=$estu['ESTUDIANTE'];
            ?>
                    <tr>
                         <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td> 
                <td><?php echo $estu['DNI'] ?></td> 
		<td><?php echo $etu_nom ?></td>
                <td><?php echo $sex ?></td> 
	       
                <td><?php echo $estu['EDAD'] ?></td> 
               
               <?php if($esta!="I" && $opcion==5){?>
	        <td><?php echo $esta ?></td>
                
                <?php } ?>
                 <?php if($opcion!=5){?>
	        <?php if($opcion==1){ ?>
                <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","EstuControlador.php",13,"<?php echo $cod?>","<?php echo $estu['COD_CLASE']?>","","e")'><i class="icon-trash icon-large"></i></a></td>
                   <?php } ?>
                <td width="40"><a href='javascript:accionSimple("../../Controlador","EstuControlador.php",13,"<?php echo $cod?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                <td width="40"> <a class="btn btn-warning" href='javascript:accion("../../Controlador","EstuControlador.php",13,"<?php echo $cod?>","<?php echo $estu['COD_CLASE']?>","","e")'><i class="icon-warning-sign icon-large"></i></a></td>

                </td>
                
                <?php } ?>
                
                
                 <td><button type="button" onclick="ver_estu('../../Controlador','EstuControlador.php',15,'MiAjax','<?php echo $etu_nom ?>','<?php echo $cod ?>')" class="btn btn-success"><i class="icon icon-eye-open"></i></button></td>
		
                    </tr>
        <?php } ?>
	
		</tbody>
                
                <tfoot>
		<tr>
					
				        
					 <th></th>
				        <th>Dni</th>
					<th>Estudiante</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Estado</th>
                                        
                                          <th>Consultar</th>
		</tr>
		</tfoot>
	</table>
	</form>	
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>