<?php 
	if (isset($_SESSION) && !empty($_SESSION)) {
		$string = "sesioniniciada.php?";
	}else{
		$string = "index.php?";
	}
	
	for ($i=0; $i < count($_GET); $i++) {
		if ((array_keys($_GET)[$i] != 'ordID') && (array_keys($_GET)[$i] != 'pagID')){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
	}

	echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ordenar<span class="caret"></span></a>
		<ul class="dropdown-menu col-md-3" role="menu">';
			if((isset($_GET['ordID']) && $_GET['ordID']=='masRecientes') || (!isset($_GET['ordID']))){	
				echo'<li class=""><a href="'.$string.'ordID=menosRecientes" id="menosRec">Menos recientes</a></li>';
			}else{
				echo'<li class="disabled"><a href="'.$string.'ordID=menosRecientes" id="menosRec">Menos recientes</a></li>';
			}
			echo'<li class="divider"></li>';
			if((isset($_GET['ordID']) && $_GET['ordID']=='menosRecientes') || (!isset($_GET['ordID']))){	
			 	echo '<li class=""><a href="'.$string.'ordID=masRecientes" id="masRec">Mas recientes</a></li>';
			}else{
				echo '<li class="disabled"><a href="'.$string.'ordID=masRecientes" id="masRec">Mas recientes</a></li>';
			}
		echo '</ul>';

?>
		
