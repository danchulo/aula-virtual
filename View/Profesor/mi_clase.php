<?php 
session_start();
$listaClase=$_SESSION['listaMiClase']; 
foreach ($listaClase as $cantClase => $valC)	{									
			 $cantidad=  sizeof($valC);										
			} 	
if($cantidad>0){
    
$listaAño=$_SESSION['listaAño'];
foreach ($listaAño as $cantAños =>$val ){											
}			
$opcion=$_SESSION['op'];
?> 

<!--es el parametro de una funcion que es mandado de profecontrolador mediante get y solo obtenemos el value para la consulta a la bd-->
<iframe style="display: none" onload="play()"></iframe>
<div id="AjaxClase" class="MiClase">
<div class="navbar navbar-inner block-header cabecera-clase">
   
                            <div id="count_class" class="muted pull-right">
					
                                <span>Cantidad de clase: </span><span id="cantidad" class="badge badge-info"><?php echo $cantidad?></span> <!--Solo tiene que ir el conteo que se mandará a la hora de que ingrese el usuario-->
                              
                            </div>
                        
								</div>

<div  class="alert alert-info filtro-clase">
     
    <select  id="cboAnio" onchange='filtroAnio("../../Controlador","ProfeControlador.php",2,"AjaxClasePro")' class="span3 select1">
                                             	
                                              <option value='0'>Selecione periodo</option>
                                                  <?php foreach ($val as $año ) {?>
                                               <option value='<?php echo $año['CODIGO'];?>'><?php echo $año['NOMBRE_AÑO'];?></option>
                                               
                                                   <?php } ?>
                                            </select>
  
</div>

     
<div class="Clases">
<div class="alert tituloClase">
    <p> Mi Clase</strong></p>                            
 </div>

                            <div class="block-content2 collapse in" id='AjaxClasePro' >
                                <div class="span12">

                                    
						<ul	 id="da-thumbs" class="da-thumbs">
									
                                                                   <!-- Solo llegará el id del usuario que a ingresado -->
                                         
    
                                                                   <?php foreach ($valC as $clase){?>
											<li>
                                                                                            
                                                                                            <a onclick="clickClase()" href='javascript:ingresoClase("../../Controlador","ProfeControlador.php",3,<?php echo $clase['CODIGO'];?>,"<?php echo $clase['CLASE'];?>","block")'>
                                                                                                  
														<img src ="../Imagenes/thumbnails.jpg" width="124" height="140" class="img-polaroid" alt="">
                                                                                                                <div>
													<span><p class="class">Entrar</p></span>
													</div>
												</a>
                                                                                       
                                                                                             <p class="class"><?php echo $clase['CLASE'];?></p>
												
                                                                                                  <?php if($opcion=="5"){ ?>
												<a href="#" data-toggle="modal"><i class="icon-trash"></i> Eliminar</a>	
                                                                                                <?php }?>
											</li>
                                                                                         <?php if($opcion=="5"){ ?>
										<?php include("Profesor/eliminar_clase_modal.php"); ?> 
                                                                                         <?php }?>
									<?php } }
                                                                        else{ ?>
                                                                       <div class="alert alert-warning"><i class="icon-info-sign"></i> 
                                                                        Estimado profesor, usted no tiene una clase asignada el presente año escolar </div>
									<?php  } ?>
                                                                        
									</ul>
                                    
                                    
                                    
                                </div>
                            </div></div>
</div>