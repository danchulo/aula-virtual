
 <?php 
session_start();
$lista=$_SESSION['listaCantidadA'];
//$nombre_estu=$_SESSION['nombre_estu'];
//$lista_clase=$_SESSION['listaMiClase']; 
foreach ($lista as $Indice => $val){}
?>
 
    <table class="table table-bordered" style="width: 100%;" id="datos">

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
  <!-- /block -->
