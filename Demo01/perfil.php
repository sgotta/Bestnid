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
					<!-- <form action="sesioniniciada.php" method="get" class="navbar-form navbar-left" role="search"> -->
					<!-- <div class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2" id="barra-busqueda" name="buscar" onkeyup="mostrarSubastas(this.value)">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div> -->
					<!-- </form> -->
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<a href="registrosubasta.php" class="" id="inicio">Subastar</a>
					<!-- <a href="#notif" class="glyphicon glyphicon-bullhorn" data-toggle="modal"  id="inicio"></a> -->
					<?php  include ("notificacion.php"); ?>
					<span class="dropdown">
						<li class="dropdown dropdown-user pull-right nav navbar-nav">
					
							<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION['username']." "; ?><span class="glyphicon glyphicon-user"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Perfil</a></li>
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
					<li class="active">Mi cuenta</li>
				</ol>
			</div>
		</section>
		<div class="row">			
			<section class="posts container col-md-9 pull-right" id="sectionSubastas">
				<div class="row" id="perfil"> 
				<?php include('misSubastas.php'); ?>

					<!-- aca quiero mostrar con ajax lo que devuelva la opcion seleccionada -->
					
				</div>
			</section>

			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4>Mi cuenta</h4>
				<div class="list-group" id="divCategorias">
					<a class="list-group-item" id="misSubastas" href="#">Mis subastas</a>
					<a class="list-group-item" id="misOfertas" href="#">Mis ofertas</a>
					<a class="list-group-item" id="modificarDatos" href="#">Modificar mis datos</a>
				</div>
				<br>
				<h4>Eliminar cuenta</h4>
				<div class="list-group" id="divCategorias">
					<a class="list-group-item alert" id="eliminarCuenta" href="#" style="background-color: ; color: red;">
					<span class="glyphicon glyphicon-alert" style="color: red;" aria-hidden="true"></span>&nbsp;&nbsp;
					Eliminar mi cuenta</a>
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
		});

        $(document).on("click", ".alert", function(e) {
        	bootbox.confirm("<h4><p class='text-danger'>Seguro desea <strong>eliminar</strong> su cuenta de Bestnid?!</p><h4>", function(result) {
        		if (result==true) {
        			console.log(result);
        			bootbox.prompt("<h5><p class='text-warning'><strong>Confirme su eliminación</strong> ingresando su email: </p><h5>", function(result) {                
					  if (result==null) {                                             
					    console.log("se canceló");                              
					  } else {
					    console.log("email: "+result);
					    $.ajax({
							type: 'get',
							url: 'eliminarCuenta.php',
							data: 'email='+result
						}).done(function(respuesta){
							bootbox.alert(respuesta, function() {
							  console.log();
							});
						});                          
					  }
					});
        		}else{
        			console.log(result);
        		};
			});
        });

	/*----------------------------------------------*/
		/*mostrar mis subastas*/
		$('#misSubastas').click(function(){
			$.ajax({
				type: 'get',
				url: 'misSubastas.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("mis subastas");
			});
		});
		/*mostrar mis ofertas*/
		$('#misOfertas').click(function(){
			$.ajax({
				type: 'get',
				url: 'misOfertas.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("mis ofertas");
			});
		});
		/*modificar mis datos*/
		$('#modificarDatos').click(function(){
			$.ajax({
				type: 'get',
				url: 'modificarDatos.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("modificar datos");
			});
		});

		/*Lo siguiente es para la modificación de datos: */
		function modificarDomicilio(){
			$.ajax({
				url: 'modificarDomicilio.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("modificar domicilio");
			});
		}

		function modificarTel(){
			$.ajax({
				url: 'modificarTel.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("modificar tel");
			});
		}

		function modificarEmail(){
			$.ajax({
				url: 'modificarEmail.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				console.log("modificar email");
			});
		}

		function modificarContraseña(){
			$.ajax({
				url: 'modificarPassword.php'
			}).done(function(respuesta){
				$('#perfil').html(respuesta);
				$('#password').focus();
				console.log("modificar contraseña");
			});

		}

		function verificarPassword(form){
			console.log(form.password.value);
			console.log(form.password1.value);
			if (form.password.value===form.password1.value) {
				console.log("son iguales");
				if (password.value.length>=8 && password.value.length<=45) {
					console.log("la longitud está entre 8 y 45");
					$.ajax({
						url: 'actualizarPassword.php',
						type: 'get',
						data: 'password='+password.value
					}).done(function(respuesta){
						console.log(respuesta);
						bootbox.alert("Su contraseña fue actualizada.", function() {
						  window.location.href='perfil.php';
						});
					});
				}else{
					bootbox.alert("Recuerde que la contraseña debe tener entre 8 y 45 caracteres, elija otra.", function() {
					  console.log("longitud: "+password.value.length);
					});
				};
			}else{
				bootbox.alert("Error de coincidencia, verifique haber ingresado la misma contraseña en ambos campos.", function() {
				  console.log("son distintos");
				});
			};
		}
		
	</script>

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