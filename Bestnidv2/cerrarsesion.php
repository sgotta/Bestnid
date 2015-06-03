<?php
	session_start();
	session_destroy();
	// echo "has cerrado sesion";
	header("Location: index.php");


?>