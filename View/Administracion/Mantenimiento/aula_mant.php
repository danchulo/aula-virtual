<?php
session_start();
$lista = $_SESSION['listaAula'];
$opcion = $_SESSION['op'];
foreach ($lista as $Indice => $val) {
    
}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<?php if ($opcion == 1) { ?>
    <div class="span3" id="adduser">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Agregar Ambiente</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form id="FormMante">
                            <div class="control-group">
                                <div class="controls">
                                    <input name="nom_aula" class="input focused" id="focusedInput" type="text" placeholder = "Nombre" required>
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">

                                    <input  type="button" onclick="grabar('../../Controlador', 'AulaControlador.php', '2', '1', 'MiAjax')" class="btn btn-success" value="Guardar">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>   			
    </div>
<?php } ?>
<?php if ($opcion == 1 || $opcion == 5) { ?>
    <div class="span6" id="listaTabla">
        <div class="row-fluid">
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Lista de Ambientes</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form>
                            <table class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">


                                <thead>
                                    <tr>

                                        <th>Ambiente</th>
                                        <th>Estado</th>
                                        <?php if ($opcion == 1) { ?>   
                                            <th></th>
                                            <th></th>
                                        <?php } ?>   
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($val as $val2) {
                                        $estado = $val2['ESTADO'];
                                        if ($estado == "A") {
                                            $estado = "Activo";
                                        } else {
                                            $estado = "Inactivo";
                                        }
                                        ?>
                                        <tr>

                                            <td><?php echo $val2['AULA']; ?></td>
                                            <td><?php echo $estado; ?></td>
                                            <?php if ($opcion == 1) { ?>                                   
                                                <td width="40"> <a class="btn btn-danger" href='javascript:eliminar("../../Controlador","AulaControlador.php",11,"<?php echo $grado['CODIGO']; ?>")'><i class="icon-trash icon-large"></i></a></td>
                                                <td width="40"><a href='javascript:editar("../../Controlador","AulaControlador.php",11,"<?php echo $grado['CODIGO']; ?>","AjaxAsistencia")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                            <?php } ?>    				


                                        </tr>
                                    <?php } ?>


                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Ambiente</th>
                                        <th>Estado</th>
                                        <?php if ($opcion == 1) { ?>   
                                            <th></th>
                                            <th></th>
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
<?php } ?>