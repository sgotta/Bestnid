<?php 
	include("conexion.php");

	$usuario = $_REQUEST['usuario'];
	if (isset($usuario) && !empty($usuario)) {
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//chequeo si ya existe el usuario
		$registro=mysql_query("      
			SELECT * 
			FROM usuario
			WHERE nombre_usuario='$usuario'")
		or die("problemas en consulta: ".mysql_error());
		$cant=mysql_num_rows($registro);
		/*sleep(1);*/
		if ($cant > 0) {
			echo '<p class="text-danger">"El nombre de usuario <strong>'.$usuario.'</strong> ya está en uso, por favor elija otro."</p>';
		}else{
			echo '<p class="text-success">"Nombre de usuario <strong>OK!</strong>"</p>';
		}
	}

	

 ?>