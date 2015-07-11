<?php
	include("conexion.php");
	
	$categ=   $_GET['categ'];

	$retornar = '';
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$id= mysql_query("SELECT * FROM categoria WHERE nombre = '$categ' ",$con);
	$id= mysql_fetch_array($id);
	$id= $id['idCategoria'];
	/* me quedo con las publicaciones de esa categoria que esten activas*/
	$contador = mysql_query("SELECT *
							FROM publicacion
							WHERE Categoria_idCategoria='$id'
							AND finalizado=0",$con);
	$contador= mysql_num_rows($contador);


	mysql_query("UPDATE categoria
				SET borrado=1
				WHERE idCategoria=$id",$con);
	if($contador==0){ /*Se puede eliminar*/
		$retornar = 'Eliminada';
	}else{ /*Hay publicaciones activas*/
			
		$retornar = 'No eliminada';
		/*echo 'No se puede eliminar su categoria, usted tiene '.$contador.' publicaciones activas. Quedara desactivada para proximas publicaciones';*/
	}
	echo $retornar;

?>