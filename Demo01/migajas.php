<?php
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	if (isset($_GET['subID']) && !empty($_GET['subID'])){
		$registro=mysql_query("SELECT *
								FROM categoria INNER JOIN publicacion ON (Categoria_idCategoria = idCategoria) 
								WHERE idPublicacion = $_GET[subID]") or die ("problemas en consulta:".mysql_error());
		$registro=mysql_fetch_array($registro);
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
			echo '<li><a href="sesioniniciada.php" id="migaja">Inicio</a></li>';
			echo '<li><a href="sesioniniciada.php?catID='.$registro['idCategoria'].'" id="migaja">'.$registro['nombre'].'</a></li>';
		}
		else {
			echo '<li><a href="index.php" id="migaja">Inicio</a></li>';
			echo '<li><a href="index.php?catID='.$registro['idCategoria'].'" id="migaja">'.$registro['nombre'].'</a></li>';
		}
		echo '<li class="active">'.$registro['titulo'].'</li>';
	}
	else {
		if (isset($_GET['catID']) && !empty($_GET['catID'])) {
			$registro=mysql_query("SELECT * FROM categoria WHERE idCategoria = $_GET[catID]") or die ("problemas en consulta:".mysql_error());
			if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
				echo '<li><a href="sesioniniciada.php" id="migaja">Inicio</a></li>';
				echo '<li class="active">'.mysql_fetch_array($registro)['nombre'].'</li>';
			}
			else {
				echo '<li><a href="index.php" id="migaja">Inicio</a></li>';
				echo '<li class="active">'.mysql_fetch_array($registro)['nombre'].'</li>';
			}
		}
		else {
			echo '<li class="active">Inicio</li>';
		}
	}
?>