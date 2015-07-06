<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$resultado = mysql_query("SELECT *
								FROM oferta
								WHERE Usuario_nombre_usuario='$user'",$con);

	$fecha_actual= date("Y-m-d"); //fecha actual con formato yyyy-mm-dd
	
	echo '<h4>Mis Ofertas: </h4>';

	if (mysql_num_rows($resultado)>0){ //significa que el usuario realizó oferta/s
		while ($oferta=mysql_fetch_array($resultado)) {
			$fecha_pago=null;
			$subasta = mysql_query("SELECT *
								FROM publicacion
								WHERE idPublicacion='$oferta[Publicacion_idPublicacion]'",$con);
			$subasta=mysql_fetch_array($subasta);
			if ($subasta['fecha_fin']<$fecha_actual){ //si terminó la subasta
				//busco ganador
				$q = mysql_query("SELECT *
									FROM oferta
									WHERE Publicacion_idPublicacion='$oferta[Publicacion_idPublicacion]'
									AND ganador = 1",$con);
				if (mysql_num_rows($q)>0) { //si hay ganador
					$ganador = $q['Usuario_nombre_usuario'];
					if ($ganador=$oferta['Usuario_nombre_usuario']) { //si gané
						if ($subasta['fecha_pago']!=null) { //si ya pagué
							$label='<span class="label label-success">Finalizada</span>';
							$fecha_pago=$subasta['fecha_pago']; //no lo uso
						}else{
							$label='<span class="label label-success">Ganador</span>&nbsp<span class="label label-warning">Realizar el pago</span>';
						}
					}	
				}else{
					$label='<span class="label label-info">Pendiente</span>';
				}
			}else{
				$label='<span class="label label-primary">Activa</span>';
			}
			echo   '<div class="list-group" style="border: solid 1px #D6D6D6;">
						  <a href="subasta.php?subID='.$oferta['Publicacion_idPublicacion'].'" class="list-group-item">
						    <h4 class="list-group-item-heading">'.$subasta['titulo'].'&nbsp;&nbsp;'.$label.'</h4>
						    <p class="list-group-item-text">'.$oferta['motivo'].'</p>
						  </a>
						</div>';
		}
	}else{
		echo '<div class="alert alert-warning" role="alert">"Usted no ha ofertado en ninguna subasta."</div>';
	}
?>