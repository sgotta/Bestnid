<?php
	include("conexion.php");
	// include("filtros.php");
	$cnx = mysql_connect($host,$user,$pw) or die("Problemas al conectar con el servidor");	
	mysql_select_db($db, $cnx) or die("error al conectar con la base de datos");
	
	if (isset($_POST['filtros'])) {

		$filtros = $_POST['filtros']; //guardo el array con los filtros seleccionados en una variable.

		foreach($filtros as $filtro){ //a cada filtro seleccionado le pone comillas simples ej.: 'Buenos Aires''La Plata'
		    $valor = "'".$filtro."'";
		    $filtros_aux[] = $valor; //se guardan en un arreglo auxiliar los filtros con comillas
		}

		$valores = implode(', ', $filtros_aux); //acá se separan los valores con ',' va a quedar algo asi: 'Buenos Aires', 'La Plata'
		$sql_valores = "(" .$valores. ")"; //por último se encierra todo entre parentesis ('Buenos Aires', 'La Plata')

		$sql_select = mysql_query("SELECT * 
									FROM publicacion AS p 
									INNER JOIN usuario AS u 
									ON u.ciudad IN $sql_valores /*$sql_valores = ('Buenos Aires', 'La Plata')*/
									AND u.nombre_usuario = p.Usuario_nombre_usuario",$cnx)
									or die ("problemas en consulta:".mysql_error());
		$total_filas = mysql_num_rows($sql_select);  

		if ($total_filas == 0) {
			echo '<script type="text/javascript">', 'alert("No se encontraron publicaciones");', '</script>';
		}else{
			$i=0;
			while(($publicacion_filtrada=mysql_fetch_array($sql_select)) && ($i<6)){
				echo '<section class="posts col-md-4">
						<div class="thumbnail">    
							<a href="#" class="thumb">
								<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $publicacion_filtrada['foto'] ).'" alt="" style="max-height: 150px;">
							</a>
							<div class="caption">
								<h3 class="post-title">
									<a href="#">'.$publicacion_filtrada['titulo'].'</a>
								</h3>
								<p><span class="post-fecha">26 de enero de 2015</span></p>
								<p class="post-contenido text-justify">
									'.$publicacion_filtrada['descripcion'].'
								</p>
								<div class="contenedor-botones">
									<a href="#" class="btn btn-primary">Detalles</a>
									<a href="#" class="btn btn-success">Ofertar</a>
								</div>
							</div>
						</div>
					</section>';
				$i++;
			} 
		}
	}else{
		echo '<script type="text/javascript">', 'alert("hola");', '</script>'; //no anda
		header("Location: index.php");
		// exit;
	}
?>