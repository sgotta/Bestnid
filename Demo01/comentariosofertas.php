<?php 
	//subasta.php?op=1         //DEVUELVO BARRA CON SOLAPAS Y COMENTARIOS U OFERTAS (CON SUS FORMULARIOS CORRESPONDIENTES)
	$barra = '<ul class="nav nav-tabs">';
	if (isset($_GET['op']) && !empty($_GET['op'])) {
		if ($_GET['op']==1){
			$barra = $barra. '<li role="presentation" class="active"><a onclick="comentarios()">Comentarios</a></li>
				<li role="presentation"><a onclick="ofertas()">Ofertas</a></li> </ul>';
			$com=include("comentarios.php");							
			$barra=$barra.$com;
		}
		else {
			$barra = $barra. '<li role="presentation"><a onclick="comentarios()">Comentarios</a></li>
				<li role="presentation" class="active"><a onclick="ofertas()">Ofertas</a></li> </ul>';
			$of=include("ofertas.php");							
			$barra=$barra.$of;
		}
	}
	else {
		$barra = $barra. '<li role="presentation" class="active"><a onclick="comentarios()">Comentarios</a></li>
				<li role="presentation"><a onclick="ofertas()">Ofertas</a></li> </ul>';
		$com=include("comentarios.php");							
		$barra=$barra.$com;
	}

	echo $barra;
?>

