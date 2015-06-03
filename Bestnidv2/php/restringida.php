<?php
	session_start();
	if (isset($_SESSION['username'])){
		echo "puedes ver esta pagina";
		echo "<br><a href=destruir.php>Cerrar Sesion</a>";
	}
	else {
		echo "no puedes ver esta pagina, registrate e inicia sesion";
	}
?>