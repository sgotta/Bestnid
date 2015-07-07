<?php
	
	include("conexion.php");
	session_start();
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//ARMO STRING UPDATE SEGUN LOS DATOS QUE SE QUIERAN MODIFICAR
	//IF GRANDE PARA VERIFICAR SI SE MODIFICA AL MENOS UN ELEMENTO
	if ((isset($_POST['motivo']) && !empty($_POST['motivo'])) || (isset($_POST['precio']) && !empty($_POST['precio']))){
		$update = "UPDATE oferta SET ";
		if (isset($_POST['motivo']) && !empty($_POST['motivo'])){
			$update = $update."motivo = '$_POST[motivo]'";
			// echo "Titulo: ".$_POST['titulo']."<br>";
		}
		if (isset($_POST['precio']) && !empty($_POST['precio'])){
			if (isset($_POST['motivo']) && !empty($_POST['motivo'])){
				$update = $update.", precio = '$_POST[precio]'";
			}
			else {
				$update = $update."precio = '$_POST[precio]'";
			}
		}
		$update = $update." WHERE idOferta = '$_GET[of]'";
		mysql_query($update,$con);
	}
	$header = "Location: subasta.php?subID=".$_GET['subID'].'&&op=2';
	header($header);
?>