<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$reg=mysql_fetch_array($registro);
	echo   '<div class="thumbnail">    
				<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="No hay imagen" style="max-height: 250px;">
			</div>
		</section>
		<section class="posts col-md-6">
			<div class="form-group">
			    <h2>'.$reg['titulo'].'</h2>
			</div>
			<h5>Descripcion:</h5>
			<h5>'.$reg['descripcion'].'</h5><br>
			<div class="form-inline">
				<div class="">
		    		<h5>Inicio Subasta:<br>'.$reg['fecha_inicio'].'</h5>
				</div>
				<div class="">
		    		<h5>Fin Subasta:<br>'.$reg['fecha_fin'].'</h5>
				</div>
			</div><br>		
			</div><br>';
?>

