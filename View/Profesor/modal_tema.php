    
<?php session_start();

$lista_tema=$_SESSION['Tema']; //para boton ver

// foreach para obetener el array
foreach ($lista_tema as $Indice => $valT){}

 ?>


<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>

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
                   <th>Añadir</th>
                   <th>Unidad</th>
                   <th>Tema</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               <?php 
                  
                     foreach ($valT as $tema){ ?>
             
               <tr id='tema<?php echo $tema['TEMA_ID'];?>'>
                   <th><button class="btn btn-warning" onclick="anidado('<?php echo $tema['TEMA_ID'];?>','../../Controlador','ProfeControlador.php',12,'insert','<?php echo $tema['UNIDAD'];?>','<?php echo $tema['TEMA'];?>')"><span><i class="icon icon-plus"></i></span></button></th>
                   <th><?php echo $tema['UNIDAD'];?></th>
                   <th><?php echo $tema['TEMA'];?></th>
               </tr>
        <?php }?>
                   
           </tbody>
            <tfoot>
                <tr>
                   <th>Añadir</th>
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