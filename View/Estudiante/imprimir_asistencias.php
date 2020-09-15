<?php 

session_start();
$curso_asistencia=$_SESSION['AisistenciaCurso']; 

foreach ($curso_asistencia as $IndiceCurso => $valAsisCurso){
    
}
 ?>
<script>

window.print();

</script>
<div class="filtroOver">

                            <div class="asistencia">
                              
                                  <div class="titulo"><strong>Asistencias del curso</strong></div>
                             <table  class="table table-bordered " >
                                       
                                        <tbody>
                                         <?php foreach ($valAsisCurso as $val2){?>
    
                                            <tr>
                                                 <td>  <?php echo $val2['FECHA'] ?></td>
                                                 <td size="15">  <?php echo $val2['UNIDAD'] ?>:<BR>
                                                  <?php echo $val2['TEMA'] ?>
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
                                
                               
                                    
                                </div>
</div>
