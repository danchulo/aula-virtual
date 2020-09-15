<?php
session_start();
  $listaPersonal=$_SESSION['listaPersonal'];
 
  foreach ($listaPersonal as $IndiceP => $valPerso){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

 <div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                              <div class="pull-right">
                                  
                                  <a  href='../reportes/rpt_personal_xls.php' class="btn btn-success"><i class="icon-print"></i>Reporte Excel</a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Personal</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					<th>Personal</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Dni</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Cargo</th>
                                        <th>Estado</th>
                                        <th>E-mail</th>
                                        <th>Dirección</th>
                                        <th></th>
                                        
	                                
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valPerso as $perso) { 
           $foto=$perso['FOTO'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$perso['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else if($estado="I"){
                  $esta='Inactivo';
              }
              
              $sexo=$perso['SEXO'];
              if($estado=="M"){
                  $sex='Masculino';
              }else {
                  $sex='Femenino';
              }
            ?>
		<tr>
                               
		    <td><?php echo $perso['PERSONAL'] ?></td> 
	            <td><?php echo $sex ?></td> 
                    <td><?php echo $perso['EDAD'] ?></td> 
                    
	            <td><?php echo $perso['DNI'] ?></td> 

                    <td><?php echo $perso['CEL'] ?></td> 
                    <td><?php echo $perso['TEL'] ?></td> 
                     
                    <td><?php echo $perso['CARGO'] ?></td>
                    
	            <td><?php echo $esta ?></td>   
                    <td><?php echo $perso['EMAIL'] ?></td> 
                    <td><?php echo $perso['DIRECCION'] ?></td> 
                    <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td>
		</tr>
        <?php } ?>
	
		</tbody>
                    
                      
                <tfoot>
                     <tr>
					
				        
					<th>Personal</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Dni</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
                                        <th>Cargo</th>
                                        <th>Estado</th>
                                        <th>E-mail</th>
                                        <th>Dirección</th>
                                        <th></th>
	                                
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
