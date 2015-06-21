<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bestnid | Sitio de subastas</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilosBestnid.css">
	<link rel="shortcut icon" href="favicon.jpg" type="image/jpeg"/>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

</head>
<body>
	<header>
		<?php session_start(); ?>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="sesioniniciada.php" class="navbar-brand">Bestnid</a>
				</div>
				<!-- inicia menu -->
				<div class="collapse navbar-collapse pull-right" id="navegacion-fm">
					<form action="sesioniniciada.php" method="get" class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda" name="buscar">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</form>
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<a href="#" class="glyphicon glyphicon-bullhorn" id="inicio"></a>
					
					<span class="dropdown">
						<li class="dropdown dropdown-user pull-right nav navbar-nav">
					
							<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION['username']." "; ?><span class="glyphicon glyphicon-user"></span></a>
							<!-- <a href="#"  >
								Categorias <span class="caret"></span>
							</a> -->
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Perfil</a></li>
								<li><a href="cerrarsesion.php">Cerrar sesion</a></li>
							</ul>
						</li>
					</span>
				</div>
			</div>
		</nav>
	</header>
	<section class="main container">
		<section class="container">
			<div class="miga-de-pan col-md-9 ">
				<ol class="breadcrumb pull-left">
					<li class="">Inicio</li>
					<li class="active">Registro Subasta</li>
				</ol>
			</div>
		</section>
		<div class="row">			
			<section class="posts container col-md-12 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<section class="posts col-md-6">
						<div class="thumbnail">    
							<img class="img-thumbnail" src="img/logobestnid.jpg" alt="No hay imagen" style="max-height: 250px;">
						</div>
						<div class="form-group">
						    <input type="file" id="imagen">
						    <!-- <p class="help-block">Subir imagen del producto que desea subastar.</p> -->
					    </div>
					</section>
					<!-- form registrar subasta -->
					<section class="posts col-md-6">
						<form>
						  <div class="form-group">
						    <input type="text" class="form-control" id="titulo" placeholder="Título de su publicación">
						  </div>
						  <textarea class="form-control" rows="5" placeholder="Descripción del producto"></textarea><br>
						  <div class="form-inline">
							<div class="input-group">
								<label for="fecha-inicio">Inicio Subasta</label>
					    		<input type="date" class="form-control" id="fecha-inicio">
							</div>
							<div class="input-group">
								<label for="fecha-fin">Fin Subasta</label>
					    		<input type="date" class="form-control" id="fecha-fin">
							</div>
						  </div><br>
						  <div class="form-inline">
							<div class="form-group">
								<div class="input-group">
									<a href="sesioniniciada.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
								</div>
								<div class="input-group">
									<button type="button" class="btn btn-primary" id="btn-registro"> Registrar Subasta </button>
								</div>
							</div>
						  </div><br>
						</form>
					</section>
				</div>
			</section>
		</div>
	</section>
	<footer id="foot">
		<span id="contacto"> Contacto </span><br>
		<span class="glyphicon glyphicon-envelope" id="correo"></span>
		<span> bestnid.administracion@bestnid.com.ar </span><br>
		<span class="glyphicon glyphicon-earphone" id="correo"></span>
		<span> (0800) - 555 - 5555 </span><br>
		<span id="creds"> Desarrollado por Strategus </span>
	</footer>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>