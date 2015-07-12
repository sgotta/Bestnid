<?php 
	echo '<form action="actualizarEmail.php" class="navbar-form" role="form" id="registro-form" method="post" style="padding-bottom: 40px;">
			<h4 class="pull-left">E-mail: </h4><br>
			<div class="form-group">
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<input type="email" class="form-control" placeholder="E-mail"  name="mail" maxlength="45" required autocomplete="on">
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