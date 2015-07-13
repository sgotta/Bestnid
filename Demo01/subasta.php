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
					<?php 
						if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
							echo '<a href="sesioniniciada.php" class="navbar-brand">Bestnid</a>';
						}
						else {
							echo '<a href="index.php" class="navbar-brand">Bestnid</a>';
						}
					?>
					
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
					<?php include("migajas.php"); ?>
				</ol>
			</div>
		</section>
		<div class="row" id="contenidoSubasta">			
			<section class="posts container col-md-12 pull-right">
				<div class="row"> <!-- 1ER FILA IMAGENES -->
					<section class="posts col-md-6" >
						<div id="infoSub"> 
							<?php include ("infoSubasta.php"); ?>
							<?php include ("modificarEliminarSubasta.php"); ?>
						</div>
						<div id="com-of"> 
							<?php include ("comentariosofertas.php"); ?> <!-- ACA ME TRAIGO LA BARRA, COMENTARIOS Y OFERTAS -->
						</div>
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

	<script>
		function comentarios() {                              //MUESTRO/ACTUALIZO LOS COMENTARIOS
			$.ajax({
				type: 'GET',
				url: 'comentariosofertas.php',
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
				url: 'comentariosofertas.php',
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

	<script>
		function modificarOferta(idOferta) {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'modificarOferta.php',
				data: {
					of: idOferta,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(ret){
				if (ret == 'Fecha'){
					console.log("fecha vencimiento cumplida");
					alert("Se ha cumplido la fecha de vencimiento, no se puede modificar la oferta...");
				}
				else {
					console.log("Modificar oferta");
					$('#lista-ofertas').html(ret);
				}
			});
		}
	</script>

	<script>
		function eliminarOferta(idOferta) {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'eliminarOferta.php',
				data: {
					of: idOferta,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(ret){
				if (ret == 'Fecha'){
					console.log("fecha vencimiento cumplida");
					alert("Se ha cumplido la fecha de vencimiento, no se puede eliminar la oferta...");
				}
				else {
					if (ret == 'Eliminada'){
						console.log("Eliminando oferta");
						ofertas();
					}
				}
			});
		}
	</script>

	<script>
		function eliminarComentario(idComentario) {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'eliminarComentario.php',
				data: {
					com: idComentario,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(ret){
				if (ret == 'Fecha'){
					console.log("fecha vencimiento cumplida");
					alert("Se ha cumplido la fecha de vencimiento, no se puede eliminar el comentario...");
				}
				else {
					if (ret == 'Hay respuesta'){
						console.log("Hay respuesta");
						alert("El comentario ya se ha respondido, no se puede eliminar...");
					}
					else {
						if (ret == 'Eliminado'){
							console.log("Respuesta vacia, eliminando...");
							comentarios();
						}
					}
				}
				console.log(ret);
			});
		}
	</script>

	<script>
		function eliminarRespuesta(idComentario) {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'eliminarRespuesta.php',
				data: {
					com: idComentario,
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(ret){
				if (ret == 'Fecha'){
					console.log("fecha vencimiento cumplida");
					alert("Se ha cumplido la fecha de vencimiento, no se puede eliminar la respuesta...");
				}
				else {
					if (ret == 'Eliminada'){
						console.log("Eliminando respuesta...");
						comentarios();
					}
				}
				console.log(ret);
			});
		}
	</script>

	<script>
		function modificarSubasta() {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'modificarSubasta.php',
				data: {
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(subasta){
				if (subasta == 'Oferta'){
					console.log("prohibido modificar, hay oferta");
					alert("Alguien realizo una oferta, la subasta no se puede modificar...");
				}
				else {
					if (subasta == 'Fecha') {
						console.log("prohibido modificar, fecha vencimiento");
						alert("La subasta ha llegado a la fecha de vencimiento, no se puede modificar...");
					}
					else {
						console.log("modificando");
						$('#contenidoSubasta').html(subasta);
						$('#duracion-subasta').ionRangeSlider({
						    <?php include("calcularDuracion.php");?>,
						    keyboard: true,
						    postfix: " dias",
						    grid: true,
						    values: [15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
						});
						console.log("prueba");
					}
				}
			});
		}
	</script>

	<script>
		function eliminarSubasta() {                              //MUESTRO/ACTUALIZO LAS OFERTAS
			$.ajax({
				type: 'GET',
				url: 'eliminarSubasta.php',
				data: {
					<?php if(isset($_GET['subID']) && !empty($_GET['subID'])){
							echo 'subID:'.'"'.$_GET['subID'].'"';
						}?> 
				}
			}).done(function(subasta){
				console.log(subasta);
				if (subasta != '') {
					if (subasta == 'Eliminada') {
						alert("Subasta eliminada, redireccionando a su perfil...");
						window.location="perfil.php";
						console.log("Eliminado");
					}					
					else {
						alert("La subasta ha llegado a la fecha de vencimiento, no se puede eliminar...");
						console.log("No se elimino");
					}
				}
				else {
					console.log("algo paso");
					
				}
			});
		}
	</script>

	<script>
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
					$("#divfoto").html('<input type="file" id="foto" name="foto" onchange="validarsize(this);">');
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

	<!-- modal eliminar subasta -->
	<div class="modal fade" id="eliminarSubasta">
		<div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Eliminar subasta</h4>
			    </div>
			    <div class="modal-body">
			        <p>¿Esta seguro que desea eliminar la subasta?</p>
			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        <a onclick="eliminarSubasta()" class="btn btn-primary" data-dismiss="modal">Eliminar</a>
			    </div>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- fin modal eliminar subasta -->
	
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