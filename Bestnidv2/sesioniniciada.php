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
		<!-- <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
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
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<form action="" class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</form>
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<a href="registrarse.php" id="inicio">Registrarse</a>
					<a href="iniciarsesion.php" id="inicio">Ingresar</a>
				</div>
			</div>
		</nav> -->
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
					<a href="index.php" class="navbar-brand">Bestnid</a>
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
					margin-left: 300px;
				}
				</style>
					<form action="" class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</form>
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<a href="#" class="glyphicon glyphicon-bullhorn" id="inicio"></a>
					<span class="dropdown">
						<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION['username']." "; ?><span class="glyphicon glyphicon-user"></span></a>
						<!-- <a href="#"  >
							Categorias <span class="caret"></span>
						</a> -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Perfil</a></li>
							<li><a href="cerrarsesion.php">Cerrar sesion</a></li>
						</ul>
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
						<?php 
							include("conexion.php");
							$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
							mysql_select_db($db,$con) or die ("problemas al conectarDB");
							$registro=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta:".mysql_error());
							//$cantPub =mysql_query("SELECT COUNT(*) FROM publicacion") or die ("problemas en consulta:".mysql_error());
							$numPub = mysql_num_rows($registro);
							$totalPaginas = $numPub / 6;
							if ($numPub % 6 > 0) {
								$totalPaginas++;
							}
							$totalPaginas = (int)$totalPaginas; 
							$i=0;
							if(isset($_GET['pagID'])){
								$paginaActual = $_GET['pagID'];
							}
							else {
								$paginaActual = 1;
							}
							$saltear = ($paginaActual * 6) - 6;
							$pg = 0;
							while(($pg<$saltear) && mysql_fetch_array($registro)){
								$pg++;
							}
							while(($i<6) && ($reg=mysql_fetch_array($registro))){
								echo '<section class="posts col-md-4">
										<div class="thumbnail">    
											<a href="#" class="thumb">
												<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="" style="max-height: 140px;">
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
													<a href="#" class="btn btn-success" id="btn-ofertar">Ofertar</a>
												</div>
											</div>
										</div>
									</section>';
								$i++;
							}
						?>					
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
							<?php 
								if((isset($_GET['pagID']) && $_GET['pagID']==1) || (!isset($_GET['pagID']))){
									echo '<li class="disabled"><a href="#" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
								}
								else {
									$ant = $_GET['pagID']-1;
									echo '<li class=""><a href="index.php?pagID='.$ant.'" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
								}
								$n=1;
								if(empty($_GET['pagID'])){
									echo '<li class="active"><a href="#" id="paginacionActiva">'.$n.'</a></li>';
									$n++;
								}
								while($n<=$totalPaginas){
									if(isset($_GET['pagID']) && $_GET['pagID']==$n){
										echo '<li class="active"><a href="index.php?pagID='.$n.'" id="paginacionActiva">'.$n.'</a></li>';
									}
									else {
										echo '<li><a href="index.php?pagID='.$n.'" id="paginacion">'.$n.'</a> </li>';
									}
									
								$n++;
								}
								if(isset($_GET['pagID']) && $_GET['pagID']==$totalPaginas){
									echo '<li class="disabled"><a href="#" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
								}
								else {
									if (!isset($_GET['pagID'])){
										$sig = 2;
										echo '<li class=""><a href="index.php?pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
									}
									else {
										$sig = $_GET['pagID']+1;
										echo '<li class=""><a href="index.php?pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
									}
								}
							?>
						</ul>
					</div>
				</nav>
			</section>
			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4>Categorias</h4>
				<div class="list-group">
					<?php
						include("conexion.php");
						$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
						mysql_select_db($db,$con) or die ("problemas al conectarDB");
						$registro=mysql_query("SELECT * FROM categoria") or die ("problemas en consulta:".mysql_error());
						while($reg=mysql_fetch_array($registro)){
							// echo "&nbsp&nbsp&nbsp".$reg['nombre']."<br>";
							$cant = mysql_query("SELECT nombre FROM publicacion p INNER JOIN categoria c ON (p.Categoria_idCategoria = c.idCategoria) WHERE c.idCategoria = $reg[idCategoria]") or die ("problemas en consulta:".mysql_error());
							$numC = mysql_num_rows($cant);
							echo '<a href="#" class="list-group-item">'.$reg['nombre'].'<span class="badge">'.$numC.'</span></a>';
						}
					?>
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