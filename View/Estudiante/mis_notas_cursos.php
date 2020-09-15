
 <?php 
session_start();
$notas=$_SESSION['NotasCursos']; 
$tri=$_SESSION['trimestre']; 
foreach ($tri as $IndiceTri => $valTri){}
foreach ($notas as $Indice => $val){}
$cant=count($val);
?>

<div id="block_bg"> 
          <?php if($cant!=0){?>
<div class="pull-right">
                                  
							<a  href='../reportes/rpt_mis_notas.php' class="btn btn-success"><i class="icon-print"></i> Imprimir Notas</a>
						</div>
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Lista de Notas</div>
                            </div>
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
	              <div class="selectTri">
                          <select  id="cboTri"
                                     onchange="filtrarTrimestre('../../Controlador','EstuControlador.php',5,'notaFiltro')">
                                        
                                        <option value="0">Eliga Trimestre</option>
                                        <?php foreach ($valTri as $trimestre){?>
                                        <option value="<?php echo $trimestre['TRIMESTRE_ID']?>"><?php echo $trimestre['TRIMESTRE_CARGA']?></option>
                                        <?php }?>
                                    </select>
                                 
                                </div>
                              
                                <div id="notaFiltro">
                              
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
                                </div>
                            
                                    
                            </div>
                        </div>
            <?php }else {?>
  
    <div class="alert alert-warning">
        <b>Usted no se encuentra matriculado el presente año</b>
    </div>
       
    <?php } ?>
                        <!-- /block -->
</div>