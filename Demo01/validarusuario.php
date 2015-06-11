<?php 
	include("conexion.php");

	$usuario = $_REQUEST['usuario'];

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//chequeo si ya existe el usuario
		$registro=mysql_query("      
			SELECT * 
			FROM usuario
			WHERE nombre_usuario='$usuario'")
		or die("problemas en consulta: ".mysql_error());
		$cant=mysql_num_rows($registro);
		if ($cant > 0) {
			echo "El usuario ya existe, elija otro nombre de usuario";
		}else{
			echo "Nombre de usuario OK!";
		}

 ?>