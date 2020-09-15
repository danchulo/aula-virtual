<?php
session_start();
  $listaEstu=$_SESSION['listaEstuCom'];
 
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
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Estudiantes</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					
				      <th>Foto</th>
					<th>Estudiante</th>
                                        <th>Dni</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                            <th>Distrito</th>
                                        <th>Usuario</th>
                                    
                                        <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                         <th>E-mail</th>
					
                                        <th>Estado</th>
                                     
					
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
                    <tr >
                              <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td> 
		<td><?php echo $etu_nom ?></td>
                <td><?php echo $estu['DNI'] ?></td>
                <td><?php echo $sex ?></td>  
                <td><?php echo $estu['EDAD'] ?></td> 
              
                <td><?php echo $estu['DISTRITO'] ?></td> 
                <td><?php echo $estu['USUARIO'] ?></td> 
                <td><?php echo $estu['DIRECCION'] ?></td> 
            
                <td><?php echo $estu['CEL'] ?></td> 
                <td><?php echo $estu['TEL'] ?></td> 
                <td><?php echo $estu['EMAIL'] ?></td> 
        
	        <td><?php echo $esta ?></td>
                 
                 

               
		</tr>
        <?php } ?>
	
		</tbody>
                
                <tfoot>
		<tr>
					 <th>Foto</th>
					<th>Estudiante</th>
                                        <th>Dni</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Distrito</th>
                                        <th>Usuario</th>
                                        <th>Dirección</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                         <th>E-mail</th>
					
                                        <th>Estado</th>
                                       
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