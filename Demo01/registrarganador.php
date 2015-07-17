<?php //acá finalizo la subasta, se va a registrar que hay un ganador y notificar al mismo.
	include("conexion.php");
	session_start();

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$idOfertaGanadora = $_POST['optionsRadios'];

	//Actualizo el campo ganador en 1 para poder consultar en un futuro quien ganó esta subasta.
	mysql_query("UPDATE oferta SET ganador = 1 WHERE idOferta = '$idOfertaGanadora'",$con);

	//Consulto todos los datos de la oferta ganadora.
	$query = mysql_query("SELECT *  
					FROM oferta
					WHERE idOferta='$idOfertaGanadora'") 
					or die ("problemas en consulta:".mysql_error());

	$ofertaGanadora=mysql_fetch_array($query);
	$ganador=$ofertaGanadora['Usuario_nombre_usuario'];
	$idPublicacion=$ofertaGanadora['Publicacion_idPublicacion'];

	//busco también la publicación en cuestión (El producto en sí, que se está subastando).
	$query = mysql_query("SELECT *  
					FROM publicacion
					WHERE idPublicacion='$idPublicacion'") 
					or die ("problemas en consulta:".mysql_error());

	$datosSubasta=mysql_fetch_array($query);
	$tituloSubasta=$datosSubasta['titulo'];

	//Agregamos dos notificaciones, una para el ganador, otra para los Perdedores.
	//GANADOR
	$msjGanador= 'Felicidades! Usted es el ganador de la subasta: "'.$tituloSubasta.'". En breve le informaremos como realizar el pago.';
	//AGREGO LA NOTIFICACION A LA BASE 
	mysql_query("INSERT INTO notificacion (descripcion,leida,id_publicacion) VALUES ('$msjGanador','0','$_GET[subID]')",$con);
	$idNotif = mysql_insert_id();
	//AHORA RELACIONO LA NOTIFICACION CON EL USUARIO
	mysql_query("INSERT INTO usuario_notificacion (Notificacion_numero_identificacion,Usuario_nombre_usuario) 
				 VALUES ('$idNotif','$ganador')",$con);
	//PERDEDORES
	$msjPerdedor= 'Lamentamos informarle que no ha sido seleccionado como ganador de la subasta: "'.$tituloSubasta.'". Bestnid le desea mucha suerte para sus proximas participaciones!';
	//Consulto sobre todos los participantes para esta subasta.
	$query = mysql_query("SELECT Usuario_nombre_usuario  
					FROM oferta
					WHERE Publicacion_idPublicacion='$idPublicacion'") 
					or die ("problemas en consulta:".mysql_error());

	while ($participante=mysql_fetch_array($query)) {
		//AGREGO LA NOTIFICACION A LA BASE
		if ($participante['Usuario_nombre_usuario']!=$ganador) {
		 	mysql_query("INSERT INTO notificacion (descripcion,leida,id_publicacion) VALUES ('$msjPerdedor','0','$_GET[subID]')",$con);
			$idNotif = mysql_insert_id();
			//AHORA RELACIONO LA NOTIFICACION CON EL USUARIO
			mysql_query("INSERT INTO usuario_notificacion (Notificacion_numero_identificacion,Usuario_nombre_usuario) 
						 VALUES ('$idNotif','$participante[Usuario_nombre_usuario]')",$con);
		}
	}
	$head = "Location: subasta.php?subID=".$_GET['subID']."&op=2";
	header($head);
 ?>