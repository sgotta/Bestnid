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

					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
				</div>

			</div>
		</nav>
	</header>

	<section class="jumbotron">
		<div class="container">
			<img src="img/logobestnid.jpg" class="imagen-jumbotron">
			<h1 id="bienvenida">Bienvenido a Bestnid</h1>
			<p id="desc-bienvenida">Donde las personas y sus necesidades valen mucho<br>más que el dinero.</p>
		</div>
	</section>
			
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
				<form action="registrar.php" class="navbar-form" role="form" id="registro-form" method="post">
					<span id="spanRegistro">Registrarse</span>
					<div class="form-group">
					<span id="comprobarusuario"></span>
						<div class="form-inline" id="divusername">
		 					<div class="form-group" id="campo-usuario-validacion">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-user" ></span>
									<input type="text" class="form-control" onchange="validarusuario(this);" placeholder="Nombre de usuario"  name="username" id="username" maxlength="16" required autocomplete="off">
								</div>
							</div>	
						</div>
						<div class="form-inline">
		 					<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-asterisk" ></span>
									<input type="password" class="form-control" placeholder="Contraseña"  name="password" id="password" minlength="8" maxlength="45" required autocomplete="off">
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
									<span class="input-group-addon glyphicon glyphicon-pencil"></span>
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
									<input type="submit" class="btn btn-primary" id="btn-registro" value="Registrarse"/>
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
	<script type="text/javascript">
		$( document ).ready(function() {
    		console.log( "Ready" );
		});
		
		function validarusuario(usuario){
			$.ajax({
				beforeSend: function(){
					$('#comprobarusuario').html('<p class="text-info">Comprobando...</p>');
				},
				url: 'validarusuario.php', /*= action*/
				type: 'get', /*= method*/
				/*dataType: 'json',*/
				data: 'usuario='+usuario.value /*parametros para url*/
			})
			.done(function(respuesta){ /*Si funcionó ajax*/
				console.log("Success");
				$('#comprobarusuario').html(respuesta);
				if (respuesta === '<p class="text-success">"Nombre de usuario <strong>OK!</strong>"</p>') {
					console.log("Usuario OK!");
				}else{
					//mantengo el foco en username
					if (usuario.value=='') {
						$('#comprobarusuario').html('<p class="text-info">"Nombre de usuario no puede estar vacio"</p>');
						console.log("Campo vacio")
					}else{
						console.log("Username en uso!")
					};

					$("#divusername").html('<div class="form-group" id="campo-usuario-validacion"><div class="input-group"><span class="input-group-addon glyphicon glyphicon-user" ></span><input type="text" class="form-control" onchange="validarusuario(this);" placeholder="Nombre de usuario"  name="username" id="username" maxlength="16" required autocomplete="off"></div></div>');
					
					$("#username").focus();
				}
			})
			.fail(function(){ /*esto es si falla el llamado de ajax*/
				console.log("Error");
				$('#comprobarusuario').html("Error Ajax.");
			})
			.always(function(){
				console.log("Complete");
				/*setTimeout(function(){
					$('.fa').hide();
				}, 1000);*/
			});
		}
	</script>
</body>
</html>