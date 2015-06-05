<?php 
	$string = $_SERVER["PHP_SELF"]."?";  //"index.php?";

	for ($i=0; $i < count($_GET); $i++) {
		if (array_keys($_GET)[$i] != 'filtros'){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
	}

	// $string = 'index.php?catID=2';
	// '.$string.'
	// echo $string;
	echo'<div>
		<a href="'.$string.'filtros=Buenos Aires">Buenos Aires</a>
		<a href="'.$string.'filtros=Bragado">Bragado</a>
		<a href="'.$string.'filtros=La Plata">La Plata</a>
		<a href="'.$string.'filtros=Pehuajo">Pehuajo</a>
		<a href="'.$string.'filtros=Los Toldos">Los Toldos</a>
	</div>';
?>