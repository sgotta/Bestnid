<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$reg=mysql_query("SELECT id_usuario FROM usuario WHERE nombre='$_POST[nombre]'",$con);
	echo "datos seleccionados";
	if($r1=mysql_fetch_array($reg)){
		mysql_query("DELETE FROM usuario WHERE nombre='$_POST[nombre]'",$con);
		echo "datos eliminados";
	}else{
		echo "datos no eliminados";
	}
?>