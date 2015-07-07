<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$resultado = mysql_query("SELECT *
								FROM categoria",$con);

	echo '<h4>Mis Categorias: </h4>';

	if (mysql_num_rows($resultado)>0) {
		while ($cat=mysql_fetch_array($resultado)) {
			$label='<span id="labelEliminar" class="label label-danger" >Eliminar</span>';
			echo'<div class="list-group" style="border: solid 1px #D6D6D6;">
					  <h4 id="tituloCat">'.$cat['nombre'].$label.'</h4>';
			echo'</div>';
		}
	}else{
		echo '<div class="alert alert-warning" role="alert">"Usted no ha creado una categoria."</div>';
	}

?>

				