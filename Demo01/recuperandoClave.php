<?php 
	include("conexion.php");
	if(isset($_GET['mail']) && !empty($_GET['mail'])) {
		$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		mysql_select_db($db,$con) or die ("problemas al conectarDB");
		$sel=mysql_query("SELECT * FROM usuario WHERE mail = '$_GET[mail]'",$con);
		//EL MAIL INGRESADO ES CORRECTO
		if (mysql_num_rows($sel)>0) {
			echo "recuperado";
		}
		//NO EXISTE EL MAIL INGESADO
		else{
			echo "nomail";
		}
	}
	//CAMPO MAIL VACIO (EN REALIDAD NUNCA SE DARIA ESTE CASO, SE CORROBORA ANTES CON HTML5)
	else {
		echo "vacio";
	}
?>