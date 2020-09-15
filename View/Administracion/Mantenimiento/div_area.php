 <?php 
 session_start();
              $lista=$_SESSION['listProfe'];
              $areaa=$lista['LISTA'][0]['AREA'];
                for ($i=0;$i<count($areaa);$i++){
                $cod= $areaa[$i]['area_id'];
                      ?>
                                        <div id='cajaArea' class="controls">
            <div style="border:solid 2px green" id="caja<?php echo $cod?>">
             <button type="button" class="btn btn-danger btn-mini icon icon-remove" onclick='accionArea("../../Controlador","ProfeControlador.php","31","<?php echo $cod?>","","delete")'></button>
             <b><i><?php echo $areaa[$i]['area_nombre']?></b></i></div>
                                          
                                        </div>
                <?php } ?>
                                      <input type="hidden" id="cantidadArea" value="<?php echo $i ?>"/>