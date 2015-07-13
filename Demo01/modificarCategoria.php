<?php
		echo'<section class="col-md-12">
			<form action="categoriaModificada.php" enctype="multipart/form-data" role="form" id="formCategoriaMod" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Seleccionar categoria: </h4>
					<select class="form-control col-md-4" name="categ" id="categ" required>
									<option value="" disabled selected>Categorias</option>';
					echo include("opcionesCategorias.php");
					echo' </select>
					<br><br><h4>Nuevo nombre: </h4>
				    <div class="form-group" id="divnombre">
					    <input type="text" class="form-control" onkeyup="validarnombrecategoria(this);" id="nombre" name="nombre" placeholder="Nombre de su categoria" required maxlength="45">
				    </div>
				     <span id="comprobarnombre"></span>
    			    <div class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Modificar categoria"/>
							</div>
						</div>
					</div>
				</section>
			</form>
		</section>';
					
?>