<?php
	// $blob = get_image_data($_GET['imageID']);
	$blob = $_GET['publicacion'];
	include("conexion.php");
	echo "entra";
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM publicacion WHERE $blob = idPublicacion") or die ("problemas en consulta:".mysql_error());
	// header('Content-type: image/jpeg');
	// echo $registro['foto'];

	// $contenttype = mysql_result($result,0,"imgtype"); 
	// $image = mysql_result($result,0,"imgdata"); 
	// header("Content-type: $contenttype"); 
	// echo $image; 
	// mysql_close($dbconn); 
?>