<?php
	include("conexion.php");
	

	$categ= $_POST['categ'];
	$nuevoNombre= $_POST['nombre'];
	
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$id= mysql_query("SELECT * FROM categoria WHERE nombre = '$categ' ",$con);
	$id= mysql_fetch_array($id);
	$id= $id['idCategoria'];
	$resultado = mysql_query("UPDATE categoria
							SET nombre='$nuevoNombre'
							WHERE idCategoria=$id",$con);
	
	if (!$resultado) { //si hay error
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/
	}else{
	include('altaCategoria.php'); 
	echo '<script type="text/javascript">', 'alert("Su categoria ha sido modificada"); document.location = paneldecontrol.php;', '</script>';


	}
?>