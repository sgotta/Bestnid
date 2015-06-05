<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM categoria") or die ("problemas en consulta:".mysql_error());

	$string = $_SERVER["PHP_SELF"]."?";  //"index.php?";
	
	for ($i=0; $i < count($_GET); $i++) {
		if ((array_keys($_GET)[$i] != 'catID') && (array_keys($_GET)[$i] != 'filtros')){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
		else {
			if (array_keys($_GET)[$i] == 'filtros'){
				for ($f=0; $f < count($_GET['filtros']); $f++) {
					$string = $string.'filtros%5B%5D'."=".array_values($_GET['filtros'])[$f]."&";      //filtros%5B%5D=Buenos+Aires&filtros%5B%5D=La+Plata
				}
			}
		}
	}

	while($reg=mysql_fetch_array($registro)){
		// echo "&nbsp&nbsp&nbsp".$reg['nombre']."<br>";
		$cant = mysql_query("SELECT nombre FROM publicacion p INNER JOIN categoria c ON (p.Categoria_idCategoria = c.idCategoria) WHERE c.idCategoria = $reg[idCategoria]") or die ("problemas en consulta:".mysql_error());
		$numC = mysql_num_rows($cant);
		echo '<a href="'.$string.'catID='.$reg['idCategoria'].'" class="list-group-item">'.$reg['nombre'].'<span class="badge">'.$numC.'</span></a>';
	}
?>