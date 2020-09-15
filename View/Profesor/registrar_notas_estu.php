<?php 
session_start();
$notas=$_SESSION['Lista_Notas_Estu'];
foreach ($notas as $IndiceNot => $valNot){}
$cantidad=count($valNot);
if($cantidad>0){
$tri=$_SESSION['trimestre']; 
$mostrar=$notas["LISTA_NOTAS_E"][0]["MOSTRAR"];

foreach ($tri as $IndiceTri => $valTri){}
 ?>

                     

                            <div class="asistencia">
                                
                                  <div class="pull-right">
                <a  href='../reportes/rpt_mis_estus_notas_pdf.php' class="btn btn-mini btn-danger"><i class="icon-print"></i> Imprimir</a>				
                   </div>
                             
                                <div class="selectTri">
                                    <select  id="cboTri"
                                     onchange="filtrarTrimestre('../../Controlador','ProfeControlador.php',10,'notaFiltro')">
                                        
                                        <option value="0">Eliga Trimestre</option>
                                        <?php foreach ($valTri as $trimestre){ ?>
                                        <option value="<?php echo $trimestre['TRIMESTRE_ID']?>"><?php echo $trimestre['TRIMESTRE_CARGA']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                              
                                <div id="notaFiltro">
                                      <form name="formNotas" id="formNotas">
                                  
                        <div class="tituloNota"><strong>NOTAS DEL <?php echo $notas['LISTA_NOTAS_E'][0]['TRIMESTRE'] ?> </strong><br>
                                                                                
                        <input type="hidden" name="trimestre_id" id="trimestre_id" value="<?php echo $notas['LISTA_NOTAS_E'][0]['TRIMESTRE_ID'] ?>"/>
                                      <span class="limite">Fecha límite: <?php echo $notas['LISTA_NOTAS_E'][0]['F_LIMITE'] ?></span></div>
                    
                                      <table  class="table table-bordered tbnotap " >
                           
                                 <thead>
                                     <tr>
                                         <td>Nº</td> 
                                         <td>Estudiantes</td> 
                                         <td title="Examen 1">E1</td> 
                                         <td title="Examen 2">E2</td> 
                                         <td title="Examen Trimestral">ET</td> 
                                         <td title="Nota Cuaderno">NC</td> 
                                         <td title="Nota Libro">NL</td> 
                                         <td title="Nota Actitudinal">NA</td> 
                                         <td>PONDERADO</td> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                         <?php for($i=0;$i<$cantidad;$i++){?>
                                     <tr>
                                         <td><?php echo ($i+1) ?></td> 
                                         <td><?php echo $notas['LISTA_NOTAS_E'][$i]['N_COMPLETO'] ?>
                                             <input type="hidden" name="estu_id[]" id="estu_id" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['ESTU_ID'] ?>"/>
                                         </td> 
                                         <td><input title="Examen Mensual 1" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)" type="text" name="nota1[]" id="nota1<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_1']?>"/></td>
                                         <td><input title="Examen Mensual 2" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)"type="text" name="nota2[]" id="nota2<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_2']?>"/></td> 
                                         <td><input title="Examen Trimestral" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)"type="text" name="notat[]" id="notat<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_T']?>"/></td> 
                                         <td><input title="Nota Cuaderno" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)"type="text" name="notac[]" id="notac<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_C']?>"/></td> 
                                         <td><input title="Nota Libro" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)"type="text" name="notal[]" id="notal<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_L']?>"/></td> 
                                         <td><input title="Nota Actitudinal" class="nota" maxlength="4" onkeypress="return onlynumber(event);" onKeyUp="prom(<?php echo $i ?>)"type="text" name="notaa[]" id="notaa<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['NOTA_A']?>"/></td> 
                                         <td><input class="nota" disabled="false" type="text" name="p" id="p<?php echo $i ?>" value="<?php echo $notas['LISTA_NOTAS_E'][$i]['PONDERADO']?>"/></td> 
                                        
                                     </tr>
                                     <?php } ?>
                                 </tbody>
                      
                                    
                                        
                                    </table>
                                 
                                 <?php if ($mostrar=="si"){?>
                                          <button type="button" class="btn btn-primary guardarNota" onclick="guardarNota('../../Controlador','ProfeControlador.php',13)">Guardar Notas</button>
    <?php } else{?>
                                          
                                          <?php } ?>
                            </form>

                               
                                </div>
                             <?php }else { ?>
                                <div class="asistencia">
                                    <div class="alert alert-danger error">
                                        Estimado profesor, su clase aún no cuenta con alumnos matriculados.
                                    </div>
                            <?php } ?>
                            </div>
