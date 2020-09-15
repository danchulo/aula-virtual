<?php
session_start();
$listaEditarCurso=$_SESSION['listaEditarCurso'];//Para boton editar
$listaClase=$_SESSION['listaClase'];
$listaCurso=$_SESSION['listaEditarCurso'];
$listaProfe=$_SESSION['listaEditarProfe'];
foreach($listaEditarCurso as $IndiceEC => $valEditarC){}
foreach($listaClase as $IndiceC => $valClase){}
foreach($listaCurso as $IndiceCu => $valCurso){}

?>	

<div class="navbar navbar-inner block-header">
    <div class="muted pull-left">Asignar Profesor</div>
</div>
                            
<div class="block-content collapse in">
    <div class="span12">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					<th></th>
					<th>Profesor</th>
                                        <th>Area</th>
		</tr>
		</thead>
		<tbody>

		<tr>
                <?php 
                $foto=$listaProfe['PROFE'][0]['FOTO'];
                if($foto!=null){?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/<?php echo $foto?>"></td> 
                   <?php }else{?>
                <td><img  class="img-polaroid img_tabla" src="../../View/subidas/nodisponible.png"></td> 
                    <?php } ?>
	        <td><?php echo $listaProfe['PROFE'][0]['PROFESOR'] ?></td> 
                <td><?php echo $listaProfe['PROFE'][0]['AREA'] ?></td> 
                   
		</tr>
	
		</tbody>
	</table>
        
	<form id="FormMante">
         
            <div class="controls">
              <?php echo $clase['CLASE']; ?>
            </div>
        
              <a data-toggle="modal" href="#modalCurso">           
                                      <button id="" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Curso(s)</button>
                                  </a>
            
          <table id="cursos" class="table table-striped table-bordered table-condensed table-hover">
                              
                            <thead style="background-color:#A9D0F5">
                              
                                 <th>Eliminar</th>
                                 <th>Curso</th>                               
                             </thead>
                      
                             <tbody>
                       
                                     <tr class="filas" id="fila<?php echo $curso['CURSO_ID']?>">
    	 
                                          <td><button type="button" class="btn btn-danger" onclick="accionCurso('../../Controlador','ProfeControlador.php',12,'<?php echo $curso['CURSO_ID']?>','delete');eliminarCurso('<?php echo $curso['CURSO_ID']?>')">X</button></td>
                                          <td><?php echo $curso['CURSO']?></td>
                                          <td><input type="hidden" id="curso_id" name="curso_id" value="<?php echo $curso['CURSO_ID']?>"><?php echo $curso['CURSO']?></td>
                                     </tr>
                                   <input type="hidden" id='profesor_clase_curso_id' value="<?php echo $curso['CURSOPROFE'][0]['PROFECURSO_ID']?>"/>               
                            
                              </tbody>
                                
                            </table>  
	</form>	
   </div>
</div>

 <div  class="modal hide fade" id="modalTema"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Curso(s)</h4>
        </div>
        <div class="modal-body">
            <table  class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
            <thead>
             
                <tr>
                   <th>Añadir</th>
                   <th>Curso</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               <?php 
                  
                     foreach ($valCurso as $curso){ ?>
             
               <tr id='curso<?php echo $curso['CURSO_ID'];?>'>
                   <th><button class="btn btn-warning" onclick="anidado2('<?php echo $curso['CURSO_ID'];?>','../../Controlador','ProfeControlador.php',18,'insert','<?php echo $curso['CURSO'];?>')"><span><i class="icon icon-plus"></i></span></button></th>
                   <th><?php echo $curso['CURSO'];?></th>
               </tr>
        <?php }?>
                   
           </tbody>
            <tfoot>
                <tr>
                   <th>Añadir</th>
                   <th>Curso</th>
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