<?php
	if(isset($_POST['asunto']) && !empty($_POST['asunto']) &&
		isset($_POST['mensaje']) && !empty($_POST['mensaje']))
	{
		$destino = "nicoferella@hotmail.com";
		$asunto  = $_POST['asunto'];
		$mensaje = $_POST['mensaje'];
		$desde   = "From:"."Nicolas Ferella PHP";
		mail($destino,$asunto,$mensaje,$desde);
		echo "enviado";
	}
	else {
		echo "faltan campos";
	}
?>