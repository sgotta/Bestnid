<?php
	//se comprobó todo antes de llegar acá, asi que solamente se registra el usuario en la base de datos y se inicia la sesión.
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	
	$resultado = mysql_query("INSERT INTO usuario (nombre_usuario,nombre,apellido,password,mail,tel,calle,nro,ciudad,provincia,pais,depto,piso) 
	VALUES ('$_POST[username]','$_POST[nombre]','$_POST[apellido]','$_POST[password]','$_POST[mail]','$_POST[telefono]','$_POST[calle]','$_POST[numero]','$_POST[ciudad]','$_POST[provincia]','$_POST[pais]','$_POST[depto]','$_POST[piso]')",$con);
	
	if (!$resultado) { //a este caso se llega si se modifica el nombre de usuario con todos los campos completos y se hace submit.
		
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/

		/*echo "<script type='text/javascript'>"; "otra opción: volver a pág. anterior"
	    echo "window.history.back(-1)";
	    echo "</script>";*/

	}else{

		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: sesioniniciada.php");
	
	}
?>