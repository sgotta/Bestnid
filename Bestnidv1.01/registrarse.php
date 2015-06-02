<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bestnid | Sitio de subastas</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
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
					

					<form action="" class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
							<!-- <span class="input-group-addon" id="basic-addon2">@example.com</span> -->
						</div>
						<!-- <div class="form-group">
							<input type="text" class="form-control" placeholder="buscar">
						</div>-->
						
					</form>

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

	<!-- jumbotron -->

	<section class="main" id="seccion">
		<div id="divseccion">
			<a href="index.php" id="migajaInicio">Inicio /</a><span id="migaja"> Registrarse</span>
			<form action="registrar.php" class="navbar-form " role="form" id="registro-form" method="post">
					<!-- <input type="text" class="form-control" placeholder="Nombre de usuario" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Apellido" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Telefono" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Mail" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Calle" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Numero" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Depto" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Piso" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Ciudad" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Provincia" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="text" class="form-control" placeholder="Pais" aria-describedby="basic-addon2" id="barra-busqueda">
					<input type="reset" class="btn btn-primary" value="Cancelar">
					<input type="submit" class="btn btn-primary" value="Registrarme">  -->
				<span id="spanRegistro">Registrate</span>
				<div class="form-group">
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Nombre de usuario" aria-describedby="basic-addon1" name="username">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-asterisk" id="basic-addon1"></span>
								<input type="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1" name="password">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombre">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Apellido" aria-describedby="basic-addon1" name="apellido">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Telefono" aria-describedby="basic-addon1" name="telefono">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Mail" aria-describedby="basic-addon1" name="mail">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Calle" aria-describedby="basic-addon1" name="calle">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Numero" aria-describedby="basic-addon1" name="numero">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Depto" aria-describedby="basic-addon1" name="depto">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Piso" aria-describedby="basic-addon1" name="piso">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Ciudad" aria-describedby="basic-addon1" name="ciudad">
							</div>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Provincia" aria-describedby="basic-addon1" name="provincia">
							</div>
						</div>
					</div>
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-pencil" id="basic-addon1"></span>
								<input type="text" class="form-control" placeholder="Pais" aria-describedby="basic-addon1" name="pais">
							</div>
						</div>
					</div>	
					<div class="form-inline">
	 					<div class="form-group">
							<div class="input-group">
								<a href="index.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Registrarme"/>
							</div>
						</div>
					</div>	
				</div>
			</form>
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