<?php 
	//0 ES COMENTARIO, 1 ES OFERTA, 2 ES RESPUESTA. SEGUN LO QUE SEA HAY QUE NOTIFICAR A DIFERENTES PERSONAS
	if ($cor == 0){
		//COMENTARIO
		//BUSCO EL DUEÑO DE LA SUBASTA PARA NOTIFICAR QUE LE HICIERON UN COMENTARIO
		$dueño=mysql_query("SELECT * 
							FROM publicacion p INNER JOIN usuario u ON (nombre_usuario=Usuario_nombre_usuario)
							WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
		$d=mysql_fetch_array($dueño);
		//TERMINO DE ARMAR LA NOTIFICACION
		$descrip = 'Tiene un nuevo comentario en la subasta: "'.$d['titulo'].'"'; //: "'.$_POST['coment'].'"
	}
	else {
		if ($cor == 1){
			//OFERTA
			//BUSCO EL DUEÑO DE LA SUBASTA PARA NOTIFICAR QUE LE HICIERON UNA OFERTA
			$dueño=mysql_query("SELECT * 
								FROM publicacion p INNER JOIN usuario u ON (nombre_usuario=Usuario_nombre_usuario)
								WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
			$d=mysql_fetch_array($dueño);
			//TERMINO DE ARMAR LA NOTIFICACION
			$descrip = 'Tiene una nueva oferta en la subasta: "'.$d['titulo'].'"';
		}
		else {
			if ($cor == 2){
				//RESPUESTA
				//BUSCO AL QUE HIZO LA PREGUNTA PARA NOTIFICAR QUE LE RESPONDIERON
				$dueño=mysql_query("SELECT Usuario_nombre_usuario1 as nombre_usuario, titulo 
									FROM comentario INNER JOIN publicacion ON (Publicacion_numero_publicacion = idPublicacion)
									WHERE idComentario = '$_GET[c]'") or die ("problemas en consulta:".mysql_error());
				$d=mysql_fetch_array($dueño);
				//TERMINO DE ARMAR LA NOTIFICACION
				$descrip = 'Tiene una nueva respuesta en la subasta: "'.$d['titulo'].'"'; //: "'.$_POST['response'].'"
			}
		}
	}
	//AGREGO LA NOTIFICACION A LA BASE
	mysql_query("INSERT INTO notificacion (descripcion,leida) VALUES ('$descrip','0')",$con);
	$idNotif = mysql_insert_id();
	//AHORA RELACIONO LA NOTIFICACION CON EL USUARIO
	mysql_query("INSERT INTO usuario_notificacion (Notificacion_numero_identificacion,Usuario_nombre_usuario) 
				 VALUES ('$idNotif','$d[nombre_usuario]')",$con);
?>