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

	<!-- jumbotron -->
	<!-- <a href="index.php" id="migajaInicio">Inicio /</a><span id="migaja"> Registrarse</span> -->
			
	<section class="main container">
		<section class="container">
			<div class="miga-de-pan col-md-9 ">
				<ol class="breadcrumb pull-left">
					<li><a href="index.php" id="migaja">Inicio</a></li>
					<li class="active">Registrarse</li>
				</ol>
			</div>
		</section>
		<div class="row">	
			<style>
				section {
					margin-bottom: 50px;
				}
				#registro-form {
					margin-left: 300px;
				}
			</style>		
			<section class="posts container col-md-9">
				<form action="registrar.php" class="navbar-form " role="form" id="registro-form" method="post">
					<span id="spanRegistro">Registrate</span>
					<div class="form-group">
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-user" ></span>
									<input type="text" class="form-control" placeholder="Nombre de usuario"  name="username" maxlength="10" required autocomplete="off">
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-asterisk" ></span>
									<input type="password" class="form-control" placeholder="Contraseña"  name="password" maxlength="8" required autocomplete="off">
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Nombre"  name="nombre" maxlength="45" required autocomplete="on">
								</div>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Apellido"  name="apellido" maxlength="45" required autocomplete="on">
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Telefono"  name="telefono" maxlength="45" required autocomplete="on">
								</div>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="email" class="form-control" placeholder="Mail"  name="mail" maxlength="45" required autocomplete="on">
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Calle"  name="calle" maxlength="45" required autocomplete="on">
								</div>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Numero"  name="numero" maxlength="11" required autocomplete="on">
								</div>
							</div>
						</div>
						<!-- <div class="input-group">
						      <div class="input-group-addon">$</div>
						      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
						      <div class="input-group-addon">.00</div>
						    </div> -->
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Depto"  name="depto" maxlength="15" autocomplete="on">
								</div>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<input type="text" class="form-control" placeholder="Piso"  name="piso" maxlength="11" autocomplete="on">
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<!-- <input type="text" class="form-control" placeholder="Ciudad"  name="ciudad" maxlength="45" required autocomplete="off"> -->
									<select class="form-control" name="ciudad" id="ciudad" required>
										<option value="" disabled selected>Ciudad</option>
										<option value="Buenos Aires">Buenos Aires</option>
										<option value="La Plata">La Plata</option>
										<option value="Bragado">Bragado</option>
										<option value="Pehuajo">Pehuajo</option>
										<option value="Pehuajo">Los Toldos</option>
									</select>
								</div>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<!-- <input type="text" class="form-control" placeholder="Provincia"  name="provincia" maxlength="45" required autocomplete="off"> -->
									<select class="form-control" name="provincia" id="provincia" required>
										<option value="" disabled selected>Provincia</option>
										<option value="Buenos Aires">Buenos Aires</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-pencil" ></span>
									<!-- <input type="text" class="form-control" placeholder="Pais" name="pais" maxlength="45" required autocomplete="off"> -->
									  <select class="form-control" name="pais" id="pais" required>
									  	<option value="" disabled selected>Pais</option>
									    <option value="Argentina">Argentina</option>
									  </select>
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