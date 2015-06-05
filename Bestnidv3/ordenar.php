<?php 
	$string = $_SERVER["PHP_SELF"]."?";  //"index.php?";
	
	for ($i=0; $i < count($_GET); $i++) {
		if ((array_keys($_GET)[$i] != 'ordID') && (array_keys($_GET)[$i] != 'filtros')){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
		else {
			if (array_keys($_GET)[$i] == 'filtros'){
				for ($f=0; $f < count($_GET['filtros']); $f++) {
					$string = $string.'filtros%5B%5D'."=".array_values($_GET['filtros'])[$f]."&";      //filtros%5B%5D=Buenos+Aires&filtros%5B%5D=La+Plata
				}
			}
		}
	}

	echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ordenar<span class="caret"></span></a>
		<ul class="dropdown-menu col-md-3" role="menu">';
			if((isset($_GET['ordID']) && $_GET['ordID']=='masRecientes') || (!isset($_GET['ordID']))){	
				echo'<li class=""><a href="'.$string.'ordID='.'menosRecientes'.'" id="menosRec">Menos recientes</a></li>';
			}else{
				echo'<li class="disabled"><a href="'.$string.'ordID='.'menosRecientes'.'" id="menosRec">Menos recientes</a></li>';
			}
			echo'<li class="divider"></li>';
			if((isset($_GET['ordID']) && $_GET['ordID']=='menosRecientes') || (!isset($_GET['ordID']))){	
			 	echo '<li class=""><a href="'.$string.'ordID='.'masRecientes'.'" id="masRec">Mas recientes</a></li>';
			}else{
				echo '<li class="disabled"><a href="'.$string.'ordID='.'masRecientes'.'" id="masRec">Mas recientes</a></li>';
			}
		echo '</ul>';

?>
		
