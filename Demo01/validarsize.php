<?php
	if ($_GET['size'] <= 1048576) {   /*8388608*/
		echo '<p class="text-success">"Tamaño de imagen <strong>OK!</strong>"</p>';
	}
	else {
		echo '<p class="text-danger">"La imagen <strong>'.$_GET['name'].'</strong> supera el tamaño maximo permitido, por favor elija otra."</p>';
	}
?>