<?php
	include("conexion.php");


	$nombre= $_POST['nombre'];
	
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//chequeo si ya existe y esta con borrado logico, la recupero//
	$categ= mysql_query("SELECT * FROM categoria WHERE nombre='$nombre'",$con);
	if(mysql_num_rows($categ) > 0){
		$resultado = mysql_query("UPDATE categoria
								SET borrado='0' 
								WHERE nombre='$nombre'",$con);
	}else{
		$resultado = mysql_query("INSERT INTO categoria (nombre) 
								VALUES ('$nombre')",$con);
	}
	
	if (!$resultado) { //si hay error
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/
	}else{
		header("Location: paneldecontrol.php");
	}
?>