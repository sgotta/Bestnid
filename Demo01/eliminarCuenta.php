<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}

	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];
	$correoIngresado=$_REQUEST['email']; //esto es lo que se ingresa en la confirmación.

	$datosUser = mysql_query("SELECT *
								FROM usuario
								WHERE nombre_usuario='$user'",$con);

	$datosUser=mysql_fetch_array($datosUser);
	
	if ($datosUser['mail']==$correoIngresado) {
		//me fijo si tiene subastas activas:
		$resultado = mysql_query("SELECT *
								FROM publicacion
								WHERE Usuario_nombre_usuario='$user'",$con);
		$contSub=0;
		if (mysql_num_rows($resultado)>0) {
			
			while ($publicacion=mysql_fetch_array($resultado)) {
				if ($publicacion['finalizado']==0) { //la subasta esta activa.
					$contSub++;
				}
			}
		}

		//me fijo si tiene ofertas activas:
		$resultado = mysql_query("SELECT *
								FROM oferta
								WHERE Usuario_nombre_usuario='$user'",$con);
		$contOfer=0;
		if (mysql_num_rows($resultado)>0){ //significa que el usuario realizó oferta/s
			
			while ($oferta=mysql_fetch_array($resultado)) {
				//busco la subasta donde se ofertó.
				$subasta = mysql_query("SELECT *
									FROM publicacion
									WHERE idPublicacion='$oferta[Publicacion_idPublicacion]'",$con);
				$subasta=mysql_fetch_array($subasta);
				if ($subasta['finalizado']==0){ //está activa, por ende la oferta sigue en pie.
					$contOfer++;
				}
			}
		}
		//SI NO TIENE NINGUNA SUBASTA, NI OFERTA ACTIVA SE PUEDE ELIMINAR;
		if ($contSub==0 && $contOfer==0) {
			$query=mysql_query("UPDATE usuario SET activo = 0 WHERE nombre_usuario = '$user'",$con);
			if($query){
				echo '<script type="text/javascript">', 'alert("Su cuenta ha sido eliminada!"); document.location = perfil.php;', '</script>';
				echo'<script>location.href="index.php"; </script>';
			}else{
				echo "Error al intentar dar de baja en base de datos.";
			}
		}else{
			if ($contSub>0 && $contOfer==0) {
				echo 'No se puede eliminar su cuenta, usted tiene '.$contSub.' subasta/s activas.';
			}else{
				if ($contSub==0 && $contOfer>0) {
					echo 'No se puede eliminar su cuenta, usted tiene '.$contOfer.' oferta/s activas.';
				}else{
					echo 'No se puede eliminar su cuenta, usted tiene '.$contSub.' subasta/s y '.$contOfer.' oferta/s activas.';
				}
			}
		}
	}else{
		echo "El correo ingresado es incorrecto.";
	}
?>