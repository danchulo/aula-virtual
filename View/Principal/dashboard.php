<?php 
$cantClase=$_SESSION['cantClase']; 
$cantProfe=$_SESSION['cantProfe']; 
$cantEstu=$_SESSION['cantEstu']; 
$cantPerso=$_SESSION['cantPersonal']; 
$cantProfeAsigna=$_SESSION['cantProfeAsigna']; 
$cantEstuAsigna=$_SESSION['cantEstuAsigna']; 
$cantUsu=$_SESSION['cantUsu']; 
$cantCurso=$_SESSION['cantCurso']; 
?> 
 <div class="span20" id="">
                     <div class="row-fluid">
<div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Números de datos</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
							
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantProfe?>"><?php echo $cantProfe?></div>
                                    <div class="chart-bottom-heading"><strong>Profesores</strong>

                                    </div>
                                </div>
                                                                    
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantProfeAsigna?>"><?php echo $cantProfeAsigna?></div>
                                    <div class="chart-bottom-heading"><strong>Profesores Asignados</strong>

                                    </div>
                                </div>
				
                                                                    				
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantEstu?>"><?php echo $cantEstu?></div>
                                    <div class="chart-bottom-heading"><strong>Estudiantes</strong>

                                    </div>
                                </div>
                                  <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantEstuAsigna?>"><?php echo $cantEstuAsigna?></div>
                                    <div class="chart-bottom-heading"><strong>Estudiantes Asignados</strong>

                                    </div>
                                </div>
				                                  
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantUsu?>"><?php echo $cantUsu?></div>
                                    <div class="chart-bottom-heading"><strong>Usuarios</strong>

                                    </div>
                                </div>
				
						
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantClase?>"><?php echo $cantClase?></div>
                                    <div class="chart-bottom-heading"><strong>Aulas de Clase</strong>

                                    </div>
                                </div>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantPerso?>"><?php echo $cantPerso?></div>
                                    <div class="chart-bottom-heading"><strong>Personal  </strong>

                                    </div>
                                </div>
							
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $cantCurso?>"><?php echo $cantCurso?></div>
                                    <div class="chart-bottom-heading"><strong>Cursos</strong>

                                    </div>
                                </div>
						
						
                            </div>
                            </div>
</div>
                     </div>
 </div>