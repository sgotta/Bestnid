<?php 
	//GUARDO LA OFERTA Y VUELVO A LA SUBASTA , SOLAPA OFERTAR
	include("conexion.php");
	session_start();
	if(isset($_POST['motivo']) && !empty($_POST['motivo']) &&
	  isset($_POST['precio']) && !empty($_POST['precio'])){
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		// $usuario=mysql_query(" SELECT nombre_usuario 
		// 						FROM usuario
		// 						WHERE nombre_usuario='$_SESSION[username]'") or die("problemas en consulta: ".mysql_error());
		mysql_query("INSERT INTO oferta (motivo,precio,ganador,Usuario_nombre_usuario,Publicacion_idPublicacion) 
					VALUES ('$_POST[motivo]','$_POST[precio]',0,'$_SESSION[username]','$_GET[subID]')",$con);
		$id = mysql_insert_id();
		$cor=1;
		include("notificar.php");
	}
	$header = "Location: subasta.php?subID=".$_GET['subID']."&op=2";
	//echo $header;
	header($header);
?>