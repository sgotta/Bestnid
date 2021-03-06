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
	<link rel="stylesheet" href="ion.rangeSlider/css/normalize.css" />
    <link rel="stylesheet" href="ion.rangeSlider/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" />

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
					<a href="#" class="glyphicon glyphicon-question-sign btn-lg" id="ayuda"></a>
					<div id="divNotificacion">
					<?php include ("notificacion.php"); ?> <!--pone el badge si hay nuevas -->
					</div>
					<span class="dropdown">
						<li class="dropdown dropdown-user pull-right nav navbar-nav">
					
							<a href="#" id="nombreusuario" class="dropdown-toggle" data-toggle="dropdown" role="button"><?php echo $_SESSION['username']." "; ?><span class="glyphicon glyphicon-user"></span></a>
							<!-- <a href="#"  >
								Categorias <span class="caret"></span>
							</a> -->
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
					<li><a href="sesioniniciada.php" class="">Inicio</a></li>
					<li class="active">Registro Subasta</li>
				</ol>
			</div>
		</section>
		<div class="row">			
			<section class="posts container col-md-12 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<!-- form registrar subasta -->
					<section class="posts container col-md-12">
						<form action="registrarsubasta.php" enctype="multipart/form-data" role="form" id="reg-subasta-form" method="post">
						<section class="col-md-4">
							<div class="thumbnail">    
								<img class="img-thumbnail" src="img/logobestnid.jpg" alt="No hay imagen" style="max-height: 250px;">
							</div>
							<span id="comprobarsize"></span> 
							<div class="form-group" id="divfoto">
								<!-- <input type="hidden" name="MAX_FILE_SIZE" value="8388608">   -->
							    <input type="file" id="foto" name="foto" required onchange="validarsize(this);">
						    </div>
						</section>
						<section class="col-md-8">
						  <div class="form-group">
						    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de su publicación" required maxlength="45">
						  </div>

						  <textarea class="form-control" rows="5" placeholder="Descripción del producto" name="descripcion" id="descripcion" required maxlength="300"></textarea><br>
						  	<div class="form-inline">
								<div class="form-group col-md-8">
									<label for="duracion-subasta">Duración de la subasta:</label>
									<input type="text" name="duracion-subasta" id="duracion-subasta" value="30">					
							  	</div><br>
								<select class="form-control col-md-4" style="margin-top: 25px;" name="categ" id="categ" required>
									<option value="" disabled selected>Categorias</option>
									<?php echo include("opcionesCategorias.php");?> 
								</select>
							</div>

						  <div class="form-inline" style="margin-left:100px;">
							<div class="form-group">
								<div class="input-group">
									<a href="sesioniniciada.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
								</div>
								<div class="input-group">
									<input type="submit" class="btn btn-primary" id="btn-registro" value="Registrar Subasta"/>
								</div>
							</div>
						  </div><br>

						</form>
						</section>
					</section>
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
	<script src="ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	
	<script type="text/javascript">
		$(function () {
			$("#duracion-subasta").ionRangeSlider({
			    from: 15,
			    keyboard: true,
			    postfix: " dias",
			    grid: true,
			    values: [15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
			});
	    });
	</script>
	<script>

		function cambiarALeida(){
			$.ajax({
				type: 'get',
				url: 'cambiaALeida.php'
			}).done(function(){
				$('#notif').modal('show');
				$.ajax({
					type: 'get',
					url: 'notificacion.php'
				}).done(function(respuesta){
					console.log(respuesta);
					$('#divNotificacion').html(respuesta);	
				});
						
			});
		};
		
		function validarsize(foto) {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				beforeSend: function(){
					$('#comprobarsize').html('<p class="text-info">Comprobando...</p>');
				},
				url: 'validarsize.php', /*= action*/
				type: 'get', /*= method*/
				/*dataType: 'json',*/
				data: { /*parametros para url*/
					size: foto.files[0].size,
					name: foto.files[0].name
				}
				
			})
			.done(function(respuesta){ /*Si funcionó ajax*/
				console.log("Success");
				$('#comprobarsize').html(respuesta);
				if (respuesta === '<p class="text-success">"Tamaño de imagen <strong>OK!</strong>"</p>') {
					console.log("Tamaño OK!");
				}else{
					//mantengo el foco en username
					if (foto.files[0].name=='') {
						$('#comprobarsize').html('<p class="text-info">"Campo vacio..."</p>');
						console.log("Campo vacio")
					}else{
						console.log("Supera tamaño permitido!")
					};
					$("#divfoto").html('<input type="file" id="foto" name="foto" required onchange="validarsize(this);">');
					$("#foto").focus();
				}
			})
			.fail(function(){ /*esto es si falla el llamado de ajax*/
				console.log("Error");
				$('#comprobarsize').html("Error Ajax.");
			})
			.always(function(){
				console.log("Complete");
				/*setTimeout(function(){
					$('.fa').hide();
				}, 1000);*/
			});
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