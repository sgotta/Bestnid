<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$notif=mysql_query(" SELECT *
			FROM notificacion INNER JOIN usuario_notificacion
			ON usuario_notificacion.Usuario_nombre_usuario='$_SESSION[username]'
			AND usuario_notificacion.Notificacion_numero_identificacion=notificacion.idNotificacion
			/*AND notificacion.leida=0*/
			 ORDER BY idNotificacion DESC
			") or die ("problemas en consulta:".mysql_error());

		$num = mysql_num_rows($notif); 
		if($num == 0){
				echo '<p id="notifnueva">'."No tiene notificaciones".'</p>';
		}else{
			//$notificaciones='';
			while($reg=mysql_fetch_array($notif)){
				//$notificaciones=$notificaciones.'<p>'.$reg['descripcion'].'</p>';
				if($reg['leida'] == 1){
					echo '<div id="notifleida"><a href="subasta.php?subID='.$reg['id_publicacion'].'" id="textonotif">'.$reg['descripcion'].'<br>'.'</a></div>';
				}else{
					
					echo '<div id="notifnueva"><a href="subasta.php?subID='.$reg['id_publicacion'].'" id="textonotif">'.$reg['descripcion'].'<br>'.'</a></div>';
				
					mysql_query(" UPDATE notificacion
					SET leida='1'
					WHERE notificacion.idNotificacion=$reg[idNotificacion]
					") or die ("problemas en consulta:".mysql_error());    
				}
			} //echo $notificaciones;
		}
	

	

	
?>