<?php
	include("conexion.php");
	$retornar = '';
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$publicacion=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$publicacion=mysql_fetch_array($publicacion);
	$fecha_fin = strtotime($publicacion['fecha_fin']);
	if ((getdate()['year'] < date("Y",$fecha_fin)) 
	OR (getdate()['year'] == date("Y",$fecha_fin) AND getdate()['mon'] < date("n",$fecha_fin))
	OR (getdate()['year'] == date("Y",$fecha_fin) AND getdate()['mon'] == date("n",$fecha_fin) AND getdate()['mday'] <= date("j",$fecha_fin))){
		//LA SUBASTA NO FINALIZO, SE PUEDE ELIMINAR LA SUBASTA
		mysql_query("DELETE FROM usuario_notificacion WHERE Notificacion_numero_identificacion IN (SELECT idNotificacion 
																								FROM notificacion 
																								WHERE id_publicacion = '$_GET[subID]')") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM notificacion WHERE id_publicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM comentario WHERE Publicacion_numero_publicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM oferta WHERE Publicacion_idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		$retornar = 'Eliminada'; 
	}
	else {
		$retornar = 'No eliminada'; 
	}
	echo $retornar;
?>