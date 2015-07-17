<?php 
	echo '<form action="javascript:mostrarEstadistica1(document.forms.formAdmin);" enctype="multipart/form-data" role="form" id="formAdmin" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Elegir fecha de inicio: </h4>
					<div>
 						<input style="line-height: normal;" type="date" name="inicio" value="">
					</div>
					<h4>Elegir fecha de fin: </h4>
					<div>
 						<input style="line-height: normal;" type="date" name="fin" value="">
					</div>
					<br><br>
    			    <div class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Buscar"/>
							</div>
						</div>
					</div>
				</section>
			</form>';
 ?>
