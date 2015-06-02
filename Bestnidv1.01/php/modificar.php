<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas en server"); 
	mysql_select_db($db,$con) or die ("problemas con DB");
	mysql_query("UPDATE usuario set nombre='$_POST[nuevo]' WHERE nombre='$_POST[viejo]'",$con) or die (mysql_error());
	echo "Actualizacion correcta";
?>