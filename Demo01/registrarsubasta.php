<?php
	//se comprobó todo antes de llegar acá, asi que solamente se registra el usuario en la base de datos y se inicia la sesión.
	include("conexion.php");
	session_start();

	$fecha_inicio= date("Y-m-d"); //fecha actual con formato yyyy-mm-dd
	$duracion= $_POST['duracion-subasta'];
	//calcular fecha fin
	$duracion="+".$duracion." "."day"; //ej: +21 day
	$fecha_fin= strtotime($duracion,strtotime($fecha_inicio));
	$fecha_fin= date('Y-m-d',$fecha_fin); //se vuelve al formato yyyy-mm-dd

	$finalizado= false;

	/*echo "Fecha de inicio: ".$fecha_inicio."<br>";
	echo "Duracion: ".$_POST['duracion-subasta']."<br>";
	echo "Fecha de fin: ".$fecha_fin."<br>";
	echo "Finalizado: ".$finalizado."<br>";
	echo "Titulo: ".$_POST['titulo']."<br>";
	echo "Descripcion: ".$_POST['descripcion']."<br>";
	echo "Foto: ".$_POST['foto']."<br>";
*/

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$idCategoria= mysql_query("SELECT * FROM categoria WHERE nombre = '$_POST[categ]' ",$con);
	$idCategoria= mysql_fetch_array($idCategoria);
	$idCategoria= $idCategoria['idCategoria'];
	$data =addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$resultado = mysql_query("INSERT INTO publicacion (fecha_inicio,fecha_fin,finalizado,titulo,descripcion,foto,Usuario_nombre_usuario, Categoria_idCategoria) 
	VALUES ('$fecha_inicio','$fecha_fin','$finalizado','$_POST[titulo]','$_POST[descripcion]','$data','$_SESSION[username]','$idCategoria')",$con);
	
	if (!$resultado) { //si hay error
		die('Error en base de datos: ' . mysql_error()); /*mostrar error de mysql*/
	}else{
		header("Location: sesioniniciada.php");
	}
?>