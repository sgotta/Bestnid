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
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<a href="registrosubasta.php" class="" id="inicio">Subastar</a>
					<?php include ("notificacion.php"); ?>
					<span class="dropdown">
						<li class="dropdown dropdown-user pull-right nav navbar-nav">
							<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION['username']." "; ?><span class="glyphicon glyphicon-user"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="perfil.php">Perfil</a></li>
								<?php include("esAdministrador.php"); ?>
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
					<li><a href="sesioniniciada.php" id="migaja">Inicio</a></li>
					<li class="active">Panel de control</li>
				</ol>
			</div>
		</section>
		<div class="row">			
			<section class="posts container col-md-9 pull-right" id="sectionSubastas">
				<div class="row" id="categ"> 
					<!-- aca quiero mostrar con ajax lo que devuelva la opcion seleccionada (campo) -->
					<?php include('eliminarCategoria.php'); ?> 
				</div>
			</section>

			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4>Categorias</h4>
				<div class="list-group" id="divCategorias" style="min-height: 400px;">
					<a class="list-group-item" id="nuevaCategoria" href="#">Nueva categoria</a>
					<a class="list-group-item" id="modificarCategoria" href="#">Modificar categoria</a>
					<a class="list-group-item" id="eliminarCategoria" href="#">Eliminar categoria</a>					
				</div>
				
				
			</aside>

		</div>
	</section>
	<footer id="foot">
		<a href="#contactar" id="contacto" data-toggle="modal">Contactar</a><br>
		<!-- <span id="contacto"> Contacto </span><br> -->
		<span class="glyphicon glyphicon-envelope" id="correo"></span>
		<span> bestnid.administracion@bestnid.com.ar </span><br>
		<span class="glyphicon glyphicon-earphone" id="correo"></span>
		<span> (0800) - 555 - 5555 </span><br>
		<span id="creds"> Desarrollado por Strategus </span>
	</footer>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script>
		$( document ).ready(function() {
    		console.log( "Ready" );
    		$('#modalEliminar').modal({
    			backdrop: 'static'
    		});
		});
		
	<!--      -->
	function categoriaEliminada() {                              
		$.ajax({
			type: 'GET',
			url: 'categoriaEliminada.php',
			data: {
				<?php if(isset($_POST['categ']) && !empty($_POST['categ'])){
					echo 'categ:'.'"'.$_POST['categ'].'"';
				}?> 
			}
		}).done(function(categoria){
			console.log(categoria);
			if (categoria != '') {
				if (categoria == 'Eliminada') {
					alert("Categoria eliminada, redireccionando a su panel de control...");
					window.location="paneldecontrol.php";
					console.log("Eliminada");
				}					
				else {
					alert("La categoria tiene publicaciones activas, no se puede eliminar por el momento pero queda desactiva para proximas publicaciones...");
					window.location="paneldecontrol.php";
					console.log("No se elimino");
				}
			}
			else {
				console.log("algo paso");
			}
		});
	}
	</script>
	<!-- modal eliminar categoria -->
	<div class="modal fade" id="modalEliminar">
		<div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <a href="paneldecontrol.php" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
			        <h4 class="modal-title">Eliminar categoria</h4>
			    </div>
			    <div class="modal-body">
			        <p>¿Esta seguro que desea eliminar la categoria?</p>
			    </div>
			    <div class="modal-footer">
			        <a href="paneldecontrol.php" type="button" class="btn btn-default" >Cancelar</a>
			        <a onclick="categoriaEliminada()" class="btn btn-primary" data-dismiss="modal">Eliminar</a>
			    </div>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!--fin modal eliminar categoria -->


	<!-- modal notificaciones-->
	<div class="modal fade" id="notif">
		<div class="modal-dialog" id="modal-dialogo">
			<div class="modal-content">
				<div class="modal-header">
					<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="notiftitulo">Notificaciones</h4>
				</div>
				<div class="modal-body" id="notifcuerpo">
					<?php include("leernotificaciones.php"); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<!--<input type="button" class="btn btn-primary" value="Ver todas" onclick="mostrarnotificaciones('1')"/>-->
				</div>
			</div>
		</div>							
	</div>					
	<!-- fin modal notificaciones-->

	<!-- modal contactar -->
	<div class="modal fade" id="contactar">
		<div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Contactar</h4>
			    </div>
			    <form action="javascript:$(function () { $('#contactar').modal('hide') }); $(function () { $('.campoContacto').val('') }); alert('Se ha enviado con exito');" class="navbar-form container" role="form" method="post">
			    	<div class="modal-body">
		        		<p>Complete el formulario para contactarnos!</p>
		        		<input type="text" class="form-control campoContacto" placeholder="Nombre"  style="width: 49%;" name="nombre" maxlength="45" required autocomplete="on">
		        		<input type="text" class="form-control campoContacto" placeholder="Apellido"  style="width: 50%;" name="apellido" maxlength="45" required autocomplete="on"><br><br>
		        		<input type="email" id="inputMail" class="form-control campoContacto" style="width: 100%;" placeholder="E-mail" name="mail" maxlength="45" required autocomplete="on"><br><br>
		        		<textarea class="form-control campoContacto" style="width: 100%;" rows="5" placeholder="Texto del mensaje" name="descripcion" id="descripcion" required maxlength="300"></textarea><br>
				    </div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	    				<button type="submit" class="btn btn-primary">Enviar</button>
				    </div>
			    </form>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- fin modal contactar -->
	
</body>
</html>