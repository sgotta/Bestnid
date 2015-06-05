<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");



	$query = "";
	$query = $query."SELECT * FROM publicacion";
	

	// if (isset($_GET['filtros'])){
	// 	print_r($_GET['filtros']);
	// }
	// echo "aver";
	// if (isset($_GET['filtros'])) {
	// 	echo array_keys($_GET['filtros'])."valuessssss:".array_values($_GET['filtros']);
	// }

	if (isset($_GET['filtros'])) {
		$filtros = $_GET['filtros']; //guardo el array con los filtros seleccionados en una variable.
		foreach($filtros as $filtro){ //a cada filtro seleccionado le pone comillas simples ej.: 'Buenos Aires''La Plata'
		    $valor = "'".$filtro."'";
		    $filtros_aux[] = $valor; //se guardan en un arreglo auxiliar los filtros con comillas
		}
		$valores = implode(', ', $filtros_aux); //acá se separan los valores con ',' va a quedar algo asi: 'Buenos Aires', 'La Plata'
		$sql_valores = "(" .$valores. ")"; //por último se encierra todo entre parentesis ('Buenos Aires', 'La Plata')
		$query = $query." INNER JOIN usuario ON usuario.ciudad IN $sql_valores AND usuario.nombre_usuario = publicacion.Usuario_nombre_usuario";
		/*$sql_valores = ('Buenos Aires', 'La Plata')*/
		// $sql_select = mysql_query("SELECT * 
		// 							FROM publicacion AS p 
		// 							INNER JOIN usuario AS u 
		// 							ON u.ciudad IN $sql_valores 
		// 							AND u.nombre_usuario = p.Usuario_nombre_usuario",$cnx)
		// 							or die ("problemas en consulta:".mysql_error());
		// $total_filas = mysql_num_rows($sql_select);  

		// if ($total_filas == 0) {
		// 	echo '<script type="text/javascript">', 'alert("No se encontraron publicaciones");', '</script>';
		// }else{
	}
	if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
		$query = $query." WHERE titulo LIKE'%$_GET[buscar]%'";
	}

	if(isset($_GET['catID']) && !empty($_GET['catID'])){
		if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
			$query = $query." AND publicacion.Categoria_idCategoria = $_GET[catID]";
		}
		else $query = $query." WHERE publicacion.Categoria_idCategoria = $_GET[catID]";
	}
	if(isset($_GET['ordID']) && !empty($_GET['ordID'])){
		if($_GET['ordID'] == 'menosRecientes'){
			$query = $query." ORDER BY fecha_inicio ASC";
		}
		else if($_GET['ordID'] == 'masRecientes'){
			$query = $query." ORDER BY fecha_inicio DESC";
		}
	}

	// if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
	// 	//$conexion=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	// 	//mysql_select_db($db,$conexion) or die ("problemas al conectarDB");
	// 	//----ORDENAR BUSQUEDA----
	// 	if(isset($_GET['ordID']) && !empty($_GET['ordID'])){
	// 		if($_GET['ordID'] == 'menosRecientes'){ //menos reciente
	// 			$registro=mysql_query("
	// 				SELECT *
	// 				FROM publicacion
	// 				WHERE titulo LIKE'%$_GET[buscar]%'
	// 				ORDER BY fecha_inicio ASC")
	// 				or die("problemas en consulta: ".mysql_error());
	// 		} else	if($_GET['ordID'] == 'masRecientes'){ //mas recientes
	// 			$registro=mysql_query("
	// 				SELECT *
	// 				FROM publicacion
	// 				WHERE titulo LIKE'%$_GET[buscar]%'
	// 				ORDER BY fecha_inicio DESC")
	// 				or die("problemas en consulta: ".mysql_error());
	// 		}
	// 	}else{   //---BUSQUEDA SIN ORDENAR---
	// 		$registro=mysql_query("
	// 			SELECT *
	// 			FROM publicacion
	// 			WHERE titulo LIKE'%$_GET[buscar]%'")
	// 			or die("problemas en consulta: ".mysql_error());
	// 	// $busqueda = $_GET['buscar'];
	// 	}
	// }else {    //----TODAS LAS PUBLICACIONES------
	// 	//----ORDENAR PUBLICACIONES----
	// 	if(isset($_GET['ordID']) && !empty($_GET['ordID'])){
	// 		if($_GET['ordID'] == 'menosRecientes'){ //menos reciente
	// 			$registro=mysql_query("
	// 				SELECT *
	// 				FROM publicacion
	// 				ORDER BY fecha_inicio ASC")
	// 				or die("problemas en consulta: ".mysql_error());
	// 		} else	if($_GET['ordID'] == 'masRecientes'){ //mas recientes
	// 			$registro=mysql_query("
	// 				SELECT *
	// 				FROM publicacion
	// 				ORDER BY fecha_inicio DESC")
	// 				or die("problemas en consulta: ".mysql_error());
	// 		}
	// 	}else{  //---TODAS LAS PUBLICACIONES SIN ORDENAR
	// 		$registro=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta:".mysql_error());
	// 	}
	// }
	

	// echo $query;
	$registro=mysql_query($query) or die ("problemas en consulta:".mysql_error());
	// $nueva=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta22222:".mysql_error());
	// echo $busqueda;

	

	//----PAGINACION----	
	
	//$cantPub =mysql_query("SELECT COUNT(*) FROM publicacion") or die ("problemas en consulta:".mysql_error());
	$numPub = mysql_num_rows($registro);
	$totalPaginas = $numPub / 6;
	if ($numPub % 6 > 0) {
		$totalPaginas++;
	}
	$totalPaginas = (int)$totalPaginas; 
	$i=0;
	if(isset($_GET['pagID'])){
		$paginaActual = $_GET['pagID'];
	}
	else {
		$paginaActual = 1;
	}
	$saltear = ($paginaActual * 6) - 6;
	$pg = 0;
	while(($pg<$saltear) && mysql_fetch_array($registro)){
		$pg++;
	}
	while(($i<6) && ($reg=mysql_fetch_array($registro))){
		echo '<section class="posts col-md-4">
				<div class="thumbnail">    
					<a href="#" class="thumb">
						<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="" style="max-height: 140px;">
					</a>
					<div class="caption">
						<h3 class="post-title">
							<a href="#">'.$reg['titulo'].'</a>
						</h3>
						<p><span class="post-fecha">'.$reg['fecha_inicio'].'</span></p>
						<p class="post-contenido text-justify">
							'.$reg['descripcion'].'
						</p>
						<div class="contenedor-botones">
							<a href="#" class="btn btn-primary">Detalles</a>
							<a href="#" class="btn btn-success" id="btn-ofertar">Ofertar</a>
						</div>
					</div>
				</div>
			</section>';
		$i++;
	}
?>					