 <div id="foto" class="navbar navbar-fixed-top navbar-inverse">
           <div class="navbar-inner">
               <div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
                  
                   <a class="brand" href="../Principal/principal.php"> Bienvenido a: Sistema Carl Palmer</a>
                   
                   
							<div class="nav-collapse collapse">
								<ul class="nav pull-right">
                                                     
                                                               
												<li class="dropdown">
                                                                                                   
                                                                                                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $lista['USU'][0]['NOMB']." ".$lista['USU'][0]['APA']." ".$lista['USU'][0]['AMA']; ?><i class="caret"></i></a>
                                                                                                  		
                                                                                                    <ul class="dropdown-menu">
																<li>
																	<a href="javascript:consultaSimple('../../Controlador','UsuarioControlador.php',7,'MiAjax')"><i class="icon-circle"></i> Cambiar Contraseña</a>
																	
																</li>
																<li class="divider"></li>
																<li><a tabindex="-1" href="../Seguridad/logout.php"><i class="icon-signout"></i>&nbsp;Cerrar sesión</a></li>
															</ul>
												</li>
								</ul>
							</div>
                   <!--/.nav-collapse -->
               
               </div>
           </div>
</div>

