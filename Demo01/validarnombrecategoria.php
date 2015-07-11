<?php 
	include("conexion.php");

	$nombre = $_REQUEST['nombre'];
	if (isset($nombre) && !empty($nombre)) {
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//chequeo si ya existe el usuario
		$registro=mysql_query("      
			SELECT * 
			FROM categoria
			WHERE nombre='$nombre'
			AND borrado=0")
		or die("problemas en consulta: ".mysql_error());
		$cant=mysql_num_rows($registro);
		/*sleep(1);*/
		if ($cant > 0) {
			echo '<p class="text-danger">"El nombre de la categoria <strong>'.$nombre.'</strong> ya está en uso, por favor elija otro."</p>';
		}else{
			echo '<p class="text-success">"Nombre de categoria <strong>OK!</strong>"</p>';
		}
	}

	

 ?>