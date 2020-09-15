<?php
session_start();
  $listaProfe=$_SESSION['listaProfe'];
  foreach ($listaProfe as $IndiceP => $valProfe){}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

 <div class="span9 tamaño" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="pull-right">
                                  
                                <a  href='../reportes/rpt_profesores_xls.php' class="btn btn-success btn-mini"><i class="icon-print"></i>Reporte Excel</a>
                                 <a  href='../reportes/rpt_profesores_pdf.php' class="btn btn-danger btn-mini "><i class="icon-print"></i>Reporte PDF</a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Profesores</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form >
	<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

		<thead>
		<tr>
					<th></th>
					<th>Profesor</th>
                                        <th>Sexo</th>
                                        <th>Dni</th>
                                        <th>Edad</th>
                                        <th>Area(s)</th>
                                        <th>Estado</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
					
                                        <th>E-mail</th>
                                        <th>Dirección</th>
		</tr>
		</thead>
		<tbody>
	
	<?php foreach ($valProfe as $pro) { 
              $foto=$pro['FOTO'];
                if($foto==null){
               $foto="nodisponible.png";
                }
                
              $estado=$pro['ESTADO'];
              if($estado=="A"){
                  $esta='Activo';
              }else {
                  $esta='Inactivo';
              }
              
              $sexo=$pro['SEXO'];
          
            ?>
		<tr>
                    <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto ?>"></td>           
		    <td><?php echo $pro['PROFESOR'] ?></td>
                    <td><?php echo $sexo ?></td> 
	            <td><?php echo $pro['DNI'] ?></td> 
                    <td><?php echo $pro['EDAD'] ?></td> 
                      <td><?php 
                $are=$pro['AREA'];
                foreach ($are as $area) {
                     echo '<br>-'.$area['area_nombre'].'<br>'; }?></td> 
	            <td><?php echo $esta ?></td> 
                    <td><?php echo $pro['CEL'] ?></td> 
                    <td><?php echo $pro['TEL'] ?></td> 
                  
                     <td><?php echo $pro['EMAIL'] ?></td> 
                    <td><?php echo $pro['DIRECCION'] ?></td> 
                   
		                
		</tr>
        <?php } ?>
	
		</tbody>
                   
                <tfoot>
                      <tr>
					<th></th>
					<th>Profesor</th>
                                        <th>Sexo</th>
                                        <th>Dni</th>
                                        <th>Edad</th>
                                        <th>Area(s)</th>
                                        <th>Estado</th>
                                        <th>Celular</th>
                                        <th>Telefono</th>
					
                                        <th>E-mail</th>
                                        <th>Dirección</th>
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
