<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$comentario=mysql_query("SELECT * FROM comentario WHERE idComentario = '$_GET[com]'") or die ("problemas en consulta:".mysql_error());
	$comentario = mysql_fetch_array($comentario);
	$subasta=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$subasta = mysql_fetch_array($subasta);
	$fecha_fin_subasta = strtotime($subasta['fecha_fin']);
	if ((getdate()['year'] < date("Y",$fecha_fin_subasta)) 
	OR (getdate()['year'] == date("Y",$fecha_fin_subasta) AND getdate()['mon'] < date("n",$fecha_fin_subasta))
	OR (getdate()['year'] == date("Y",$fecha_fin_subasta) AND getdate()['mon'] == date("n",$fecha_fin_subasta) AND getdate()['mday'] <= date("j",$fecha_fin_subasta))){
		if ($comentario['respuesta'] != '') {
			//echo $comentario['respuesta'];
			echo 'Hay respuesta';
		}
		if ($comentario['respuesta'] == '') {
			$idNotificacion = $comentario['notificacion_comentario'];
			mysql_query("DELETE FROM usuario_notificacion WHERE Notificacion_numero_identificacion = '$idNotificacion'") or die ("problemas en consulta:".mysql_error());
			mysql_query("DELETE FROM notificacion WHERE idNotificacion = '$idNotificacion'") or die ("problemas en consulta:".mysql_error());
			mysql_query("DELETE FROM comentario WHERE idComentario = '$comentario[idComentario]'") or die ("problemas en consulta:".mysql_error());
			echo "Eliminado";
		}
	}
	else {
		echo "Fecha";
	}
	// IN (SELECT idNotificacion 
	// 	FROM notificacion 
	// 	WHERE id_publicacion = '$_GET[subID]')")
?>