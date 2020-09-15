<?php
session_start();
$listaClase=$_SESSION['listaClase'];
$listaProfe=$_SESSION['listaProfe'];
$listaAREA=$_SESSION['listaArea'];
foreach($listaProfe as $IndiceP => $valPro){
    $profe=count($valPro);
}
foreach($listaClase as $IndiceC => $valClase){}
?>	
<?php if($profe>0){?>

                            
<div class="block-content collapse in">
    <div class="span12">
        <div class="tbDatosProfe">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="datos">

		<thead>
		<tr>
					<th>Foto</th>
					<th>Profesor</th>
                                        <th>DNI</th>
                                        <th>Area(s)</th>
		</tr>
		</thead>
		<tbody>

		<tr>
                <?php 
                $foto=$listaProfe['PROFE'][0]['FOTO'];
                if($foto!=null){?>
                <td><img  class="img-polaroid foto_buscado" src="../../View/subidas/<?php echo $foto?>"></td> 
                   <?php }else{?>
                <td><img  class="img-polaroid foto_buscado" src="../../View/subidas/nodisponible.png"></td> 
                    <?php } ?>
	        <td><?php echo $listaProfe['PROFE'][0]['PROFESOR'] ?></td> 
                <td><?php echo $listaProfe['PROFE'][0]['DNI'] ?></td> 
             
                <td><?php foreach ($listaAREA as $area){
                     echo '° '.$area['area_nombre'].'<br>'; }?></td> 
                   
		</tr>
	
		</tbody>
	</table>
        </div>
            
	<form id="FormMante">

            <input type="hidden" name="profe_id" id="profe_id" value="<?php echo $listaProfe['PROFE'][0]['PROFE_ID'] ?>"/>
            <div class="controls">
                <select id="class_id" name="clase_id" class="" required>
                    
                    <option value="0">Seleccione Aula</option>
			<?php foreach($valClase as $clase){?>
		    <option value="<?php echo $clase['CODIGO']; ?>"><?php echo $clase['CLASE']; ?></option>
                        
                        <?php } ?>                              
                </select>
            </div>
            
            <div class="btnBuscar">
         <button id="btnGuardar" type="button"  onclick="grabar('../../Controlador','ProfeControlador.php',25,16,'')"  class="btn btn-primary">Guardar</button>       
            </div>
	</form>	
        
    
<?php }else {?>
<div class="span12">
    <div class="alert alert-success">
        <p>Profesor no encontrado</p>
    </div>
</div >
<?php } ?>


            
<!--     modal horario profesor        -->
<!--<div  class="modal hide fade" id="modalHora"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Horario del Profesor</h4>
        </div>
        <div class="modal-body">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>-->
<!--     modal horario profesor        -->


<div id="cargaModalCurso">
 
</div >