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
					<!-- ACA MUESTRO EL NOMBRE DE USUARIO Y NOTIFICACION O "INGRESAR" Y "REGISTRARSE" -->
					<?php include("barra.php"); ?>
				</div>
			</div>
		</nav>
	</header>
	<section class="main container">
		<section class="container">
			<div class="miga-de-pan col-md-9 ">
				<ol class="breadcrumb pull-left">
					<li class="">Inicio</li>
					<li class="active">Categorias</li>
					<li class="active">Titulo Subasta</li>
				</ol>
			</div>
		</section>
		<div class="row">			
			<section class="posts container col-md-12 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<section class="posts col-md-6" >
						<?php include ("infoSubasta.php"); ?>
						<div id="com-of"> 
							<?php include ("comentariosofertas.php"); ?> <!-- ACA ME TRAIGO LA BARRA, COMENTARIOS Y OFERTAS -->
						</div>
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
	<script>
		function comentarios() {                              //MUESTRO/ACTUALIZO LOS COMENTARIOS
			$.ajax({
				type: 'GET',
				url: 'http://localhost/Bestnid/Demo01/comentariosofertas.php',
				// dataType: 'json' ,
				data: {
					op: 1,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(comOf){
				$('#com-of').html(comOf);
			});
		}
	</script>
	<script>
		function ofertas() {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'http://localhost/Bestnid/Demo01/comentariosofertas.php',
				// dataType: 'json' ,
				data: {
					op: 2,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(comOf){
				$('#com-of').html(comOf);
			});
		}
	</script>
</body>
</html>