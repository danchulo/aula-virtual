<?php
session_start();
  $listaEstu=$_SESSION['listaEstuMatricula'];
  $opcion=$_SESSION['op'];

    foreach ($listaEstu as $IndiceE => $valEstu){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

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