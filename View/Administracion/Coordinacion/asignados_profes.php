<?php
session_start();
$listaAsigna = $_SESSION['listaAsigna'];
foreach ($listaAsigna as $IndiceA => $valAsigna) {
    
}
$opcion = $_SESSION['op'];
?>	

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe> 

<div class="span9" id="">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">

            <div class="pull-right">

                <a title="Reporte de profesores asginados" href='../reportes/rpt_profesores_asignados_xls.php' class="btn btn-warning "><i class="icon-download"></i></a>
                <?php if ($opcion == 4 || $opcion == 1) { ?>
                    <a class="btn btn-info" href='javascript:consultaSimple("../../Controlador","ProfeControlador.php",17,"AsignaAjax")'><i class="icon-plus-sign"></i>Asignar</a>                 
                <?php } ?>    
                <a class="btn btn-success" href="javascript:consultaSimple('../../Controlador','ProfeControlador.php','16','MiAjax')"><i class="icon-list"></i>Lista</a>

            </div>
            <!--                            <div class="pull-right">
                                            
                                        </div>-->

            <!--                             <div class="pull-right">
                                              
                                           
                                                            </div>-->
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Profesores Asignados</div>
            </div>

            <div class="block-content collapse in">

                <div class="span12"  id="AsignaAjax">
                    <form >

                        <table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

                            <thead>
                                <tr>

                                    <th>Profesor</th>
                                    <th>Clase</th>
                                    <?php if ($opcion == 5) { ?>
                                        <td width="40"> </td>
                                    <?php } ?>  
                                    <?php if ($opcion == 1 || $opcion == 4) { ?>
                                        <?php if ($opcion == 1) { ?>
                                            <td width="40"> </td>
                                        <?php } ?>   

                                        <td width="40"></td>
                                    <?php } ?>   
                                </tr>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($valAsigna as $val2) {
                                    $cod = $val2['CLASE_ID'];
                                    $profe_clas_id = $val2['PROFE_CLASE_ID'];
                                    $profe_id = $val2['PROFE_ID'];

                                    $t = $val2['T'];
                                    ?>
                                    <tr id="<?php echo $profe_clas_id ?>">

                                        <td><?php echo $val2['PROFESOR'] ?></td> 
                                        <td><?php echo $val2['CLASE'] ?></td> 
                                        <?php if ($opcion == 5) { ?>
                                            <td width="40"><a href='javascript:consultarHorario("../../Controlador","ProfeControlador.php",29,"<?php echo $cod ?>","","<?php echo $profe_id ?>","","AsignaAjax","","<?php echo $t ?>")' class="btn btn-success"><i class="icon icon-eye-open"></i> </a></td>
                                        <?php } ?>    
                                        <?php if ($opcion == 1 || $opcion == 4) { ?>
                                            <?php if ($opcion == 1) { ?>
                                                <td width="40"> <a class="btn btn-danger" href='javascript:eliminar("../../Controlador","ProfeControlador.php",30,"<?php echo $profe_clas_id ?>")'><i class="icon-trash icon-large"></i></a></td>
                                            <?php } ?>   

                                            <td width="40"><a href='javascript:consultarHorario("../../Controlador","ProfeControlador.php",19,"<?php echo $cod ?>","<?php echo $profe_clas_id ?>","<?php echo $profe_id ?>","","AsignaAjax","1","<?php echo $t ?>")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                    <?php } ?>                                                                                                                                                      
                                    </tr>
<?php } ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Profesor</th>
                                    <th>Clase</th>
                                    <?php if ($opcion == 5) { ?>
                                        <td width="40"> </td>
                                    <?php } ?>  
                                    <?php if ($opcion == 1 || $opcion == 4) { ?>
                                        <?php if ($opcion == 1) { ?>
                                            <td width="40"> </td>
                                        <?php } ?>   

                                        <td width="40"></td>
<?php } ?>   

                                </tr>
                            </tfoot>
                        </table>


                    </form>	
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


</div>

