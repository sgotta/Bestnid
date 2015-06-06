<?php
	include("conexion.php");
// verificar si el usuario ya esta registrado

	if(isset($_POST['username']) && !empty($_POST['username']) && 
		isset($_POST['password']) && !empty($_POST['password']) && 
		isset($_POST['nombre']) && !empty($_POST['nombre']) &&
		isset($_POST['apellido']) && !empty($_POST['apellido']) &&
		isset($_POST['telefono']) && !empty($_POST['telefono']) &&
		isset($_POST['mail']) && !empty($_POST['mail']) &&
		isset($_POST['calle']) && !empty($_POST['calle']) &&
		isset($_POST['numero']) && !empty($_POST['numero']) &&
		isset($_POST['ciudad']) && !empty($_POST['ciudad']) &&
		isset($_POST['provincia']) && !empty($_POST['provincia']) &&
		isset($_POST['pais']) && !empty($_POST['pais']))
	{
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		mysql_query("INSERT INTO usuario (nombre_usuario,nombre,apellido,password,mail,tel,calle,nro,ciudad,provincia,pais,depto,piso) VALUES ('$_POST[username]','$_POST[nombre]','$_POST[apellido]','$_POST[password]','$_POST[mail]','$_POST[telefono]','$_POST[calle]','$_POST[numero]','$_POST[ciudad]','$_POST[provincia]','$_POST[pais]','$_POST[depto]','$_POST[piso]')",$con);
		// echo "datos insertados"."<br>";
		// echo $_POST['username']."<br>";
		// echo $_POST['nombre']."<br>";
		// echo $_POST['apellido']."<br>";
		// echo $_POST['password']."<br>";
		// echo $_POST['mail']."<br>";
		// echo $_POST['telefono']."<br>";
		// echo $_POST['calle']."<br>";
		// echo $_POST['numero']."<br>";
		// echo $_POST['ciudad']."<br>";
		// echo $_POST['provincia']."<br>";
		// echo $_POST['pais']."<br>";
		// echo $_POST['depto']."<br>";
		// echo $_POST['piso']."<br>";
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: sesioniniciada.php");

	}else{
		// echo "Pass:".$_POST['pw']."<br>";
		// echo "Pass2:".$_POST['pw2']."<br>";
		echo '<script type="text/javascript">', 'alert("Hey parece que hay alguien registrado con este nombre de usuario, por favor, elige otro");', '</script>';
		echo'<script>location.href="registrarse.php"; </script>';
	}
?>