<?php
session_start();
$opcion = $_SESSION['op'];

$listaClase = $_SESSION['listaClase'];
foreach ($listaClase as $IndiceC => $valClase) {
    
}
?>

<iframe style="display: none" onload="cargaTablaJQUERY()"></iframe>
<table class="display nowrap dataTable  collapsed table-responsive" aria-describedby="example_info" role="grid" style="width: 100%;" id="datos">

    <thead>
        <tr>


            <th>Grado</th>
            <th>Seccion</th>
            <th>Nivel</th>
            <th>Turno</th>
            <th>Estado</th>

            <?php if ($opcion != 5) { ?>

    <?php if ($opcion == 1) { ?>

                    <td ></td>
    <?php } ?>
                <td></td>

<?php } ?>
            <th>Ambiente:</th>
            <th>Capacidad Actual:  </th>
            <th>Hora Inicio:</th>
            <th>Hora Fin:</th>

        </tr>
    </thead>
    <tbody>
        <?php
        ?>
        <?php
        foreach ($valClase as $clase) {

            $cod = $clase['CODIGO'];


            $estado = $clase['ESTADO'];
            if ($estado == "A") {
                $esta = 'Activo';
            } else if ($estado == "I") {
                $esta = 'Inactivo';
            }
            ?>
            <tr id="<?php echo $cod ?>">      
                <td><?php echo $clase['GRADO'] ?></td> 
                <td><?php echo $clase['SECCION'] ?></td> 
                <td><?php echo $clase['NIVEL'] ?></td> 
                <td><?php echo $clase['TURNO'] ?></td> 
                <?php if ($opcion == 5) { ?>
                    <td><?php echo $esta ?></td> 
                <?php } ?>

                <?php if ($opcion != 5) { ?> 

                    <td><input onclick='estado("../../Controlador", "AdminControlador.php", 2, "A", "i", "<?php echo $cod ?>", "clase")' type="radio" name="<?php echo $cod ?>"  <?php if ($estado == "A") echo "checked" ?> />On
                        <input onclick='estado("../../Controlador", "AdminControlador.php", 2, "I", "i", "<?php echo $cod ?>", "clase")' type="radio" name="<?php echo $cod ?>" <?php if ($estado == "I") echo "checked" ?>/>Off
                    </td>

        <!--                                          <td width="40"><a data-toggle="modal" href="#modalHora"> <button onclick='cargarModalHorario("../../Controlador","ClaseControlador.php",3,"<php echo $cod;?>","cargaModalHoraClase")' id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="icon icon-eye-open"></span></button></a></td>     
                    -->
                    <?php if ($opcion == 1) {
                        ?>
                        <td width="40"> <a class="btn btn-danger" href='javascript:accion("../../Controlador","ClaseControlador.php",4,"<?php echo $cod ?>","","","e")'><i class="icon-trash icon-large"></i></a></td>
                    <?php } ?>
                    <td width="40"><a href='javascript:accionSimple("../../Controlador","ClaseControlador.php",4,"<?php echo $cod ?>","adduser","b","")' class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>

                <?php } ?>  

                <td><?php echo $clase['SALON'] ?></td> 
                <td><?php echo $clase['CAPACIDAD'] ?></td> 
                <td><?php echo $clase['INICIO'] ?></td> 
                <td><?php echo $clase['FIN'] ?></td>




            </tr>



        <?php } ?>

    </tbody>

    <tfoot>
        <tr>

            <th>Grado</th>
            <th>Seccion</th>
            <th>Nivel</th>
            <th>Turno</th>
            <th>Estado</th>

            <?php if ($opcion != 5) { ?> 

                <?php if ($opcion == 1) { ?>
                    <td></td>
                <?php } ?>
                <td></td>
            <?php } ?>
            <th>Ambiente</th>
            <th>Capacidad Actual</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>

        </tr>
    </tfoot>
</table>