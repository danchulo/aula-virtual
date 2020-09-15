<?php 

session_start();
$listaClase=$_SESSION['listaMiClase']; 
foreach ($listaClase as $cantCursos => $valC)	{									
			 $cantidad=  sizeof($valC);										
			} 	

if($cantidad>0){
    
$listaAño=$_SESSION['listaAño'];
foreach ($listaAño as $cantAños =>$val ){										
 
}		

?> 

<iframe style="display: none"onload="play()"></iframe>

   
<div id="AjaxClase" class="MiClase">
<div class="navbar navbar-inner block-header cabecera-clase">
   
                            <div id="count_class" class="muted pull-right">
										
                               
                                <span>Cantidad de cursos: </span><span id="cantidad" class="badge badge-info"><?php echo $cantidad?></span> <!--Solo tiene que ir el conteo que se mandará a la hora de que ingrese el usuario-->
                                
                            </div>
                        
								</div>

<div  class="alert alert-info filtro-clase">
    
                                              <select  id="cboAnio" onchange='filtro("../../Controlador","EstuControlador.php","AjaxCurso")' class="span3 select1">
                                             	
                                              <option value='0'>Seleccione año</option>
                                                  <?php foreach ($val as $año ) {?>
                                               <option value='<?php echo $año['CODIGO'];?>'><?php echo $año['NOMBRE_AÑO'];?></option>
                                               
                                                   <?php } ?>
                                            </select>

</div>

    
    <div id='AjaxCurso' class="Clases">

<div class="alert tituloClase" >
    <p><?php echo $listaClase['MICLASE'][0]['CLASE'];?></p>                            
 </div>
   
    
                            <div class="block-content2 collapse in">
                                <div class="span13">
                               	
                                    <ul	 id="da-thumbs" class="da-thumbs">
									
                                                        <?php foreach ($valC as $curso){?>
											<li id="del<?php echo $curso['CURSOID'];?>">
                                                                                            
												<a onclick="infoCurso()" href="javascript:ingresoClase('../../Controlador','EstuControlador.php',3,'<?php echo $curso['CURSOID'];?>','','block')">
                                                                                                  
                                                                                                  
                                                                                                    <img  src ="../subidas/<?php echo $curso['FOTO']?>" style="height:124px; width:140px" class="img-polaroid" alt="">
													 <div>
													<span><p class="class" ><?php echo $curso['PROFE'];?></p></span>
                                                                                                       
													</div>
												</a>
                                                                                       
                                                                                             <p class="class"><?php echo $curso['CURSO'];?></p>
												   
											</li>
                                                                                    
                                                                                         <?php }?>
                                                                                        
                                                                                        
                                                                                     
                                                                                        
                                                                                        
                                    </ul>
                                    
  <?php } else{?>
       
    
                            <div class="block-content collapse in">
                                <div class="span12" >
				
                                    <div class="alert alert-danger" style="margin-top: 33px;"><strong>Estimado estudiante, usted no se encuentra matriculado.</strong>
                                    </div>
                                         </div>
                                 </div>
                                    <?php }?>
                                    
                                    
                                   
                                   
                                </div>
                                    
                                </div>
                            </div>

</div>