<?php 
	session_start();
	include("conexion.php");
	if(	isset($_POST['username']) && !empty($_POST['username']) && 
		isset($_POST['password']) && !empty($_POST['password']))
	{
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		$sel=mysql_query("SELECT nombre_usuario, password FROM usuario WHERE nombre_usuario = '$_POST[username]'",$con);
		$sesion=mysql_fetch_array($sel);
		if($_POST['password'] == $sesion['password']){
			$_SESSION['username'] = $_POST['username'];
			// echo "sesion exitosa";
			// echo "<br><a href=restringida.php>Ir a seccion</a>";
			header("Location: sesioniniciada.php");
		}
		else {
			//echo "combinacion erronea";			
			echo '<script type="text/javascript">', 'alert("Nombre de usuario o password incorrecta"); document.location = iniciarsesion.php;', '</script>';
			echo'<script>location.href="iniciarsesion.php"; </script>';
		}
	}
	else {
		//echo "debes llenar ambos campos";
		echo '<script type="text/javascript">', 'alert("Se deben completar ambos campos"); document.location = iniciarsesion.php;', '</script>';
		echo'<script>location.href="iniciarsesion.php"; </script>';
	}
?>