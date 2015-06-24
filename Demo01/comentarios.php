<?php
	//DEVUELVO LOS COMENTARIOS DE LA SUBASTA(DUEÑO SUBASTA Y USUARIOS) Y EL FORMULARIO PARA REALIZAR UN COMENTARIO(USUARIO)

	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}
	
	$coment = '';
	$coment = '<ul class="list-group">';
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	
	//CONSULTA CON COMENTARIOS
	$c=mysql_query("SELECT * FROM comentario WHERE Publicacion_numero_publicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	//$numPub = mysql_num_rows($c); 
	
	//CONSULTA SOBRE PUBLICACION PARA MOSTRAR OPCION RESPONDER AL DUEÑO DE LA SUBASTA
	$c2=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$reg2=mysql_fetch_array($c2);

	//EMPIEZO A DEVOLVER COMENTARIOS
	while ($reg=mysql_fetch_array($c)){
		$coment = $coment.'<li class="list-group-item" id="pregunta"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;'.$reg['descripcion'].'</li>';
		if (isset($reg['respuesta']) && !empty($reg['respuesta'])){
			$coment = $coment.'<li class="list-group-item" id="respuesta">'.$reg['respuesta'].'</li>';
		}
		//SINO HAY RESPUESTA LE MUESTRO AL DUEÑO TEXT AREA PARA RESPONDER
		else {
			if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
				if ($_SESSION['username'] == $reg2['Usuario_nombre_usuario']){
					$coment = $coment.'<form action="responder.php?subID='.$_GET['subID'].'&c='.$reg['idComentario'].'" method="post">
										<textarea class="form-control list-group-item pull-right" rows="1" style="width: 98%;" required minlength="1" maxlength="140" placeholder="Escribir respuesta..." name="response" id="respuesta"></textarea><br>
										<button type="submit" class="btn btn-primary" id="btn-registro2"> Responder </button>
									</form><br>';
				}
			}
		}
		
	}
	$coment = $coment.'</ul>';
	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		if ($_SESSION['username'] == $reg2['Usuario_nombre_usuario']){
			//SI ES EL DUEÑO DE LA SUBASTA NO MUESTRO OPCION DE COMENTAR
		}
		else {  //SI ES CUALQUIER OTRO USUARIO MUESTRO FORMULARIO COMENTAR
			$date = strtotime($reg2['fecha_fin']);
			if ((getdate()['year'] < date("Y",$date)) 
				OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] < date("n",$date))
				OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] == date("n",$date) AND getdate()['mday'] < date("j",$date))){
				//LA SUBASTA NO FINALIZO, MUESTRO FORMULARIO PARA COMENTAR
				$coment = $coment.'<form action="comentar.php?subID='.$_GET['subID'].'" method="post">
							<textarea class="form-control" rows="3" required minlength="1" maxlength="140" placeholder="Haz un comentario..." name="coment"></textarea><br>
							<button type="submit" class="btn btn-primary" id="btn-registro"> Comentar </button>
						</form><br>';
				
			}
			//LA SUBASTA FINALIZO, NO SE PUEDE COMENTAR
			else {
				$coment = $coment.'<br><span>***La subasta ha finalizado, ya no se pueden realizar comentarios***</span><br><br>';
			}
			
		}
	}
	else {  //SI NO HAY USUARIO CONECTADO NO MUESTRO OPCION COMENTAR
		$coment = $coment.'<span>***Inicia sesion para realizar un comentario***</span><br><br>';
	}
	return $coment;
?>



