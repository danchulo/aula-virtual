
 <?php 
session_start();
$notas=$_SESSION['NotasCursos']; 
$tri=$_SESSION['trimestre']; 
$listaAño=$_SESSION['listaAño'];
$nombre_estu=$_SESSION['nombre_estu'];
$estu_id=$_SESSION['estu_id'];
$lista_clase=$_SESSION['listaMiClase']; 
foreach ($tri as $IndiceTri => $valTri){}
foreach ($listaAño as $Indic => $valA){}
foreach ($notas as $Indice => $val){}
?>
<div class="span9" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            
                            <div class="pull-right" id="cambiaReporte">
                                  
                               <a  href='../reportes/rpt_ver_estus_notas_pdf.php' class="btn btn-warning"><i class="icon-print"></i></a>
				 <a class="btn btn-success" href="javascript:consultaSimple('../../Controlador','EstuControlador.php','24','MiAjax')"><i class="icon-list"></i> Lista</a>
                            
                             </div>
                
                            <div class="navbar navbar-inner block-header">
                               <div class="muted pull-left">Consultando estudiante</div>
                            </div>
                            <div  class="block-content collapse in">
                                                     <div class="pull-left">
			    <ul class="nav nav-pills">
				<li id="nav_notas" class="active">
					<a id="notas" href="javascript:nav_notas_estu('../../Controlador','EstuControlador.php',21,22,'filtroInfoEstu','cambiaReporte')">Notas del estudiante</a>
				</li>
				<li id="nav_asistencia" class="">
					<a id="asistencias" href="javascript:nav_sistencias_estu('../../Controlador','EstuControlador.php',19,20,'cambiaReporte','filtroInfoEstu')">Asistencias del Estudiante</a>
				</li>
				</ul>
	</div>
                                <div id="filtroInfoEstu" class="span11">
                           
                        <div class="selectTri">
                             <select  id="cboAnio" class="selectAnio" onchange='filtroAnio2("../../Controlador","EstuControlador.php",16,17,"cboTri","notaFiltro")' class="span3 select1">
                                             	
                                              <option value='0'>Seleccione año</option>
                                                  <?php foreach ($valA as $año ) {?>
                                              <option selected value='<?php echo $año['CODIGO'];?>'><?php echo $año['NOMBRE_AÑO'];?></option>
                                               
                                                   <?php } ?>
                                            </select>
                                         <input type="hidden" id="anio_id" />
                                     
                                    <select  id="cboTri"
                                     onchange="filtrarTrimestreEst('../../Controlador','EstuControlador.php',18,'notaFiltro')">
                                        
                                        <option value="0">Eliga Trimestre</option>
                                        <?php foreach ($valTri as $trimestre){?>
                                        <option selected value="<?php echo $trimestre['TRIMESTRE_ID']?>"><?php echo $trimestre['TRIMESTRE_CARGA']?></option>
                                        <?php }?>
                                    </select>
                        </div>
                       
			<div id="notaFiltro">
                              
                                    <div class="tituloNota"><strong>NOTAS DEL <?php echo $notas['MISNOTAS'][0]['TRIMESTRE'] ?> </strong><br><br><br></div>
                                    <div><b id="nombre_estu">Estudiante: <?php echo $nombre_estu?></b></div>
                                    <div><b>Salón de clase:  <?php echo $lista_clase['MICLASE'][0]['CLASE'];?></b></div><br>
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
                        </div>
                        <!-- /block -->
                    </div>


                </div>
