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
	$registro = mysql_query("SELECT * 
				FROM publicacion
				WHERE ( '$inicio' <= fecha_pago) 
				AND ( '$fin' >= fecha_pago)", $con)or die ("problemas en consulta: ".mysql_error());
	

	$numPub = mysql_num_rows($registro); 
	if ($numPub == 0) {		//No se encontro nada en la busqueda
		echo '<script type="text/javascript">', 'alert("La busqueda no contiene resultados");', '</script>';  //document.location = index.php;		
	}else{
		echo '<h4>Subastas concretadas: </h4>';
		while ($publicacion=mysql_fetch_array($registro)) {
			echo   '<div class="list-group" style="border: solid 1px #D6D6D6;">
						  <a href="subasta.php?subID='.$publicacion['idPublicacion'].'" class="list-group-item">
						    <h4 class="list-group-item-heading">'.$publicacion['titulo'].'&nbsp;&nbsp;'.'</h4>
						    <p class="list-group-item-text">'.$publicacion['descripcion'].'</p>
						    <p class="list-group-item-text">Inicio: '.$publicacion['fecha_inicio'].'&nbsp;&nbsp; Fin: '.$publicacion['fecha_fin'].'</p>
						  </a>
						</div>';
		}
	}
	
		
?>	

