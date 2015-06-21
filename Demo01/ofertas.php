<?php 
	//DEVUELVO LAS OFERTAS DE LA SUBASTA(DUEÑO SUBASTA) Y EL FORMULARIO PARA REALIZAR LA OFERTA(USUARIO)
	$ofer = '<ul class="list-group">';
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$o=mysql_query("SELECT * FROM oferta WHERE Publicacion_idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	//$numPub = mysql_num_rows($c); 
	while ($reg=mysql_fetch_array($o)){
		$ofer = $ofer.'<li class="list-group-item">'.$reg['motivo'].'</li>';
	}
	$ofer = $ofer.'</ul>';
	$ofer = $ofer.'<form action="ofertar.php?subID='.$_GET['subID'].'" method="post">
						<textarea class="form-control" rows="3" placeholder="Motivo" name="motivo"></textarea><br>
						<div class="input-group col-md-2">
							<span class="input-group-addon glyphicon glyphicon-usd"></span>
							<input type="text" class="form-control" placeholder="Precio" name="precio" maxlength="15" autocomplete="on">
						</div><br>
						<button type="submit" class="btn btn-primary" id="btn-registro"> Ofertar </button>
					</form><br>';
	return $ofer;
?>