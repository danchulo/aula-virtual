<?php session_start();

$asistencia_estu=$_SESSION['VerAsistenciaEstu']; //para boton ver
$asistencia_tema=$_SESSION['VerTema']; //para boton ver
$nueva_asistencia_estu=$_SESSION['NuevaAsistenciaEstu']; //para boton nueva asistencia
$lista_tema=$_SESSION['ListaTema'];

// foreach para obetener el array
foreach ($asistencia_estu as $IndiceAE => $valAsisEstu){}
foreach ($asistencia_tema as $IndiceAT => $valAsisTema){}
foreach ($lista_tema as $IndiceT => $valTema){}
foreach ($nueva_asistencia_estu as $IndiceA => $valNueAsisEstu){}

$cantidad= count($valAsisEstu);

if($cantidad>0){ // Si la lista viene con registros entonces guardamos el valor mostrar en la variable mostrar
    
$mostrar=$asistencia_estu['LISTAAE'][0]['MOSTRAR'];

}
 else { //si es la primera vez que va a pasar asistencia. entonces mostramos 
   $mostrar="si"; 
}
$cantidadTema=count($valTema);
$cantidades= count($valNueAsisEstu);
$cantTema= count($valAsisTema);

 ?>

                            
<iframe style="display: none" onload="fecha_hoy();cargaTablaJQUERY()"></iframe>

<div class="filtroOver" >

        <div class="asistencia">
                                  <div class="titulo"><strong>Asistencias del curso</strong></div>
                              
                                  <?php if($cantidad>0 ){ //para boton ver ?>
                                  
                               <div class="row-fluid">
                                   <p><b><?php echo ucfirst($asistencia_estu['LISTAAE'][0]['FECHA'])?></b> </p>
                               </div>
                                  
                                  <?php } else {// para botón nuevo ?>

                                   <div class="row-fluid">
                                       <input type="date" name="fecha_hoy" id="fecha_hoy" />
                                   </div>
                                  
                                    <?php } ?>
                                  <?php if($mostrar=='si'){//para boton ver?>
                                  <a data-toggle="modal" href="#modalTema">           
                                      <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Tema(s)</button>
                                  </a>
                           <?php } ?>
                             
              <form name="formAsis" id="formAsis">
                
                        <table id="temas" class="table table-striped table-bordered table-condensed table-hover">
                              
                            <thead style="background-color:#A9D0F5">
                               <?php if($mostrar=='si'){ ?>
                                 <th>Eliminar</th>
                                   <?php   } ?>
                                 <th>Unidad</th>
                                 <th>Tema</th>
                               
                             </thead>
                      
                             <tbody>
                              
                                   <?php if($cantidad>0){
                                   
                                      foreach ($valAsisTema as $asis_tem) {   ?>
                                    
                                     <tr class="filas" id="fila<?php echo $asis_tem['TEMA_ID']?>">
    	                                <?php if($mostrar=='si'){ ?>
                                          <td><button type="button" class="btn btn-danger" onclick="accionTema('../../Controlador','ProfeControlador.php',12,'<?php echo $asis_tem['TEMA_ID']?>','delete');eliminarTema('<?php echo $asis_tem['TEMA_ID']?>')">X</button></td>
                                         <?php   } ?>
                                          <td><?php echo $asis_tem['UNIDAD']?></td>
                                          <td><input type="hidden" id="tema_id" name="tema_id" value="<?php echo $asis_tem['TEMA_ID']?>"><?php echo $asis_tem['TEMA']?></td>
                                     </tr>
                                   <input type="hidden" id='asistencia_id' value="<?php echo $asistencia_estu['LISTAAE'][0]['ASISTENCIA_ID']?>"/>               
                                   <?php } } else {//Para el boton nuevo, no se mostrará la tabla con registros
                                    ?> 
             
                                    <?php } ?>
                              </tbody>
                                
                            </table>
                  <div class="alert alert-success alert_profe_hora"> Lista de Estudiantes</div>    
                            <table  class="table table-bordered tbasis" >
                              
                                 
                               <tbody>
                                    <tr>
                                       <td>N° de Orden</td>
                                       <td>Estudiante</td>
                                       <td></td>
                                   </tr>
                                         <?php 
                                   if($cantidad>0){
                                         //para el boton ver 
                                       
                                       for ($i=0;$i<$cantidad;$i++){?>
                                  
                                     <tr>
                                          <td>   <?php echo ($i+1)?></td>
                                          <td>   <?php echo $asistencia_estu['LISTAAE'][$i]['N_COMPLETO'] ?></td>
                                          <td>
                                                        <?php $tipo=  $asistencia_estu['LISTAAE'][$i]['TIPO']; ?>
                                                     
                                                         	  <?php if($mostrar=="si"){ ?>
                                              
                                              <select>
                                                 
                                                    <?php if($tipo=='F'){?>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','F')">Faltó</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','T')">Tardanza</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','A')">Asistió</option>
                                                    
                                                   <?php } else if($tipo=='A'){?>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','A')">Asistió</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','F')">Faltó</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','T')">Tardanza</option>
                                                    <?php } else{?>
                                                    <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','T')">Tardanza</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','A')">Asistió</option>
                                                  <option onclick="editarAsistencia('../../Controlador','ProfeControlador.php',9,'<?php echo $asistencia_estu['LISTAAE'][$i]['ESTUID'] ?>','F')">Faltó</option>
                                                    <?php } ?>
                                             </select>
                                          
                                                                 <?php } else {//mostrar esto cuando la clase ya haya finalizado
                                                                   ?>
                                                                               <?php if($tipo=='F'){?>
                                                                               <p>Faltó</p>
                                                                               <?php } else if($tipo=='A'){?>
                                                                               <p>Asistió</p>
                                                                               <?php } else {?>
                                                                               <p>Tardanza</p>                   
                                                                               <?php } ?>
                                                                         
                                                                   <?php } ?>
                                            
                                            </td>
                                      </tr>
                                             
                                       
                                   <?php } } else {//para botón nueva asistencia
                                            
                                       for ($i=0;$i<$cantidades;$i++){ ?>

                                            <tr>  
                                                 <td name="cantidad"> <?php echo ($i+1)?></td>
                                                 <td>  <?php echo $nueva_asistencia_estu['LISTAEA'][$i]['N_COMPLETO'] ?>
                                                     <input type="hidden" id="estudiante_id" name="estudiante_id[]" value="<?php echo $nueva_asistencia_estu['LISTAEA'][$i]['ESTUDIANTE_ID'] ?>" />
                                                 </td>
                                                 <td>
                                                 
                                                     A <input class="miRadio" type="radio" value="A" required="" name="letra<?php echo $i?>"  />
                                         T <input class="miRadio" type="radio" value="T" name="letra<?php echo $i?>"  />
                                         F <input class="miRadio" type="radio" value="F" name="letra<?php echo $i?>" />
                                                
                                                 </td>
                                             </tr>  

                                   <?php } } ?> 
                                             
                                           
                                    </tbody>
                               </table> 
                  <p><b>Cantidad de estudiantes:</b>  <?php echo $i ?></p>
                  <a id="asistencia"  href="javascript:menu_curso('../../Controlador','ProfeControlador.php',6,'AjaxNavegacion','')" class="btn btn-success">Volver</a>
                      
                       <?php if($cantidad>0) {?> 
                            
                          <?php } else{?> 
                     
                      <button id="btnGuardar" type="button"  onclick="guardarAsistencia('../../Controlador','ProfeControlador.php',8,'AjaxNavegacion')"  class="btn btn-primary">Grabar Asistencia</button>
                           
                          <?php } ?>  
             </form>
                      
                                  
                            </div>
 </div>

    <div  class="modal hide fade" id="modalTema"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Tema</h4>
        </div>
        <div class="modal-body">
            <table  class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
            <thead>
             
                <tr>
                
                   <th>Unidad</th>
                   <th>Tema</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               <?php 
                  
                     foreach ($valTema as $tema){ ?>
             
                <tr onclick="anidado('<?php echo $tema['TEMA_ID'];?>','../../Controlador','ProfeControlador.php',12,'insert','<?php echo $tema['UNIDAD'];?>','<?php echo $tema['TEMA'];?>')" id='tema<?php echo $tema['TEMA_ID'];?>'>
          
                   <th><?php echo $tema['UNIDAD'];?></th>
                 
                   <td><?php echo $tema['TEMA'];?></td>

               </tr>
        <?php }?>
                   
           </tbody>
            <tfoot>
                <tr>
                 
                   <th>Unidad</th>
                   <th>Tema</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
    
