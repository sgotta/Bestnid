<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$oferta=mysql_query("SELECT * FROM oferta WHERE idOferta = '$_GET[of]'") or die ("problemas en consulta:".mysql_error());
	$oferta = mysql_fetch_array($oferta);

	$subasta=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$subasta = mysql_fetch_array($subasta);

	$fecha_fin_subasta = strtotime($subasta['fecha_fin']);

	if ((getdate()['year'] < date("Y",$fecha_fin_subasta)) 
	OR (getdate()['year'] == date("Y",$fecha_fin_subasta) AND getdate()['mon'] < date("n",$fecha_fin_subasta))
	OR (getdate()['year'] == date("Y",$fecha_fin_subasta) AND getdate()['mon'] == date("n",$fecha_fin_subasta) AND getdate()['mday'] <= date("j",$fecha_fin_subasta))){
		$idNotificacion = $oferta['notificacion_oferta'];
		mysql_query("DELETE FROM usuario_notificacion WHERE Notificacion_numero_identificacion = '$idNotificacion'") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM notificacion WHERE idNotificacion = '$idNotificacion'") or die ("problemas en consulta:".mysql_error());
		mysql_query("DELETE FROM oferta WHERE idOferta = '$oferta[idOferta]'") or die ("problemas en consulta:".mysql_error());
		echo "Eliminada";
	}
	else {
		echo "Fecha";
	}
	// IN (SELECT idNotificacion 
	// 	FROM notificacion 
	// 	WHERE id_publicacion = '$_GET[subID]')")
?>