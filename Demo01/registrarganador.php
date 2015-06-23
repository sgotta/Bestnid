<?php //acá finalizo la subasta, se va a registrar que hay un ganador y notificar al mismo.
	include("conexion.php");
	session_start();

	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	$usuarioGanador = $_POST['optionsRadios'];

	//en esta oferta tengo que poner ganador en 1
	
	$ofertaGanadora=mysql_query("SELECT *  
								FROM oferta
								WHERE Usuario_nombre_usuario = '$usuarioGanador'
								AND /*--- acá me falta algo, ya intente inner join, pero es lo mismo ---*/") 
								or die ("problemas en consulta:".mysql_error());
	
	$arrayOferta=mysql_fetch_array($ofertaGanadora);

	print_r($arrayOferta);
	echo "Gano: ".$usuarioGanador;

 ?>