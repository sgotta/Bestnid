<?php
	
	include("conexion.php");
	session_start();
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//ARMO STRING UPDATE SEGUN LOS DATOS QUE SE QUIERAN MODIFICAR
	$update = "UPDATE publicacion SET ";
	if (isset($_POST['titulo']) && !empty($_POST['titulo'])){
		$update = $update."titulo = '$_POST[titulo]', ";
		// echo "Titulo: ".$_POST['titulo']."<br>";
	}
	if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
		$update = $update."descripcion = '$_POST[descripcion]', ";
		// echo "Descripcion: ".$_POST['descripcion']."<br>";
	}
	if (isset($_POST['duracion-subasta']) && !empty($_POST['duracion-subasta'])){
		$publicacion= mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]' ",$con);
		$publicacion= mysql_fetch_array($publicacion);
		//$fecha_inicio = strtotime($fecha_inicio);
		//$fecha_inicio= date("Y-m-d"); //fecha actual con formato yyyy-mm-dd
		$duracion= $_POST['duracion-subasta'];
		// echo "duracion:".$duracion."<br>";
		// echo "es:".$publicacion['fecha_inicio']."<br>";
		//calcular fecha fin
		$duracion="+".$duracion." "."day"; //ej: +21 day
		$fecha_fin= strtotime($duracion,strtotime($publicacion['fecha_inicio']));
		$fecha_fin= date('Y-m-d',$fecha_fin); //se vuelve al formato yyyy-mm-dd
		$update = $update."fecha_fin = '$fecha_fin', ";
		// echo "Fecha de fin: ".$fecha_fin."<br>";
	}
	if (isset($_POST['categ']) && !empty($_POST['categ'])){
		$idCategoria= mysql_query("SELECT * FROM categoria WHERE nombre = '$_POST[categ]' ",$con);
		$idCategoria= mysql_fetch_array($idCategoria);
		$idCategoria= $idCategoria['idCategoria'];
		$update = $update."Categoria_idCategoria = '$idCategoria', ";
		// echo "categoria: ".$_POST['categ']."<br>";
	}
	if (isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])){
		$data =addslashes(file_get_contents($_FILES['foto']['tmp_name']));
		$update = $update."foto = '$data'";
		// echo "hayfoto"."<br>";
	}
	// SEGUN LO QUE QUIERA EL USUARIO LA CONSULTA PUEDE TERMINAR ASI 
	//"VAR=VAR2, "
	// O ASI
	//"VAR=VAR2"
	//ANTES DEL WHERE, ENTONCES SI EXISTE ESA COMA, LA BORRO
	if ($update[strlen($update)-2] == ','){
		$update=substr($update, 0, (strlen($update)-2));
		// echo "update CORTADO:".$update."<br>";
	}
	$update = $update." WHERE idPublicacion = '$_GET[subID]'";
	// echo "update FINAL:".$update."<br>";

	$resultado = mysql_query($update,$con);
	
	if (!$resultado) { //si hay error
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/
	}else{
		$header = "Location: subasta.php?subID=".$_GET['subID'];
		header($header);
	}
?>