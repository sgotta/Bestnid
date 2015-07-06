<?php 
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		echo '<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>';
		include ("notificacion.php");
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