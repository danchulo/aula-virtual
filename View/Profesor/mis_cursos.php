<?php 
session_start();
$Cursos=$_SESSION['Mis_Cursos']; 
$Clase=$_GET['clase']; 
$clase_id=$_GET['clase_id']; 
foreach ($Cursos as $IndiceC => $valC){
	
}
$cantidadC= count($valC);
?> 
     


            <iframe style="display: none" onload="play()"></iframe>
                        <!-- block -->
                   
                            <div class="navbar navbar-inner block-header cabecera-clase">
                                <div id="" class="muted pull-right">
				
					<span id="cantidad_de">Número de cursos:</span>	 <span id="cant" class="badge badge-info"><?php echo $cantidadC; ?></span>
								</div>
                            </div>
                            
                            <div class=" alert tituloClase profe" >
    <p id="nombre_clas" class="clase-nombre"><?php echo $Clase ?></p>     
    <input id="clase_id" type="hidden" value="<?php echo $clase_id ?>">
 </div>   
                        
                         <div  class="clase-profe" >
<div class="block-content collapse in">
     

                                   <p class="titulo-estu">Mis Cursos</p>
                               
                                <div class="span12">
                                     
									<ul	 id="da-thumbs" class="da-thumbs">
										   <?php foreach ($valC as $curso){?>
											<li id="del<?php echo $curso['PROFE_CLASEID'];?>">
                                                                                            
												<a onclick="infoCurso()" href="javascript:ingresoCursos('../../Controlador','ProfeControlador.php',5,'<?php echo $curso['PROFE_CLASEID'];?>','<?php echo $clase_id;?>','<?php echo $Clase;?>','block')">
                                                                                                  
                                                                                                  
                                                                                                      <img  src ="../Imagenes/thumbnails.jpg" width="124" height="140" class="img-polaroid" alt="">
													 <div>
													<span><p class="class" >Entrar</p></span>
                                                                                                       
													</div>
												</a>
                                                                                       
                                                                                             <p class="class"><?php echo $curso['CURSO'];?></p>
												   
											</li>
                                                                                    
                                                                                         <?php }?>
                                                                                        
                                                                                        
									</ul>
                                 
											
                                </div></div></div>