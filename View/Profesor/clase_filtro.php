
<?php 
session_start();

$listaClase=$_SESSION['listaMiClase']; 
foreach ($listaClase as $IndiceC => $ValC ){
     $cantidad=  sizeof($ValC);
    
}
?> 


                   
<iframe onload="cantidad();play()" style="display: none"></iframe>

<input id='canti' style="display:none"value='<?php echo $cantidad ?>'>
                               
<div class="span12 ">
	
						<ul	 id="da-thumbs" class="da-thumbs">
									
                                                                   <!-- Solo llegará el id del usuario que a ingresado -->
                                         
    
                                                                    <?php foreach ($ValC as $clase){?>
											<li id="del<?php echo $clase['CODIGO'];?>">
                                                                                            
												<a onclick="clickClase()" href='javascript:ingresoClase("../../Controlador","ProfeControlador.php",3,<?php echo $clase['CODIGO'];?>,"<?php echo $clase['CLASE'];?>","block")'>
                                                                                                  
														<img src ="../Imagenes/thumbnails.jpg" width="124" height="140" class="img-polaroid" alt="">
													<div>
													<span><p class="class"><?php echo $clase['CLASE'];?></p></span>
													</div>
												</a>
                                                                                       
                                                                                             <p class="class"><?php echo $clase['CLASE'];?></p>
												
                                                                                               
											</li>
                                                                                      
									<?php } ?>
                                                                   
                                                                        
									</ul>
                                    
                                    
                                    
                                </div>
