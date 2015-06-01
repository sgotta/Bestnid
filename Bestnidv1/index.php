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
					<a href="#" class="navbar-brand">Bestnid</a>
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
					<a href="registrarse.php" id="inicio">Registrarse</a>
					<a href="iniciarsesion.php" id="inicio">Ingresar</a>
					
					<!-- <ul class="nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
								Categorias <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">electronica</a></li>
								<li><a href="#">comida</a></li>
								<li><a href="#">gdfgff</a></li>
								<li><a href="#">tuvieja</a></li>
							</ul>

						</li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contacto</a></li>
					</ul> -->

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

	
	<section class="main container">
		<section class="container">
			<div class="miga-de-pan col-md-9 ">
				<ol class="breadcrumb pull-left">
					<li class="active">Inicio</li>
				</ol>
			</div>
			<li class="dropdown pull-right nav navbar-nav">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ordenar<span class="caret"></span></a>

			<ul class="dropdown-menu col-md-3" role="menu">
				<li><a href="#">Mas reciente</a></li>
				<li class="divider"></li>
				<li><a href="#">Menos reciente</a></li>
			</ul>
		</li>
		</section>
		<div class="row">			
			<section class="posts container col-md-9 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<!-- <section class="posts col-md-4"> -->
						<?php 
							include("conexion.php");
							$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
							mysql_select_db($db,$con) or die ("problemas al conectarDB");
							$registro=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta:".mysql_error());
							$i=0;
							while(($reg=mysql_fetch_array($registro)) && ($i<6)){
								/*if($i%3==1){
									echo '<section class="posts col-md-4">';
								}*/
								echo '<section class="posts col-md-4">
										<div class="thumbnail">    
											<a href="#" class="thumb">
												<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="" style="max-height: 150px;">
											</a>
											<div class="caption">
												<h3 class="post-title">
													<a href="#">'.$reg['titulo'].'</a>
												</h3>
												<p><span class="post-fecha">26 de enero de 2015</span></p>
												<p class="post-contenido text-justify">
													'.$reg['descripcion'].'
												</p>
												<div class="contenedor-botones">
													<a href="#" class="btn btn-primary">Detalles</a>
													<a href="#" class="btn btn-success">Ofertar</a>
												</div>
											</div>
										</div>
									</section>';
								/*if($i%3==0){
									echo '</section>';
								}*/
								$i++;
								
							}
						?>					
				</div>
				<nav>
					<div class="center-block">
						<ul class="pagination">
							<li class="disabled"><a href="#">&laquo;<span class="sr-only">Anterior</span></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">1</a> </li>
							<li><a href="#">2</a> </li>
							<li><a href="#">3</a> </li>
							<li><a href="#">4</a> </li>
							<li><a href="#">5</a> </li>
							<li><a href="#">&raquo;<span class="sr-only">Siguiente</span></a></li>
						</ul>
					</div>
				</nav>
			</section>

			
			<aside class="col-md-3 hidden-xs hidden-sm">
				
				<h4>Categorias</h4>
				<div class="list-group">
					<a href="#" class="list-group-item">Computacion<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Ropa y Accesorios<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Celulares y Telefonos<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Consolas y Videojuegos<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Joyas y relojes<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Motos<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Autos<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Juegos y Juguetes<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Nautica<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Inmuebles<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Muebles<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Industria y oficina<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Deportes y fitness<span class="badge">20</span></a>
					<a href="#" class="list-group-item">Articulos para el hogar<span class="badge">20</span></a>
				</div>
				<h4>Filtros</h4>
				<div class="list-group">
					<a href="#" class="list-group-item">Filtro1</a>
					<a href="#" class="list-group-item">Filtro2</a>
				</div>
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

<!-- <section class="main" id="seccion">
		<div id="divseccion">
			<span id="migajaInicio">Inicio</span><br>
			<span class="pull-right">Ordenar</span><br>
			<nav id="cat-fil">
				<div id="categorias" class="col-md-3 hidden-xs hidden-sm">
					<span>Categorias</span><br>
					<?php
						/*include("conexion.php");
						$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
						mysql_select_db($db,$con) or die ("problemas al conectarDB");
						$registro=mysql_query("SELECT * FROM categoria") or die ("problemas en consulta:".mysql_error());
						while($reg=mysql_fetch_array($registro)){
							echo "&nbsp&nbsp&nbsp".$reg['nombre']."<br>";
						}*/
					?>
				</div>
				<div id="filtros">
					<span>Filtrar</span>
				</div>
			</nav>
			<section id="publicaciones" class="pull-right">
				<section class="posts container col-md-9 pull-right">
					<?php
						/*include("conexion.php");
						$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
						mysql_select_db($db,$con) or die ("problemas al conectarDB");
						$registro=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta:".mysql_error());
						while($reg=mysql_fetch_array($registro)){
							echo '<div class="row">
										<section class="posts col-md-4">
											<div class="thumbnail">    
												<a href="#" class="thumb">
													<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="">
												</a>
												<div class="caption">
													<h3 class="post-title">
														<a href="#">'.$reg['titulo'].'</a>
													</h3>
													<p><span class="post-fecha">26 de enero de 2015</span></p>
													<p class="post-contenido text-justify">
														'.$reg['descripcion'].'
													</p>
													<div class="contenedor-botones">
														<a href="#" class="btn btn-primary">Detalles</a>
														<a href="#" class="btn btn-success">Ofertar</a>
													</div>
												</div>
											</div>
										</section>
									</div>
								</section>';*/
							/*echo $reg['titulo']."<br>";
							echo $reg['descripcion']."<br>";
							
							echo '<img src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" width="100" height="100"/>';

							echo '<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Detalles"/>
							</div>
							<div class="input-group">
								<a href="index.php" class="btn btn-primary" id="btn-registro-cancelar"> Ofertar </a>
							</div>';*/
							
						
					?>
				<nav>
					<div class="center-block">
						<ul class="pagination">
							<li class="disabled"><a href="#">&laquo;<span class="sr-only">Anterior</span></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">&raquo;<span class="sr-only">Siguiente</span></a></li>
						</ul>
					</div>
				</nav>
			</section>
		</div>
	</section> -->