<?php 
	if (!isset($_SESSION)) { //parche
		session_start();
	}
	
	include("conexion.php");

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$user=$_SESSION['username'];

	$calle = $_REQUEST['calle'];
	$nro = $_REQUEST['numero'];
	$ciudad = $_REQUEST['ciudad'];
	$provincia = $_REQUEST['provincia'];
	$pais = $_REQUEST['pais'];
	$piso='';
	if (isset($_REQUEST['piso']) && !empty($_REQUEST['piso'])) {
		$piso = $_REQUEST['piso'];	
	}
	$dpto='';
	if (isset($_REQUEST['depto']) && !empty($_REQUEST['depto'])) {
		$dpto = $_REQUEST['depto'];
	}

	//actualizar base:
	mysql_query("UPDATE usuario 
					SET calle='$calle', nro='$nro', piso='$piso', depto='$dpto', ciudad='$ciudad', provincia='$provincia', pais='$pais' 
					WHERE nombre_usuario = '$user'",$con) 
					or die ("problemas en consulta: ".mysql_error());

	echo '<script type="text/javascript">', 'alert("Su domicilio ha sido actualizado"); document.location = perfil.php;', '</script>';
	echo'<script>location.href="perfil.php"; </script>';

?>