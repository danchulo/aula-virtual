<?php
session_start();
$Estudiantes = $_SESSION['Mis_Estu'];
foreach ($Estudiantes as $IndiceE => $valE) {
    
}
$cantidadE = count($valE);

$_SESSION['cantidadE'] = $cantidadE;

$clase = $_GET['clase'];

$clase_id = $_GET['clase_id'];
?> 

<iframe style="display: none" onload="play()"></iframe>
<!-- block -->
<div class="pull-left">

    <a  href='../reportes/rpt_mis_estudiantes_xls.php?clase=<?php echo $clase; ?>' class="btn btn-mini btn-default"><i class="icon-print"></i> Reporte Excel</a>
    <a  href='../reportes/rpt_mis_estudiantes_pdf.php?clase=<?php echo $clase; ?>' class="btn btn-mini btn-default"><i class="icon-print"></i> Imprimir PDF</a>				
</div>

<div class="navbar navbar-inner block-header cabecera-clase">
    <div id="" class="muted pull-right">

        <span id="cantidad_de">Número de estudiantes:</span>	 <span id="cant" class="badge badge-info"><?php echo $cantidadE; ?></span>
    </div>
</div>

<div class=" alert tituloClase profe" >
    <p id="nombre_clas" class="clase-nombre"><?php echo $clase ?></p>   
    <input id="clase_id" style="display:none; "value="<?php echo $clase_id ?>">
</div>   
<div  class="clase-profe" >

    <div class="block-content collapse in">
        <p class="titulo-estu">Mis Estudiantes</p>
        <?php if ($cantidadE > 0) { ?>
            <div class="span12">

                <ul	 id="da-thumbs" class="da-thumbs">
                    <?php
                    foreach ($valE as $estudiantes) {
                        ?>
                        <li id="del<?php echo $estudiantes['CODIGO_E']; ?>">
                            <a href="#">

                                <img id="student_avatar_class" src ="../subidas/<?php echo $estudiantes['FOTO']; ?>" width="124" height="140" class="img-polaroid">
                                <div>
                                    <span>
                                        <p><?php ?></p>

                                    </span>
                                </div>
                            </a>
                            <p class="class"><?php echo $estudiantes['APELLIDOS']; ?></p>
                            <p class="subject"><?php echo $estudiantes['NOMBRES']; ?></p>

                        </li>
                        
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-link alerta-profe">Ningún estudiante matriculado a la fecha</div>
    <?php } ?>
</div>

<!-- /block -->

