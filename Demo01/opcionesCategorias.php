<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$cat= mysql_query("SELECT * FROM categoria",$con);
	$ret='';
	while ($c = mysql_fetch_array($cat)) {
		$ret = $ret.'<option value="'.$c['nombre'].'">'.$c['nombre'].'</option>';
	}
	return $ret;
?>