<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
		
	
	$inicio = $_POST['inicio'];
	$fin = $_POST['fin'];
	$inicio=strtotime($inicio);
	$fin=strtotime($fin);
	$inicio=date('Y-m-d', $inicio);
	$fin=date('Y-m-d', $fin);
	echo $inicio;
	echo $fin;
	$registro = mysql_query("SELECT * 
				FROM publicacion
				WHERE ( '$inicio' < fecha_pago) 
				AND ( '$fin' > fecha_pago)", $con)or die ("problemas en consulta: ".mysql_error());
	

	$numPub = mysql_num_rows($registro); 
	if ($numPub == 0) {		//No se encontro nada en la busqueda
		echo '<script type="text/javascript">', 'alert("La busqueda no contiene resultados");', '</script>';  //document.location = index.php;		
	}
	

		
?>					