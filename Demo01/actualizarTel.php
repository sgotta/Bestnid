<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$tel = $_REQUEST['telefono'];

	//actualizar base:
	mysql_query("UPDATE usuario 
					SET tel='$tel' 
					WHERE nombre_usuario = '$user'",$con) 
					or die ("problemas en consulta: ".mysql_error());

	echo '<script type="text/javascript">', 'alert("Su número de teléfono ha sido actualizado"); document.location = perfil.php;', '</script>';
	echo'<script>location.href="perfil.php"; </script>';

?>