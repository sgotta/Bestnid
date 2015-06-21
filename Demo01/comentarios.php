<?php
	//DEVUELVO LOS COMENTARIOS DE LA SUBASTA(DUEÑO SUBASTA Y USUARIOS) Y EL FORMULARIO PARA REALIZAR UN COMENTARIO(USUARIO)
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
		$coment = $coment.'<li class="list-group-item" id="pregunta">'.$reg['descripcion'].'</li>';
		if (isset($reg['respuesta']) && !empty($reg['respuesta'])){
			$coment = $coment.'<li class="list-group-item" id="respuesta">'.$reg['respuesta'].'</li>';
		}
		//SINO HAY RESPUESTA LE MUESTRO AL DUEÑO TEXT AREA PARA RESPONDER
		else {
			if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
				if ($_SESSION['username'] == $reg2['Usuario_nombre_usuario']){
					$coment = $coment.'<form action="responder.php?subID='.$_GET['subID'].'&c='.$reg['idComentario'].'" method="post">
										<textarea class="form-control" rows="1" placeholder="" name="response" id="respuesta"></textarea><br>
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
		else {
			$coment = $coment.'<form action="comentar.php?subID='.$_GET['subID'].'" method="post">
							<textarea class="form-control" rows="3" placeholder="Haz un comentario..." name="coment"></textarea><br>
							<button type="submit" class="btn btn-primary" id="btn-registro"> Comentar </button>
						</form><br>';
		}
	}
	else {  //SI NO ES DUEÑO MUESTRO FORMULARIO PARA COMENTAR
		$coment = $coment.'<form action="comentar.php?subID='.$_GET['subID'].'" method="post">
							<textarea class="form-control" rows="3" placeholder="Haz un comentario..." name="coment"></textarea><br>
							<button type="submit" class="btn btn-primary" id="btn-registro"> Comentar </button>
						</form><br>';
	}
	return $coment;
?>



