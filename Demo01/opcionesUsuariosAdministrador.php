<?php 
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$usuarios= mysql_query("SELECT * FROM usuario WHERE admin='1'",$con);
	$ret='';
	while ($u = mysql_fetch_array($usuarios)) {
		$ret = $ret.'<option value="'.$u['nombre_usuario'].'">'.$u['nombre_usuario'].'</option>';
	}
	return $ret;
?>