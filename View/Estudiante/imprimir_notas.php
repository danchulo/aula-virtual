<?php 
session_start();
$notas=$_SESSION['MisNotas']; 

?>

<script>

window.print();

</script>

<center>
    
    <div class="asistencia">
                               
                                <div id="notaFiltro">
                                  <div class="tituloNota"><strong>NOTAS DEL <?php echo $notas['MISNOTAS'][0]['TRIMESTRE'] ?> </strong><br>
                                      <span class="limite">Fecha límite: <?php echo $notas['MISNOTAS'][0]['F_LIMITE'] ?></span></div>
                             
                              
                                       
<table  class="table table-bordered tbnota" >
                                       
                                 
                                 <thead>
                                     <?php 
                                     $nota1=$notas['MISNOTAS'][0]['NOTA1'];
                                     if ($nota1!=-1.0){?>
                                              
                                   
                                            <tr>
                                                <th>Examen mensual 1:</th><td><?php echo $nota1 ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                             
                                           <?php 
                                           $nota2=$notas['MISNOTAS'][0]['NOTA2'];
                                           if ($nota2!=-1.0){?>
    
                                            <tr>
                                                <th>Examen mensual 2:</th><td><?php echo $nota2 ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                             
                                              <?php 
                                              $notat=$notas['MISNOTAS'][0]['NOTA_TRI'];
                                              if ($notat!=-1.0){?>
    
                                            <tr>
                                                <th>Examen Trimestral:</th><td><?php echo $nota2 ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                             
                                              <?php 
                                                 $notal=$notas['MISNOTAS'][0]['NOTA_LIBRO'];
                                              if ($notal!=-1.0){?>
    
                                            <tr>
                                                <th>Nota del Libro:</th><td><?php echo $notal ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 

                                              <?php 
                                              
                                              $notac=$notas['MISNOTAS'][0]['NOTA_CUA'];
                                              if ($notac!=-1.0){?>
    
                                            <tr>
                                                <th>Nota del Cuaderno:</th><td><?php echo $notac ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                             
                                              <?php 
                                              $notaa=$notas['MISNOTAS'][0]['NOTA_ACTITUD'];
                                              if ($notaa!=-1.0){?>
    
                                            <tr>
                                                <th>Nota de Actitud:</th><td><?php echo $notaa ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                             
                                              <?php 
                                              $notap=$notas['MISNOTAS'][0]['PONDERADO'];
                                              if ($notap!=-1.0){?>
    
                                            <tr>
                                                <th>Ponderado:</th><td><?php echo $notap ?></td>
                                                
                                           
                                             </tr>
                                             <?php } ?> 
                                        </thead>
                      
                                    
                                        
                                    </table>
                                </div>
</center>