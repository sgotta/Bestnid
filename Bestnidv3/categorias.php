<?php
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$registro=mysql_query("SELECT * FROM categoria") or die ("problemas en consulta:".mysql_error());
	while($reg=mysql_fetch_array($registro)){
		// echo "&nbsp&nbsp&nbsp".$reg['nombre']."<br>";
		$cant = mysql_query("SELECT nombre FROM publicacion p INNER JOIN categoria c ON (p.Categoria_idCategoria = c.idCategoria) WHERE c.idCategoria = $reg[idCategoria]") or die ("problemas en consulta:".mysql_error());
		$numC = mysql_num_rows($cant);
		echo '<a href="#" class="list-group-item">'.$reg['nombre'].'<span class="badge">'.$numC.'</span></a>';
	}
?>