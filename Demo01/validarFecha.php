<?php

	$date = strtotime($_GET['fecha']);
	if ((getdate()['year'] < date("Y",$date)) OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] < date("n",$date))){
		//echo $_GET['fecha'];
		//echo date("j",$date);
		echo "vigente";
	}
	else {
		echo "vencida";
	}

?>