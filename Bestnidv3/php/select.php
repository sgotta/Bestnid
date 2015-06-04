<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM usuario") or die ("problemas en consulta:".mysql_error());
	while($reg=mysql_fetch_array($registro)){
		echo $reg['nombre']."<br>";
		echo $reg['apellido']."<br>";
		echo $reg['nombre_usuario']."<br>"."<br>";
	}

	echo "datos seleccionados"."<br>";
?>