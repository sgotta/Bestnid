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
				FROM usuario
				WHERE ( '$inicio' <= fecha_registro) 
				AND ( '$fin' >= fecha_registro)
				AND (activo=1)
				ORDER BY fecha_registro", $con)or die ("problemas en consulta: ".mysql_error());
	

	$numPub = mysql_num_rows($registro); 
	if ($numPub == 0) {		//No se encontro nada en la busqueda
		echo '<script type="text/javascript">', 'alert("La busqueda no contiene resultados");', '</script>';  //document.location = index.php;		
	}else{
		echo '<h4>Usuarios registrados: </h4>';
		while ($publicacion=mysql_fetch_array($registro)) {
			echo   '<div class="list-group" style="border: solid 1px #D6D6D6;">
						  <a class="list-group-item">
						    <h4 class="list-group-item-heading">'.$publicacion['nombre_usuario'].'&nbsp;&nbsp;'.'</h4>
						    <p class="list-group-item-text">'.$publicacion['nombre'].'&nbsp;&nbsp;' .$publicacion['apellido'].'</p>
						    <p class="list-group-item-text">Registrado: '.$publicacion['fecha_registro'].'</p>
						  </a>
						</div>';
		}
	}
	    					
		
?>	