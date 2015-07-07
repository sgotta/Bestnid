<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	if (mysql_num_rows($registro) > 0) {
		$reg=mysql_fetch_array($registro);
		echo   '<div class="thumbnail">    
					<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="No hay imagen" style="max-height: 250px;">
				</div>
			</section>
			<section class="posts col-md-6" id="infoSubas">
				<div class="form-group" id="tituloSub">
				    <span>'.$reg['titulo'].'</span>
				</div>
				<h5><u>Descripcion:</u></h5>
				<h5>'.$reg['descripcion'].'</h5><br>
				<div class="form-inline">
					<div class="">
			    		<h5><u>Inicio Subasta:</u> '.$reg['fecha_inicio'].'</h5>
					</div>
					<div class="">
			    		<h5><u>Fin Subasta:</u> '.$reg['fecha_fin'].'</h5>
					</div>
				</div><br>		
				';
	}
	else {
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
			echo '<script type="text/javascript">', 'alert("La subasta seleccionada fue eliminada, redireccionando...");', 'window.location="sesioniniciada.php";', '</script>';
		}
		else {
			echo '<script type="text/javascript">', 'alert("La subasta seleccionada fue eliminada, redireccionando...");', 'window.location="index.php";', '</script>';
		}
	}
?>

