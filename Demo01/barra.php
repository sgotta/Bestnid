<?php 
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		include("conexion.php");
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		//CANTIDAD DE OFERTAS PARA BADGE
		$cant=mysql_query("SELECT * 
					 FROM notificacion INNER JOIN usuario_notificacion
					 ON usuario_notificacion.Usuario_nombre_usuario='$_SESSION[username]'
					 AND usuario_notificacion.Notificacion_numero_identificacion=notificacion.idNotificacion
					 AND notificacion.leida=0") or die ("problemas en consulta:".mysql_error());
		$cant=mysql_num_rows($cant);
		echo '<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>';
		if ($cant == 0){
			 echo '<a href="#notif" class="glyphicon glyphicon-bullhorn" data-toggle="modal" id="inicio"></a>';
			} else {
				echo '<a href="#notif" class="glyphicon glyphicon-bullhorn" data-toggle="modal" id="inicio"><span class="badge" id="badge-notif">'.$cant.'</span></a>';
		} 
		echo '<span class="dropdown">
				<li class="dropdown dropdown-user pull-right nav navbar-nav">
					<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button">'.$_SESSION['username']." ".'<span class="glyphicon glyphicon-user"></span></a>
					<!-- <a href="#"  >
						Categorias <span class="caret"></span>
					</a> -->
					<ul class="dropdown-menu" role="menu">
						<li><a href="perfil.php">Perfil</a></li>
						<li><a href="cerrarsesion.php">Cerrar sesion</a></li>
					</ul>
				</li>
			</span>';
	}
	else {
		echo '<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
			<a href="registrarse.php" id="inicio">Registrarse</a>
			<a href="iniciarsesion.php" id="inicio">Ingresar</a>';
	}
?>