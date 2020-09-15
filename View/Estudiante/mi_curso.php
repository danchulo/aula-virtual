<?php 

session_start();
$listaCurso=$_SESSION['listaMiCurso']; 
$listaTema=$_SESSION['listaTema']; 
foreach ($listaTema as $Indice => $valT){}
$cant=count($valT);
foreach ($listaCurso as $IndiceCurso => $valCurso){
    
}
 ?>
<div class="alert curso-titulo">
    
    <p> <?php echo $listaCurso['MICURSO'][0]['CURSO'];?></p> 
    <input type="hidden" id="cursoid" value="<?php echo $listaCurso['MICURSO'][0]['CURSOID'];?>">
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
                                       
                                      <tr>
                                              <th>Profesor</th>   <td><?php echo $listaCurso['MICURSO'][0]['PROFESOR']?></td>
                                              
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
                                        ?>
                                         <?php echo ($i+1).'- '.$are[$i]['nombre_tema'].'<br>'  ?> 
                                                <?php  } ?> </td>
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