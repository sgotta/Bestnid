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
										<input type="text" class="form-control" autofocus placeholder="Nombre de usuario" name="username" required maxlength="16">
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
							<br>
							<div>
								<a href="#recuperarClave" data-toggle="modal">Recuperar contraseña</a>
							</div>
						</div>
					</form>
				</div>
			</section>
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

	<script>
		function recuperarClave(email) {
			$.ajax({
				type: 'GET',
				url: 'recuperandoClave.php',
				data: {
					mail: email
				}
			}).done(function(ret){
				console.log(ret);
				if (ret != '') {
					if (ret == 'recuperado') {
						$('#spanMail').html('<p class="text-success campoClave">El email ingresado es correcto...</p>');
					}					
					else {
						if (ret == 'nomail') {
							$('#spanMail').html('<p class="text-danger campoClave">El email "'+email+'" no existe...</p>');
							$('#divMail').html('<input type="email" id="inputMail" onchange="recuperarClave(this.value)" class="form-control" style="width: 100%;" placeholder="E-mail" name="mail" maxlength="45" required autocomplete="on">');
							$("#inputMail").focus();
						}
						else {
							//ESTE CASO NUNCA SE DARIA, SE CORROBORA QUE EL CAMPO NO ESTE VACIO CON HTML5
							if (ret == 'vacio') {
								$('#divMail').html('<input type="email" id="inputMail" onchange="recuperarClave(this.value)" class="form-control" style="width: 100%;" placeholder="E-mail" name="mail" maxlength="45" required autocomplete="on">');
							}
						}
					}
				}
				else {
					console.log("algo paso");
				}
			});
		}
	</script>
	
	<!-- modal recuperar clave -->
	<div class="modal fade" id="recuperarClave">
		<div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Recuperar contraseña</h4>
			    </div>
			    <form action="javascript:$(function () { $('#recuperarClave').modal('hide') }); $(function () { $('#inputMail').val('') }); $(function () { $('.campoClave').text('') }); alert('Se ha enviado la contraseña al email ingresado!');" class="navbar-form container" role="form" method="post">
			    	<div class="modal-body">
		        		<p>Ingrese su email para que le podamos enviar la contraseña...</p>
		        		<span id="spanMail"></span>
		        		<div id="divMail">
		        			<input type="email" id="inputMail" onchange="recuperarClave(this.value)" class="form-control" style="width: 100%;" placeholder="E-mail" name="mail" maxlength="45" required autocomplete="on">
				   		</div>
				    </div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	    				<button type="submit" class="btn btn-primary">Recuperar</button>
				    </div>
			    </form>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- fin modal recuperar clave -->

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