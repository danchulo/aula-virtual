
 <?php 
session_start();
$lista=$_SESSION['listaCantidadA'];
$listaAño=$_SESSION['listaAño'];
$nombre_estu=$_SESSION['nombre_estu'];
$lista_clase=$_SESSION['listaMiClase']; 
foreach ($lista as $Indice => $val){}
foreach ($listaAño as $Indic => $valA){}
?>
  <div class="selectTri">
                             <select  id="cboAnio" class="selectAnio" onchange='filtroAnioAsis("../../Controlador","EstuControlador.php",23,"filtroAsistencia")' class="span3 select1">
                                             	
                                              <option value='0'>Seleccione año</option>
                                                  <?php foreach ($valA as $año ) {?>
                                              <option selected value='<?php echo $año['CODIGO'];?>'><?php echo $año['NOMBRE_AÑO'];?></option>
                                               
                                                   <?php } ?>
                                            </select>
                                         <input type="hidden" id="anio_id" />
                                  
                        </div>

                               <div class="tituloNota"><strong>RESUMEN GENERAL DE ASISTENCIAS</strong><br><br><br></div>
                              
                                    <div><b id="nombre_estu">Estudiante: <?php echo $nombre_estu?></b></div>
                                    <div><b>Salón de clase:  <?php echo $lista_clase['MICLASE'][0]['CLASE'];?></b></div><br>
                                     <div id="filtroAsistencia">
                                    <table  class="table table-bordered" style="width: 100%;" id="datos">

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
                        <!-- /block -->
