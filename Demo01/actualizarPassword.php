<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$password = $_REQUEST['password'];
	
	//actualizar base:
	$resultado=mysql_query("UPDATE usuario 
					SET password='$password' 
					WHERE nombre_usuario = '$user'",$con) 
					or die ("problemas en consulta: ".mysql_error());

	if (!$resultado) {
		echo "Problemas al actualizar contraseña";
	}else{
		echo "Se actualizó";
	}

?>