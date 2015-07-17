<?php 
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		include("conexion.php");
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//CANTIDAD DE notificaciones PARA BADGE
		$cant=mysql_query("SELECT * 
					 FROM notificacion INNER JOIN usuario_notificacion
					 ON usuario_notificacion.Usuario_nombre_usuario='$_SESSION[username]'
					 AND usuario_notificacion.Notificacion_numero_identificacion=notificacion.idNotificacion
					 AND notificacion.leida=0") or die ("problemas en consulta:".mysql_error());
		$cant=mysql_num_rows($cant);
		
		if ($cant == 0){
			 echo '<a href="#notif" class="glyphicon glyphicon-bullhorn" data-toggle="modal" id="inicio"></a>';
			} else {
			echo '<a href="javascript:cambiarALeida();" class="glyphicon glyphicon-bullhorn" id="inicio-camp"><span class="badge" id="badge-notif">'.$cant.'</span></a>';
		} 
	}
?>