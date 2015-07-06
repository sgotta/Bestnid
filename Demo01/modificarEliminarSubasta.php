<?php
	$botones = '';
	include("conexion.php");
	/*VERIFICAR SI ES EL DUEÑO DE LA SUBASTA*/
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$subastaActiva=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$subastaActiva=mysql_fetch_array($subastaActiva);
	if ($subastaActiva['Usuario_nombre_usuario'] == $_SESSION['username']) {
		$botones = '<div class="btn-group" role="group" aria-label="...">
				  <a onclick= "modificarSubasta()" class="btn btn-default">Modificar subasta</a>
				  <a href="#eliminarSubasta" class="btn btn-default" data-toggle="modal">Eliminar subasta</a>
				</div>';
	}
	$botones = $botones.'</div><br>'; //PARA CERRAR EL DIV QUE VIENE DE INFOSUBASTA
	echo $botones;
?>