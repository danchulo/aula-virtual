<?php 
session_start();
$listaCurso=$_SESSION['cursosEncontrados'];
foreach($listaCurso as $IndiceCu => $valCurso){}
?>

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
                   <th><button class="btn btn-warning" onclick="anidado2('<?php echo $curso['CURSO_ID'];?>','<?php echo $curso['CURSO'];?>')"><span><i class="icon icon-plus"></i></span></button></th>
                   <th><?php echo $curso['CURSO'];?></th>
               </tr>
        <?php } ?>
                   
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
