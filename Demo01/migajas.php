<?php
	include("conexion.php");
	if (isset($_GET['catID']) && !empty($_GET['catID'])) {
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		$registro=mysql_query("SELECT * FROM categoria WHERE idCategoria = $_GET[catID]") or die ("problemas en consulta:".mysql_error());
		echo '<li><a href="index.php" id="migaja">Inicio</a></li>';
		echo '<li class="active">'.mysql_fetch_array($registro)['nombre'].'</li>';
	}
	else {
		echo '<li class="active">Inicio</li>';
	}
?>