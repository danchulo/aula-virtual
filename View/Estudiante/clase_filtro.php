
<?php 
session_start();

$listaClase=$_SESSION['listaMiClase'];
foreach ($listaClase as $cantCursos => $valC)	{									
			 $cantidad=  sizeof($valC);										
			}


?> 
<iframe style="display: none" onload="cantidad();play()"></iframe>

<input id='canti' type="hidden" value='<?php echo $cantidad ?>'> <!-- Obtiene la cantidad para ser recuperado por el metodo cantidad() -->

<div class="alert tituloClase" >
 
    <h4 id="nombre_clase"><p> <?php echo $listaClase['MICLASE'][0]['CLASE'];?></p>                         
 
</div>

                            <div class="block-content collapse in">
                                
                                
                                <div class="span13">
										
                                      
                                   
						<ul	 id="da-thumbs" class="da-thumbs">
									
                                                                   <!-- Solo llegará el id del usuario que a ingresado -->
                                         

                                                                         <?php 
                                                                               
                                                                         foreach ($valC as $clase){?>
											<li>
                                                                                            

                                                                                                  <a onclick="clase()" href="javascript:ingresoClase('../../Controlador','EstuControlador.php',3,'<?php echo $clase['CURSOID'];?>','AjaxCurso')">
													  
                                                                                                      <img  src ="../Imagenes/thumbnails.jpg" width="124" height="140" class="img-polaroid" alt="">
													<div >
													<span><p class="class"><?php echo $clase['PROFE'];?></p></span>
													</div>
												</a>
                                                                                       
                                                                                             <p class="class"><?php echo $clase['CURSO'];?></p>
												
											</li>

                                                                                         <?php }?>
                                                </ul>
                                     
                                    </div>
                                    
                            </div>