<?php 

session_start();
$curso_asistencia=$_SESSION['AisistenciaCurso']; 
foreach ($curso_asistencia as $IndiceCurso => $valAsisCurso){
    
}
$contar=count($valAsisCurso);
if ($contar>0){
 ?>
<div class="filtroOver">
<!--     <div class="pull-right">
                                  
                                    <a id="btnPrint" href='../Estudiante/imprimir_asistencias.php' class="btn btn-success"><i class="icon-print"></i> Imprimir Asistencias</a>
						</div>-->
                            <div class="asistencia">
                           
                                
                                  <div class="titulo"><strong>Asistencias del curso</strong></div>
                             <table  class="table table-bordered " >
                                       
                                        <tbody>
                                         <?php foreach ($valAsisCurso as $val2){
                                              $temas=$val2['TEMA'];
                                             ?>
    
                                            <tr>
                                                 <td>  <?php echo $val2['FECHA'] ?></td>
                                                 
                                                <td>
                                                  <?php echo $temas[0]['nombre_unidad_tema'].':<BR>';
                                                          foreach($temas as $sub){
                                                      echo '-'.$sub['nombre_tema'].'<br>';
                                                          }
                                                          
                                                          ?>
                                                  </td>
                                                 <td><?php 
                                                 $tipo=$val2['TIPO'];
                                                 if($tipo=="A"){
                                                     echo 'Asistió';
                                                 }
                                                 else if($tipo=="F"){
                                                     echo 'Faltó';
                                                 }
                                                 else{echo 'Tardanza';} ?></td>
                                             </tr>
                                            
                                 
<?php } ?> 
                                        </tbody>
                                    
                                        
                                    </table>
                                
                               
                                             <?php } else{ ?>
                                  <div class="asistencia">
                                      
                                       <div class="alert alert-danger">
                                           <center><b>A la fecha usted no tiene asistencias</b></center>
                                       </div>
                                      
                                  </div>
                                           <?php    } ?>

                                </div>
</div>
