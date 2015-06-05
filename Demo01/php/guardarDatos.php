<?php
	include("conexion.php");
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['apellido']) && isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario'])){
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		mysql_query("INSERT INTO usuario (nombre,apellido,nombre_usuario) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[nombre_usuario]')",$con);
		echo "datos insertados";
	}else{
		echo "problemas al insertar datos";
	}
?>