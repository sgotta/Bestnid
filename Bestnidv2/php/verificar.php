<?php 
	session_start();
	include("conexion.php");
	if(	isset($_POST['usuario']) && !empty($_POST['usuario']) && 
		isset($_POST['pw']) && !empty($_POST['pw']))
	{
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		$sel=mysql_query("SELECT USER, PW FROM registro WHERE USER = '$_POST[usuario]'",$con);
		$sesion=mysql_fetch_array($sel);
		if($_POST['pw'] == $sesion['PW']){
			$_SESSION['username'] = $_POST['usuario'];
			echo "sesion exitosa";
			echo "<br><a href=restringida.php>Ir a seccion</a>";
		}
		else {
			echo "combinacion erronea";
		}
	}
	else {
		echo "debes llenar ambos campos";
	}
?>