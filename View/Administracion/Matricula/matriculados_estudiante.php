<?php
session_start();
  $listaEstu=$_SESSION['listaEstuMatricula'];
  
  $listaAnio=$_SESSION['listaAnio'];
    $listaNivel=$_SESSION['listaNivel'];
  $opcion=$_SESSION['op'];  
  $listaSeccion=$_SESSION['listaSeccion'];
  
  $listaGrado=$_SESSION['listaGrado'];
          foreach ($listaGrado as $Indic => $valG){}
       foreach ($listaAnio as $Ind => $valAn){}           
   foreach ($listaSeccion as $Indi => $valSec){}   
    foreach ($listaNivel as $Ind => $valN){}
    foreach ($listaEstu as $IndiceE => $valEstu){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

 <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            
                             <div class="pull-right">
                                  
                              
			      <?php if($opcion==4 || $opcion==1) {?>
                               <a class="btn btn-info" href="javascript:consultaSimple('../../Controlador','EstuControlador.php','28','AsignaEstu')"><i class="icon-plus-sign"></i> Asignar</a>                 
                                      <?php } ?>    
                               <a class="btn btn-success" href="javascript:consultaSimple('../../Controlador','EstuControlador.php','24','MiAjax')"><i class="icon-list"></i> Lista</a>
                            
                             </div >
                            
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Estudiantes Asignados</div>
                            </div>
                             
                            <div id="AsignaEstu"> 
                            <div class="selectTri">
                                     
                                <select id="cboAnio" class="selector" onchange='filtroClaseEstu("../../Controlador","EstuControlador.php",25,"estuFiltro")' class="span3 select1">
    <option value='0'>Seleccione Año</option>
                                                  <?php foreach ($valAn as $anio ) {?>
                                              <option value='<?php echo $anio['CODIGO'];?>'><?php echo $anio['ANIO'];?></option>
                                               
                                                   <?php } ?>
</select>
                             <select  id="cboNivel" class="selector"
                                     onchange="filtroClaseEstu('../../Controlador','EstuControlador.php',25,'estuFiltro')">
                                        
                                        <option value="0">Seleccione Nivel</option>
                                        <?php foreach ($valN as $nivel){?>
                                        <option  value="<?php echo $nivel['CODIGO']?>"><?php echo $nivel['NIVEL']?></option>
                                        <?php }?>
                                    </select>
                               
                               <select id="cboGrado" class="selector" onchange='filtroClaseEstu("../../Controlador","EstuControlador.php",25,"estuFiltro")' class="span3 select1">
    <option value='0'>Seleccione Grado</option>
                                                  <?php foreach ($valG as $grado ) {?>
                                              <option value='<?php echo $grado['CODIGO'];?>'><?php echo $grado['GRADO'].$grado['SUFIJO'];?></option>
                                               
                                                   <?php } ?>
</select>              
                                  <select class="selector" id="cboSeccion" onchange="filtroClaseEstu('../../Controlador','EstuControlador.php',25,'estuFiltro')">
                                        <option value="0">Seleccione Sección</option>
                                        <?php foreach ($valSec as $sec){?>
                                        <option  value="<?php echo $sec['CODIGO']?>"><?php echo $sec['SECCION']?></option>
                                   
     <?php }?>
</select>
                        </div>
                            
                            <div class="block-content collapse in">
                         
                                <div class="span12">
                                           
                            <div class="pull-left">
                                   <a  href='../reportes/rpt_estudiantes_matriculados_xls.php' class="btn btn-success btn-mini"><i class="icon-download"></i> Excel</a>
				<a  href='../reportes/rpt_estudiantes_matriculados_pdf.php' class="btn btn-danger btn-mini"><i class="icon-print"></i> PDF</a>		
                            </div><br><br>
                                    <div id="estuFiltro" >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					 <th></th>
				        <th>Dni</th>
					<th>Estudiante</th>
                                        <th>Sexo</th>
                                        <th>Fecha <br>
                                         Asignacion
                                        </th>
                                        <th>Estado</th>
                                         <?php if($opcion!=5){?>
	       
              
                 <th></th>
                 <?php if($opcion==1){ ?>
                <th></th>
                   <?php } ?>
                
                <?php } ?>
                                          <th></th>
					
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valEstu as $estu) { 
           $foto=$estu['FOTO'];
           $cod=$estu['CODIGO'];
           $matri_id=$estu['MATRI_ID'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$estu['ESTADO'];
              if($estado=="A"){
                  $esta='Habilitado';
              }else {
                  $esta='Inhabilitado';
              }
           
              $etu_nom=$estu['ESTUDIANTE'];
            ?>
                    
                    <?php if($estado=='I' and $opcion==5){ ?>
                    <tr>
                        <th></th>
				        <th></th>
					<th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th> 
                    </tr>
                      <?php  } else { ?>
                    <tr id="<?php echo $matri_id?>">
                         <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td> 
                <td><?php echo $estu['DNI'] ?></td> 
		<td><?php echo $etu_nom ?></td>
                <td><?php echo $estu['SEXO'] ?></td> 
	       
                <td><?php echo $estu['FECHA'] ?></td> 
               
             <?php if($opcion==5){?>
	        <td><?php echo $esta ?></td>
                
             <?php } if($opcion!=5){?>
	        <?php  if($estado=="A"){ ?>  
               
                <td width="40" title="Inhabilitar Asignación"> <a class="btn btn-success" href='javascript:accionMatri("../../Controlador","EstuControlador.php",26,24,"<?php echo $matri_id?>","","MiAjax","i")'>Habilitado</a></td>
                <td title="Cambiar de Sección al Estudiante" width="40"><a href='javascript:accionMatri("../../Controlador","EstuControlador.php",26,"","<?php echo $matri_id?>","<?php echo $cod?>","MiAjax","b")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                 <?php }else if($estado=="I"){
                     echo '<td width="40" title="Habilitar Asignación"> <a class="btn btn-warning" href=\'javascript:accionMatri("../../Controlador","EstuControlador.php",26,24,"'.$matri_id.'","","MiAjax","h")\'>Inhabilitado</a></td>                         
                           <td> </td>';
                 }?>
                 <?php if($opcion==1){ ?>
                <td width="40" title="Eliminar Asginación"> <a class="btn btn-danger" href='javascript:accionMatri("../../Controlador","EstuControlador.php",26,"","<?php echo $matri_id?>","<?php echo $cod?>","","e")'><i class="icon-trash icon-large"></i></a></td>
               <?php } } }   ?>  
                
                <td><button title="Consultar Estudiante" type="button" onclick="ver_estu('../../Controlador','EstuControlador.php',15,'MiAjax','<?php echo $etu_nom ?>','<?php echo $cod ?>')" class="btn btn-success"><i class="icon icon-eye-open"></i></button></td>
              <?php } ?>  
		</tbody>
                
                <tfoot>
		<tr>
					
				        
				 <th></th>
				        <th>Dni</th>
					<th>Estudiante</th>
                                        <th>Sexo</th>
                                        <th>Fecha <br>
                                         Asignacion
                                        </th>
                                        <th>Estado</th>
                                         <?php if($opcion!=5){?>
	    
                 <th></th>
                 <?php if($opcion==1){ ?>
                <th></th>
                   <?php } ?>
                
                <?php } ?>
                                          <th></th>
		</tr>
		</tfoot>
	</table>
	</form>	
        <div id="load"> </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
                    </div>


                     </div></div>