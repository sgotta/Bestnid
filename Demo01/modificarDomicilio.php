<?php 
	echo '<form action="actualizarDomicilio.php" class="navbar-form" role="form" id="registro-form" method="post" style="padding-bottom: 40px;">
			<h4 class="pull-left">Nuevo domicilio: </h4><br>
			<div class="form-group">
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<input type="text" class="form-control" placeholder="Calle"  name="calle" maxlength="45" required autocomplete="on">
						</div>
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<input type="text" class="form-control" placeholder="Numero"  name="numero" maxlength="11" required autocomplete="on">
						</div>
					</div>
				</div>
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<input type="text" class="form-control" placeholder="Depto"  name="depto" maxlength="15" autocomplete="on">
						</div>
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<input type="text" class="form-control" placeholder="Piso"  name="piso" maxlength="11" autocomplete="on">
						</div>
					</div>
				</div>
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							<select class="form-control" name="ciudad" id="ciudad" required>
								<option value="" disabled selected>Ciudad</option>
								<option value="Buenos Aires">Buenos Aires</option>
								<option value="La Plata">La Plata</option>
								<option value="Bragado">Bragado</option>
								<option value="Pehuajo">Pehuajo</option>
								<option value="Pehuajo">Los Toldos</option>
							</select>
						</div>
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil"></span>
							<select class="form-control" name="provincia" id="provincia" required>
								<option value="" disabled selected>Provincia</option>
								<option value="Buenos Aires">Buenos Aires</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-inline">
 					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
							  <select class="form-control" name="pais" id="pais" required>
							  	<option value="" disabled selected>Pais</option>
							    <option value="Argentina">Argentina</option>
							  </select>
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