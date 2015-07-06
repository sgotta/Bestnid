<?php

	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$ofertasDeSubasta=mysql_query("SELECT * FROM oferta WHERE Publicacion_idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	//SI NO SE HIZO NINGUNA OFERTA SE PUEDE MODIFICAR LA SUBASTA, MUESTRO FORMULARIO PARA REALIZAR MODIFICACION
	if(mysql_num_rows($ofertasDeSubasta) == 0) {
		$datosSubasta=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		$data=mysql_fetch_array($datosSubasta);
		$html1 = '<section class="posts container col-md-12 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<!-- form registrar subasta -->
					<section class="posts container col-md-12">
						<form action="modificacionSubasta.php?subID='.$_GET['subID'].'" enctype="multipart/form-data" role="form" id="reg-subasta-form" method="post">
						<section class="col-md-4">
							<div class="thumbnail">    
								<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $data['foto'] ).'" alt="No hay imagen" style="max-height: 250px;">
							</div>
							<span id="comprobarsize"></span> 
							<div class="form-group" id="divfoto">
								<!-- <input type="hidden" name="MAX_FILE_SIZE" value="8388608">   -->
							    <input type="file" id="foto" name="foto" onchange="validarsize(this);">
						    </div>
						</section>
						<section class="col-md-8">
						  <div class="form-group">
						    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de su publicación" value="'.$data['titulo'].'" maxlength="45">
						  </div>

						  <textarea class="form-control" rows="5" placeholder="Descripción del producto" name="descripcion" id="descripcion" maxlength="300">'.$data['descripcion'].'</textarea><br>
						  	<div class="form-inline">
								<div class="form-group col-md-8">
									<label for="duracion-subasta">Duración de la subasta:</label>
									<input type="text" name="duracion-subasta" id="duracion-subasta" value="unset">					
							  	</div><br>
								<select class="form-control col-md-4" style="margin-top: 25px;" name="categ" id="categ">
									<option value="" disabled selected>Categorias</option>';
									
									$html2 = include("opcionesCategorias.php");
									$html1 = $html1.$html2;
								$html1 = $html1.'</select>
							</div>

						  <div class="form-inline" style="margin-left:100px;">
							<div class="form-group">
								<div class="input-group">
									<a href="subasta.php?subID='.$_GET['subID'].'" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
								</div>
								<div class="input-group">
									<input type="submit" class="btn btn-primary" id="btn-registro" value="Registrar Subasta"/>
								</div>
							</div>
						  </div><br>

						</form>
						</section>
					</section>
				</div>
			</section>';
		echo $html1;
	}
	//ALGUIEN OFERTO, NO SE PUEDE MODIFICAR LA SUBASTA
	else {
		echo 'No se puede modificar';
	}
?>