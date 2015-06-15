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
		$query = $query." INNER JOIN usuario 
						ON usuario.ciudad='$_GET[filtros]'
						AND usuario.nombre_usuario = publicacion.Usuario_nombre_usuario";
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

	

	// echo $query;
	$registro=mysql_query($query) or die ("problemas en consulta:".mysql_error());
	// $nueva=mysql_query("SELECT * FROM publicacion") or die ("problemas en consulta22222:".mysql_error());
	// echo $busqueda;
	$numPub = mysql_num_rows($registro); 
	if ($numPub == 0) {		//No se encontro nada en la busqueda
		echo '<script type="text/javascript">', 'alert("La busqueda no contiene resultados"); document.location = index.php;', '</script>';
		if (isset($_SESSION) && !empty($_SESSION)) {
			echo'<script>location.href="sesioniniciada.php"; </script>';
		}else{
			echo'<script>location.href="index.php"; </script>';
		}
		
	}
	

	//----PAGINACION----	
	
	//$cantPub =mysql_query("SELECT COUNT(*) FROM publicacion") or die ("problemas en consulta:".mysql_error());
	
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
	$subastas='';
	$subastas=$subastas.'<div class="row">';  //ARRANCO DIV DE SUBASTAS
	while(($i<6) && ($reg=mysql_fetch_array($registro))){
		if(strlen($reg['titulo']) >17){
			$t=substr($reg['titulo'], 0, 17)."...";
		}else{
			$t=$reg['titulo'];
		}
		if(strlen($reg['descripcion']) >30){
			$d=substr($reg['descripcion'], 0, 30)."...";
		}else{
			$d=$reg['descripcion'];
		}
		$subastas = $subastas. '<section class="posts col-md-4">
				<div class="thumbnail">    
					<a href="#" class="thumb">
						<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $reg['foto'] ).'" alt="" style="max-height: 140px;">
					</a>
					<div class="caption">
						<h3 class="post-title">
							<a href="#">'.$t.'</a>
						</h3>
						<p><span class="post-fecha">'.$reg['fecha_inicio'].'</span></p>
						<p class="post-contenido text-justify">
							'.$d.'
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
	$subastas=$subastas.'</div>'; //CIERRO DIV SUBASTAS
	// if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
		// if ($subastas == ''){
			// echo "NO HAY RESULTADOS";
			
		// }
		// else {
	if(isset($_GET['buscar'])){  //&& (!empty($_GET['buscar']) || ($_GET['buscar']==''))
		$subastas=$subastas.'<nav> 
								<div class="center-block">
									<ul class="pagination">';  //ABRO NAV PARA PAGINACION
		$pag=include("paginacion.php");							
		$subastas=$subastas.$pag;
		$subastas=$subastas.'</ul>
						</div>
					</nav>'; //CIERRO NAV PAGINACION
	}
	// else {
	// 	if(isset($_GET['buscar']) && ($_GET['buscar']=='')){
	// 		$subastas=$subastas.'<nav> 
	// 								<div class="center-block">
	// 									<ul class="pagination">';  //ABRO NAV PARA PAGINACION
	// 		$pag=include("paginacion.php");							
	// 		$subastas=$subastas.$pag;
	// 		$subastas=$subastas.'</ul>
	// 						</div>
	// 					</nav>'; //CIERRO NAV PAGINACION
	// 	}
	// }			
	echo $subastas;
			// $return[] = array($subastas,$totalPaginas);
			// header('Content-type: application/json; charset=utf-8');
			// echo json_encode($return);

			// echo json_encode(array('subastas' => $subastas));
		// }
	// }
	// else echo $subastas;
	// unset($_GET['buscar']);
	
?>					