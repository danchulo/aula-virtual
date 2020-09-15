<?php
session_start();

$lista = $_SESSION['listaAnioTrimestre'];
?>	

<div class="span6" id="listaTabla">
    <div class="row-fluid">
        <!-- block -->
        <div id="block_bg" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Año Escolar: <?php echo $lista['ANIO_TRIME'][0]['ANIO'] ?></div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <center>
                        <form id="FormMante">
                            <input type="hidden" name="anio_id" value="<?php echo $lista['ANIO_TRIME'][0]['CODIGO'] ?>" />
                            <div class="control-group">
                                <div class="controls">
                                    <span class="titulo-estu">1º Trimestre</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_iniT1" class="input focused" id="focusedInput" type="date"  value="<?php echo $lista['ANIO_TRIME'][0]['I1'] ?>" placeholder="Fecha Inicio" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_finT1" class="input focused" id="focusedInput" type="date" value="<?php echo $lista['ANIO_TRIME'][0]['F1'] ?>" placeholde = "Fecha Fin" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <span class="titulo-estu">2º Trimestre</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_iniT2" class="input focused" id="focusedInput" type="date" value="<?php echo $lista['ANIO_TRIME'][1]['I2'] ?>" placeholder = "Fecha Inicio" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_finT2" class="input focused" id="focusedInput" type="date" value="<?php echo $lista['ANIO_TRIME'][1]['F2'] ?>" placeholder = "Fecha Fin" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <span class="titulo-estu">3º Trimestre</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_ini3" class="input focused" id="focusedInput" type="date" value="<?php echo $lista['ANIO_TRIME'][2]['I3'] ?>" placeholder = "Fecha Inicio" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input name="fecha_fin3" class="input focused" id="focusedInput" value="<?php echo $lista['ANIO_TRIME'][2]['F3'] ?>" type="date" placeholder = "Fecha Fin" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">

                                    <input  type="button" onclick="grabar('../../Controlador', 'AnioControlador.php', '4', '1')" class="btn btn-success" value="Guardar">

                                </div>
                            </div>

                            <button id="btnGuardar" type="button"  onclick="consultaSimple('../../Controlador', 'AnioControlador.php', '1', 'MiAjax')"  class="btn btn-primary">Listar</button>       

                        </form>	
                    </center>
                </div>
            </div>

            <!-- /block -->
        </div>


    </div></div>

