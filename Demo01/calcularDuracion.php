<?php
	//calculo duracion elegida previamente para que la regla quede parada en ese valor 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$publicacion= mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]' ",$con);
	$publicacion= mysql_fetch_array($publicacion);
	//CALCULO DIFERENCIA ENTRE LAS FECHAS, LA RESTA RETORNA FORMATO SEGUNDOS	
	$segundos=strtotime($publicacion['fecha_fin']) - strtotime($publicacion['fecha_inicio']);
	//PASO SEGUNDOS A CANTIDAD DE DIAS, ME QUEDO CON LA PARTE ENTERA DE ESA DIVISION
	$diferencia_dias=intval($segundos/60/60/24);
	//AL RESULTADO LE RESTO 15. 
	//EJ: SI LA SUBASTA TIENE UNA DURACION DE 15 DIAS, FROM = 0, PARA POSICIONAR LA REGLA EN 15 (INDICE 0). 
	//SI LA SUBASTA TIENE UNA DURACION DE 30 DIAS, FROM = 15, PARA POSICIONAR LA REGLA EN 30 (INDICE 15).
	$from = $diferencia_dias-15;
	// echo "La cantidad de días es <b>".$diferencia_dias."</b>";
	echo 'from:'.'"'.$from.'"';
?> 