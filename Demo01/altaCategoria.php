<?php
		echo'<section class="col-md-12">
			<form action="javascript:validarnombrecategoria(document.forms.formCategoria);" enctype="multipart/form-data" role="form" id="formCategoria" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Nueva categoria:</h4>
				    <div class="form-group" id="divnombre">
					    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de su categoria" maxlength="45" required autocomplete="off">
				    </div>
				    <span id="comprobarnombre"></span>
    			    <div class="form-inline" >
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Agregar categoria"/>
							</div>
						</div>
					</div>
				</section>
			</form>
		</section>';

		
?>