<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	mysql_query("UPDATE publicacion SET finalizado = 1, fecha_pago = CURRENT_DATE() WHERE idPublicacion = '$_GET[idSub]'",$con);
	echo "ok";
?>