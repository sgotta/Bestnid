<?php
	include("conexion.php");
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) && 
		isset($_POST['usuario']) && !empty($_POST['usuario']) && 
		isset($_POST['pw']) && !empty($_POST['pw']) &&
		isset($_POST['pw2']) && !empty($_POST['pw2']) &&
		isset($_POST['email']) && !empty($_POST['email']) &&
		($_POST['pw'] == $_POST['pw2']))
	{
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		mysql_query("INSERT INTO registro (NOMBRE,USER,PW,EMAIL) VALUES ('$_POST[nombre]','$_POST[usuario]','$_POST[pw]','$_POST[email]')",$con);
		echo "datos insertados"."<br>";
		echo "Nombre:".$_POST['nombre']."<br>";
		echo "User:".$_POST['usuario']."<br>";
		echo "Pass:".$_POST['pw']."<br>";
		echo "E-mail:".$_POST['email'];
	}else{
		echo "Pass:".$_POST['pw']."<br>";
		echo "Pass2:".$_POST['pw2']."<br>";
		echo "verifica datos o contraseña incorrecta";
	}
?>