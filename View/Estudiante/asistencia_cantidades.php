
 <?php 
session_start();
$lista=$_SESSION['listaCantidadA'];
foreach ($lista as $Indice => $val){}
?>

<div id="block_bg">                             
<div class="pull-right">
                                  
							<a  href='../reportes/rpt_mis_asistencias.php' class="btn btn-warning"><i class="icon-print"></i></a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Asistencias</div>
                            </div>
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                     
                               <div class="tituloNota"><strong>RESUMEN GENERAL DE ASISTENCIAS</strong><br><br><br></div>
                                  
                                    <table  class="table table-bordered"  id="datos">

		<thead>
		<tr>
					<th>Curso</th>
                                        <th >Asistencias</th>
					<th >Faltas</th>
                                        <th >Tardanzas</th>
                                       
		</tr>
		</thead>
		<tbody>
	
	<?php foreach($val as $val2){ ?>
        
		<tr>
                    <td><?php echo $val2['CURSO']?></td>           
		    <td><?php echo $val2['A']?></td>
                    <td><?php echo $val2['F']?></td> 
	            <td><?php echo $val2['T']?></td> 
		</tr>
      
             <?php } ?>
	
		</tbody>
            
	</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
