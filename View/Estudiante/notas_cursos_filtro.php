 <?php 
session_start();
$notas=$_SESSION['NotasCursos'];
foreach ($notas as $Indice => $val){}
?>
 <div class="tituloNota"><strong>NOTAS DEL <?php echo $notas['MISNOTAS'][0]['TRIMESTRE'] ?> </strong><br><br><br></div>
<table class="table table-bordered" style="width: 100%;" id="datos">

		<thead>
		<tr>
					<th>Curso</th>
                                        <th title="Examen Mensual 1">E1</th>
					<th title="Examen Mensual 2">E2</th>
                                        <th title="Examen Trimestral">ET</th>
                                        <th title="Nota del Libro">NL</th>
                                        <th title="Nota del Cuaderno">NC</th>
                                         <th title="Nota Actitudinal">NA</th>
                                        <th>Ponderado</th>
					
		</tr>
		</thead>
		<tbody>
	
	<?php foreach($val as $val2){ ?>
        
		<tr>
                    <td><?php echo $val2['CURSO']?></td>           
		    <td><?php echo $val2['E1']?></td>
                    <td><?php echo $val2['E2']?></td> 
	            <td><?php echo $val2['ET']?></td> 
                    <td><?php echo $val2['NL']?></td> 
                    <td><?php echo $val2['NC']?></td> 
                    <td><?php echo $val2['NA']?></td> 
                    <td><?php echo $val2['P']?></td> 
		</tr>
      
             <?php } ?>
	
		</tbody>
            
	</table>