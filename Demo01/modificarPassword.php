<?php 
	echo '<form action="actualizarPassword.php" class="navbar-form" role="form" id="registro-form" method="post" style="padding-bottom: 40px;">
			<h4 class="pull-left">Nueva contraseña: </h4>
			<div class="form-group">
				<div class="form-inline">
 					<div class="form-group">
 					<h5 class="pull-left">Ingrese su nueva contraseña: </h5><br>
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-asterisk" ></span>
							<input type="password" class="form-control" placeholder="Contraseña"  name="password" id="password" minlength="8" maxlength="45" required autocomplete="off">
						</div>
					</div>
				</div>			
			<div class="form-group">
				<div class="form-inline">
 					<div class="form-group">
 					<h5 class="pull-left">Repita su nueva contraseña: </h5><br>
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-asterisk" ></span>
							<input type="password" class="form-control" placeholder="Contraseña"  name="password1" id="password1" minlength="8" maxlength="45" required autocomplete="off">
						</div>
					</div>
				</div><br>
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<a href="perfil.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
						</div>
						<div class="input-group">
							<input type="submit" class="btn btn-primary" id="btn-registro" value="Actualizar"/>
						</div>
					</div>
				</div>	
			</div>
		</form>';
?>