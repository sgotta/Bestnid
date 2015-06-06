<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bestnid | Sitio de subastas</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilosBestnid.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.jpg" type="image/jpeg"/>
</head>
<body>
	
	<header>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">Bestnid</a>
				</div>
				<!-- inicia menu -->
				<div class="collapse navbar-collapse" id="navegacion-fm">
					

					<!-- <form action="" class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</form> -->
					
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
				</div>
			</div>
		</nav>
	</header>
	<!-- <a class="glyphicon glyphicon-circle-arrow-left btn-lg"></a> -->
	<section class="jumbotron">
		<div class="container">
			<img src="img/logobestnid.jpg" class="imagen-jumbotron">
			<h1 id="bienvenida">Bienvenido a Bestnid</h1>
			<p id="desc-bienvenida">Donde las personas y sus necesidades valen mucho<br>más que el dinero.</p>
		</div>
	</section>
	<!-- <a class="glyphicon glyphicon-circle-arrow-right btn-lg"></a> -->
	<section class="main container">
		<section class="container">
			<div class="miga-de-pan col-md-9 ">
				<ol class="breadcrumb pull-left">
					<li><a href="index.php" id="migaja">Inicio</a></li>
					<li class="active">Iniciar sesion</li>
				</ol>
			</div>
			<!-- <li class="dropdown pull-right nav navbar-nav">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ordenar<span class="caret"></span></a>

				<ul class="dropdown-menu col-md-3" role="menu">
					<li><a href="#">Mas reciente</a></li>
					<li class="divider"></li>
					<li><a href="#">Menos reciente</a></li>
				</ul>
			</li> -->
		</section>
		

		<div class="row container">	
			<style>
				section {
					margin-bottom: 50px;
				}
				#registro-form {
					margin-left: 300px;
				}
			</style>		
			<section class="posts container col-md-12">
				<div class="row"> 
					<form action="iniciasesion.php" class="navbar-form container" role="form" id="registro-form" method="post">
						<span id="spanRegistro">Inicia sesion</span>
						<div class="form-group">
							<div class="form-inline">
			 					<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-user"></span>
										<input type="text" class="form-control" placeholder="Nombre de usuario" name="username" required maxlength="16">
									</div>
								</div>
							</div>
							<div class="form-inline">
			 					<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-asterisk"></span>
										<input type="password" class="form-control" placeholder="Contraseña" name="password" required minlength="8" maxlength="45">
									</div>
								</div>
							</div>
							<div class="form-inline">
			 					<div class="form-group">
									<div class="input-group">
										<a href="index.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
									</div>
									<div class="input-group">
										<input type="submit" class="btn btn-primary" id="btn-registro" value="Iniciar sesion"/>
									</div>
								</div>
							</div>	
						</div>
					</form>
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