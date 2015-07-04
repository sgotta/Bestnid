<?php 
	session_start();
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$resultado = mysql_query("SELECT *
								FROM publicacion
								WHERE Usuario_nombre_usuario='$user'",$con);
	if ($resultado>0) {
		while ($publicacion=mysql_fetch_array($resultado)) {
			echo $publicacion['titulo'];
			echo "<br>";
			echo $publicacion['descripcion'];
			echo "<br>";
			echo $publicacion['fecha_inicio'];
			echo '&nbsp; &nbsp';
			echo $publicacion['fecha_fin'];
			echo "<br>";
			echo "<br>";
		}
	}else{
		echo "Usted no tiene subastas.";
	}
	
?>