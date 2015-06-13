<?php 
	$codigo='';
	// $string = $_SERVER["PHP_SELF"]."?";
	if (isset($_SESSION) && !empty($_SESSION)) {
		$string = "sesioniniciada.php?";
	}else{
		$string = "index.php?";
	}
	for ($i=0; $i < count($_GET); $i++) {
		if (array_keys($_GET)[$i] != 'pagID'){
			$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
		}
	}
  	// echo $string;
	if((isset($_GET['pagID']) && $_GET['pagID']==1) || (!isset($_GET['pagID']))){
		// echo '<li class="disabled"><a href="#" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
		$codigo=$codigo. '<li class="disabled"><a href="#" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
	}
	else {
		$ant = $_GET['pagID']-1;
		// echo '<li class=""><a href="'.$string.'pagID='.$ant.'" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
		$codigo=$codigo. '<li class=""><a href="'.$string.'pagID='.$ant.'" id="paginacion">&laquo;<span class="sr-only">Anterior</span></a></li>';
	}
	$n=1;
	if(empty($_GET['pagID'])){
		// echo '<li class="active"><a href="#" id="paginacionActiva">'.$n.'</a></li>';
		$codigo=$codigo. '<li class="active"><a href="#" id="paginacionActiva">'.$n.'</a></li>';
		$n++;
	}
	while($n<=$totalPaginas){
		if(isset($_GET['pagID']) && $_GET['pagID']==$n){
			// echo '<li class="active"><a href="'.$string.'pagID='.$n.'" id="paginacionActiva">'.$n.'</a></li>';
			$codigo=$codigo. '<li class="active"><a href="'.$string.'pagID='.$n.'" id="paginacionActiva">'.$n.'</a></li>';
		}
		else {
			// echo '<li><a href="'.$string.'pagID='.$n.'" id="paginacion">'.$n.'</a> </li>';
			$codigo=$codigo. '<li><a href="'.$string.'pagID='.$n.'" id="paginacion">'.$n.'</a> </li>';
		}
		
	$n++;
	}
	if(isset($_GET['pagID']) && $_GET['pagID']==$totalPaginas){
		// echo '<li class="disabled"><a href="#" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
		$codigo=$codigo. '<li class="disabled"><a href="#" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
	}
	else {
		if (!isset($_GET['pagID'])){
			$sig = 2;
			// echo '<li class=""><a href="'.$string.'pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
			$codigo=$codigo. '<li class=""><a href="'.$string.'pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
		}
		else {
			$sig = $_GET['pagID']+1;
			// echo '<li class=""><a href="'.$string.'pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
			$codigo=$codigo. '<li class=""><a href="'.$string.'pagID='.$sig.'" id="paginacion">&raquo;<span class="sr-only">Siguiente</span></a></li>';
		}
	}
	if(isset($_GET['buscar']) && !empty($_GET['buscar'])){
		return $codigo;
	}
	else {
		echo $codigo;
	}
?>


<!--  if (isset($_GET['cat'])){
  		// echo substr($_SERVER['REQUEST_URI'], 11)."&pagID=2";
  		$string = "index.php?";
  		for ($i=0; $i < count($_GET); $i++) { 
  				$string = $string.array_keys($_GET)[$i]."=".array_values($_GET)[$i]."&";
  		}
  		echo $string;
  		echo $_GET['pagID'];
  } -->