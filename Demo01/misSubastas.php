<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$resultado = mysql_query("SELECT *
								FROM publicacion
								WHERE Usuario_nombre_usuario='$user'",$con);

	$fecha_actual= date("Y-m-d"); //fecha actual con formato yyyy-mm-dd
	
	echo '<h4>Mis Subastas: </h4>';

	if (mysql_num_rows($resultado)>0) {
		while ($publicacion=mysql_fetch_array($resultado)) {
			$fecha_pago=null;
			if ($publicacion['fecha_fin']<$fecha_actual) {
				$q = mysql_query("SELECT *
									FROM oferta
									WHERE Publicacion_idPublicacion='$publicacion[idPublicacion]'
									AND ganador = 1",$con);
				if (mysql_num_rows($q)>0) {
					$ganador = $q['Usuario_nombre_usuario']; //nunca lo uso
					if ($publicacion['fecha_pago']!=null) {
						$label='<span class="label label-success">Finalizada</span>';
						$fecha_pago=$publicacion['fecha_pago']; //nunca lo uso
					}else{
						$label='<span class="label label-warning">Pago pendiente</span>';
					}
				}else{
					$label='<span class="label label-danger">Seleccionar ganador</span>';
				}
			}else{
				$label='<span class="label label-primary">Activa</span>';
			}
			echo   '<div class="list-group" style="border: solid 1px #D6D6D6;">
						  <a href="subasta.php?subID='.$publicacion['idPublicacion'].'" class="list-group-item">
						    <h4 class="list-group-item-heading">'.$publicacion['titulo'].'&nbsp;&nbsp;'.$label.'</h4>
						    <p class="list-group-item-text">'.$publicacion['descripcion'].'</p>
						    <p class="list-group-item-text">Inicio: '.$publicacion['fecha_inicio'].'&nbsp;&nbsp; Fin: '.$publicacion['fecha_fin'].'</p>
						  </a>
						</div>';
		}
	}else{
		echo '<div class="alert alert-warning" role="alert">"Usted no ha publicado ninguna subasta."</div>';
	}
?>