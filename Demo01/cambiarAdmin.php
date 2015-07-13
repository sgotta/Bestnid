<?php
	include("conexion.php");

	$usuario= $_POST['usuario'];
	
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//chequeo si ya existe y esta con borrado logico, la recupero//
		
	$resultado = mysql_query("UPDATE usuario
								SET admin='1' 
								WHERE nombre_usuario='$usuario'",$con);
	
	if (!$resultado) { //si hay error
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/
	}else{
		echo '<script type="text/javascript" >', 'alert("Se ha cambiado el rol a administrador");', 'window.location = "paneldecontrol.php";','</script>';
	}



?>