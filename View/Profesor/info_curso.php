<?php 
session_start();
$listaCurso=$_SESSION['infoCurso']; 
$cantidadE=$_SESSION['cantidadE'];
$listaTema=$_SESSION['listaTema']; 
foreach ($listaCurso as $IndiceCurso => $valCurso){}
foreach ($listaTema as $Indice => $valT){}
$cant=count($valT);
$Clase=$_GET['nombre_clase']; 
$Clase_id=$_GET['clase_id']; 
$curso_nombre=$listaCurso['MICURSO'][0]['CURSO'];
$_SESSION['curso_nombre']=$curso_nombre;
 ?>
   
   <input type="hidden" id="cantidadE" value="<?php echo $cantidadE;?>">
  <input type="hidden" id="clase_id" value="<?php echo $Clase_id;?>">
  <p style="display:none" id="nombre_clas"><?php echo $Clase;?></p>
    
<div class="alert curso-titulo">
    
    <p> <?php echo $curso_nombre;?></p> 
  
     <input type="hidden" id="cursoid" value="<?php echo $listaCurso['MICURSO'][0]['PROFE_CLASEID'];?>">
 </div>

<div id='AjaxNavegacion' class="block-content1 collapse in">
    
       
                            <div class="cursos">
                                <div class="titulo"><strong>Información del curso</strong></div>
                                    <table  class="table table-bordered tbcurso" >
                                        <thead>
                                        
                                            
                                        
                                         <tr>
                                              <th>Area</th>   <td><?php echo $listaCurso['MICURSO'][0]['AREA']?></td>
                                              
                                        </tr>
                                         <tr>
                                              <th>Código</th>   <td><?php echo $listaCurso['MICURSO'][0]['CURSOCOD']?></td>
                                              
                                        </tr>
                                        <tr>
                                              <th>Periodo</th>   <td><?php echo $listaCurso['MICURSO'][0]['PERIODO'] ?></td>
                                              
                                        </tr>
                                         <tr>
                                              <th>Grado</th>  <td><?php echo $listaCurso['MICURSO'][0]['GRADO']?></td>
                                         </tr>
                                           <tr>
                                              <th>Sección</th> <td><?php echo $listaCurso['MICURSO'][0]['SECCION']?></td>
                                         </tr>
                                          <tr>
                                              <th>Nivel</th> <td><?php echo $listaCurso['MICURSO'][0]['NIVEL']?></td>
                                         </tr>

                                        </thead>
                                    
                                        
                                    </table>
                                
                               
                     
                                    
                                </div>
        

  <div   class="silabo" >
      <div class="titulo"><strong>Temas</strong></div>
        <table class="table table-bordered tbsilabo">
          
                                        <thead>
                                         <thead>
                                        <?php foreach  ($valT as $tema){ ?>
                                         <tr>
                                              <th><?php echo $tema['UNIDAD']
                                                                                      
                                                      ?></th>   
                                              
                                  
                                        </tr>
                                        <tr>
                                           <td><?php   
                                                     $are=$tema['TEMA'];
                                                 
                                         for($i=0;$i<count($are);$i++){
                                       echo ($i+1).'- '.$are[$i]['nombre_tema'].'<br>';
                                                 
                                         } ?> 
                                           </td>
                                        </tr>
                                        
                                        <?php  } ?>

                                        </thead>
                                    
                                        
                                        
                                    </table>
  </div>
    
    <div   class="horario" >
        <div class="titulo"><strong>Horario</strong></div>
        <table class="table table-bordered tbhora">
          
                                        <thead>
                                         <tr>
                                              <th>Día</th>   
                                              <th>Horas</th> 
                                              <th>Salón</th> 
                                        </tr>
                                       
                                         
                                        </thead>
                                        <tbody>
                                            <?php foreach ($valCurso as $val2){?>
    
                                            <tr>
                                                 <td> <?php echo $val2['DIA'] ;?></td>
                                                 <td><?php echo $val2['HORAS']; ?></td>
                                                    <td><?php echo $val2['SALON'];?></td>
                                                  
                                            </tr>
                                          
                                            
                                           
                                             <?php } ?>
                                            
                                        </tbody>
                                        
                                        
                                    </table>
  </div>
</div>
