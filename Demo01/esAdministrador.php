<?php 
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		include("conexion.php");
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//CANTIDAD DE notificaciones PARA BADGE
		$usuario=mysql_query("SELECT * 
					 FROM usuario 
					WHERE usuario.nombre_usuario='$_SESSION[username]'") or die ("problemas en consulta:".mysql_error());
		
		if($usuario['administrador'] == 0){
			echo '<li><a href="paneldecontrol.php">Panel de control</a></li>';
		}
 
	}
?>

