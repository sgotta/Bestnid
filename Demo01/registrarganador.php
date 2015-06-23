<?php //acá finalizo la subasta, se va a registrar que hay un ganador y notificar al mismo.
	include("conexion.php");
	session_start();

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$idOfertaGanadora = $_POST['optionsRadios'];

	//Me fijo a que usuario le tengo que notificar que ganó.
	$nombreGanador=mysql_query("SELECT Usuario_nobre_usuario  
								FROM oferta
								WHERE idOferta='$idOfertaGanadora'") 
								or die ("problemas en consulta:".mysql_error());

	//Actualizo el campo ganador en 1 para poder consultar en un futuro quien ganó esta subasta.
	/*mysql_query("UPDATE oferta SET ganador = 1 WHERE idOferta = '$idOfertaGanadora'",$con);*/

	//FALTA:
	//Agregar dos notificaciones, una Ganador, otra Perdedores
	//Notificar a todos los usuarios que participaron de esta subasta.


	


	// **** ESTO ES COPY PASTE DE LO DE NICO PARA TERMINAR LO QUE ME FALTA **** //

	//AGREGO LA NOTIFICACION A LA BASE
	/*mysql_query("INSERT INTO notificacion (descripcion,leida) VALUES ('$descrip','0')",$con);
	$idNotif = mysql_insert_id();
	//AHORA RELACIONO LA NOTIFICACION CON EL USUARIO
	mysql_query("INSERT INTO usuario_notificacion (Notificacion_numero_identificacion,Usuario_nombre_usuario) 
				 VALUES ('$idNotif','$d[nombre_usuario]')",$con);*/

	// **** FIN COPY PASTE DE LO DE NICO PARA TERMINAR LO QUE ME FALTA **** //
	
 ?>