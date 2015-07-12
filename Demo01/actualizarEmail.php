<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$email = $_REQUEST['mail'];

	//actualizar base:
	mysql_query("UPDATE usuario 
					SET mail='$email' 
					WHERE nombre_usuario = '$user'",$con) 
					or die ("problemas en consulta: ".mysql_error());

	echo '<script type="text/javascript">', 'alert("Su E-mail ha sido actualizado"); document.location = perfil.php;', '</script>';
	echo'<script>location.href="perfil.php"; </script>';

?>