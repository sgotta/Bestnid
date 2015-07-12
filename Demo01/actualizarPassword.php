<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$password = $_REQUEST['password'];
	$password1 = $_REQUEST['password1'];

	if ($password==$password1) {
		//actualizar base:
		mysql_query("UPDATE usuario 
						SET password='$password' 
						WHERE nombre_usuario = '$user'",$con) 
						or die ("problemas en consulta: ".mysql_error());

		echo '<script type="text/javascript">', 'alert("Su contraseña ha sido actualizada"); document.location = perfil.php;', '</script>';
		echo'<script>location.href="perfil.php"; </script>';
	}else{
		echo '<script type="text/javascript">', 'alert("Las contraseñas no coinciden, intentelo nuevamente"); document.location = perfil.php;', '</script>';
		echo'<script>location.href="perfil.php"; </script>';
	}
?>