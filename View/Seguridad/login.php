		<form id="login" class="form-signin">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Iniciar Sesión</h3>
						<input type="text" class="input-block-level" id="usuario" onkeypress="validar(event)"  name="usuario" placeholder="Usuario" required>
                                                <input type="password" class="input-block-level" id="password" onkeypress="validar(event)"  name="password" placeholder="Password" required>
                                                <button data-placement="right" title="Ingresar" id="signin" name="login" class="btn btn-info" onclick="verificarUsuarios('Controlador','UsuarioControlador.php','1')" type="button" ><i class="icon-signin icon-large"></i> Ingresar</button>
													
			</form>
					