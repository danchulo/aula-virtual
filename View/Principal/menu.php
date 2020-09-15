<div class="span3" id="sidebar">
    <div class="contenedor_menu">
        <div class="img">
            <img id="avatar" class="img-polaroid" src="../subidas/<?php echo $lista['USU'][0]['FOTO']; ?>">
        </div>
        <!--?Se realizó de esta manera porque todos los usuarios compartirán la misma página principal?>-->

        <ul id="menu" class="nav nav-list menues collapse nav-collapse">

            <?php if ($opcion == "3") { //Este menu solo sera para el estudiante ?>

                <li>
                    <a onclick="miClase()" href='javascript:MiClase("../../Controlador","EstuControlador.php","1","block")'><i class="icon-group"></i>Mi Clase</a>
                </li>
                <li>
                    <a href='javascript:MiClase("../../Controlador","EstuControlador.php","12","block")'><i class="icon-group"></i>Mi Horario Actual</a>
                </li>
                <li>
                    <a href='javascript:consultaSimple("../../Controlador","EstuControlador.php","11","block")'><i class="icon-group"></i>Mis Asistencias</a>
                </li>
                <li>
                    <a href='javascript:consultaSimple("../../Controlador","EstuControlador.php","10","block")'><i class="icon-group"></i>Mis Notas</a>
                </li>

            <?php } ?> 

            <?php if ($opcion == "2") { //Este menu solo sera para el profesor ?>

                <li >
                    <a onclick="miClase()"  href='javascript:MiClase("../../Controlador","ProfeControlador.php","1","block")'><i class="icon-group"></i>Mi Clase</a>
                </li>
                <li>
                    <a  href='javascript:consultaSimple("../../Controlador","ProfeControlador.php","21","block")'><i class="icon-group"></i>Mi Horario</a>
                </li>

            <?php } ?>

            <?php if ($opcion == "4" || $opcion == "1") { //Este menu solo sera para el admin y secretaria  ?>    

                <li><a href="principal.php"><i class="icon-chevron-right"></i><i class="icon-home"></i> Dashboard</a></li>

                <?php if ($opcion == "1") { //Este menu solo sera para el admin ?> 
                    <li><a href="javascript:consultaSimple('../../Controlador','AnioControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-calendar"></i> Año escolar</a></li>
                <?php } ?> 

                <li class="" id="miA"><a href="#"><i class="icon-group"></i>&nbsp;Registro<i class="icon-chevron-down icon-rigth"></i></a>
                    <ul>
                        <?php if ($opcion == "1") { //Este menu solo sera para el administrador  ?>
                            <li><a href="javascript:consultaSimple('../../Controlador','GradoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Grado</a></li>
                            <li><a href="javascript:consultaSimple('../../Controlador','SeccionControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Seccion</a></li>
                            <li><a href="javascript:consultaSimple('../../Controlador','NivelControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Nivel</a></li>
                            <li><a href="javascript:consultaSimple('../../Controlador','AreaControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i> Area</a></li>
                            <li><a href="javascript:consultaSimple('../../Controlador','TurnoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-building"></i> Turno</a></li>
                            <li><a href="javascript:consultaSimple('../../Controlador','AmbienteControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-hospital"></i> Ambiente</a></li>

                        <?php } ?>
                        <li><a href="javascript:consultaSimple('../../Controlador','ClaseControlador.php','2','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-home"></i>Aula</a></li>
                        <li><a href="javascript:consultaSimple('../../Controlador','CursoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-book"></i>Curso</a></li>

                        <li><a href="javascript:consultaSimple('../../Controlador','EstuControlador.php','7','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Estudiante</a></li>
                        <li><a href="javascript:consultaSimple('../../Controlador','ProfeControlador.php','14','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Profesor</a></li>
                        <?php if ($opcion == "1") { ?>
                            <li><a href="javascript:consultaSimple('../../Controlador','UsuarioControlador.php','2','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Usuario y Privilegio</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

            <?php if ($opcion == "1" || $opcion == "4") { //Este menu solo sera para el admin y secretaria ?> 

                <li class="" id="miA"><a href="#"><i class="icon-group"></i>&nbsp;Asignación<i class="icon-chevron-down icon-rigth"></i></a>    

                    <ul>

                        <li><a href="javascript:consultaSimple('../../Controlador','TemaControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-book"></i>Asignar Temas</a></li>
                        <li><a href="javascript:consultaSimple('../../Controlador','ProfeControlador.php','16','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Asignar Clase a Profesor</a></li>
                        <li><a href="javascript:consultaSimple('../../Controlador','EstuControlador.php','24','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Asignar Clase a Estudiante</a></li>

                    </ul>
                </li>

            <?php } ?>



            <?php if ($opcion == "5") { //Este menu solo sera para el director  ?> 

                <li><a href="principal.php"><i class="icon-chevron-right"></i><i class="icon-home"></i> Dashboard</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','ProfeControlador.php','22','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-user"></i>Profesores</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','ProfeControlador.php','16','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i>Profesores Asignados</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','EstuControlador.php','9','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i>Estudiantes</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','EstuControlador.php','24','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i>Estudiantes Asignados</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','ClaseControlador.php','2','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-hospital"></i>Aulas de Clase</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','CursoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-book"></i>Cursos</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','PersonalControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i>Personal</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','GradoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Grados</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','SeccionControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Secciones</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','NivelControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-group"></i> Niveles</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','AreaControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-building"></i> Areas</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','TurnoControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-building"></i> Turnos</a></li>
                <li><a href="javascript:consultaSimple('../../Controlador','AmbienteControlador.php','1','MiAjax')"><i class="icon-chevron-right"></i><i class="icon-building"></i> Ambientes</a></li>
            <?php } ?>

        </ul>

        <!--      Este menu será solo para el profesor-->
        <ul id="menu_profe" style="display: none" class="nav nav-list menues collapse nav-collapse">
            <li><a onclick='miClase()' href="javascript:MiClase('../../Controlador','ProfeControlador.php','1','block')"><i class='icon-chevron-right'></i><i class='icon-chevron-left'></i>&nbsp;Regresar</a></li>
            <li><a onclick='misEstus()' id="menuMisEstus" class='activar' href="javascript:ingresoClase2('../../Controlador','ProfeControlador.php',3,'block')"><i class='icon-chevron-right'></i><i class='icon-group'></i>&nbsp;Mis Estudiantes</a></li>
            <li><a onclick='misCursos()' id="menuCurso" href="javascript:ingresoClase2('../../Controlador','ProfeControlador.php',4,'block')"><i class='icon-chevron-right'></i><i class='icon-book'></i>&nbsp;Mis Cursos</a></li>	   
        </ul>

    </div>    
</div>
