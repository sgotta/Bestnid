<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
		//$conexion=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
		//mysql_select_db($db,$conexion) or die ("problemas al conectarDB");
		//----ORDENAR BUSQUEDA----
		if(isset($_GET['ordID']) && !empty($_GET['ordID'])){
			if($_GET['ordID'] == 'menosRecientes'){ //menos reciente
				$registro=mysql_query("
					SELECT *
					FROM publicacion
					WHERE titulo LIKE'%$_GET[buscar]%'
					ORDER BY fecha_inicio ASC")
					or die("problemas en consulta: ".mysql_error());
			} else	if($_GET['ordID'] == 'masRecientes'){ //mas recientes
				$registro=mysql_query("
					SELECT *
					FROM publicacion
					WHERE titulo LIKE'%$_GET[buscar]%'
					ORDER BY fecha_inicio DESC")
					or die("problemas en consulta: ".mysql_error());
			}
		}else{   //---BUSQUEDA SIN ORDENAR---
			$registro=mysql_query("
				SELECT *
				FROM publicacion
				WHERE titulo LIKE'%$_GET[buscar]%'")
				or die("problemas en consulta: ".mysql_error());
		// $busqueda = $_GET['buscar'];
		}
	}else {    //----TODAS LAS PUBLICACIONES------
		//----ORDENAR PUBLICACIONES----
		if(isset($_GET['ordID']) && !empty($_GET['ordID'])){
			if($_GET['ordID'] == 'menosRecientes'){ //menos reciente
				$registro=mysql_query("
					SELECT *
					FROM publicacion
					ORDER BY fecha_inicio ASC")
					or die("problemas en consulta: ".mysql_error());
			} else	if($_GET['ordID'] == 'masRecientes'){ //mas recientes
				$registro=mysql_query("
					SELECT *
					FROM publicacion
					ORDER BY fecha_inicio DESC")
					or die("problemas en consulta: ".mysql_error());
			}
		}else{  //---TODAS LAS PUBLICACIONES SIN ORDENAR
			$registro=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta:".mysql_error());
		}
	}

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