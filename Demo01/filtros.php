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
	echo'<div>
		<a href="'.$string.'filtros=Buenos Aires" class="list-group-item">Buenos Aires</a>
		<a href="'.$string.'filtros=Bragado" class="list-group-item">Bragado</a>
		<a href="'.$string.'filtros=La Plata" class="list-group-item">La Plata</a>
		<a href="'.$string.'filtros=Pehuajo" class="list-group-item">Pehuajo</a>
		<a href="'.$string.'filtros=Los Toldos" class="list-group-item">Los Toldos</a>
	</div>';
?>