<?php
		echo'<section class="col-md-12">
			<form action="cambiarAdmin.php" enctype="multipart/form-data" role="form" id="formAdmin" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Cambiar a administrador: </h4>
					<select class="form-control col-md-4" name="usuario" id="usuario" required>
									<option value="" disabled selected>Usuarios</option>';
					echo include("opcionesUsuariosEstandar.php");
					echo'</select>
					<br><br>
    			    <div class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Seleccionar usuario"/>
							</div>
						</div>
					</div>
				</section>
			</form>
		</section>';
				

?>