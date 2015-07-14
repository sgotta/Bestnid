<?php
	include("conexion.php");


	$nombre= $_REQUEST['nombre'];
	
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
	
	include('altaCategoria.php'); 
	echo '<script type="text/javascript">', 'alert("Su categoria ha sido agregada"); document.location = paneldecontrol.php;', '</script>';

?>