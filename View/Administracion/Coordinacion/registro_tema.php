<?php
session_start();
$listaTema = $_SESSION['listaTema'];
$listaCurso = $_SESSION['listaCurso'];
$listaU = $_SESSION['listaUnidad'];
$opcion = $_SESSION['op'];
foreach ($listaCurso as $IndiceC => $valC) {
    
}
foreach ($listaTema as $IndiceT => $valT) {
    
}
foreach ($listaU as $IndiceU => $valU) {
    
}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<?php if ($opcion == 1 || $opcion == 4) { ?>
    <div class="span3" id="adduser">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Agregar Tema</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form id="FormMante">
                            <div class="control-group">
                                <div class="controls">
                                    <select  name="unidad_id" class="" required>
                                        <option value="">Seleccione Unidad</option>
                                        <?php
                                        foreach ($valU as $uni) {
                                            ?>
                                            <option value="<?php echo $uni['CODIGO']; ?>"><?php echo $uni['UNIDAD']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">

                                <div class="controls">
                                    <select  name="curso_id" class="" required>
                                        <option value="">Seleccione Curso</option>
                                        <?php
                                        foreach ($valC as $curso) {
                                            ?>
                                            <option value="<?php echo $curso['CODIGO']; ?>"><?php echo $curso['CURSO']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <textarea name="nom_tema" class="input focused" id="focusedInput" placeholder = "Nombre Tema" required></textarea>
                                </div>
                            </div>

                            <div class="control-group">




                                <div class="control-group">
                                    <div class="controls">

                                        <input  type="button" onclick="grabar('../../Controlador', 'TemaControlador.php', '2', '5', 'tablaAjax')" class="btn btn-success" value="Guardar">

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>   			
    </div>
<?php } ?>

<div class="span6" id="listaTabla">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">

            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Lista de Temas</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <div id="tablaAjax">
                        <table class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info" id="datos">


                            <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Unidad</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Temas:</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($valT as $val2) {

                                    $temas = $val2['TEMA'];
                                    ?>
                                    <tr>

                                        <td><?php echo $val2['CURSO']; ?></td>
                                        <td><b><?php echo $val2['UNIDAD']; ?></b></td>
                                        <td><a style="display:none"class="icon-pencil icon-large"> </a></td>
                                        <td><a style="display:none"class="icon-pencil icon-large"> </a></td>
                                        <td> <a style="display:none"class="icon-pencil icon-large"> </a></td>

                                        <td> 

                                            <?php
                                            for ($i = 0; $i < count($temas); $i++) {
                                                $cod = $temas[$i]['tema_id'];
                                                $estado = $temas[$i]['estado'];
                                                if ($estado == "A") {
                                                    $estado = "Activo";
                                                } else {
                                                    $estado = "Inactivo";
                                                }
                                                ?>
                                                <label id="tem<?php echo $cod ?>">
                                                    <div >
                                                        <?php
                                                        echo ($i + 1) . '.- ' . $temas[$i]['nombre_tema'] . '<br>';
                                                        if ($opcion != 5) {
                                                            ?>

                                                            <input onclick='estado("../../Controlador", "AdminControlador.php", 2, "A", "i", "<?php echo $cod ?>", "tema")' type="radio" name="<?php echo $cod ?>"  <?php if ($estado == "Activo") echo "checked" ?> />On
                                                            <input onclick='estado("../../Controlador", "AdminControlador.php", 2, "I", "i", "<?php echo $cod ?>", "tema")' type="radio" name="<?php echo $cod ?>" <?php if ($estado == "Inactivo") echo "checked" ?>/>Off
                                                            <?php if ($opcion == 1) { ?>
                                                                <a class="btn btn-danger btn-mini" href='javascript:accionSubject("../../Controlador","TemaControlador.php",3,"<?php echo $cod ?>","","","e")'><i class="icon-trash icon-large"></i></a>
                                                            <?php } ?>
                                                            <a href='javascript:accionSimple("../../Controlador","TemaControlador.php",3,"<?php echo $cod ?>","adduser","b","")' class="btn btn-success btn-mini"><i class="icon-pencil icon-large"></i> </a>
                                                        <?php } else if ($opcion == 5) { ?>

                                                            <b><?php echo $estado; ?></b>

                                                        <?php } ?>
                                                    </div>
                                                </label>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>


                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Curso</th>
                                    <th>Unidad</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Temas</th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


</div>
