<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$datosUser=mysql_query("SELECT * 
							FROM usuario 
							WHERE nombre_usuario = '$user'") 
							or die ("problemas en consulta: ".mysql_error());

	$datosUser=mysql_fetch_array($datosUser);

	//mostrarlos por defecto (tomar formulario)
	//si se modifican guardarlos

	echo '<div class="list-group" style="border-bottom: solid 1px #D6D6D6; padding-bottom: 20px;">
			    <h4>Datos de cuenta</h4>
			    <p class="list-group-item-text"><strong>Nombre de Usuario: </strong>&nbsp;&nbsp;'.$datosUser['nombre_usuario'].'</p>
			    <p class="list-group-item-text"><strong>Contraseña: </strong>&nbsp;&nbsp;<span>**********</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-right: solid 1px #D6D6D6;"></span><a class="btn btn-link" onclick="modificarContraseña();">Modificar</a></p>
			</div>
			<div class="list-group" style="border-bottom: solid 1px #D6D6D6; padding-bottom: 20px;">
			    <h4>Datos Personales</h4>
			    <p class="list-group-item-text"><strong>Nombre y apellido: </strong>&nbsp;&nbsp;'.$datosUser['nombre'].' '.$datosUser['apellido'].'</p>
			    <p class="list-group-item-text"><strong>E-mail: </strong>&nbsp;&nbsp;'.$datosUser['mail'].'&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-right: solid 1px #D6D6D6;"></span><a class="btn btn-link" onclick="modificarEmail();">Modificar</a></p>
			    <p class="list-group-item-text"><strong>Teléfono: </strong>&nbsp;&nbsp;'.$datosUser['tel'].'&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-right: solid 1px #D6D6D6;"></span><a class="btn btn-link" onclick="modificarTel();">Modificar</a></p>
			</div>
			<div class="list-group" style="padding-bottom: 20px;">
				<h4>Domicilio</h4><span class="pull-right"><a class="btn btn-link" onclick="modificarDomicilio();" style="border-left: solid 1px #D6D6D6;">Modificar</a></span>
			    <p class="list-group-item-text">Calle: '.$datosUser['calle'].' Número: '.$datosUser['nro'].'</p>
			    <p class="list-group-item-text" style="color: #9C9C9C;">Piso: '.$datosUser['piso'].' Departamento: '.$datosUser['depto'].'
				<p class="list-group-item-text" style="color: #9C9C9C;">Ciudad: '.$datosUser['ciudad'].'&nbsp;&nbsp;Provincia: '.$datosUser['provincia'].'&nbsp;&nbsp;Pais: '.$datosUser['pais'].'.'.'
			</div>';
?>