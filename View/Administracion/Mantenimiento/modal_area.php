 
<?php
session_start();
$listaArea=$_SESSION['listArea'];
  foreach ($listaArea as $IndiceA => $valArea){}
?>
 <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione Area(s)</h4>
        </div>
        <div class="modal-body">
            <table  class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">
            <thead>
             
                <tr>
               
                   <th>Areas</th>
                </tr>
                
            </thead>
            <tbody>
                
              
               <?php 
               									
		  foreach($valArea as $area){  
                  $codi=$area['CODIGO'];
                ?>
                     
		
               <tr onclick='accionArea("../../Controlador","ProfeControlador.php","31","<?php echo $codi?>","<?php echo $area['AREA'];?>","insert")' id='area<?php echo $codi;?>'>
               
                   <th><?php echo $area['AREA'];?></th>
               </tr>
        <?php } ?>
                   
           </tbody>
            <tfoot>
                <tr>
                   
                   <th>Areas</th>
                </tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>