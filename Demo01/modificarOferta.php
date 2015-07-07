<?php

	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	$oferta=mysql_query("SELECT * FROM oferta WHERE idOferta = '$_GET[of]'") or die ("problemas en consulta:".mysql_error());
	$oferta=mysql_fetch_array($oferta);
	//SI NO LLEGO A LA FECHA VENCIMIENTO SE PUEDE MODIFICAR LA OFERTA, MUESTRO FORMULARIO PARA REALIZAR MODIFICACION
	$subasta=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$subasta=mysql_fetch_array($subasta);
	$fecha_venc = strtotime($subasta['fecha_fin']);
	//fecha vencimiento
	if ((getdate()['year'] < date("Y",$fecha_venc)) 
	OR (getdate()['year'] == date("Y",$fecha_venc) AND getdate()['mon'] < date("n",$fecha_venc))
	OR (getdate()['year'] == date("Y",$fecha_venc) AND getdate()['mon'] == date("n",$fecha_venc) AND getdate()['mday'] <= date("j",$fecha_venc))){
		//cantidad ofertas
		echo '<form action="modificacionOferta.php?of='.$_GET['of'].'&&subID='.$_GET['subID'].'" method="post">
				<textarea class="form-control" rows="3" minlength="1" maxlength="140" placeholder="Motivo" name="motivo">'.$oferta['motivo'].'</textarea><br>
				<div class="input-group col-md-2">
					<span class="input-group-addon glyphicon glyphicon-usd"></span>
					<input type="number" step="0.01" min="0.01" class="form-control" value="'.$oferta['precio'].'" placeholder="Precio" name="precio" minlength="1" autocomplete="on">
				</div><br>
				<button type="submit" class="btn btn-primary" id="btn-registro"> Ofertar </button>
			</form><br>';
	}
	//FECHA VENCIMIENTO
	else {
		echo 'Fecha';
	}
?>