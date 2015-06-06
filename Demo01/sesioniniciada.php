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
				<style>
				#navegacion-fm {
					float: right;
					width: 1000px;
				}
				#barra-busqueda {
					width: 200px;
					margin-left: 467px;
				}
				</style>
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
					<li class="active">Inicio</li>
				</ol>
			</div>
			<li class="dropdown pull-right nav navbar-nav">
				<?php include("ordenar.php"); ?>		
			</li>
		</li>
		</section>
		<div class="row">			
			<section class="posts container col-md-9 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<style>
						#btn-ofertar {
							background: #FF5050;
							color: #FFFFFF;
							border: 1px;
							border-color: #ccc;
							border-style: solid;
						}
						#btn-ofertar:hover,
						#btn-ofertar:active,
						#btn-ofertar:focus {
							background: #B23B39;
							border-color: #B23B39;
						}
						a {
							color: #000000;
						}
					</style>
					<?php include("listar.php"); ?>
				</div>
				<nav>
					<div class="center-block">
						<ul class="pagination">
							<style>
								#paginacion {
									color: #B23B39;
								}
								#paginacion:active,
								#paginacion:hover,
								#paginacion:focus,
								#paginacionActiva:active,
								#paginacionActiva:hover,
								#paginacionActiva:focus
								 {
									color: #FFFFFF;
									background: #B23B39;
									border-color: #B23B39;
								}
								#paginacionActiva {
									color: #FFFFFF;
									background: #FF5050;
									border-color: #FF5050;
								}
							</style>
							<?php include("paginacion.php"); ?>
						</ul>
					</div>
				</nav>
			</section>
			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4>Categorias</h4>
				<div class="list-group">
					<?php include("categorias.php"); ?>
				</div>
				<!-- filtros -->
				<h4>Filtros por ciudad: </h4>
				<div class="list-group">					
					<?php include("filtros.php"); ?>
				</div>				
				<!-- fin filtros -->
			</aside>
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