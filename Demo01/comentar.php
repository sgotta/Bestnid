<?php 
	//GUARDO EL COMENTARIO Y VUELVO A LA SUBASTA
	include("conexion.php");
	session_start();
	if(isset($_POST['coment']) && !empty($_POST['coment'])){
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		// $usuario=mysql_query(" SELECT nombre_usuario 
		// 						FROM usuario
		// 						WHERE nombre_usuario='$_SESSION[username]'") or die("problemas en consulta: ".mysql_error());
		mysql_query("INSERT INTO comentario (descripcion,Usuario_nombre_usuario1,Publicacion_numero_publicacion) 
					 VALUES ('$_POST[coment]','$_SESSION[username]','$_GET[subID]')",$con);
		$id = mysql_insert_id();
		$cor=0;
		include("notificar.php");
	}
	$header = "Location: subasta.php?subID=".$_GET['subID'];
	//echo $header;
	header($header);
?>