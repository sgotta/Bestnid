<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//me quedo con todas las categorias
	$registro=mysql_query("SELECT * FROM categoria") or die ("problemas en consulta:".mysql_error());

	if (isset($_SESSION) && !empty($_SESSION)) {
		$string = "sesioniniciada.php?";
	}else{
		$string = "index.php?";
	}

	//TENER EN CUENTA LA BUSQUEDA Y FILTROS O NO

	// for ($i=0; $i < count($_GET); $i++) {
	// 	if ((array_keys($_GET)[$i] != 'catID') && (array_keys($_GET)[$i] != 'pagID')){
	// 		$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
	// 	}
	// }
	$condFecha =   'YEAR(CURRENT_DATE()) < YEAR(p.fecha_fin) 
					OR ( YEAR(CURRENT_DATE()) = YEAR(p.fecha_fin) AND MONTH(CURRENT_DATE()) < MONTH(p.fecha_fin) ) 
					OR ( YEAR(CURRENT_DATE()) = YEAR(p.fecha_fin) AND MONTH(CURRENT_DATE()) = MONTH(p.fecha_fin) AND DAY(CURRENT_DATE()) <= DAY(p.fecha_fin) )';
	while($reg=mysql_fetch_array($registro)){
		// echo "&nbsp&nbsp&nbsp".$reg['nombre']."<br>";
		$cant = mysql_query("SELECT nombre FROM publicacion p INNER JOIN categoria c ON (p.Categoria_idCategoria = c.idCategoria) WHERE c.idCategoria = $reg[idCategoria] AND ( $condFecha )") or die ("problemas en consulta:".mysql_error());
		$numC = mysql_num_rows($cant);
		//filtro las que estan eliminadas y no tienen publicaciones activas
		if($numC>0){ //si tiene publicaciones activas muestro siempre
			echo '<a href="'.$string.'catID='.$reg['idCategoria'].'" class="list-group-item">'.$reg['nombre'].'<span class="badge">'.$numC.'</span></a>';
		}else{
			$estaBorrado = mysql_query("SELECT * FROM categoria WHERE idCategoria=$reg[idCategoria] AND borrado='1'") or die ("problemas en consulta:".mysql_error());
			if(mysql_num_rows($estaBorrado) == 0){
				//la categoria no tiene publicaciones pero no esta borrada
				echo '<a href="'.$string.'catID='.$reg['idCategoria'].'" class="list-group-item">'.$reg['nombre'].'<span class="badge">'.$numC.'</span></a>';
			}
		}
	}

?>

