<?php 
	if (isset($_SESSION) && !empty($_SESSION)) {
		$string = "sesioniniciada.php?";
	}else{
		$string = "index.php?";
	}

	for ($i=0; $i < count($_GET); $i++) {
		if ((array_keys($_GET)[$i] != 'filtros') && (array_keys($_GET)[$i] != 'pagID')){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
	}

	// $string = 'index.php?catID=2';
	// '.$string.'
	// echo $string;
	// $ciudades [] = array("Buenos Aires","Bragado","La Plata","Pehuajo","Los Toldos");
	$ciudades [0] ="Buenos Aires";
	$ciudades [1] ="Bragado";
	$ciudades [2] ="La Plata";
	$ciudades [3] ="Pehuajo";
	$ciudades [4] ="Los Toldos";

	// echo $ciudades[0];
	// $bs = $c[0];
	// echo $bsas;
	// echo count($ciudades);
	$j = 0;
	$html = '<div>';
	while ($j < count($ciudades)) {
		if (isset($_GET['filtros']) && !empty($_GET['filtros']) && ($ciudades[$j] == $_GET['filtros'])){
			$html=$html.'<a href="'.$string.'filtros='.$ciudades[$j].'" class="list-group-item active" id="filtroActivo">'.$ciudades[$j].'</a>';
		}
		else {
			$html=$html.'<a href="'.$string.'filtros='.$ciudades[$j].'" class="list-group-item">'.$ciudades[$j].'</a>';
		}
		$j++;
	}
	$html= $html.'</div>';
	echo $html;


	// echo'<div>
	// 	<a href="'.$string.'filtros=Buenos Aires" class="list-group-item">Buenos Aires</a>
	// 	<a href="'.$string.'filtros=Bragado" class="list-group-item">Bragado</a>
	// 	<a href="'.$string.'filtros=La Plata" class="list-group-item">La Plata</a>
	// 	<a href="'.$string.'filtros=Pehuajo" class="list-group-item">Pehuajo</a>
	// 	<a href="'.$string.'filtros=Los Toldos" class="list-group-item">Los Toldos</a>
	// </div>';
?>